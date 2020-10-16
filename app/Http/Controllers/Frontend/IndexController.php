<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StorePostComment;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    private $repo;

    public function __construct(Post $post)
    {
        $this->repo = $post;
    }


    public function index(Request $request)
    {
        $posts = $this->repo
            ->search($request)
            ->whereStatus(1)
            ->wherePostType('post')
            ->orderBy('id', 'desc')
            ->with(['category', 'user', 'media'])
            ->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })->whereHas('user', function ($q) {
                $q->whereStatus(1);
            })
            ->paginate(5);
        return view('frontend.index', compact('posts'));
    }

    public function postShow($slug)
    {
        $post = Post::whereSlug($slug)
            ->whereStatus(1)
            ->wherePostType('post')
            ->orderBy('id', 'desc')
            ->with(['category', 'user', 'media',
                'approvedComments' => function ($q) {
                    $q->orderBy('id', 'desc');
                }
            ])->whereHas('category', function ($q) {
                $q->whereStatus(1);
            })->whereHas('user', function ($q) {
                $q->whereStatus(1);
            })->first();
//        return $post;
        return view('frontend.postDetails', compact('post'));
    }

    public function storeComment(StorePostComment $request, $slug)
    {

        $post = Post::where('slug', $slug)->first();
        $user_id = auth()->check() ? auth()->id() : null;
        if ($post) {
            $data = $request->all();
            $data['user_id'] = $user_id;
            $data['ip_address'] = $request->ip();
            $data['post_id'] = $post->id;
            $post->comments()->create($data);
        }
        session()->flash('success', __('comment added successfully'));
        return redirect()->route('frontend.index');
    }

    public function contactForm()
    {
        return view('frontend.contact');
    }

    public function contactFormSave(StoreContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);
        session()->flash('success', __('contact saved..'));
        return redirect()->route('frontend.index');
    }

    public function category($slug)
    {
        $category = Category::
        whereStatus(1)
            ->whereSlug($slug)
            ->orWhere('id', $slug)
            ->first()
            ->id;
        if ($category) {
            $posts = Post::with(['media', 'user', 'category'])
                ->withCount('approvedComments')
                ->whereCategoryId($category)
                ->wherePostType('post')
                ->whereStatus(1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            return view('frontend.index', compact('posts'));
        }
        return redirect()->back();
    }

    public function archive($date)
    {
        $ar = explode('-', $date);
        $month = $ar[0];
        $year = $ar[1];

        $posts = Post::with(['media', 'user', 'category'])
            ->withCount('approvedComments')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->wherePostType('post')
            ->whereStatus(1)
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('frontend.index', compact('posts'));

    }

    public function author($username)
    {
        $user = User::whereUsername($username)
            ->whereStatus(1)
            ->first()
            ->id;
        if ($user) {
            $posts = Post::with(['media', 'user', 'category'])
                ->withCount('approvedComments')
                ->whereUserId($user)
                ->wherePostType('post')
                ->whereStatus(1)
                ->orderBy('id', 'desc')
                ->paginate(5);
            return view('frontend.index', compact('posts'));
        }
        return redirect()->back();
    }
}

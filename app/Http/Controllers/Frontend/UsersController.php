<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // get all posts of auth user
    public function index()
    {
        $posts = auth()->user()->posts()->with([
            'media',
            'user',
            'category'
        ])->withCount('comments')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('frontend.users.dashboard', compact('posts'));
    }

    // create post
    public function create()
    {
        $categories = Category::whereStatus(1)
            ->pluck('name', 'id');
        return view('frontend.users.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['comment_able'] = $request->comment_able;
        $data['category_id'] = $request->category_id;

        $post = auth()->user()->posts()->create($data);

        if ($request->images && count($request->images) > 0) {
            $i = 1;
            foreach ($request->images as $file) {
                $filename = $post->slug . '-' . time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $path = public_path('assets/posts/' . $filename);
                Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);

                $post->media()->create([
                    'file_name' => $filename,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                ]);
                $i++;
            }
        }

        if ($request->status == 1) {
            Cache::forget('recent_posts');
        }
        session()->flash('success', __('added'));
        return redirect()->route('frontend.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::whereId($id)->first();
        if ($post) {
            $categories = Category::whereStatus(1)
                ->pluck('name', 'id');
            return view('frontend.users.edit', compact('categories', 'post'));
        } else {
            return redirect()->route('frontend.index');
        }
    }


    public function update(Request $request, $id)
    {

        $post = Post::whereSlug($id)->orWhere('id', $id)->whereUserId(auth()->id())->first();

        if ($post) {
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $data['comment_able'] = $request->comment_able;
            $data['category_id'] = $request->category_id;

            $post->update($data);

            if ($request->images && count($request->images) > 0) {
                $i = 1;
                foreach ($request->images as $file) {
                    $filename = $post->slug . '-' . time() . '-' . $i . '.' . $file->getClientOriginalExtension();
                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $path = public_path('assets/posts/' . $filename);
                    Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path, 100);

                    $post->media()->create([
                        'file_name' => $filename,
                        'file_size' => $file_size,
                        'file_type' => $file_type,
                    ]);
                    $i++;
                }
            }

            session()->flash('success', __('Post updated successfully'));
            return redirect()->route('frontend.index');
        }
        session()->flash('error', __('err'));
        return redirect()->route('frontend.index');
    }

    public function delMedia($id)
    {
        $media = PostMedia::whereId($id)->first();
        if ($media) {
            if (File::exists('assets/posts/' . $media->file_name)) {
                unlink('assets/posts/' . $media->file_name);
            }
            $media->delete();
            return true;
        } else {
            return false;
        }
    }


    // delete post
    public function destroy($id)
    {
        $post = Post::whereId($id)->first();
        if ($post) {
            if ($post->media->count() > 0) {
                foreach ($post->media as $media) {
                    if (File::exists('assets/posts/' . $media->file_name)) {
                        unlink('assets/posts/' . $media->file_name);
                    }
                }
            }
            $post->delete();
            session()->flash('success', __('deleted...'));
            return redirect()->route('frontend.index');
        }
    }
}

@extends('layouts.app')
@section('content')

    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class=" col-lg-3 col-12 md-mt-40 sm-mt-40 ">
                    @include('frontend.users.include.sidebar')
                </div>


                <div class="col-lg-9 col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->comments_count }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>
                                        <a href="{{route('users.post.edit',$post->id)}}" class="btn btn-sm btn-primary"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0)"
                                           onclick="if (confirm('are you sure to delete this post')){
                                               document.getElementById('del-post-{{$post->id}}').submit();
                                               }else {
                                               return false;
                                               }" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        <form action="{{route('users.post.destroy',$post->id)}}" method="post" id="del-post-{{$post->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <h3 class="text-danger text-center">No posts found</h3>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">{!! $posts->links() !!}</td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection

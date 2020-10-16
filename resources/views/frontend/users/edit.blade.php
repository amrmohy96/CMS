@extends('layouts.app')
@section('style')

@stop
@section('content')
    <!-- Start Blog Area -->
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class=" col-lg-3 col-12 md-mt-40 sm-mt-40 ">
                    @include('frontend.users.include.sidebar')
                </div>

                <div class="col-lg-9 col-12">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Create Post <i class="fa fa-plus"></i></h3>
                        <form method="post" action="{{ route('users.post.update',$post->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="account__form">
                                <div class="input__box">

                                    <label>Title<span>*</span></label>
                                    <input id="username" type="text"
                                           class="@error('title') is-invalid @enderror" name="title"
                                           value="{{ $post->title }}" required autocomplete="title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input_box">
                                    <label>Status<span>*</span></label>
                                    <select name="status" class="select__option @error('status') is-invalid @enderror">
                                        <option>…</option>
                                        <option {{$post->status == 1 ?  'selected' : ''}} value="1">Active</option>
                                        <option {{$post->status == 0 ?  'selected' : ''}} value="0">notActive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input_box">
                                    <label>Commentable<span>*</span></label>
                                    <select name="comment_able"
                                            class="select__option @error('comment_able') is-invalid @enderror">
                                        <option>…</option>
                                        <option {{$post->comment_able == 1 ?  'selected' : ''}} value="1">yes</option>
                                        <option {{$post->comment_able == 0 ?  'selected' : ''}} value="0">no</option>
                                    </select>
                                    @error('comment_able')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input_box">
                                    <label>Category<span>*</span></label>
                                    <select name="category_id"
                                            class="select__option @error('category_id') is-invalid @enderror">
                                        <option>Select a category…</option>
                                        @forelse($categories as $key => $value)
                                            <option
                                                {{$post->category_id == $key ?  'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input__box">
                                    <label>Description<span>*</span></label>
                                    <textarea class="form-control" rows="5" cols="5"
                                              name="description">{{$post->description}}</textarea>
                                </div>

                                <div class="file-loading">
                                    <label>Image<span>*</span></label>
                                    <input type="file" id="post-images" multiple="multiple" name="images[]"/>
                                </div>
                                <br>

                                <div class="form__btn">
                                    <button type="submit">
                                        update
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection
@section('script')
    <script>
        $(function () {
            $('#post-images').fileinput({
                theme: "fa",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                        "{{ asset('assets/posts/' . $media->file_name) }}",
                    @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                    {
                        caption: "{{ $media->file_name }}",
                        size: {{ $media->file_size }},
                        width: "120px",
                        url: "{{ route('users.post.media.destroy', [$media->id, '_token' => csrf_token()]) }}",
                        key: "{{ $media->id }}"
                    },
                    @endforeach
                    @endif
                ],
            })
        });
    </script>
@endsection

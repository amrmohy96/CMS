@extends('layouts.app')

@section('content')
    <section class="my__account__wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="account__title">Register</h3>
                        <form method="POST" action="{{ route('dashboard.register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="account__form">
                                <div class="input__box">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label for="name">Username</label>
                                    <input id="username" type="text" class="@error('name') is-invalid @enderror"
                                           name="username" value="{{ old('username') }}" required
                                           autocomplete="username" autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label for="email"
                                    >{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                           class="@error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label for="mobile">Mobile</label>
                                    <input id="mobile" type="text"
                                           class="@error('mobile') is-invalid @enderror" name="mobile"
                                           value="{{ old('mobile') }}" required autocomplete="mobile">

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input__box">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input__box">
                                    <label for="password-confirm"
                                          >{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="input__box">
                                    <lable for="user_image">image</lable>
                                     <input id="user_image" class="form-control-file @error('user_image') is-invalid @enderror" type="file" name="user_image">
                                    @error('user_image')<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea class="form-control" name="bio" id="bio">{{old('bio')}}</textarea>
                                </div>

                                <div class="form__btn">
                                    <button type="submit">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

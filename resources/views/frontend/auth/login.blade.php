@extends('layouts.app')

@section('content')
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Login</h3>
                        <form method="POST" action="{{ route('dashboard.login') }}">
                            @csrf
                            <div class="account__form">
                                <div class="input__box">
                                    <label for="username">Username</label>
                                    <input id="username" type="text"
                                           class="@error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                           class="@error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form__btn">
                                    <button type="submit">
                                        {{ __('Login') }}
                                    </button>

                                    <label class="label-for-checkbox">
                                        <input id="rememberme" class="input-checkbox" name="remember"
                                               {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                        <span>{{ __('Remember Me') }}</span>
                                    </label>

                                </div>
                                @if (Route::has('password.request'))
                                    <a class="forget_pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

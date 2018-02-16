@extends('layouts.app')

@section('content')

<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'login', 'items' => []])
<!--end breadcrumbs-->

<!-- registration -->
<section class="registration">
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="login-register-content">
                <div class="row collapse borderBottom">
                    <div class="medium-6 large-centered medium-centered">
                        <div class="page-heading text-center">
                            <h3>User login</h3>
                        </div>
                    </div>
                </div>
                <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                    <div class="large-4 large-offset-1 medium-6 columns">
                        <div class="social-login" data-equalizer-watch>
                            <h5 class="text-center">Login via Social Profile</h5>
                            <div class="social-login-btn facebook">
                                <a href="{{route('social.login',['provider' => 'facebook'])}}"><i class="fa fa-facebook"></i>login via facebook</a>
                            </div>
                            <div class="social-login-btn twitter">
                                <a href="{{route('social.login',['provider' => 'twitter'])}}"><i class="fa fa-twitter"></i>login via twitter</a>
                            </div>
                            <div class="social-login-btn g-plus">
                                <a href="{{route('social.login',['provider' => 'google'])}}"><i class="fa fa-google-plus"></i>login via google plus</a>
                            </div>
                            <div class="social-login-btn linkedin">
                                <a href="{{route('social.login',['provider' => 'linkedin'])}}"><i class="fa fa-linkedin"></i>login via linkedin</a>
                            </div>
                        </div>
                    </div>
                    <div class="large-2 medium-2 columns show-for-large">
                        <div class="middle-text text-center hide-for-small-only" data-equalizer-watch>
                            <p>
                                <i class="fa fa-arrow-left arrow-left"></i>
                                <span>OR</span>
                                <i class="fa fa-arrow-right arrow-right"></i>
                            </p>
                        </div>
                    </div>
                    <div class="large-4 medium-6 columns end">
                        <div class="register-form">
                            <h5 class="text-center">Login into your Account</h5>
                            <form method="post" data-abide novalidate action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div data-abide-error class="alert callout" style="display: none;">
                                    <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input name="email" class="input-group-field" type="text" placeholder="Enter your username" required>
                                    <span class="form-error{{ $errors->has('email') ? ' is-visible' : '' }}">@if($errors->has('email')) {{ $errors->first('email') }} @else username is required @endif</span>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input name="password" type="password" id="password" placeholder="Enter your password" required>
                                    <span class="form-error{{ $errors->has('password') ? ' is-visible' : '' }}">@if($errors->has('password')) {{ $errors->first('password') }} @else password is required @endif</span>
                                </div>
                                <div class="checkbox">
                                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="customLabel" for="remember">Remember me</label>
                                </div>
                                <button class="button expanded" type="submit" name="submit">login Now</button>
                                <p class="loginclick"><a href="{{route('password.request')}}">Forgot Password</a> New Here? <a href="{{route('register')}}">Create a new Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer -->

@endsection
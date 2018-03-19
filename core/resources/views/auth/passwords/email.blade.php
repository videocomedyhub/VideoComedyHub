@extends('layouts.app')

@section('content')

<!--breadcrumbs-->
@include('frontend.sections.breadcrumb', ['current' => 'forget password', 'items' => []])
<!--end breadcrumbs-->

<!-- registration -->
<section class="registration">
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="login-register-content">
                <div class="row collapse borderBottom">
                    <div class="medium-6 large-centered medium-centered">
                        <div class="page-heading text-center">
                            <h3>Forgot Password</h3>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                    <div class="large-4 medium-6 large-centered medium-centered columns">
                        <div class="register-form">
                            <h5 class="text-center">Enter Email</h5>
                            <form data-abide novalidate  method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input type="email" placeholder="Enter your email"  name="email" value="{{ old('email') }}" required>
                                    <span class="form-error{{ $errors->has('email') ? ' is-visible' : '' }}">@if($errors->has('email')) {{ $errors->first('email') }} @else email is required @endif</span>
                                </div>
                                <button class="button expanded" type="submit" name="submit">Send Password Reset Link</button>
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
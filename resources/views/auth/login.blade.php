@extends('layouts.frontapp')
@section('title', "Log in")

@section('content')
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('dashboard.home') }}">Home</a></li>
            <li>Log In</li>
        </ul>
    </div>
</div>
<section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center">
             <ul class="nav register_tabnav ul_li_center" role="tablist">
                        <li role="presentation">
                            <div data-bs-toggle="tab" >
                                <a href="{{ route('login') }}" data-bs-toggle="tab"  data-bs-target="#signin_tab" role="tab" aria-controls="signin_tab" aria-selected="true" class="active">Sign In</a>
                            </div>
                        </li>
                        <li role="presentation">
                            <div>
                                <a href="{{ route('register') }}" data-bs-target="#signup_tab" role="tab" aria-controls="signup_tab" aria-selected="false" class="">Register</a>
                            </div>
                        </li>
                    </ul>
            <div class="col-lg-8">
                    <div class="register_wrap tab-content">
                        <div class="tab-pane fade active show" id="signin_tab" role="tabpanel">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form_item_wrap">
                                    <h3 class="input_title">User Name*</h3>
                                    <div class="form_item">
                                        <label for="username"><i class="fas fa-user"></i></label>
                                        <input id="username" type="user_name" name="user_name" placeholder="User Name" class="@error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
        
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form_item_wrap">
                                    <h3 class="input_title">Password*</h3>
                                    <div class="form_item">
                                        <label for="password"><i class="fas fa-lock"></i></label>
                                        <input id="password" type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form_item_wrap">
                                    <div class="checkbox_item">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                    </div>
                                </div>
                                <div class="form_item_wrap">
                                    <button type="submit"  class="btn btn_primary">Sign In</button>
                                </div>
                            </form>
                        </div>

                    </div>       
            </div>
        </div>
    </div>
</section>
@endsection


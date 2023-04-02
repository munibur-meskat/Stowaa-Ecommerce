@extends('layouts.frontapp')
@section('title', "Register")

@section('content')
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('dashboard.home') }}">Home</a></li>
            <li>Register</li>
        </ul>
    </div>
</div>

<section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav register_tabnav ul_li_center" role="tablist">
                <li role="presentation">
                    <div>
                        <a href="{{ route('login') }}" data-bs-target="#signin_tab" role="tab" aria-controls="signin_tab" aria-selected="false" class="">Sign In</a>
                    </div>
                </li>
                <li role="presentation">
                    <div>
                        <a href="{{ route('register') }}" data-bs-toggle="tab" data-bs-target="#signup_tab" role="tab" aria-controls="signup_tab" aria-selected="true" class="active">Register</a>
                    </div>
                </li>
            </ul>
            <div class="col-lg-8">
                <div class="register_wrap tab-content">
                    <div class="tab-pane fade active show" id="signup_tab" role="tabpanel">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form_item_wrap">
                            <h3 class="input_title">Name*</h3>
                            <div class="form_item">
                                <label for="name"><i class="fas fa-user"></i></label>
                                <input id="name" type="text" name="name" placeholder="Name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">User Name*</h3>
                            <div class="form_item">
                                <label for="username"><i class="fas fa-user"></i></label>
                                <input id="username" type="text" name="user_name" placeholder="User Name" class="@error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
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
                                <input id="password" type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">Confirm Password*</h3>
                            <div class="form_item">
                                <label for="password-confirm"><i class="fas fa-lock"></i></label>
                                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <h3 class="input_title">Email*</h3>
                            <div class="form_item">
                                <label for="email_input"><i class="fas fa-envelope"></i></label>
                                <input id="email" type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form_item_wrap">
                            <button type="submit" class="btn btn_secondary">Register</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
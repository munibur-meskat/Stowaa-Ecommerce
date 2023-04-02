 
@extends('layouts.backendapp')
@section('title',"Create User")
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Create User</li>
                </ol>
            </nav>
            <h1 class="m-0">Create User</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
                <div class="col-lg-10">
                    <div class="card card-form">
                        <div class="row no-gutters">
                            <div class="col-lg-4 card-body">
                                <p><strong class="headings-color">Basic Information</strong></p>
                                <p class="text-muted">Edit your account details and settings.</p>
                            </div>
                            <div class="col-lg-8 card-form__body card-body">
                                <form action="{{ route('dashboard.user.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_name">User Name:</label>
                                        <input type="text" class="form-control" name="user_name" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="conFirmPassword">Confirm Password:</label>
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role:</label>
                                        <select name="role" class="form-control">
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ Str::upper($role->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn-primary" value="Create">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

        </div>
    </div>
</div>
@endsection
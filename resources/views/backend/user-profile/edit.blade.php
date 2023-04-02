{{-- 
{{-- @foreach ($user_profiles as $key => $user_profile)
{{ $user_profiles[$key]['name'] }}
@endforeach --}}

@extends('layouts.backendapp')
@section('title',"Edit-Profile")
@section('content')

  <div class="container-fluid  page__heading-container">
      <div class="page__heading d-flex align-items-end">
        <div class="flex">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
              </ol>
          </nav>
          <h1 class="m-0">Edit Account</h1>
          </div>
      </div>
  </div>

  <div class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-10">

      <div class="card card-form">
          <div class="row no-gutters">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>

              <div class="col-lg-4 card-body">
                  <p><strong class="headings-color">Edit Profile</strong></p>
                  <p class="text-muted">Edit your account details and settings.</p>
              </div>

              <div class="col-lg-8 card-form__body card-body">
                <form action="{{ route('dashboard.user-profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="fname">First name</label>
                              <input id="fname" type="text" class="form-control" placeholder="First name" value="Adrian">
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label for="lname">Last name</label>
                              <input id="lname" type="text" class="form-control" placeholder="Last name" value="Demian">
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" type="text" name="name" style="width: 400px;" value="{{ Auth::user()->user_meta->name }}" required autocomplete="name" autofocus>
                </div>
                  <div class="form-group">
                      <label for="address">Bio/Description</label>
                      <textarea id="address" name="address" type="text" style="width: 500px; height: 100px" class="form-control">{{ Auth::user()->user_meta->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="opass">Old Password</label>
                    <input style="width: 270px;" id="opass" type="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="npass">New Password</label>
                    <input style="width: 270px;" id="npass" type="password" class="form-control is-invalid">
                    <small class="invalid-feedback">The new password must not be empty.</small>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control form-control-solid mb-2 @error('image') is-invalid @enderror">
                    <img class="mt-3" width="150" src="{{ asset('storage/profile-upload/profile.png') }}" alt="#">
                    {{-- {{ $user_metas->name }} --}}
                    {{-- .$user_meta->profile_photo --}}
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="text-left mb-5">
                    <input type="submit" class="form-control btn-success" value="Update">
                </div>
              </form>

              </div>
          </div>
      </div>

     

  </div>
  </div>
  </div>

@endsection
 
@extends('layouts.backendapp')
@section('title',"User-Profile")
@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">User Profile</li>
                </ol>
            </nav>
            <h1 class="m-0">User Profile</h1>
        </div>
    </div>
</div>

 {{-- {{ Auth::user()->user_meta->address }} --}}

<div class="container-fluid page__container">
    <div class="row">
                <div class="col-lg-12">
                    <div class="mdk-drawer-layout__content page" style="transform: translate3d(0px, 0px, 0px);">

                        <div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
                            <div class="bg-primary" style="min-height: 150px;">
                                <div class="d-flex align-items-end container-fluid page__container" style="position: absolute; left: 0; right: 0; bottom: 0;">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('backend/images/andrew-robles.jpg') }}" alt="avatar" class="avatar-img rounded" style="border: 2px solid white;">
                                    </div>
                                    <div class="card-header card-header-tabs-basic nav flex" role="tablist">
                                        <a href="#activity" class="active show" data-toggle="tab" role="tab" aria-selected="true">Activity</a>
                                        <a href="#" data-toggle="tab" role="tab" aria-selected="false">Emails</a>
                                        <a href="#quotes" data-toggle="tab" role="tab" aria-selected="false">Quotes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="container-fluid page__container">
                    <div class="card card-form">
                    <div class="row no-gutters">
                    <div class="col-lg-6 card-body">

                        <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="form-group">
                                <label>Profile Pic:</label>
                                <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files="[&quot;assets/images/account-add-photo.svg&quot;]">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('backend/images/andrew-robles.jpg') }}" alt="avatar" class="avatar-img rounded" style="border: 2px solid white;">
                                    </div>
                                </div>
                                <div class="form-group">
                                <div><h1 class="h4 mb-1">{{ Auth::user()->name }}</h1></div>
                                <div><p class="text-muted">{{ Auth::user()->email }}</p></div>
                              </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <h4>Description:</h4>
                                </div>
                                <div id="description" name="description" style="width: 500px;" required autocomplete="description">
                                <p style="font-size: 13px">{{ Auth::user()->user_meta->description }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <h4>Address:</h4>
                                </div>

                                {{-- <input class="form-control" id="address" type="text" name="address" style="width: 400px;" value="{{ Auth::user()->user_meta->address }}" required autocomplete="address" autofocus> --}}

                                <div id="address" type="text" name="address" style="width: 400px;">
                                    <p style="font-size: 13px">{{ Auth::user()->user_meta->address }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="social1">Social links:</label>
                                <div class="input-group input-group-merge mb-2" style="width: 270px;">
                                    <input id="social1" type="text" class="form-control form-control-prepended" placeholder="Facebook">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fab fa-facebook"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge mb-2" style="width: 270px;">
                                    <input id="social2" type="text" class="form-control form-control-prepended" placeholder="Twitter">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fab fa-twitter"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge mb-2" style="width: 270px;">
                                    <input id="social3" type="text" class="form-control form-control-prepended" placeholder="Instagram">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fab fa-instagram"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


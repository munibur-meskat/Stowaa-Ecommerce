@extends('layouts.backendapp')
@section('title', "Role Create")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Role Create</li>
                </ol>
            </nav>
            <h1 class="m-0">Role Create</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('dashboard.role.permission.insert') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role" style="font-weight: 800">Permission Name:</label>
                            <input type="text" name="name" class="form-control" id="role" placeholder="Permission Name">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('dashboard.role.insert') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role" style="font-weight: 800">Role Name:</label>
                            <input type="text" name="name" class="form-control" id="role" placeholder="Role Name">
                        </div>
                        <div class="my-3" style="font-weight: 800">Set Permission:</div>
                        <div class="row mb-3" >
                            @foreach ($permissions as $permission)
                        <div class="col-lg-2 col-sm-4 col-2 py-2">
                            <label style="font-size: 17px;"><input class="m-2" type="checkbox" value="{{ $permission->id }}" name="permissions[]">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
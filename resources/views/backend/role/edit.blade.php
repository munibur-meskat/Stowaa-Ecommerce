@extends('layouts.backendapp')
@section('title', "Role Edit")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Edit Role</li>
                </ol>
            </nav>
            <h1 class="m-0">Edit Role</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body p-4">
                <form action="{{ route('dashboard.role.update', $role->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role Name:</label>
                        <input type="text" name="name" class="form-control" id="role" value="{{ $role->name }}" placeholder="Role Name">
                    </div>
                    <div class="my-3">Set Permission:</div>
                    <div class="row mb-4">

                    @foreach ($permissions as $permission)
                    <div class="col-lg-2 col-sm-3 col-2">
                        <label><input type="checkbox" value="{{ $permission->id }}" name="permissions[]" 
                            @foreach ($role->permissions as $checkedPermissions)
                            {{ $checkedPermissions->id === $permission->id ? "checked" : "" }}
                    @endforeach>
                        {{ $permission->name }}</label>
                    </div>
                    @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
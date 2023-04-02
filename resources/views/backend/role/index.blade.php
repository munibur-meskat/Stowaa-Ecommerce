@extends('layouts.backendapp')
@section('title', "All Role")

@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">All Role</li>
                </ol>
            </nav>
            <h1 class="m-0">All Role</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body p-4">
                    <table class="table" >
                        <tr style="background-color:#a1490a;color:azure">
                            <th>Id</th>
                            <th width="200">Role Name</th>
                            <th style="text-align: center;" width="700">Permissions</th>
                            <th style="text-align: center" width="300">Action</th>
                        </tr>
        
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="btn btn-blue" style="background-color:rgb(78, 166, 20);text-align: center;text-decoration: none;margin: 2px;">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td style="text-align:center" class="#">
                                @can('role edit')
                                <a href="{{ route('dashboard.role.edit', $role->id) }}" class="badge bg-primary text-white" style="font-size:12px">Edit</a>
                                @endcan
                                
                                @can('role delete')
                                <a href="#" class="badge bg-danger text-white " style="font-size:12px">Delete</a>
                                @endcan
                                
                            </td>
                        </tr>
                        @endforeach
        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
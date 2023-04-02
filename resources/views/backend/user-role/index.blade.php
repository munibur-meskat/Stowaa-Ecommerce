 @extends('layouts.backendapp')
@section('title',"All User")

@section('content')

<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">All User</li>
                </ol>
            </nav>
            <h1 class="m-0">All User</h1>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">All User</h2>
                    </div>
                    <div class="card-body p-4">
                <table class="table">
                    <tr style="background-color:#a1490a;color:azure">
                        <th>Id</th>
                        <th width="600">Name</th>
                        <th width="800">Email</th>
                        <th width="400">Role</th>
                        <th width="800">Created At</th>
                        <th width="800">Verified At</th>
                        <th width="800">Action</th>
                    </tr>
    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge" style="background-color: rgb(126, 12, 175);color: white;font-size:13px;border: none;padding: 5px 7px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px">{{ $role->name }}</span>
                                {{-- class="badge badge-info" --}}
                            @endforeach
                        </td>
                        <td>{{ $user->created_at->diffForhumans() }}
                        </td>
                        
                        <td>
                            @if ( $user->email_verified_at != null)
                                {{ 'Verified User' }}
                            @else
                                {{ 'Not Verified User' }}
                            @endif
                        </td>

                        <td>
                        <a href="{{ route('dashboard.user.edit', $user->id) }}"><button type="button" class="btn btn-primary" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">Edit</button></a>

                        <form action="{{ route('dashboard.user.delete', $user->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">Delete</button>
                        </form>
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
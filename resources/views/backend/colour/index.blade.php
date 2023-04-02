@extends('layouts.backendapp')
@section('title', "Colour")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Colour</li>
                </ol>
            </nav>
            <h1 class="m-0">Colour</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
<div class="col-lg-9 col-sm-7">
    @can('can see colour')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr style="background-color:#a1490a;color:azure">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                @forelse ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->slug }}</td>
                        <td class="">
                            <a href="#"><button type="button" class="btn btn-primary" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">view</button></a>
                            @can('can delete colour')
                            <form action="{{ route('dashboard.color.delete', $color->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">delete</button>
                            </form>
                            @endcan
                        </td>
                        
                    </tr> 
                @empty
                    <tr>
                        <td colspan="6"><p>{{ __("NO Colour Found!") }}</p></td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    {{ $colors->links() }}
    @endcan
</div>

<div class="col-lg-3 col-sm-5">
@can('create category')
<div class="card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body p-4">
        <form action="{{ route('dashboard.color.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="color">Name*:</label>
                <input type="text" name="name" class="form-control" id="color" placeholder="Colour Name">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div>
</div>
    @endcan
</div>
</div>
</section>

@endsection
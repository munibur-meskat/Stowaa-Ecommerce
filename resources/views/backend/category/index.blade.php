@extends('layouts.backendapp')
@section('title', "Product Category")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Product Category</li>
                </ol>
            </nav>
            <h1 class="m-0">Product Category</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-9 col-sm-7">
        @can('can see category')
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr style="background-color:#a1490a;color:azure">
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created By</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                @if ($category->photo)
                                    <img src="{{ asset('storage/categories/' .$category->photo) }}" alt="{{ $category->name }}" width="60">
                                @else
                                <img src="{{ Avatar::create($category->name)->setDimension(40)->setFontSize(15)->toBase64()->getImageObject() }}" alt="{{ $category->name }}">
                                @endif
                                
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td class="">
                                <a href="#"><button type="button" class="btn btn-primary">view</button></a>
                                @can('can delete category')
                                <a href="#"> <button type="button" class="btn btn-danger">delete</button></a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                    <tr>
                     <td colspan="6"><p>{{ __("NO Category Found!") }}</p></td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    {{ $categories->links('vendor.custom_pagination') }}
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
            <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Name*:</label>
                    <input type="text" name="name" class="form-control" id="category" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label>Parent:</label>
                    <select name="parent_id" class="form-control">
                        <option selected disabled>parent</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <p class="mt-2">Optional Parent</p>
                </div>
                <div class="form-group">
                    <label for="category">Description:</label>
                    <textarea name="description" class="form-control" rows="8"></textarea>
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="photo" class="form-control">
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
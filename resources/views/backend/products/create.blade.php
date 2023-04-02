@extends('layouts.backendapp')
@section('title', "Add Product")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Add Product</li>
                </ol>
            </nav>
            <h1 class="m-0">Add Product</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
    <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Description</h3>
                </div>
                <div class="card-body p-4">

                <div class="form-group">
                    <label for="shot_description">Shot Description:</label>
                    <textarea name="shot_description" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control summernote"></textarea>
                </div>
                <div class="form-group">
                    <label for="addtional_info">Addtional Info:</label>
                    <textarea name="addtional_info" class="form-control summernote"></textarea>
                </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3>Product</h3> 
                </div>
                <div class="card-body p-4">
                    
                <div class="form-group">
                    <label>Title*:</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label>Price*:</label>
                    <input type="number" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="sale_price">Sale Price*:</label>
                    <input type="number" name="sale_price" class="form-control" id="sale_price" placeholder="Sale Price">
                </div>
                <div class="form-group">
                    <label for="discount">Discount:</label>
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="Discount">
                </div>
                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                </div>
            </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="height:250px; overflow-x:hidden">
                        @foreach ($categories as $category)
                            <label class="d-block">
                                <input name="category[]" type="checkbox" value="{{ $category->id }}"> {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Product Gallery</h3>
            </div>
                <div class="card-body">
                    <div class="form-group">
                   <input type="file" name="gallery[]" multiple>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-10">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="width: 200px">Submit</button>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection

@section('header-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endsection

@section('footer-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
        });
    </script>
@endsection
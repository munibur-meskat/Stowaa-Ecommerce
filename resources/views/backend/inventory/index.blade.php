@extends('layouts.backendapp')
@section('title', "Inventory")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Inventory</li>
                </ol>
            </nav>
            <h1 class="m-0">Inventory</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Product Title: {{ $product->title }}</h3>
            </div>
            <div class="card-body">

                {{-- {{ $product->inventories }} --}}

                <table class="table table-bordered table-striped">
                    <tr style="background-color:#a1490a;color:azure">
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Additional Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($product->inventories as $product_inv)
                        <tr>
                            <td>{{ $product_inv->id }}</td>
                            <td>{{ $product_inv->product_id }}</td>
                            <td>{{ $product_inv->colors->name }}</td>
                            <td>{{ $product_inv->sizes->name }}</td>
                            <td>{{ $product_inv->quantity }}</td>
                            <td>{{ $product_inv->additional_price }}</td>
                            <td><a href="#">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
<div class="col-lg-4">
    <div class="card">
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
        <div class="card-body p-4">
            {{-- {{ $product->inventories }} --}}
            <form action="{{ route('dashboard.inventory.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Title*:</label>
                    <input type="text" name="title" class="form-control" placeholder="Product title" value="{{ $product->title }}">
                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                </div>
                
                <div class="form-group">
                    <select class="form-control select2" name="color" id="select_color">
                        <option selected disabled>Select Color</option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <select class="form-control select2" name="size" id="select_size" disabled>

                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="quantity" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Additional Price</label>
                    <input type="number" name="additional_price" class="form-control">
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

@section('header-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" >
@endsection

@section('footer-js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>

//ajax
$(document).ready(function() {
    $('.select2').select2();

    var 
        product_id = $('#product_id'),
        select_color = $('#select_color'),
        select_size = $('#select_size');

        select_color.on('change', function(){

       var color_id = select_color.val();
       var product_id = {{ $product->id }}

    select_size.removeAttr('disabled');

    $.ajax({
           type:'POST',
           url:"{{ route('dashboard.inventory.select.size') }}",
           data:{
            product_id: product_id,
            color_id: color_id,
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){
            select_size.html(data);

           }
        });
    });
});

</script>

@endsection
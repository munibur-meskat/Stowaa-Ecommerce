@extends('layouts.backendapp')
@section('title', "Inventory Edit")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Inventory Edit</li>
                </ol>
            </nav>
            <h1 class="m-0" style="font-size: 30px">Inventory Edit</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    
    <div class="col-lg-6">
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

                <form action="{{ route('dashboard.inventory.update', $inventory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title*:</label>
                        <input type="text" name="title" class="form-control" value="{{ $inventory->products->title }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input id="quantity" type="number" name="quantity" class="form-control" value="{{ old('quantity', $inventory->quantity) }}" required autocomplete="quantity">
                    </div>
    
                    <div class="form-group">
                        <label for="">Additional Price</label>
                        <input id="additional_price" type="number" name="additional_price" class="form-control" value="{{ old('additional_price', $inventory->additional_price) }}" autocomplete="additional_price">
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

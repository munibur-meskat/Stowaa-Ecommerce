@extends('layouts.backendapp')
@section('title', "Coupon Edit")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Edit Coupon</li>
                </ol>
            </nav>
            <h1 class="m-0">Edit Coupon</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-5">
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
                <form action="{{ route('dashboard.coupon.update', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $coupon->name }}">
                    </div>
                    <div class="form-group">
                        <label>Amount:</label>
                        <input type="number" name="amount" class="form-control" value="{{ $coupon->amount }}" >
                    </div>
                    <div class="form-group">
                        <label>Applicable Amount:</label>
                        <input type="number" name="applicable_amount" class="form-control" value="{{ $coupon->applicable_amount }}" >
                    </div>
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control" value="{{ $coupon->start_date }}" >
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control" value="{{ $coupon->end_date }}" >
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
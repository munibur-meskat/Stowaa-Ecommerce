@extends('layouts.backendapp')
@section('title', "Coupon")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Coupon</li>
                </ol>
            </nav>
            <h1 class="m-0">Coupon</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-9 col-sm-7 table-responsive">
        <div class="card">
            <div class="card-body">
                <table class="table">
                        <tr style="background-color:#a1490a; color:azure">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Applicable Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->applicable_amount }}</td>
                            <td>{{ $coupon->start_date->isoFormat('d-MMM-YYYY') }}</td>
                            <td>{{ $coupon->end_date->isoFormat('d-MMM-YYYY') }}</td>
                            <td>
                                <a href="#"><button type="button" class="btn btn-primary">edit</button></a>
                            </td>
                           </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
    {{-- {{ $categories->links() }} --}}
</div>

<div class="col-lg-3 col-sm-5">
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
            <form action="{{ route('dashboard.coupon.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Coupon Name">
                </div>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group">
                    <label>Applicable Amount:</label>
                    <input type="number" name="applicable_amount" class="form-control" placeholder="Applicable Amount">
                </div>
                <div class="form-group">
                    <label>Start Date:</label>
                    <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                </div>
                <div class="form-group">
                    <label>End Date:</label>
                    <input type="date" name="end_date" class="form-control" placeholder="End Date">
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
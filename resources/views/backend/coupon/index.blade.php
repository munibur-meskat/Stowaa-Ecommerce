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
                            <td>{{ $coupon->start_date->format('d-m-Y') }}</td>
                            <td>{{ $coupon->end_date->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('dashboard.coupon.edit', $coupon->id) }}"><button type="button" class="btn btn-primary" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">edit</button></a>

                                {{-- <a href="{{ route('dashboard.coupon.delete', $coupon->id) }}"><button type="button" class="btn btn-primary">delete</button></a> --}}

                                <form action="{{ route('dashboard.coupon.destroy', $coupon->id) }}" method="POST" class="d-inline">
                                
                                    @method('DELETE')
                                    @csrf
    
                                    <button type="submit" class="btn btn-danger delete_btn" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">delete</button>
                                </form>
                            </td>
                           </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
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
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            </div>
        </div>
       
    </div>
    
</div>
</section>

@endsection

@section('header-css')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" >
@endsection

@section('footer-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete_btn').on('click', function(){

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent('form').submit();
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })

        })
    })
    </script>
@endsection
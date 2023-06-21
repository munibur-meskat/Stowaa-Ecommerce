@extends('layouts.backendapp')
@section('title', "All Order")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">All Order</li>
                </ol>
            </nav>
            <h1 class="m-0">All Order</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-12 mb-3">
        <form action="{{ route('dashboard.order.index') }}" method="GET">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <input type="search" placeholder="Order id" name="order_id" class="form-control" value="{{ request()->order_id ?? '' }}">
                </div>
                <div class="col-xl-2 col-lg-3">
                    <select name="order_status" class="form-control">
                        <option selected disabled>Order Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <select name="payment_status" class="form-control">
                        <option selected disabled>Payment Status</option>
                        <option value="Paid">Paid</option>
                        <option value="Unpaid">Unpaid</option>
                    </select>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <input type="date" name="from_date" class="form-control">
                </div>
                <div class="col-xl-2 col-lg-3">
                    <input type="date" name="to_date" class="form-control">
                </div>
                <div class="col-xl-2 col-lg-3">
                    <input type="submit" class="form-control btn btn-success" value="Search">
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12 table-responsive">
        <div class="card">
          <div class="card-body">
            <table class="table">
                <tr style="background-color:#a1490a;color:azure">
                    <th>Id</th>
                    <th>Total</th>
                    <th width="200">Order Status</th>
                    <th>Payment Status</th>
                    <th>Created At</th>
                    <th >Action</th>
                </tr>

                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->payment_status }}</td>
                        {{-- <td>{{ $order->created_at->isoFormat('dddd, MMMM Do YYYY, h:mm') }}</td> --}}
                        <td>{{ $order->created_at->isoFormat('DD-MMM-YYYY') }}</td>
                        <td>
                            <a href="#"><button type="button" class="btn btn-primary m-1" style="font-size: 12px;border: none;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;margin: 4px 2px;cursor: pointer;">view</button></a>

                        </td>
                    </tr>
                @endforeach
            </table>
          </div>
        </div>

        <div class="pagination_wrap">
            {{ $orders->links('vendor.custom_pagination') }}
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

});

</script>

    <script>
        $('.delete_btn').on('click',function(){
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
                }
                })
        })
    </script>
@endsection

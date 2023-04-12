@extends('layouts.backendapp')
@section('title', "Shipping Condition")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Shipping Condition</li>
                </ol>
            </nav>
            <h1 class="m-0">Shipping Condition</h1>
        </div>
    </div>
</div>

<section class="container-fluid page__container">
<div class="row">
    <div class="col-lg-8 col-sm-7 table-responsive">
        <div class="card">
            <div class="card-body">
                <table class="table">
                        <tr style="background-color:#a1490a; color:azure">
                            <th>Id</th>
                            <th>Location</th>
                            <th>Shipping Amount</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        @foreach ($shipping_conditions as $shipping_condition)
                        <tr>
                            <td>{{ $shipping_condition->id }}</td>
                            <td>{{ $shipping_condition->location }}</td>
                            <td>{{ $shipping_condition->shipping_amount }}</td>
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

<div class="col-lg-4 col-sm-5">
    <div class="card">

       {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        <div class="card-body p-4">
            <form action="{{ route('dashboard.shipping.condition.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Location:</label>
                    <input type="text" name="location" class="form-control" placeholder="Location">
                    @error('location')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Shipping Amount:</label>
                    <input type="number" name="amount" class="form-control" placeholder="Shipping Amount">
                    @error('amount')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
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
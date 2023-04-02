@extends('layouts.backendapp')
@section('title', "Dashboard")

@section('content')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Home</a></li>
                    <li class="breadcrumb-item active"
                        aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Dashboard {{ auth()->user()->roles->pluck('name') }}</h1>
        </div>
        <div class="flatpickr-wrapper ml-3">
            <div id="recent_orders_date"
                 data-toggle="flatpickr"
                 data-flatpickr-wrap="true"
                 data-flatpickr-mode="range"
                 data-flatpickr-alt-format="d/m/Y"
                 data-flatpickr-date-format="d/m/Y">
                <a href="javascript:void(0)"
                   class="link-date"
                   data-toggle>13/03/2021 to 20/03/2022</a>
                <input class="flatpickr-hidden-input"
                       type="hidden"
                       value="13/03/2021 to 20/03/2022"
                       data-input>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">

    <div class="row card-group-row">
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="flex">
                        <div class="card-header__title mb-2">Total sales</div>
                        <div class="text-amount">&dollar;82,99</div>
                    </div>
                    <div class="ml-3 d-flex flex-column align-items-end text-right">
                        <a href=""
                           class="mb-2">View</a>
                        <div class="text-stats text-success">2.6% <i class="material-icons">arrow_upward</i></div>
                    </div>
                </div>
                <div class="card-body flex-0">
                    <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                        <span class="flex text-body">Online Store</span>
                        <span class="mx-3">&dollar;50.99</span>
                        <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">arrow_upward</i> 3.2%</span>
                    </small>
                    <small class="d-flex align-items-center font-weight-bold text-muted">
                        <span class="flex text-body">Facebook</span>
                        <span class="mx-3">&dollar;32.00</span>
                        <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">arrow_downward</i> 7.0%</span>
                    </small>
                </div>
                <div class="card-body text-muted flex d-flex align-items-center">
                    <div class="chart w-100"
                         style="height: 200px;">
                        <canvas id="totalSalesChart">
                            <span style="font-size: 1rem;"><strong>Total Sales</strong> chart goes here.</span>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="flex">
                        <div class="card-header__title mb-2">Total visitors</div>
                        <div class="text-amount">452</div>
                    </div>
                    <div class="ml-3 d-flex flex-column align-items-end text-right">
                        <a href=""
                           class="mb-2">View</a>
                        <div class="text-stats text-danger">9.6% <i class="material-icons">arrow_downward</i></div>
                    </div>
                </div>
                <div class="card-body text-muted flex d-flex align-items-center">
                    <div class="chart w-100"
                         style="height: 250px;">
                        <canvas id="totalVisitorsChart">
                            <span style="font-size: 1rem;"><strong>Total Visitors</strong> chart goes here.</span>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 card-group-row__col">
            <div class="card card-group-row__card">
                <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                    <div class="flex">
                        <div class="card-header__title mb-2">Repeat customer</div>
                        <div class="text-amount">5.43%</div>
                    </div>
                    <div class="ml-3 d-flex flex-column align-items-end text-right">
                        <a href=""
                           class="mb-2">View</a>
                        <div class="text-stats text-success">2.6% <i class="material-icons">arrow_upward</i></div>
                    </div>
                </div>
                <div class="card-body text-muted flex d-flex align-items-center">
                    <div class="chart w-100"
                         style="height: 250px;">
                        <canvas id="repeatCustomerRateChart">
                            <span style="font-size: 1rem;"><strong>Repeat Customer Rate</strong> chart goes here.</span>
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
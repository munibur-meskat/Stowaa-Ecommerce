{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Order</title>
    <style>
        body{margin-top:20px;
    background:#eee;
    }
    
    .invoice {
        padding: 30px;
    }
    
    .invoice h2 {
        margin-top: 0px;
        line-height: 0.8em;
    }
    
    .invoice .small {
        font-weight: 300;
    }
    
    .invoice hr {
        margin-top: 10px;
        border-color: #ddd;
    }
    
    .invoice .table tr.line {
        border-bottom: 1px solid #ccc;
    }
    
    .invoice .table td {
        border: none;
    }
    
    .invoice .identity {
        margin-top: 10px;
        font-size: 1.1em;
        font-weight: 300;
    }
    
    .invoice .identity strong {
        font-weight: 600;
    }
    
    .grid {
        position: relative;
        width: 100%;
        background: #fff;
        color: #666666;
        border-radius: 2px;
        margin-bottom: 25px;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
    }
    
    </style>
</head>

<body>

<section class="container">
    <div class="row">
                <!-- BEGIN INVOICE -->
            <div class="col-xs-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">
                            <div class="row">
                                <div class="col-xs-12">
                                    
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2>invoice<br>
                                    <span class="small">order #{{ $order_details->id }}</span></h2>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    Twitter, Inc.<br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    Elaine Hernandez<br>
                                    P. Sherman 42,<br>
                                    Wallaby Way, Sidney<br>
                                    <abbr title="Phone">P:</abbr> (123) 345-6789
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    Visa ending **** 1234<br>
                                    h.elaine@gmail.com<br>
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{ $order_details->created_at }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>ORDER SUMMARY</h3>
                                <table class="table table-striped">
                                    <thead> 
                                        <tr class="line">
                                            <td><strong>#</strong></td>
                                            <td class="text-center"><strong>Product</strong></td>
                                            <td class="text-center"><strong>Qty</strong></td>
                                            <td class="text-right"><strong>Unit Price</strong></td>
                                            <td class="text-right"><strong>Amount</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderInventories as $orderInventory)
                                        <tr class="line">
                                            <td>{{ $orderInventory->id }}</td>
                                            <td class="text-center">
                                             <strong>{{ $orderInventory->inventories->products->title }}</strong>
                                            </td>
                                            <td class="text-center">{{ $orderInventory->quantity }}</td>
                                            <td class="text-right">${{ $orderInventory->amount + $orderInventory->additional_amount ?? 0 }}</td>
                                            <td class="text-right">${{ ($orderInventory->amount + $orderInventory->additional_amount ?? 0) * $orderInventory->quantity }}
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right">
                                                <strong>Coupon ({{ $order_details->coupon_name ?? '' }})</strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>{{ $order_details->coupon_amount ?? 0 }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Shipping Charge</strong></td>
                                            <td class="text-right">
                                                <strong>{{ $order_details->shipping_charge ?? 0 }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Total</strong></td>
                                            <td class="text-right"><strong>${{ $order_details->total }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>									
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right identity">
                                <p>Designer identity<br><strong>Jeffrey Williams</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- END INVOICE -->
  </div>
</section>
</body>
</html> --}}


{{-- ========================= --}}


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('Billing Invoice - STOWAA') }} </title>
    {{-- <title> Billing Invoice - Webjourney </title> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet"> --}}
</head>
<body>
    <style>
        * {
            font-family: 'Roboto', sans-serif;
            line-height: 26px;
            font-size: 15px;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .custom_table {
            width: 100%;
            color: inherit;
            vertical-align: top;
            font-weight: 400;
            border-collapse: collapse;
            border-bottom: 2px solid #ddd;
            margin-top: 0;
        }

        .table-title {
            font-size: 24px;
            font-weight: 600;
            line-height: 32px;
            margin-bottom: 10px;
        }

        .custom_table thead {
            font-weight: 700;
            background: inherit;
            color: inherit;
            font-size: 16px;
            font-weight: 500;
        }

        .custom_table tbody {
            border-top: 0;
            overflow: hidden;
            border-radius: 10px;
        }

        .custom_table thead tr {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
        }

        .custom_table thead tr th {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
            font-size: 16px;
            padding: 10px 0;
        }

        .custom_table tbody tr {
            vertical-align: top;
        }

        .custom_table tbody tr td {
            font-size: 14px;
            line-height: 18px vertical-align: top;
        }

        .custom_table tbody tr td:last-child {
            padding-bottom: 10px;
        }

        .custom_table tbody tr td .data-span {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
        }

        .custom_table tbody .table_footer_row {
            border-top: 2px solid #ddd;
            margin-bottom: 10px !important;
            padding-bottom: 10px !important;

        }

        /* invoice area */

        .invoice-area {
            padding: 10px 0;
        }

        .invoice-wrapper {
            max-width: 650px;
            margin: 0 auto;
            box-shadow: 0 0 10px #f3f3f3;
            padding: 0px;
        }

        .invoice-header {
            margin-bottom: 40px;
        }

        .invoice-flex-contents {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .invoice-logo {}

        .invoice-logo img {}

        .invoice-header-contents {
            float: right;
        }

        .invoice-header-contents .invoice-title {
            font-size: 40px;
            font-weight: 700;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details-flex {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .invoice-details-title {
            font-size: 24px;
            font-weight: 700;
            line-height: 32px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice-single-details {}

        .details-list {
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 10px;
        }

        .details-list .list {
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list strong {
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list a {
            display: inline-block;
            color: #666;
            transition: all .3s;
            text-decoration: none;
            margin: 0;
            line-height: 18px
        }

        .item-description {
            margin-top: 10px;
        }

        .products-item {
            text-align: left;
        }

        .invoice-total-count {}

        .invoice-total-count .list-single {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 16px;
            line-height: 28px;
        }

        .invoice-total-count .list-single strong {}

        .invoice-subtotal {
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
        }

        .invoice-total {
            padding-top: 10px;
        }

        .terms-condition-content {
            margin-top: 30px;
        }

        .terms-flex-contents {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .terms-left-contents {
            flex-basis: 50%;
        }

        .terms-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .terms-para {
            margin-top: 10px;
        }

        .invoice-footer {}

        .invoice-flex-footer {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .single-footer-item {
            flex: 1;
        }

        .single-footer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .single-footer .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
            font-size: 16px;
            background-color: #000e8f;
            color: #fff;
        }

        .icon-details {
            flex: 1;
        }

        .icon-details .list {
            display: block;
            text-decoration: none;
            color: #666;
            transition: all .3s;
            line-height: 24px;
        }

        table{
            width: 100%;
        }

        p.text{
            float: right;
            font-size: 30px;
            font-weight: 600;
        }

    </style>

    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-wrapper">
            <div class="invoice-header">
                <div class="invoice-flex-contents">
                    <div class="invoice-logo">
                        {{-- <img src="https://www.logodesign.net/images/nature-logo.png" alt="" width="100px" height="100px"> --}}

                        {{-- <img src="https://www.logodesign.net/image/eye-and-house-5806ld" alt="" width="100px" height="100px"> --}}

                        <img src="https://www.logodesign.net/image/eye-and-house-5806ld" alt="No image" width="140px" height="130px">
                        
                    </div>
                    <div class="invoice-header-contents" style="float:right; margin-top:-120px;">
                        <h2 class="invoice-title">{{ __('INVOICE') }}</h2>
                    </div>
                </div>
            </div>
            <hr>

            <div class="invoice-details">
                <div class="invoice-details-flex ">
                    <div class="invoice-single-details">
                        <h4 class="invoice-details-title">{{ __('Invoice To:') }}</h4>
                        <ul class="details-list">
                            <li class="list"> <a href="#">{{ "Invoice No #" }} {{ $order_details->id }}</a> </li>
                            <li class="list"> <a href="#">{{ auth()->user()->name }}</a> </li>
                            <li class="list"> <a href="#"> {{ auth()->user()->user_info->phone }}</a> </li>
                        </ul>
                    </div>
                    <div class="invoice-single-details" style="float:right;margin-top:-120px;">
                        <h4 class="invoice-details-title">{{ __('Ship To:') }}</h4>
                        <ul class="details-list">
                            <li class="list"> <strong>{{ __('City') }}: </strong> {{ auth()->user()->user_info->city }} </li>
                            <li class="list"> <strong>{{ __('Area') }}: </strong> {{ auth()->user()->user_info->address }} </li>
                            <li class="list"> <strong>{{ __('Address') }}:
                                </strong>{{  auth()->user()->user_info->zip }} </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item-description">
                <h5 class="table-title">{{ __('Order Details') }}</h5>

                <table class="custom_table">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Unit Price') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orderInventories as $orderInventory)
                        @php
                            $total = $orderInventory->amount + $orderInventory->additional_price;
                        @endphp
                            <tr>
                                <td>{{ $orderInventory->inventories->products->title }}</td>
                                {{-- <td>${{ $total }}</td> --}}
                                <td>${{ $orderInventory->amount + $orderInventory->additional_amount ?? 0 }}</td>
                                <td>{{ $orderInventory->quantity }}</td>
                                <td>${{ ($orderInventory->amount + $orderInventory->additional_amount ?? 0) * $orderInventory->quantity }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="2"></td>
                            <td class="text-left">
                                <strong>Coupon ({{ $order_details->coupon_name ?? '' }})</strong>
                            </td>
                            <td class="text-left">
                                <strong>{{ $order_details->coupon_amount ?? 0 }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-left"><strong>{{ __('Shipping Charge') }}</strong></td>
                            <td class="text-left">
                                <strong>{{ $order_details->shipping_charge ?? 0 }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td class="text-left"><strong>{{ __('Total Price') }}</strong></td>
                            <td class="text-left"><strong>${{ $order_details->total }}</strong></td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="item-description">
                <div class="table-responsive">
                    <h5 class="table-title">{{ __('Orders Details') }}</h5>
                    <table class="custom_table">
                        <thead class="head-bg">
                            <tr>
                                <th>{{ __('Buyer Details') }}</th>
                                <th>{{ __('Date & Schedule') }}</th>
                                <th>{{ __('Amount Details') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="data-span"> {{ __('Name: ') }}</span>{{ auth()->user()->name }} <br>
                                    <span class="data-span"> {{ __('Email: ') }}</span> {{ auth()->user()->email }} <br>
                                    <span class="data-span"> {{ __('Phone: ') }}{{ auth()->user()->user_info->phone }} <br>
                                         </td>
                                      <td>
                                   </td>
                                <td>   

                              </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <footer>
                <h3 style="text-align: center">

                </h3>
            </footer>

        </div>
    </div>

    <!-- Invoice area end -->

</body>

</html>

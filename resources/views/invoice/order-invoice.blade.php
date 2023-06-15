<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>

        table.invoice_ship{
            width: 100%;
            padding-left: 30px;
            padding-right: 30px;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .invoice_head {
            width: 100%;
            padding-left: 30px;
            padding-right: 735px;
        }
        .invoice_head .text{
            color: rgba(231, 11, 121, 0.87);
            font-size: 27px;
            font-weight: 800;
            float: right;
        }
        td img{
            padding-left: 10px;
            float: left;
        }
        td.invoicee{
            font-size: 25px;
            padding-left: 25px;
            text-align: left;
        }
        .details-list{
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 10px;
        }
        .details-list .list {
            font-size: 16px;
            font-weight: 600;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        .details-list .list strong {
            font-size: 16px;
            font-weight: 600;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }

        td.ship{
            float: right;
        }
        .table-title{
            font-size: 25px;
            padding-left: 50px;
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

        /* .custom_table tbody tr td {
            font-size: 14px;
            line-height: 18px vertical-align: top;
        } */

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
        tr, td.order_text {
            /* text-align: center; */
            padding-top: 10px;
            padding-bottom: 25px;
        }
        .clr{
            clear:both;
        }
       tr{
        font-size: 20px;
        text-align: left;
       }
       tr.coupon{
        font-size: 20px;
       }
       tr.table_data {
        font-size: 18px;
        font-weight: 500;
        }
        
       tr.shipping{
        font-size: 20px;
       }

       tr.total{
        font-size: 20px;
       }

       /* table.order_cc {
        width: 100%;
        padding-left: 30px;
        padding-right: 30px;
        } */

       thead.order-t{
        border-bottom: 1px solid rgb(102, 102, 104);
       }
       thead{
        background-color: rgba(17, 119, 145, 0.815);
        color: #fff;
       }
        table.custom_table {
        width: 100%;
        padding-left: 30px;
        padding-right: 30px;
        padding-bottom: 100px;
        }
        footer.h3{
            display: inline-block;
            padding-top: 30px;
        }
        .invoice{
            display: inline-block;
        }
        .ship{
            float: right;
        }
        .invoice-header{
            height: 140px;
            width: 1890px;
        }
        .invoice-logo{
            height: 140px;
            width: 630px;
            float: left;
        }
        .invoice_title{
            float: left;
            height: 140px;
            width: 630px;
            text-align: center;
            color: rgb(211, 15, 123);
        }
        .gap{
            float: right;
            height: 140px;
            width: 630px;
        }
        .details{
            font-size: 16px;
            font-weight: 500;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }
        .details span.data-span{
            font-size: 16px;
            font-weight: 600;
            line-height: 18px;
            color: #666;
            margin: 0;
            padding: 0;
            transition: all .3s;
        }
        tbody,tr.footer{
            padding-top: 30px;
        }
        tbody,tr,td.details{
            padding-top: 20px;
        }
        /* tbody,tr,td.text-left{
            font-size: 20px;
        } */
        tbody,tr,td strong{
            font-size: 17px;
            font-weight: 500;
        }

    </style>
</head>
<body>
    <!-- Invoice area Starts -->
    <div class="invoice-header">
    <div class="invoice-logo">
        <img src=" https://www.logodesign.net/logo-new/leadership-figures-with-stars-sample-9985ld.png?nwm=1&nws=1&industry=All" alt="No photo" width="140px" height="130px">

        <img src="" alt="No photo" width="140px" height="130px">

       
        </div>
        <div class="invoice-header-contents invoice_title">
            <h2 class="invoice-title">INVOICE</h2>
        </div>
        
        <div class="gap"></div>
        <div class="clr"></div>
        
        </div>
        <hr>
        <div class="invoice-details">

        <div class="invoice-single-details invoice">

                <h4 class="invoice-details-title">{{ __('Invoice To:') }}</h4>
                <ul class="details-list">
                    <li class="list"><strong>{{ "Invoice No #" }}</strong>{{ $order_details->id }}
                    </li>
                    <li class="list"><strong>{{ auth()->user()->name }}</strong>
                    </li>
                    <li class="list"><strong>{{ auth()->user()->user_info->phone }}</strong>
                    </li>
                </ul>
        </div>
                                    <div class="invoice-single-details ship" >
                                        <h4 class="invoice-details-title">Ship To:</h4>
                                        <ul class="details-list">
                                            <li class="list"> <strong>{{ __('City') }}: </strong> {{ auth()->user()->user_info->city }}
                                            </li>
                                            <li class="list"> <strong>{{ __('Area') }}: </strong> {{ auth()->user()->user_info->address }}
                                            </li>
                                            <li class="list"> <strong>{{ __('Address') }}:
                                                </strong>{{  auth()->user()->user_info->zip }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="clr"></div>
                                    </div>

        <h5 class="table-title">{{ __('Order Details') }}</h5>

        <table class="custom_table">
            <thead class="ppp">
                <tr class="order-t">
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Unit Price') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Total') }}</th>
                </tr>
            </thead>

            <tbody class="curren">
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
                <tr class="coupon">
                    <td colspan="2"></td>
                    <td class="text-left">
                        <strong>Coupon ({{ $order_details->coupon_name ?? '' }})</strong>
                    </td>
                    <td class="text-left">
                        <strong> - {{ $order_details->coupon_amount ?? 0 }}</strong>
                    </td>
                </tr>
                <tr class="shipping">
                    <td colspan="2"></td>
                    <td class="text-left"><strong>{{ __('Shipping Charge') }}</strong></td>
                    <td class="text-left">
                        <strong> + {{ $order_details->shipping_charge ?? 0 }}</strong>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="2"></td>
                    <td class="text-left"><strong>{{ __('Total Price') }}<</strong></td>
                    <td class="text-left"><strong>${{ $order_details->total }}</strong></td>
                </tr>
            </tbody>
            
        </table>

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
                <tr class="footer">
                    <td class="details">
                        <span class="data-span">{{ __('Name: ') }}</span>{{ auth()->user()->name }}<br>
                        <span class="data-span">{{ __('Email: ') }}</span> {{ auth()->user()->email }}<br>
                        <span class="data-span">{{ __('Phone: ') }}{{ auth()->user()->user_info->phone }}<br>
                                </td>

                            <td class="details">
                            {{-- 11 June 2023 --}}
                        </td>
                    <td class="details">
                        {{-- $2000 --}}
                    </td>
                </tr>
            </tbody>
        </table>
        <footer>
            <h3 style="text-align: center">

            </h3>
        </footer>

<!-- Invoice area end -->
</body>
</html>
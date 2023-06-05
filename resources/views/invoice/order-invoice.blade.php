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

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
    @font-face {
    font-family: SourceSansPro;
  }
  
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #0087C3;
    text-decoration: none;
  }
  
  body {
    position: relative;
    width: 21cm;  
    height: 29.7cm; 
    margin: 0 auto; 
    color: #555555;
    background: #FFFFFF; 
    font-family: Arial, sans-serif; 
    font-size: 14px; 
    font-family: SourceSansPro;
  }
  
  header {
    padding: 15px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }
  
  #logo {
    float: left;
    margin-top: 8px;
  }
  
  #logo img {
    height: 55px;
    width: 150px;
  }
  
  #company {
    float: right;
    text-align: right;
  }
  
  
  #details {
    margin-bottom: 50px;
  }
  
  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }
  
  #client .to {
    color: #777777;
    font-size: 12px
  }
  
  h2.name {
    font-size: 10px;
    font-weight: normal;
    margin: 0;
  }
  
  #invoice {
    float: right;
    text-align: right;
  }
  
  #invoice h1 {
    color: #0087C3;
    font-size: 15px;
    line-height: 1em;
    font-weight: normal;
    margin: 0  0 10px 0;
  }
  
  #invoice .date {
    font-size: 10px;
    color: #777777;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }
  
  table th,
  table td {
    padding: 20px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }
  
  table th {
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table td {
    text-align: right;
  }
  
  table td h3{
    color: #57B223;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }
  
  table .no {
    color: #FFFFFF;
    font-size: 1.6em;
    background: #57B223;
  }
  
  table .desc {
    text-align: left;
  }
  
  table .unit {
    background: #DDDDDD;
  }
  
  table .total {
    background: #57B223;
    color: #FFFFFF;
  }
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 10px;
  }
  
  table tbody tr:last-child td {
    border: none;
  }
  
  table tfoot td {
    padding: 10px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 10px;
    white-space: nowrap; 
    border-top: 1px solid #AAAAAA; 
  }
  
  table tfoot tr:first-child td {
    border-top: none; 
  }
  
  table tfoot tr:last-child td {
    color: #57B223;
    font-size: 10px;
    border-top: 1px solid #57B223; 
  
  }
  
  table tfoot tr td:first-child {
    border: none;
  }
  
  #thanks{
    font-size: 15px;
    margin-bottom: 45px;
  }
  
  #notices{
    padding-left: 6px;
    border-left: 6px solid #0087C3;  
  }
  
  #notices .notice {
    font-size: 12px;
  }
  
  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }
    </style>

  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png" alt="invoice">
      </div>
      <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">John Doe</h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE 3-2-1</h1>
          <div class="date">Date of Invoice: 01/06/2014</div>
          <div class="date">Due Date: 30/06/2014</div>
        </div>
      </div>

      <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Product</th>
            <th class="qty">QUANTITY</th>
            <th class="unit">UNIT PRICE</th>
            <th class="total">Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="qty">30</td>
            <td class="unit">$40.00</td>
            <td class="total">$1,200.00</td>
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html> --}}

{{-- ======================== --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('Billing Invoice - Webjourney') }} </title>
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
/* 
           ==============
      [ Table ]
    =============  */

        .custom--table {
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

        .custom--table thead {
            font-weight: 700;
            background: inherit;
            color: inherit;
            font-size: 16px;
            font-weight: 500;
        }

        .custom--table tbody {
            border-top: 0;
            overflow: hidden;
            border-radius: 10px;
        }

        .custom--table thead tr {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
        }

        .custom--table thead tr th {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            text-align: left;
            font-size: 16px;
            padding: 10px 0;
        }

        .custom--table tbody tr {
            vertical-align: top;
        }

        .custom--table tbody tr td {
            font-size: 14px;
            line-height: 18px vertical-align: top;
        }

        .custom--table tbody tr td:last-child {
            padding-bottom: 10px;
        }

        .custom--table tbody tr td .data-span {
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
        }

        .custom--table tbody .table_footer_row {
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
            font-weight: 500;
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
    </style>

    <!-- Invoice area Starts -->
    <div class="invoice-area">
        <div class="invoice-wrapper">
            <div class="invoice-header">
                <div class="invoice-flex-contents">
                    <div class="invoice-logo">
                        <img src="https://www.logodesign.net/images/nature-logo.png" alt="" width="100px" height="100px">
                    </div>
                    <div class="invoice-header-contents" style="float:right;margin-top:-120px;">
                        <h2 class="invoice-title">{{ __('INVOICE') }}</h2>
                    </div>
                </div>
            </div>
            <div class="invoice-details">
                <div class="invoice-details-flex">
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
                <table class="custom--table">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Unit Price') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($inventory_orders as $inventory_order)
                        @php
                            $total = $inventory_order->amount + $inventory_order->additional_price;
                        @endphp
                            <tr>

                                <td>{{ $inventory_order->title }}</td>
                                <td>${{ $total }}</td>
                                <td>{{ $inventory_order->quantity }}</td>
                                <td>${{ $total * $inventory_order->quantity}}</td>
                            </tr>
                        @endforeach
                        <tr class="table_footer_row">
                            <td colspan="3"><strong>{{ __('Total Price') }}</strong></td>
                            <td><strong>${{ $order_details->total }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="item-description">
                <div class="table-responsive">
                    <h5 class="table-title">{{ __('Orders Details') }}</h5>
                    <table class="custom--table">
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

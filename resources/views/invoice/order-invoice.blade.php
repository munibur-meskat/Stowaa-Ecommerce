<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Order</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- <link rel="stylesheet" href="css/style.css"> -->
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
                                    <img src="http://vergo-kertas.herokuapp.com/assets/img/logo.png" alt="" height="35">
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

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
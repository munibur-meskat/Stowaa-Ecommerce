@extends('layouts.frontapp')

@section('title', 'Carts')

@section('content')
       <!-- breadcrumb_section - start
            ================================================== -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="{{ route('frontend.shop.allproduct') }}">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- cart_section - start
    ================================================== -->
    <section class="cart_section section_space">
        <div class="container">
            <div class="cart_update_wrap">
                <p class="mb-0"><i class="fal fa-check-square"></i> Shipping costs updated.</p>
            </div>

            <div class="cart_table">
                <table class="table">
                    <thead>
                        <tr style="background-color: #770bb9">
                            <th class="text-center" style="color: #fff; font-weight:900">Product</th>
                            <th class="text-center" style="width: 200px; color: #fff; font-weight:900">Color & Size</th>
                            <th class="text-center" style="color: #fff; font-weight:900; width:150px">Price</th>
                            <th class="text-center" style="color: #fff; font-weight:900">Quantity</th>
                            <th class="text-center" style="color: #fff; font-weight:900">Stock</th>
                            <th class="text-center" style="color: #fff; font-weight:900">Total</th>
                            <th class="text-center" style="color: #fff; font-weight:900">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                        <tr class="cart_parent">
                            <td>
                                <div class="cart_product">
                                    <img src="{{ asset('storage/products/' .$cart->inventories->products->image) }}" alt="image_not_found">
                                    <h3><a href="#">{{ $cart->inventories->products->title }}</a></h3>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $cart->inventories->colors->name }} -
                                {{ $cart->inventories->sizes->name }}
                            </td>
                            <td class="text-center">
                                <span>$</span>
                                <span class="price_text price">
                                @if ($cart->inventories->products->sale_price)
                                    {{ $cart->inventories->products->sale_price +  $cart->inventories->additional_price }}
                                @else
                                {{ $cart->inventories->products->price +  $cart->inventories->additional_price }}
                                @endif
                                
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="#">
                                    <div class="quantity_input">
                                        <input type="hidden" class="cart_id" value="{{ $cart->id }}">
                                        <input type="hidden" class="stock_quantity" value="{{ $cart->inventories->quantity }}">
                                        <input type="hidden" class="cart_total" value="{{ $cart->cart_total }}">
                                        <button type="button" class="input_number_decrement">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <input class="input_number" name="quantity" type="number" value="{{ $cart->quantity }}">
                                        <button type="button" class="input_number_increment">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <p class="mt-3">{{ $cart->inventories->quantity }}</p>
                            </td>
                            <td class="text-center" style="width: 130px">
                                <span>$</span>
                                <span class="price_text total_price">
                                    {{ $cart->cart_total }}
                                    {{-- {{ ($cart->inventories->products->sale_price +  $cart->inventories->additional_price) * $cart->quantity}} --}}
                                </span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('frontend.cart.destroy',$cart->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <div class="form-row">
                                        <button type="submit" class="remove_btn">
                                            <i class="fal fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart_btns_wrap">
                <div class="row">
                    <div class="col col-lg-6">
                        <form action="{{ route('frontend.cart.coupon.apply') }}" method="POST">
                            @csrf
                            <div class="coupon_form form_item mb-0">
                                <input type="text" name="coupon" placeholder="Coupon Code..." value="@if (Session::has('coupon')) {{ Session::get('coupon')['name'] }} @endif">
                                <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                <div class="info_icon">
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                </div>
                            </div>
                        </form>

                        {{-- @php
                            if(Session::has('coupon')){
                                print_r(Session::get('coupon'));
                            }
                        @endphp --}}

                    </div>

                    <div class="col col-lg-6">
                        <ul class="btns_group ul_li_right">
                            <li><a class="btn btn_dark" href="{{ route('frontend.cart.checkout.order') }}">Proceed To Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-lg-6">
                    <div class="calculate_shipping">
                        <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span>
                        </h3>
                        <form action="#">
                            <div class="select_option clearfix">
                                <select class="form-control niceSelect nice-select select_shipping">
                                    {{-- style="display: none;" --}}
                                    <option data-display="Select Your Currency">Select Your Option</option>
                                    
                                    @foreach ($shipping_conditions as $shipping_condition)
                                            <option value="{{ $shipping_condition->id }}">{{ $shipping_condition->location }}</option>
                                            @endforeach

                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="cart_total_table">
                        <h3 class="wrap_title">Cart Totals</h3>

                        {{-- @if (Session::has('shipping_charge'))
                        {{ Session::get('shipping_charge') }}
                        @endif --}}

                        <ul class="ul_li_block">
                            <li>
                                <span>Cart Subtotal</span>
                                <span>$<strong id="sub_total">{{ $carts->sum('cart_total') }}</strong>
                                </span>
                            </li>
                            <li>
                                <span>Shipping and Handling</span>
                                <span class="shipping_cost">Free Shipping</span>
                            </li>
                            @if (Session::has('coupon'))
                            <li>
                                <span>Coupon: ({{ Session::get('coupon')['name'] }})</span>
                                <span> - {{ Session::get('coupon')['amount'] }}</span>
                            </li>
                            @endif
                            <li>
                                <span>Order Total</span>
                                <span class="total_price">$
                                    <strong id="grand_total">
                                        @if (Session::has('coupon'))
                                        {{ $carts->sum('cart_total') - Session::get('coupon')['amount'] }}
                                    @else
                                        {{  $carts->sum('cart_total') }}
                                    @endif
                                    </strong>
                            </span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
            
             {{-- cart_section - end  --}}
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var sub_total = $('#sub_total');
        var grand_total = $('#grand_total');
            
    //Quantity increment
    $('.input_number_increment').on('click', function(){
            var price = $(this).parents('.cart_parent').find('.price');
            var total_price = $(this).parents('.cart_parent').find('.total_price');

            // console.log(total_price.html());
            var cart_id = $(this).parent('.quantity_input').children('.cart_id').val();
            var number = $(this).parent('.quantity_input').children('.input_number');
            var stock_quantity = $(this).parent('.quantity_input').children('.stock_quantity').val();
            var cart_total = $(this).parent('.quantity_input').children('.cart_total');

            //  console.log(typeof(parseInt(stock_quantity)));

            var inc = number.val();
            if (inc < parseInt(stock_quantity)) {
                inc++;
                number.val(inc);
                total_price.html(parseFloat(price.html() * inc).toFixed(2));
                cart_total.val(parseInt(price.html()) * inc);

                // console.log(parseInt(price.html()) * inc);
            }
            
            $.ajax({
           type:'POST',
           url:"{{ route('frontend.cart.update') }}",
           data:{
            quantity: inc,
            cart_id: cart_id,
            total: parseInt(price.html()) * inc,
            user_id: '{{ auth()->user()->id }}',
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){
            sub_total.html(parseFloat(data.cart_total).toFixed(2));
            grand_total.html(parseFloat(data.grand_total).toFixed(2));

            console.log(data);
           }
        });
    });

    //Quantity decrement
    $('.input_number_decrement').on('click', function(){
        var price = $(this).parents('.cart_parent').find('.price');
        var total_price = $(this).parents('.cart_parent').find('.total_price');
        var cart_id = $(this).parent('.quantity_input').children('.cart_id').val();
        var cart_total = $(this).parent('.quantity_input').children('.cart_total');
        var number = $(this).parent('.quantity_input').children('.input_number');

        var dnc = number.val();
        if (dnc > 1) {
            dnc--;
            number.val(dnc);
            total_price.html(parseFloat(price.html() * dnc).toFixed(2));
            cart_total.val(parseInt(price.html()) * dnc);
        }
        
        $.ajax({
           type:'POST',
           url:"{{ route('frontend.cart.update') }}",
           data:{
            quantity: dnc,
            cart_id: cart_id,
            total: parseInt(price.html()) * dnc,
            user_id: '{{ auth()->user()->id }}',
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){
            sub_total.html(parseFloat(data.cart_total).toFixed(2));
            grand_total.html(parseFloat(data.grand_total).toFixed(2));
            // console.log(data);
           }
        });
    });

    //Select shipping

    $('.select_shipping').on('change', function(){

        var shipping_id = $('.select_shipping').val();

        // console.log(shipping_id);
        
        // alert(shipping_id);

        $.ajax({
           type:'POST',
           url:"{{ route('frontend.cart.shipping.apply') }}",
           data:{
           shipping_id: shipping_id,
            user_id: '{{ auth()->user()->id }}',
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){

            console.log(data);

            // console.log(parseInt(data.shipping_amount));

            if(parseInt(data.shipping_amount) > 0 ){
                $('.shipping_cost').html("+" + parseInt(data.shipping_amount));
            } else{
                $('.shipping_cost').html('Free');
            }

            grand_total.html(data.grand_total);
            
           }

        });

    })
    
    });
</script>
@endsection
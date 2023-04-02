@extends('layouts.frontapp')
@section('title', "Product Details")

@section('content')
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="{{ route('frontend.home') }}">Home</a></li>
            <li>Product Details</li>
        </ul>
    </div>
</div>

<section class="product_details section_space pb-0">
<div class="container">
<div class="row">
<div class="col col-lg-6">
        <div class="product_details_image">
            <div class="details_image_carousel">
                @foreach ($product->product_galleries as $image)
                <div class="slider_item">
                    <img src="{{ asset('storage/products_gallery/' .$image->image) }}" alt="{{ $product->title }}">
                </div>
                @endforeach
            </div>

        <div class="details_image_carousel_nav">
            @foreach ($product->product_galleries as $image)
            <div class="slider_item">
                <img src="{{ asset('storage/products_gallery/' .$image->image) }}" alt="{{ $product->title }}">
            </div>
            @endforeach
        </div>
  </div>
</div>

<div class="col-lg-6">
    <div class="product_details_content">
        <h2 class="item_title">{{ $product->title }}</h2>
        <p>{{ $product->shot_description }}</p>
        
        {{-- <div class="item_review">
            <ul class="rating_star ul_li">
                <li><i class="fas fa-star"></i>&gt;</li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star-half-alt"></i></li>
            </ul>
            <span class="review_value">3 Rating(s)</span>
        </div> --}}

<div class="item_price">
    <strong class="dollar">
        $<span class="product_price" style="font-size: 20px;font-weight: 500;">{{$product->sale_price }}</span>
    </strong>
@if ($product->discount)
<del style="font-size: 20px; font-weight: 500;">${{ $product->price }}</del>
@endif
</div>

{{-- <div class="item_price">
    <strong class="dollar">
        $<span class="product_price">{{$product->sale_price ?? $product->price }}</span>
    </strong>
@if ($product->sale_price)
$<del>{{ $product->price }}</del>
@endif
</div> --}}

<hr>

{{-- @foreach ($product->inventories as $inv)
{{ $inv->colors->name }}
@endforeach --}}

{{-- {{ $product->inventories}} --}}

<form action="#" id="cart_page_form">
    <div class="item_attribute">
        <h3 class="title_text">Options <span class="underline"></span></h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
            <div class="row">
                <div class="col col-md-6">
                    <div class="select_option clearfix">
                        <h4 class="input_title">Color *</h4>
                        <select id="color_change" class="niceSelect">
                            <option data-display="- Please select -"  selected disabled>Choose A Option</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->colors->id }}">{{ $color->colors->name }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="select_option clearfix">
                        <h4 class="input_title">Size *</h4>
                        <select id="color_size" class="form-control">

                        </select>
                        <p class="display_additional_price mt-2" style="color:#e20d3f;font-size: 14px;font-weight:600;"></p>
                        </div>
                </div>
            </div>
            <span class="required_text">Stock Quantity: <span class="quantity_limit"></span></span>
        </div>
    </form>

        <form action="{{ route('frontend.cart.store') }}" method="POST">
            @csrf
        {{-- Quantity --}}
        {{-- add to cart  --}}
        <input type="hidden" name="inventory_id" id="inventory_id">
        <input type="hidden" name="total" id="total">

        <div class="quantity_wrap">
                <div class="quantity_input">
                    <button type="button"
                        class="input_number_decrement">
                        <i class="fal fa-minus"></i>
                    </button>
                    <input class="input_number" name="quantity" id="quantity">
                    {{-- min ="0" type="number" --}}
                    <button type="button"
                    class="input_number_increment">
                        <i class="fal fa-plus"></i>
                    </button>
                </div>

            {{-- <div class="total_price">Total: $<span class="display_total">{{$product->sale_price }}</span>
                <p class="additional_price"></p>
            </div> --}}

            <div class="total_price">Total: $<span class="display_total">{{$product->sale_price ?? $product->price }}</span>
                <p class="additional_price" style="color:#e20d3f;font-size: 14px; font-weight:600;"></p>
            </div>
        </div>
        
        <ul class="default_btns_group ul_li">
            <li><button type="submit" class="btn btn_primary addtocart_btn">Add To Cart</button></li>
            <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
            <li><a href="#!"><i class="fas fa-heart"></i></a></li>
        </ul>
</form>    
  <ul class="default_share_links ul_li">
        <li>
            <a class="facebook" href="#!">
                <span><i class="fab fa-facebook-square"></i> Like</span>
                <small>10K</small>
            </a>
        </li>
        <li>
            <a class="twitter" href="#!">
                <span><i class="fab fa-twitter-square"></i> Tweet</span>
                <small>15K</small>
            </a>
        </li>
        <li>
            <a class="google" href="#!">
                <span><i class="fab fa-google-plus-square"></i> Google+</span>
                <small>20K</small>
            </a>
        </li>
        <li>
            <a class="share" href="#!">
                <span><i class="fas fa-plus-square"></i> Share</span>
            </a>
        </li>
    </ul>

 </div>
</div>
</div>

<div class="details_information_tab">
    <ul class="tabs_nav nav ul_li" role="tablist">

        <li>
            <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
            Description
            </button>
        </li>
        <li>
            <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
            Additional information
            </button>
        </li>
       
        <li>
            <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
            Reviews(2)
            </button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
           {!! $product->description !!}
        </div>

        <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
           {!! $product->addtional_info !!}
        </div>

        <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
            <div class="average_area">
                <h4 class="reviews_tab_title">Average Ratings</h4>
                <div class="row align-items-center">
                    <div class="col-md-5 order-last">
                        <div class="average_rating_text">
                            <ul class="rating_star ul_li_center">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <p class="mb-0">
                            Average Star Rating: <span>4.3 out of 5</span> (2 vote)
                            </p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="product_ratings_progressbar">
                            <ul class="five_star ul_li">
                                <li><span>5 Star</span></li>
                                <li><div class="progress_bar"></div></li>
                                <li>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </li>
                            </ul>
                            <ul class="four_star ul_li">
                                <li><span>4 Star</span></li>
                                <li><div class="progress_bar"></div></li>
                                <li>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </li>
                            </ul>
                            <ul class="three_star ul_li">
                                <li><span>3 Star</span></li>
                                <li><div class="progress_bar"></div></li>
                                <li>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </li>
                            </ul>
                            <ul class="two_star ul_li">
                                <li><span>2 Star</span></li>
                                <li><div class="progress_bar"></div></li>
                                <li>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </li>
                            </ul>
                            <ul class="one_star ul_li">
                                <li><span>1 Star</span></li>
                                <li><div class="progress_bar"></div></li>
                                <li>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="customer_reviews">
                <h4 class="reviews_tab_title">2 reviews for this product</h4>
                <div class="customer_review_item clearfix">
                    <div class="customer_image">
                        <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                    </div>
                    <div class="customer_content">
                        <div class="customer_info">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <h4 class="customer_name">Aonathor troet</h4>
                            <span class="comment_date">JUNE 2, 2021</span>
                        </div>
                        <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                    </div>
                </div>

                <div class="customer_review_item clearfix">
                    <div class="customer_image">
                        <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                    </div>
                    <div class="customer_content">
                        <div class="customer_info">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <h4 class="customer_name">Danial obrain</h4>
                            <span class="comment_date">JUNE 2, 2021</span>
                        </div>
                        <p class="mb-0">
                        Great product quality, Great Design and Great Service.
                        </p>
                    </div>
                </div>
            </div>

            <div class="customer_review_form">
                <h4 class="reviews_tab_title">Add a review</h4>
                <p>
                Your email address will not be published. Required fields are marked *
                </p>
                <form action="#">
                    <div class="form_item">
                        <input type="text" name="name" placeholder="Your name*">
                    </div>
                    <div class="form_item">
                        <input type="email" name="email" placeholder="Your Email*">
                    </div>
                    <div class="checkbox_item">
                        <input id="save_checkbox" type="checkbox">
                        <label for="save_checkbox">Save my name, email, and website in this browser for the next time I comment.</label>
                    </div>
                    <div class="your_ratings">
                        <h5>Your Ratings:</h5>
                        <button type="button"><i class="fal fa-star"></i></button>
                        <button type="button"><i class="fal fa-star"></i></button>
                        <button type="button"><i class="fal fa-star"></i></button>
                        <button type="button"><i class="fal fa-star"></i></button>
                        <button type="button"><i class="fal fa-star"></i></button>
                    </div>
                    <div class="form_item">
                        <textarea name="comment" placeholder="Your Review*"></textarea>
                    </div>
                    <button type="submit" class="btn btn_primary">Submit Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>

<section class="related_products_section section_space">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="best-selling-products related-product-area">
                <div class="sec-title-link">
                    <h3>Related products</h3>
                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                </div>
                <div class="product-area clearfix">
                    <div class="grid">
                        <div class="product-pic">
                            <img src="assets/images/shop/product_img_12.png" alt="">
                            <div class="actions">
                                <ul>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"></path> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"></path> <path d="M19 4L22 7L19 10"></path> <path d="M19 13L22 16L19 19"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"></path> <circle cx="12" cy="12" r="3"></circle> </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Macbook Pro</a></h4>
                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="assets/images/shop/product-img-21.png" alt="">
                            <span class="theme-badge">Sale</span>
                            <div class="actions">
                                <ul>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"></path> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"></path> <path d="M19 4L22 7L19 10"></path> <path d="M19 13L22 16L19 19"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"></path> <circle cx="12" cy="12" r="3"></circle> </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Apple Watch</a></h4>
                            <p><a href="#">Apple Watch Series 7 case Pair any band </a></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="assets/images/shop/product-img-22.png" alt="">
                            <span class="theme-badge-2">12% off</span>
                            <div class="actions">
                                <ul>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"></path> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"></path> <path d="M19 4L22 7L19 10"></path> <path d="M19 13L22 16L19 19"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"></path> <circle cx="12" cy="12" r="3"></circle> </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">Mac Mini</a></h4>
                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                                <del aria-hidden="true">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                        </bdi>
                                    </span>
                                </del>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="product-pic">
                            <img src="assets/images/shop/product-img-23.png" alt="">
                            <span class="theme-badge">Sale</span>
                            <div class="actions">
                                <ul>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"></path> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"></path> <path d="M19 4L22 7L19 10"></path> <path d="M19 13L22 16L19 19"></path> </svg></a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"></path> <circle cx="12" cy="12" r="3"></circle> </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">iPad mini</a></h4>
                            <p><a href="#">The ultimate iPad experience all over the world </a></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {

        var product_price = $('.product_price'),
            color_change = $('#color_change'),
            color_size = $('#color_size'),
            display_total = $('.display_total'),
            quantity_limit = $('.quantity_limit'),
            display_additional_price = $('.display_additional_price'),
            additional_price = $('.additional_price'),
            stock_quantity = null;

         var input_number = $('.input_number').val(1),
         quantity = input_number.val();

        // color change via size change start
        color_change.on('change', function(e){ 
       e.preventDefault();

    //    color_size.removeAttr('disabled');

       var color_id = color_change.val();
       var product_id = {{ $product->id }}

    //    alert(product_id)

       $.ajax({
           type:'POST',
           url:"{{ route('frontend.shop.single.size') }}",
           data:{
            product_id: product_id,
            color_id: color_id,
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){
            color_size.html(data);

            // console.log(data);
           }
        });
        // product_price.html('');
        display_additional_price.html('');
        quantity_limit.html('');
        input_number.val(1);
        // display_total.html('');
    });
    // color change via size change end

    // size change via additional_price change start
    color_size.on('change', function(e){
       e.preventDefault();

       var color_id = color_change.val();
       var size_id = color_size.val();
       var product_id = {{ $product->id }}

    //    alert(product_id);

       $.ajax({
           type:'POST',
           url:"{{ route('frontend.shop.single.options') }}",
           data:{
            product_id: product_id,
            color_id: color_id,
            size_id: size_id,
            _token: '{{ csrf_token() }}'
           },
           dataType: 'JSON',
           success:function(data){

            product_price.html(parseFloat(data.price).toFixed(2));
            display_total.html(parseFloat(data.price).toFixed(2));
            quantity_limit.html(data.quantity);
            $('#inventory_id').val(data.inventory_id);
            $('#total').val(parseFloat(data.price).toFixed(2));

            // $('#total').val(data.price);

            console.log(data);

            if (data.additional_price) {
                display_additional_price.html('Additional Price: $' + data.additional_price);
                additional_price.html('Additional: $' + data.additional_price);

                // console.log(display_additional_price);
                
            }
            else{
                display_additional_price.html('');
                additional_price.html('');
            }

            if (data.quantity) {
                stock_quantity = data.quantity;
                quantity_limit.html(data.quantity);
            }else{
                quantity_limit.html('');
            }

           } 
        });
        input_number.val(1);
        display_total.html('{{$product->sale_price }}');
    });

    //Quantity increment
    $('.input_number_increment').on('click', function(){
        if (quantity <  parseInt(stock_quantity)) {
            quantity++;
            input_number.val(quantity);
            display_total.html(parseFloat(product_price.html() * quantity).toFixed(2));
            $('#total').val(parseFloat(product_price.html() * quantity).toFixed(2));
            // $('#total').val(product_price.html() * quantity);

            // console.log(product_price); 
        }

    //   console.log(typeof quantity);
    //   gettype($variable);
      
    });

    //Quantity decrement
    $('.input_number_decrement').on('click', function(){
       
        // if (product_quantity.val() <= 0) {
        //     console.log(quantity, product_quantity.val());
        //     return;
        // }

        if (quantity > 1) {
            quantity--;
            input_number.val(quantity);
            display_total.html(parseFloat(product_price.html() * quantity).toFixed(2));
            $('#total').val(parseFloat(product_price.html() * quantity).toFixed(2));
            // $('#total').val(product_price.html() * quantity);
        }
    });


    });
</script>
@endsection
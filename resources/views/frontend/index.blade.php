@extends('frontend.layouts.master')

@section('content')

    @if(count($banners)>0)
    <!-- Welcome Slides Area -->
            <section class="welcome_area">
                <div class="welcome_slides owl-carousel">
                    <!-- Single Slide -->

                @foreach ($banners as $banner)
                    <div class="single_slide bg-img" style="background-image: url({{asset($banner->photo)}});">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="welcome_slide_text">
                                        <p data-animation="fadeInUp" data-delay="0">{{$banner->slug}}</p>
                                        <h2 data-animation="fadeInUp" data-delay="300ms">{{$banner->title}}</h2>
                                        <h6 data-animation="fadeInUp" data-delay="600ms">{!! html_entity_decode($banner->description) !!}</h6>
                                        <a href="{{$banner->slug}}" class="btn btn-primary" data-id="{{$banner->id}}" data-animation="fadeInUp" data-delay="1s">Shop Now</a>
                                    </div>
                                </div>
                                <div class="col-5 col-md-4">
                                    <div class="welcome_slide_image">
                                        <img src="{{asset('frontend/assets/img/bg-img/slide-1.png')}}" alt="" data-animation="bounceInUp" data-delay="500ms">
                                        <div class="discount_badge" data-animation="bounceInDown" data-delay="1.2s">
                                            <span>30%<br>OFF</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </section>
    <!-- Welcome Slides Area -->
    @endif

    @if(count($categories)>0)
    <!-- Top Catagory Area -->
    <div class="clearfix top_catagory_area mt-50">
        <div class="container">
            <div class="row">
                <!-- Single Catagory -->
                @foreach ($categories as $cat)
                    <div class="col-12 col-md-4">
                        <div class="single_catagory mt-50">
                            <a href="{{route('product.category',$cat->slug)}}">
                                <img src="{{asset($cat->photo)}}" alt="{{$cat->title}}">
                                <div class="single_cata_desc align-items-center justify-content-center" style="margin-top: 66px;margin-left: 50px;">
                                    <div class="single_cata_desc_text" style="margin-right: 100px;">
                                        <h5>{{ucfirst($cat->title)}}</h5>
                                        <a href="{{route('product.category',$cat->slug)}}">Shop Now
                                            <i class="icofont-rounded-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Top Catagory Area -->
    @endif




    <!-- New Arrivals Area -->

    @if (count($new_products)>0)

    <section class="clearfix new_arrivals_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>New Arrivals</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="new_arrivals_slides owl-carousel">
                        <!-- Single Product -->
                        @foreach ($new_products as $product)
                            {{-- <div class="single-product-area">
                                <div class="product_image">
                                    <!-- Product Image -->
                                    @php
                                        $photo=explode(',',$nproduct->photo)
                                    @endphp
                                    <img class="normal_img" src="{{$photo[0]}}" alt="{{$nproduct->title}}">

                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span>{{$nproduct->conditions}}</span>
                                    </div>

                                    <!-- Wishlist -->
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$nproduct->id}}" id="add_to_wishlist_{{$nproduct->id}}"><i class="icofont-heart"></i></a>
                                    </div>

                                    <!-- Compare -->
                                    <div class="product_compare">
                                        <a href="compare.html"><i class="icofont-exchange"></i></a>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="product_description">
                                    <!-- Add to cart -->
                                    <div class="product_add_to_cart">
                                        <a href="#" data-quantity="1" data-product-id="{{$nproduct->id}}" class="add_to_cart" id="add_to_cart{{$nproduct->id}}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                    </div>

                                    <!-- Quick View -->
                                    <div class="product_quick_view">
                                        <a href="#" data-toggle="modal" data-target="#quickview{{$nproduct->id}}"><i class="icofont-eye-alt"></i> Quick View</a>
                                    </div>

                                    <p class="brand_name">{{App\Models\Brand::where('id',$nproduct->brand_id)->value('title')}}</p>
                                    <a href="{{route('product.detail', $nproduct->slug)}}">{{ucfirst($nproduct->title)}}</a>
                                    @if ($nproduct->discount>0)
                                        <h6 class="product-price">{{Helper::currency_converter($nproduct->offer_price)}} <small><del class="text-danger">{{Helper::currency_converter($nproduct->price)}} </del></small></h6>
                                    @else
                                        <h6 class="product-price">{{Helper::currency_converter($nproduct->price)}}</h6>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <!-- Quick View Modal Area -->
                                @include('frontend.pages._modal')
                                <!-- Quick View Modal Area -->
                                </div>
                            </div> --}}
                            @include('frontend.layouts._single-product',['product'=>$product])
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif
    <!-- New Arrivals Area -->

    <!-- Featured Products Area -->
    <section class="featured_product_area">
        <div class="container">
            <div class="row">
                <!-- Featured Offer Area -->
                <div class="col-12 col-lg-6">
                    <div class="featured_offer_area d-flex align-items-center" style="background-image: url({{asset($promo_banner->photo)}});">
                        <div class="featured_offer_text">
                            <p>{{ucfirst($promo_banner->slug)}}</p>
                            <h2>{!! nl2br($promo_banner->description) !!}</h2>
                            <h4>{{$promo_banner->title}}</h4>
                            <a href="{{$promo_banner->slug}}" class="mt-3 btn btn-primary btn-sm">Shop Now</a>
                        </div>
                    </div>
                </div>

                <!-- Featured Product Area -->
                <div class="col-12 col-lg-6">
                    <div class="section_heading featured">
                        <h5>Featured Products</h5>
                    </div>

                    <!-- Featured Product Slides -->
                    <div class="featured_product_slides owl-carousel">
                        <!-- Single Product -->
                        @foreach ($featured_products as $f_product)
                            @include('frontend.layouts._single-product',['product'=>$f_product])
                            {{-- <div class="single-product-area">
                                <div class="product_image">
                                    <!-- Product Image -->
                                    <img class="normal_img" src="{{asset('frontend/assets/img/product-img/new-2.png')}}" alt="">
                                    <img class="hover_img" src="{{asset('frontend/assets/img/product-img/new-2-back.png')}}" alt="">

                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span>Sale</span>
                                    </div>

                                    <!-- Wishlist -->
                                    <div class="product_wishlist">
                                        <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                    </div>

                                    <!-- Compare -->
                                    <div class="product_compare">
                                        <a href="compare.html"><i class="icofont-exchange"></i></a>
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="product_description">
                                    <!-- Add to cart -->
                                    <div class="product_add_to_cart">
                                        <a href="#" data-quantity="1" data-product-id="{{$nproduct->id}}" class="add_to_cart" id="add_to_cart{{$nproduct->id}}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                    </div>

                                    <!-- Quick View -->
                                    <div class="product_quick_view">
                                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                                    </div>

                                    <a href="#">Flower Textured Dress</a>
                                    <h6 class="product-price">$17 <span>$26</span></h6>
                                    <div class="product_rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Area -->

    <!-- Best Rated/Onsale/Top Sale Product Area -->
    <section class="best_rated_onsale_top_sellares section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs_area">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-tab">
                            <li class="nav-item">
                                <a href="#top-sellers" class="nav-link" data-toggle="tab" role="tab">Top Sellers</a>
                            </li>
                            <li class="nav-item">
                                <a href="#best-rated" class="nav-link active" data-toggle="tab" role="tab">Best Rated</a>
                            </li>
                            <li class="nav-item">
                                <a href="#on-sale" class="nav-link" data-toggle="tab" role="tab">On Sale</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                                <div class="top_sellers_area">
                                    <div class="row">
                                        @foreach ($best_sellings as $product)
                                            <div class="col-12 col-sm-6 col-lg-4">
                                                <div class="single_top_sellers">
                                                    <div class="top_seller_image">
                                                        @php
                                                            $photo=explode(',',$product->photo)
                                                        @endphp
                                                        <a href="{{route('product.detail', $product->slug)}}"><img src="{{asset($photo[0])}}" alt="Top-Sellers"></a>
                                                    </div>
                                                    <div class="top_seller_desc">
                                                        <h5><a href="{{route('product.detail', $product->slug)}}">{{ucfirst($product->title)}}</a></h5>
                                                        <h6>{{Helper::currency_converter($product->offer_price)}} <span>{{Helper::currency_converter($product->price)}}</span></h6>
                                                        <div class="top_seller_product_rating">
                                                            @for ($i=0;  $i<5;  $i++)
                                                                @if (round($product->reviews->avg('rate'))>$i)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @endif
                                                            @endfor
                                                        </div>

                                                        <!-- Info -->
                                                        <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                            <!-- Add to cart -->
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="javascript:void(0);" data-quantity="1" data-price="{{$product->offer_price}}" data-product-id="{{$product->id}}" class="add_to_cart" id="add_to_cart{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                            </div>

                                                            <!-- Wishlist -->
                                                            <div class="ts_product_wishlist">
                                                                <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                            </div>

                                                            <!-- Compare -->
                                                            <div class="ts_product_compare">
                                                                <a href="javascript:void(0);" class="add_to_compare" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                            </div>

                                                            <!-- Quick View -->
                                                            <div class="ts_product_quick_view">
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quickview{{$product->id}}"><i class="icofont-eye-alt"></i></a>
                                                            </div>
                                                            <!-- Quick View Modal Area detail product-->
                                                            <div class="modal fade" id="quickview{{$product->id}}" tabindex="-3" role="dialog" aria-labelledby="quickview" aria-hidden="true" backdrop="false" data-backdrop="false" style="background: rgba(0,0,0,.5);z-index:1050;">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <div class="modal-body">
                                                                            <div class="quickview_body">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-lg-5">
                                                                                            <div class="quickview_pro_img">
                                                                                                @php
                                                                                                    $photo=explode(',',$product->photo)
                                                                                                @endphp
                                                                                                <img class="first_img" src="{{asset($photo[0])}}" alt="{{$product->title}}">
                                                                                                <!-- Product Badge -->
                                                                                                <div class="product_badge">
                                                                                                    <span class="badge-new">{{$product->conditions}}</span>
                                                                                                    @if ($product->discount>0)
                                                                                                        <span class="mt-2 badge-new">{{$product->discount}} %</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-7">
                                                                                            <div class="quickview_pro_des">
                                                                                                <h4 class="title">{{ucfirst($product->title)}}</h4>
                                                                                                <div class="top_seller_product_rating mb-15">
                                                                                                    @for ($i=0;  $i<5;  $i++)
                                                                                                        @if (round($product->reviews->avg('rate'))>$i)
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        @else
                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                        @endif
                                                                                                    @endfor
                                                                                                </div>
                                                                                                @if ($product->discount>0)
                                                                                                    <h5 class="price">{{Helper::currency_converter($product->offer_price)}} <span>{{Helper::currency_converter($product->price)}}</span></h5>
                                                                                                @else
                                                                                                    <h5 class="price">{{Helper::currency_converter($product->offer_price)}}</h5>
                                                                                                @endif
                                                                                                <p>{!! html_entity_decode($product->summary) !!}</p>
                                                                                                <a href="{{route('product.detail',$product->slug)}}">View Full Product Details</a>
                                                                                            </div>
                                                                                            <!-- Add to Cart Form -->
                                                                                            <form class="cart">
                                                                                                <div class="quantity">
                                                                                                    <input type="number" data-id="{{$product->id}}" class="qty-text" id="qty" step="1" min="1" max="10"
                                                                                                        name="quantity" value="1">
                                                                                                </div>
                                                                                                <button type="button" name="addtocart" data-product_id="{{$product->id}}" data-quantity="1" data-price="{{$product->offer_price}}" id="add_to_cart_button_details_{{$product->id}}" value="5"
                                                                                                    class="mt-1 ml-1 add_to_cart_button_details btn btn-primary mt-md-0 ml-md-3">Add to cart
                                                                                                </button>
                                                                                                <!-- Wishlist -->
                                                                                                <div class="modal_pro_wishlist">
                                                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}"
                                                                                                        id="add_to_wishlist_{{$product->id}}"><i class="icofont-heart"></i></a>
                                                                                                </div>
                                                                                                <!-- Compare -->
                                                                                                <div class="modal_pro_compare">
                                                                                                    <a href="javascript:void(0);" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}"><i class="icofont-exchange"></i></a>
                                                                                                </div>
                                                                                            </form>
                                                                                            <!-- Share -->
                                                                                            <div class="share_wf mt-30">
                                                                                                <p>Share with friends</p>
                                                                                                <div class="_icon">
                                                                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Quick View Modal Area -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade show active" id="best-rated">
                                <div class="best_rated_area">
                                    <div class="row">
                                        @foreach($best_rated as $product)
                                            <div class="col-12 col-sm-6 col-lg-4">
                                                <div class="single_top_sellers">
                                                    <div class="top_seller_image">
                                                        @php
                                                            $photo=explode(',',$product->photo)
                                                        @endphp
                                                        <a href="{{route('product.detail', $product->slug)}}"><img src="{{asset($photo[0])}}" alt="Top-Rated"></a>
                                                    </div>
                                                    <div class="top_seller_desc">

                                                        <h5><a href="{{route('product.detail', $product->slug)}}">{{ucfirst($product->title)}}</a></h5>
                                                        <h6>{{Helper::currency_converter($product->offer_price)}} <span>{{Helper::currency_converter($product->price)}}</span></h6>
                                                        <div class="top_seller_product_rating">
                                                            @for ($i=0;  $i<5;  $i++)
                                                                @if (round($product->reviews->avg('rate'))>$i)
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                @else
                                                                    <i class="far fa-star" aria-hidden="true"></i>
                                                                @endif
                                                            @endfor
                                                        </div>

                                                        <!-- Info -->
                                                        <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                            <!-- Add to cart -->
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="javascript:void(0);" data-quantity="1" data-price="{{$product->offer_price}}" data-product-id="{{$product->id}}" class="add_to_cart" id="add_to_cart{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                            </div>

                                                            <!-- Wishlist -->
                                                            <div class="ts_product_wishlist">
                                                                <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                            </div>

                                                            <!-- Compare -->
                                                            <div class="ts_product_compare">
                                                                <a href="javascript:void(0);" class="add_to_compare" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                            </div>

                                                            <!-- Quick View -->
                                                            <div class="ts_product_quick_view">
                                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quickview2{{$product->id}}"><i class="icofont-eye-alt"></i></a>
                                                            </div>
                                                            <!-- Quick View Modal Area detail product-->
                                                            <div class="modal fade" id="quickview2{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true" backdrop="false" data-backdrop="false" style="background: rgba(0,0,0,.5);z-index:1050;">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <div class="modal-body">
                                                                            <div class="quickview_body">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-lg-5">
                                                                                            <div class="quickview_pro_img">
                                                                                                @php
                                                                                                    $photo=explode(',',$product->photo)
                                                                                                @endphp
                                                                                                <img class="first_img" src="{{asset($photo[0])}}" alt="{{$product->title}}">
                                                                                                <!-- Product Badge -->
                                                                                                <div class="product_badge">
                                                                                                    <span class="badge-new">{{$product->conditions}}</span>
                                                                                                    @if ($product->discount>0)
                                                                                                        <span class="mt-2 badge-new">{{$product->discount}} %</span>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-7">
                                                                                            <div class="quickview_pro_des">
                                                                                                <h4 class="title">{{ucfirst($product->title)}}</h4>
                                                                                                <div class="top_seller_product_rating mb-15">
                                                                                                    @for ($i=0;  $i<5;  $i++)
                                                                                                        @if (round($product->reviews->avg('rate'))>$i)
                                                                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                                                                        @else
                                                                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                                                                        @endif
                                                                                                    @endfor
                                                                                                </div>
                                                                                                @if ($product->discount>0)
                                                                                                    <h5 class="price">{{Helper::currency_converter($product->offer_price)}} <span>{{Helper::currency_converter($product->price)}}</span></h5>
                                                                                                @else
                                                                                                    <h5 class="price">{{Helper::currency_converter($product->offer_price)}}</h5>
                                                                                                @endif
                                                                                                <p>{!! html_entity_decode($product->summary) !!}</p>
                                                                                                <a href="{{route('product.detail',$product->slug)}}">View Full Product Details</a>
                                                                                            </div>
                                                                                            <!-- Add to Cart Form -->
                                                                                            <form class="cart">
                                                                                                <div class="quantity">
                                                                                                    <input type="number" data-id="{{$product->id}}" class="qty-text" id="qty" step="1" min="1" max="10"
                                                                                                        name="quantity" value="1">
                                                                                                </div>
                                                                                                <button type="button" name="addtocart" data-product_id="{{$product->id}}" data-quantity="1" data-price="{{$product->offer_price}}" id="add_to_cart_button_details_{{$product->id}}" value="5"
                                                                                                    class="mt-1 ml-1 add_to_cart_button_details btn btn-primary mt-md-0 ml-md-3">Add to cart
                                                                                                </button>
                                                                                                <!-- Wishlist -->
                                                                                                <div class="modal_pro_wishlist">
                                                                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}"
                                                                                                        id="add_to_wishlist_{{$product->id}}"><i class="icofont-heart"></i></a>
                                                                                                </div>
                                                                                                <!-- Compare -->
                                                                                                <div class="modal_pro_compare">
                                                                                                    <a href="javascript:void(0);" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}"><i class="icofont-exchange"></i></a>
                                                                                                </div>
                                                                                            </form>
                                                                                            <!-- Share -->
                                                                                            <div class="share_wf mt-30">
                                                                                                <p>Share with friends</p>
                                                                                                <div class="_icon">
                                                                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                                                                    <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Quick View Modal Area -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="on-sale">
                                <div class="on_sale_area">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">

                                                    <img src="" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Speaker</h5>
                                                    <h6>$60 <span>$70</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{asset('frontend/assets/img/product-img/onsale-2.png')}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Fancy Lamp</h5>
                                                    <h6>$34 <span>$40</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{asset('frontend/assets/img/product-img/onsale-3.png')}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Sport Bra</h5>
                                                    <h6>$63 <span>$70</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{asset('frontend/assets/img/product-img/onsale-4.png')}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>S'well Water</h5>
                                                    <h6>$12 <span>$13</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{asset('frontend/assets/img/product-img/onsale-5.png')}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>Slipper</h5>
                                                    <h6>$24 <span>$36</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single_top_sellers">
                                                <div class="top_seller_image">
                                                    <img src="{{asset('frontend/assets/img/product-img/onsale-6.png')}}" alt="Top-Sellers">
                                                </div>
                                                <div class="top_seller_desc">
                                                    <h5>T-shirt</h5>
                                                    <h6>$96 <span>$120</span></h6>
                                                    <div class="top_seller_product_rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- Info -->
                                                    <div class="mt-3 ts-seller-info d-flex align-items-center justify-content-between">
                                                        <!-- Add to cart -->
                                                        <div class="ts_product_add_to_cart">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                        </div>

                                                        <!-- Wishlist -->
                                                        <div class="ts_product_wishlist">
                                                            <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                        </div>

                                                        <!-- Compare -->
                                                        <div class="ts_product_compare">
                                                            <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                        </div>

                                                        <!-- Quick View -->
                                                        <div class="ts_product_quick_view">
                                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Rated/Onsale/Top Sale Product Area -->

    <!-- Offer Area -->
    <section class="offer_area">
        <div class="container">
            <div class="row">
                <!-- Beach Offer -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="mb-4 beach_offer_area mb-md-0">
                        <img src="{{asset('frontend/assets/img/product-img/beach.png')}}" alt="beach-offer">
                        <div class="beach_offer_info">
                            <p>Upto 70% OFF</p>
                            <h3>Beach Item</h3>
                            <a href="#" class="btn btn-primary btn-sm mt-15">SHOP NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Apparels Offer -->
                    <div class="apparels_offer_area">
                        <img src="{{asset('frontend/assets/img/product-img/apparels.jpg')}}" alt="Beach-Offer">
                        <div class="apparels_offer_info d-flex align-items-center">
                            <div class="apparels-offer-content">
                                <h4>Apparel &amp; <br><span>Garments</span></h4>
                                <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Deals of the Week -->
                    <div class="weekly_deals_area mt-30">
                        <img src="{{asset('frontend/assets/img/product-img/weekly-offer.jpg')}}" alt="weekly-deals">
                        <div class="weekly_deals_info">
                            <h4>Deals of the Week</h4>
                            <div class="deals_timer">
                                <ul data-countdown="2021/02/14 14:21:38">
                                    <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                    <li><span class="days">00</span>days</li>
                                    <li><span class="hours">00</span>hours</li>
                                    <li class="d-block blank-timer"></li>
                                    <li><span class="minutes">00</span>min</li>
                                    <li><span class="seconds">00</span>sec</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <!-- Elect Offer -->
                            <div class="elect_offer_area mt-30 mt-lg-0">
                                <img src="{{asset('frontend/assets/img/product-img/elect.jpg')}}" alt="Elect-Offer">
                                <div class="elect_offer_info d-flex align-items-center">
                                    <div class="elect-offer-content">
                                        <h4>Electronics</h4>
                                        <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <!-- Backpack Offer -->
                            <div class="backpack_offer_area mt-30">
                                <img src="{{asset('frontend/assets/img/product-img/backpack.jpg')}}" alt="Backpack-Offer">
                                <div class="backpack_offer_info">
                                    <h4>Backpacks</h4>
                                    <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Area End -->

    <!-- Popular Brands Area -->
    @if (count($brands)>0)
        <section class="popular_brands_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular_section_heading mb-50">
                            <h5>Popular Brands</h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="popular_brands_slide owl-carousel">
                            @foreach ($brands as $brand)
                                <div class="single_brands">
                                    <img src="{{asset($brand->photo)}}" alt="{{$brand->title}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Popular Brands Area -->

    <!-- Special Featured Area -->
    <section class="pt-5 special_feature_area">
        <div class="container">
            <div class="row">
                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="mb-5 single_feature_area d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-ship"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Free Shipping</h6>
                            <p>For orders above $100</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="mb-5 single_feature_area d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-box"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Happy Returns</h6>
                            <p>7 Days free Returns</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="mb-5 single_feature_area d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-money"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>100% Money Back</h6>
                            <p>If product is damaged</p>
                        </div>
                    </div>
                </div>

                <!-- Single Feature Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="mb-5 single_feature_area d-flex align-items-center">
                        <div class="feature_icon">
                            <i class="icofont-live-support"></i>
                            <span><i class="icofont-check-alt"></i></span>
                        </div>
                        <div class="feature_content">
                            <h6>Dedicated Support</h6>
                            <p>We provide support 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Featured Area -->

@endsection



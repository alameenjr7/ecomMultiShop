@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>{{__('messages.product_details')}}</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('shop')}}">{{__('messages.shop')}}</a></li>
                    <li class="breadcrumb-item active">{{__('messages.product_details')}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Single Product Details Area -->
<section class="single_product_details_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                        <!-- Carousel Inner -->
                        <div class="carousel-inner">
                            @php
                                $photos=explode(',',$product->photo)
                            @endphp
                            @foreach ($photos as $key=>$photo)
                            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                <a class="gallery_img" href="{{$photo}}" title="{{ucfirst($product->title)}}">
                                    <img class="d-block w-100" src="{{asset($photo)}}" alt="{{ucfirst($product->title)}}">
                                </a>
                                <!-- Product Badge -->
                                <div class="product_badge">
                                    <span class="badge-info">{{$product->conditions}}</span>
                                    @if ($product->discount>0)
                                        <span class="mt-2">{{$product->discount}}%</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Carosel Indicators -->
                        <ol class="carousel-indicators">
                            @php
                                $photos=explode(',',$product->photo)
                            @endphp
                            @foreach ($photos as $key=>$photo)
                            <li class="{{$key==0 ? 'active' : ''}}" data-target="#product_details_slider"
                                data-slide-to="{{$key}}" style="background-image: url({{asset($photo)}});">
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Single Product Description -->
            <div class="col-12 col-lg-6">
                <div class="single_product_desc">
                    <h4 class="mb-2 title">{{ucfirst($product->title)}}</h4>
                        <div class="mb-2 single_product_ratings">
                            @for ($i=0;  $i<5;  $i++)
                                @if (round($product->reviews->avg('rate'))>$i)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
                            @endfor
                        </div>
                    @if ($product->discount>0)
                        <h4 class="mb-4 price">{{Helper::currency_converter($product->offer_price)}}
                            <span><del>{{Helper::currency_converter($product->price)}}</del></span>
                        </h4>
                    @else
                        <h4 class="product-price">{{Helper::currency_converter($product->price)}}</h4>
                    @endif


                    <!-- Overview -->
                    <div class="mb-4 short_overview">
                        <h6>{{__('messages.override')}}</h6>
                        <p>{!! html_entity_decode($product->summary) !!}</p>
                    </div>

                    <!-- Color Option -->
                    {{-- <div class="p-0 mb-3 widget color">
                        <h6 class="widget-title">Color</h6>
                        <div class="widget-desc d-flex">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label black" for="customRadio1"></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label pink" for="customRadio2"></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label red" for="customRadio3"></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label purple" for="customRadio4"></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label white" for="customRadio5"></label>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Size Option -->
                    <div class="p-0 mb-3 widget size">
                        <h6 class="widget-title">{{__('messages.size')}}</h6>
                        <div class="widget-desc">
                            @php
                                $product_attri=App\Models\ProductAttributes::where('product_id',$product->id)->get()
                            @endphp
                            <ul>
                                @foreach ($product_attri as $size)
                                <li value="{{$size->size}}"><a href="#">{{$size->size}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="flex-wrap clearfix my-5 cart d-flex align-items-center">
                        <div class="quantity">
                            <input data-id="{{$product->id}}" type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12"
                                name="quantity" value="1">
                        </div>
                        <button type="button" name="addtocart" data-product_id="{{$product->id}}" data-quantity="1" data-price="{{Helper::currency_converter($product->offer_price)}}" id="add_to_cart_button_details_{{$product->id}}" value="5"
                            class="mt-1 ml-1 add_to_cart_button_details btn btn-primary mt-md-0 ml-md-3">{{__('messages.addToCart')}}
                        </button>
                    </form>

                    <!-- Others Info -->
                    <div class="flex-wrap mb-3 others_info_area d-flex">
                        <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1"
                            data-id="{{$product->id}}" id="add_to_wishlist_{{$product->id}}">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            {{__('messages.wishlists')}}
                        </a>
                        <a class="add_to_compare" href="javascript:void(0);" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}"><i class="fa fa-th" aria-hidden="true"></i>
                            {{__('messages.compare')}}</a>
                        <a class="share_with_friend" href="#" ><i class="fa fa-share" aria-hidden="true"></i> {{__('messages.shareFriend')}}</a>
                    </div>

                    <!-- Size Guide -->
                    <div class="sizeguide">
                        <h6>{{__('messages.sizeGuide')}}</h6>
                        <div class="size_guide_thumb d-flex">
                            @php
                                $size_guide=explode(',',$product->size_guide);
                            @endphp
                            @foreach ($size_guide as $sg)
                            <a class="size_guide_img" href="{{$sg}}" style="background-image: url({{asset($sg)}});">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="clearfix product_details_tab section_padding_100_0">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                        <li class="nav-item">
                            <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">{{__('messages.review')}} <span
                                    class="text-muted">({{App\Models\ProductReview::where('product_id',$product->id)->count()}})</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">{{__('messages.add_info')}} </a>
                        </li>
                        <li class="nav-item">
                            <a href="#refund" class="nav-link" data-toggle="tab" role="tab">{{__('messages.return')}} &amp; {{__('messages.cancel')}}</a>
                        </li>
                    </ul>
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="description">
                            <div class="description_area">
                                <h5>Description</h5>
                                <p>{!! html_entity_decode($product->description) !!}</p>

                                <div class="mb-3 embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                        src="{{$product->url}}"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="reviews">

                            <div class="submit_a_review_area mt-50">
                                <h4>{{__('messages.submitReview')}}</h4>
                                @auth
                                <form action="{{route('product.review',$product->slug)}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <span>{{__('messages.yrRate')}}</span>
                                        <div class="stars">
                                            <input type="radio" name="rate" class="star-1" id="star-1" value="1">
                                            <label class="star-1" for="star-1">1</label>
                                            <input type="radio" name="rate" class="star-2" id="star-2" value="2">
                                            <label class="star-2" for="star-2">2</label>
                                            <input type="radio" name="rate" class="star-3" id="star-3" value="3">
                                            <label class="star-3" for="star-3">3</label>
                                            <input type="radio" name="rate" class="star-4" id="star-4" value="4">
                                            <label class="star-4" for="star-4">4</label>
                                            <input type="radio" name="rate" class="star-5" id="star-5" value="5">
                                            <label class="star-5" for="star-5">5</label>
                                            <span></span>
                                        </div>
                                        @error('rate')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('messages.nickname')}}</label>
                                        <input type="email" class="form-control" id="name" readonly
                                            value="{{auth()->user()->email}}" placeholder="Nazrul">
                                    </div>
                                    <input type="hidden" class="form-control" id="name" name="user_id"
                                        value="{{auth()->user()->id}}">
                                    <input type="hidden" class="form-control" id="name" name="product_id"
                                        value="{{$product->id}}">
                                    <div class="form-group">
                                        <label for="options">{{__('messages.RFYR')}}</label>
                                        <select class="py-0 form-control small right w-100" name="reason" id="options">
                                            <option value="quality" {{old('reason')=='quality' ? 'selected' : '' }}>{{__('messages.qty')}}
                                            </option>
                                            <option value="value" {{old('reason')=='value' ? 'selected' : '' }}>{{__('messages.value')}}
                                            </option>
                                            <option value="design" {{old('reason')=='design' ? 'selected' : '' }}>{{__('messages.design')}}
                                            </option>
                                            <option value="price" {{old('reason')=='price' ? 'selected' : '' }}>{{__('messages.price')}}
                                            </option>
                                            <option value="others" {{old('reason')=='others' ? 'selected' : '' }}>{{__('messages.others')}}
                                            </option>
                                        </select>
                                        @error('reason')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="comments">{{__('messages.comments')}}</label>
                                        <textarea class="form-control" id="comments" name="review" rows="5"
                                            data-max-length="150"></textarea>
                                        @error('review')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{__('messages.submitReview')}}</button>
                                </form>
                                @else
                                <p class="py-5">{{__('messages.YNTLFWR')}}<a href="{{route('user.auth')}}">
                                    {{__('messages.clickHere')}}</a></p>
                                @endauth
                            </div>

                            <div class="reviews_area">
                                <ul class="mt-5">
                                    <p>{{__('messages.lastFeed')}}</p>
                                    @php
                                    $reviews=App\Models\ProductReview::where('product_id',$product->id)->latest()->paginate(2);
                                    @endphp
                                    <li>
                                        @if (count($reviews)>0)
                                        @foreach ($reviews as $review)
                                        <div class="single_user_review mb-15">
                                            <div class="review-rating">
                                                @for ($i=0; $i<5; $i++)
                                                    @if ($review->rate>$i)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                @endfor
                                                    <span>{{__('messages.for')}} {{ucfirst($review->reason)}}</span>
                                            </div>
                                            <div class="review-details">
                                                <p>{{__('messages.by')}}
                                                    @php
                                                        $user=App\Models\User::where('id',$review->user_id)->first();
                                                    @endphp
                                                    <a href="#">{{$user->full_name}}</a>
                                                        {{__('messages.on')}}
                                                    <span>{{\Carbon\Carbon::parse($review->created_at)->format(' d M y')}}</span>
                                                </p>
                                                <p>{{$review->review}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                        @if (auth()->user())
                                        <div class="single_user_review">
                                            <p>{{__('messages.YLF')}}</p>
                                            @php
                                                $reviews_user=App\Models\ProductReview::where('user_id',auth()->user()->id)->latest()->paginate(1);
                                            @endphp
                                            @if (count($reviews_user)>0)
                                                @foreach ($reviews_user as $review)
                                                    <div class="review-rating">
                                                        @for ($i=0; $i<5; $i++)
                                                            @if ($review->rate>$i)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                            @endif
                                                        @endfor
                                                            <span>{{__('messages.for')}} {{ucfirst($review->reason)}}</span>
                                                    </div>
                                                    <div class="review-details">
                                                        <p>{{__('messages.by')}} <a
                                                                href="#">{{App\Models\User::where('id',$review->user_id)->value('full_name')}}</a>
                                                                {{__('messages.on')}} <span>{{\Carbon\Carbon::parse($review->created_at)->format(' d M
                                                                y')}}</span></p>
                                                        <p>{{$review->review}}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @endif
                                        {{$reviews->appends($_GET)->links('vendor.pagination.custom')}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="addi-info">
                            <div class="additional_info_area">
                                <h5>{{__('messages.add_info')}}</h5>
                                <p>{!! html_entity_decode($product->additional_info) !!}</p>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="refund">
                            <div class="refund_area">
                                <h6>{{__('messages.returnPol')}}</h6>
                                <p>{!! html_entity_decode($product->return_cancellation) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single Product Details Area End -->

<!-- Related Products Area -->
<section class="clearfix you_may_like_area section_padding_0_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading new_arrivals">
                    <h5>{{__('messages.YMAL')}}</h5>
                </div>
            </div>
        </div>
        @if(count($product->rel_prods)>0)
        <div class="row">
            <div class="col-12">
                <div class="you_make_like_slider owl-carousel">
                    @foreach ($product->rel_prods as $item)
                    @if ($item->id != $product->id)
                    <!-- Single Product -->
                    <div class="single-product-area">
                        <div class="product_image">
                            <!-- Product Image -->
                            @php
                                $photo=explode(',',$item->photo);
                            @endphp
                            <img class="normal_img" src="{{asset($photo[0])}}" alt="{{ucfirst($item->title)}}">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>{{$item->conditions}}</span>
                                @if ($item->discount>0)
                                    <span class="mt-2">{{$item->discount}} %</span>
                                @endif
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1"
                                    data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i
                                        class="icofont-heart"></i></a>
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
                                <a href="#" data-quantity="1" data-product-id="{{$item->id}}" class="add_to_cart"
                                    id="add_to_cart{{$item->id}}">
                                    <i class="icofont-shopping-cart"></i> {{__('messages.addToCart')}}
                                </a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="{{route('product.detail1',$item->id)}}" data-id="{{$product->id}}" id="{{$product->id}}" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i>
                                    {{__('messages.quickView')}}</a>
                            </div>

                            <p class="brand_name">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                            <a href="{{route('product.detail', $item->slug)}}">{{ucfirst($item->title)}}</a>
                            @if ($item->discount>0)
                                <h6 class="product-price">{{Helper::currency_converter($item->offer_price)}}
                                    <small>
                                        <del class="text-danger">{{Helper::currency_converter($item->price)}}</del>
                                    </small>
                                </h6>
                            @else
                                <h6 class="product-price">{{Helper::currency_converter($item->price)}}</h6>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Related Products Area -->

@endsection


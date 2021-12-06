@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Shop Grid</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Shop Grid</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <form action="{{route('shop.filter')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                            <div class="shop_sidebar_area">
                                @if (count($cats)>0)
                                    <!-- Single Widget -->
                                    <div class="widget catagory mb-30">
                                        <h6 class="widget-title">Product Categories</h6>
                                        <div class="widget-desc">
                                            @if (!empty($_GET['category']))
                                                @php
                                                    $filter_cats=explode(',',$_GET['category']);
                                                @endphp
                                            @endif
                                            @foreach ($cats as $cat)
                                                <!-- Single Checkbox -->
                                                <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                                    <input type="checkbox"
                                                            @if (!empty($filter_cats) && in_array($cat->slug,$filter_cats))
                                                                checked
                                                            @endif
                                                        class="custom-control-input" id="{{$cat->slug}}" name="category[]" onchange="this.form.submit();" value="{{$cat->slug}}">
                                                    <label class="custom-control-label" for="{{$cat->slug}}">{{ucfirst($cat->title)}}<span class="text-muted">({{count($cat->products)}})</span></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Single Widget -->
                                <div class="widget price mb-30">
                                    <h6 class="widget-title">Filter by Price</h6>
                                    <div class="widget-desc">
                                        <div class="slider-range">
                                            <div id="slider-range" data-min="{{Helper::minPrice()}}" data-max="{{Helper::maxPrice()}}" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{Helper::minPrice()}}" data-value-max="{{Helper::maxPrice()}}" data-label-result="Price:">
                                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            </div>
                                            <div class="mt-2 d-flex">
                                                @if (!empty($_GET['price']))
                                                    @php
                                                        $price=explode('-',$_GET['price'])
                                                    @endphp
                                                @endif
                                                <input type="hidden" id="price_range" value="@if(!empty($_GET['price'])) {{$_GET['price']}} @endif" name="price_range">
                                                <input type="text" readonly id="amount" style="border: 0;width:70%;background-color: #f8f8ff;" value="$@if(!empty($_GET['price'])){{$price['0']}}@else{{Helper::minPrice()}}@endif-$@if(!empty($_GET['price'])){{$price['1']}}@else{{Helper::maxPrice()}}@endif">
                                                {{-- <div class="range-price" id="amount" >Price: {{Helper::minPrice()}} - {{Helper::maxPrice()}}</div> --}}
                                                <button type="submit" class="float-right btn btn-sm btn-primary" style="margin: 12px 0px 12px 7px;height:30px;line-height:12px;">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (count($brands)>0)
                                    <!-- Single Widget -->
                                    <div class="widget brands mb-30">
                                        <h6 class="widget-title">Filter by brands</h6>
                                        <div class="widget-desc">
                                            <!-- Single Checkbox -->
                                            @if (!empty($_GET['brand']))
                                                @php
                                                    $filter_brands=explode(',',$_GET['brand']);
                                                @endphp
                                            @endif
                                            @foreach ($brands as $brand)
                                                <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                                    <input type="checkbox"
                                                                @if (!empty($filter_brands) && in_array($brand->slug,$filter_brands))
                                                                    checked
                                                                @endif
                                                            class="custom-control-input" id="{{$brand->slug}}" name="brand[]" value="{{$brand->slug}}" onchange="this.form.submit();">
                                                    <label class="custom-control-label" for="{{$brand->slug}}">{{$brand->title}} <span class="text-muted">({{count($brand->products)}})</span></label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Single Widget -->
                                <div class="widget rating mb-30">
                                    <h6 class="widget-title">Average Rating</h6>
                                    <div class="widget-desc">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <span class="text-muted">(103)</span></a></li>

                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(78)</span></a></li>

                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(47)</span></a></li>

                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(9)</span></a></li>

                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <span class="text-muted">(3)</span></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Single Widget -->
                                <div class="widget size mb-30">
                                    <h6 class="widget-title">Filter by Size</h6>
                                    <div class="widget-desc">
                                        <!-- Single Checkbox -->
                                        <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" @if (!empty($_GET['size']) && $_GET['size'] =='S') checked @endif name="size" value="S" onchange="this.form.submit();">
                                            <label class="custom-control-label" for="customCheck2">Small <span class="text-muted">({{App\Models\Product::where(['status'=>'active','size'=>'S'])->count()}})</span></label>
                                        </div>
                                        <!-- Single Checkbox -->
                                        <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck12" @if (!empty($_GET['size']) && $_GET['size'] =='M') checked @endif name="size" value="M" onchange="this.form.submit();">
                                            <label class="custom-control-label" for="customCheck12">Medium <span class="text-muted">({{App\Models\Product::where(['status'=>'active','size'=>'M'])->count()}})</span></label>
                                        </div>
                                        <!-- Single Checkbox -->
                                        <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck22" @if (!empty($_GET['size']) && $_GET['size'] =='L') checked @endif name="size" value="L" onchange="this.form.submit();">
                                            <label class="custom-control-label" for="customCheck22">Large <span class="text-muted">({{App\Models\Product::where(['status'=>'active','size'=>'L'])->count()}})</span></label>
                                        </div>
                                        <!-- Single Checkbox -->
                                        <div class="mb-2 custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck32" @if (!empty($_GET['size']) && $_GET['size'] =='XL') checked @endif name="size" value="XL" onchange="this.form.submit();">
                                            <label class="custom-control-label" for="customCheck32">Extra-Large <span class="text-muted">({{App\Models\Product::where(['status'=>'active','size'=>'XL'])->count()}})</span></label>
                                        </div>
                                        {{-- <ul>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                        <!-- Shop Top Sidebar -->
                        <div class="flex-wrap shop_top_sidebar_area d-flex align-items-center justify-content-between">
                            <div class="view_area d-flex">
                                <div class="grid_view">
                                    <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="icofont-layout"></i></a>
                                </div>
                                <div class="ml-3 list_view">
                                    <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="List View"><i class="icofont-listine-dots"></i></a>
                                </div>
                            </div>
                            <select id="sortBy" name="sortBy" onchange="this.form.submit();" class="small right">
                                <option value=" ">Default</option>
                                <option value="priceAsc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='priceAsc') selected @endif>Price - Lower To Higher</option>
                                <option value="priceDesc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='priceDesc') selected @endif>Price - Higher To Lower</option>
                                <option value="titleAsc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='titleAsc') selected @endif>Alphabetical Ascending</option>
                                <option value="titleDesc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='titleDesc') selected @endif>Alphabetical Descending</option>
                                <option value="discAsc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='discAsc') selected @endif>Discount - Lower To Higher</option>
                                <option value="discDesc" @if (!empty($_GET['sortBy']) && $_GET['sortBy']=='discDesc') selected @endif>Discount - Higher To Lower</option>
                            </select>
                        </div>

                        <div class="shop_grid_product_area" id="product-update">
                            <p class=""> Total Products : {{$products->total()}}</p>
                            <div class="row justify-content-center">
                                @if (count($products)>0)
                                    <!-- Single Product -->
                                    @foreach ($products as $product)
                                    <div class="col-9 col-sm-12 col-md-6 col-lg-4">
                                        @include('frontend.layouts._single-product',['product'=>$product])
                                    </div>
                                    {{-- <div class="col-9 col-sm-12 col-md-6 col-lg-4">
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                <img class="normal_img" src="{{$item->photo}}" alt="{{$item->photo}}">

                                                <!-- Product Badge -->
                                                <div>
                                                    @if ($item->conditions=='new')
                                                        <span class="product_badge badge badge-primary">{{$item->conditions}}</span>
                                                    @elseif ($item->conditions=='popular')
                                                        <span class="product_badge badge badge-warning">{{$item->conditions}}</span>
                                                    @else
                                                        <span class="product_badge badge badge-info">{{$item->conditions}}</span>
                                                    @endif
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class="icofont-heart"></i></a>
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
                                                    <a href="#" data-quantity="1" data-product-id="{{$item->id}}" class="add_to_cart" id="add_to_cart{{$item->id}}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">{{App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
                                                <a href="{{route('product.detail',$item->slug)}}">{{ucfirst($item->title)}}</a>
                                                <h6 class="product-price">{{Helper::currency_converter($item->offer_price)}} <small><del class="text-danger">{{Helper::currency_converter($item->price)}}</del></small></h6>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @endforeach
                                @else
                                    <p>No product found !</p>
                                @endif
                            </div>
                        </div>

                        <!-- Shop Pagination Area -->
                        {{$products->appends($_GET)->links('vendor.pagination.custom')}}

                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('scripts')
{{-- Price slider --}}
<script>
    $(document).ready(function() {
        if($('#slider-range').length > 0){
            const max_value = parseInt($("#slider-range").data('max')) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;

            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            let price=price_range.split('-');

            $('#slider-range').slider({
                range:true,
                min:min_value,
                max:max_value,
                values:price,
                slide:function(event,ui){
                    $('#amount').val(ui.values[0]+"-"+ui.values[1]);
                    $('#price_range').val(ui.values[0]+"-"+ui.values[1]);
                }
            })
        }
    });
</script>

{{-- Add to cart --}}
{{-- <script>
    $(document).on('click','.add_to_cart',function(e){
        e.preventDefault();
        var product_id=$(this).data('product-id');
        var product_qty=$(this).data('quantity');


        var token="{{csrf_token()}}";
        var path="{{route('cart.store')}}";

        $.ajax({
            url:path,
            type:"POST",
            dataType:"JSON",
            data:{
                product_id:product_id,
                product_qty:product_qty,
                _token:token,
            },
            beforeSend:function (){
                $('#add_to_cart'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            },
            complete:function (){
                $('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i> Add To Cart');
            },
            success:function (data){
                console.log(data);
                $('body #header-ajax').html(data['header']);
                $('body #cart_counter').html(data['cart_count']);
                if(data['status']){
                    swal({
                        title: "Good job !",
                        text: data['message'],
                        icon: "success",
                        button: "OK !",
                    });
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    });
</script> --}}

{{--add to wishlist --}}
{{-- <script>
    $(document).on('click','.add_to_wishlist',function(e){
        e.preventDefault();
        var product_id=$(this).data('id');
        var product_qty=$(this).data('quantity');


        var token="{{csrf_token()}}";
        var path="{{route('wishlist.store')}}";

        $.ajax({
            url:path,
            type:"POST",
            dataType:"JSON",
            data:{
                product_id:product_id,
                product_qty:product_qty,
                _token:token,
            },
            beforeSend:function (){
                $('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete:function (){
                $('#add_to_wishlist_'+product_id).html('<i class="fas fa-heart"></i>');
            },
            success:function (data){
                console.log(data);
                if(data['status']){
                    $('body #header-ajax').html(data['header']);
                    $('body #wishlist_counter').html(data['wishlist_count']);
                    swal({
                        title: "Good job !",
                        text: data['message'],
                        icon: "success",
                        button: "OK !",
                    });
                }
                else if(data['present']){
                    $('body #header-ajax').html(data['header']);
                    $('body #wishlist_counter').html(data['wishlist_count']);
                    swal({
                        title: "Opps !",
                        text: data['message'],
                        icon: "warning",
                        button: "OK !",
                    });
                }
                else{
                    swal({
                        title: "Sorry !",
                        text: "You can't add that product",
                        icon: "error",
                        button: "OK !",
                    });
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    });
</script> --}}
@endsection

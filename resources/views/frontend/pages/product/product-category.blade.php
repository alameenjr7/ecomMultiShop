@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>{{__('messages.shop')}}</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                    <li class="breadcrumb-item active">{{$categories->title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<section class="shop_grid_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shop Top Sidebar -->
                <div class="flex-wrap shop_top_sidebar_area d-flex align-items-center justify-content-between">
                    <div class="view_area d-flex">
                        <div class="grid_view">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="icofont-layout"></i></a>
                        </div>
                        <div class="ml-3 list_view">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="List View"><i class="icofont-listine-dots"></i></a>
                        </div>
                    </div>
                    <select id="sortBy" class="small right">
                        <option selected>Default</option>
                        <option value="priceAsc">Price - Lower To Higher</option>
                        <option value="priceDesc">Price - Higher To Lower</option>
                        <option value="titleAsc">Alphabetical Ascending</option>
                        <option value="titleDesc">Alphabetical Descending</option>
                        <option value="discAsc">Discount - Lower To Higher</option>
                        <option value="discDesc">Discount - Higher To Lower</option>
                    </select>
                </div>

                <div class="shop_grid_product_area">
                    <div class="row justify-content-center" id="product-data">
                        <!-- Single Product -->
                        @foreach ($products as $product)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                @include('frontend.layouts._single-product',['product'=>$product])
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="text-center ajax-load">
                    <img src="{{asset('frontend/assets/img/loading.gif')}}" style="width: 5%">
                </div> --}}

                <!-- Shop Pagination Area -->
                {{$products->appends($_GET)->links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
{{--filter by--}}
<script>
    $('#sortBy').change(function(){
        var sort=$('#sortBy').val();

        window.location="{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
    });
</script>

{{--Loading data--}}
<script>
    function loadmoreData(page){
        $.ajax({
            url:'?page='+page,
            type:'get',
            beforeSend:function(){
                $('.ajax-load').show();
            }
        })
        .done(function(data){
            if(data.html==''){
                $('.ajax-load').html('No more product avialable');
                return;
            }
            $('.ajax-load').hide();
            $('#product-data').append(data.html);
        })
        .fail(function(){
            alert('Something went wrong! please try again');
        });
    }

    var page=1;
    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height()+120>=$(document).height()){
            page ++;
            loadmoreData(page);
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

@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{__('messages.wishlist')}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.wishlist')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Wishlist Table Area -->
    <div class="clearfix wishlist-table section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive" id="wishlist_list">
                            @include('frontend.layouts._wishlist')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->

@endsection

@section('scripts')

{{-- move cart--}}
<script>
    $('.move-to-cart').on('click',function(e){
        e.preventDefault();
        var rowId=$(this).data('id');
        var token="{{csrf_token()}}";
        var path="{{route('wishlist.move.cart')}}";

        $.ajax({
            url:path,
            type:"POST",
            data:{
                _token:token,
                rowId:rowId,
            },
            beforeSend:function(){
                $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
            },
            // complete:function(){
            //     $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
            // },
            success:function(data){
                if(data['status']){
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #wishlist_list').html(data['wishlist_list']);
                    $('body #header-ajax').html(data['header']);
                    swal({
                        title: "Success !",
                        text: data['message'],
                        icon: "success",
                        button: "OK !",
                    });
                }
                else{
                    swal({
                        title: "Opps!",
                        text: "Something went wrong!",
                        icon: "warning",
                        button: "OK !",
                    });
                }
            },
            error:function(err){
                swal({
                    title: "Error !",
                    text: "Some error",
                    icon: "error",
                    button: "OK !",
                });
            }
        })
    })
</script>
{{-- End move cart--}}

{{-- delete wishlist--}}
<script>
    $('.wishlist_delete').on('click',function(e){
        e.preventDefault();
        var rowId=$(this).data('id');
        var token="{{csrf_token()}}";
        var path="{{route('wishlist.delete')}}";

        $.ajax({
            url:path,
            type:"POST",
            data:{
                _token:token,
                rowId:rowId,
            },
            success:function(data){
                if(data['status']){
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #wishlist_list').html(data['wishlist_list']);
                    $('body #header-ajax').html(data['header']);
                    // swal({
                    //     title: "Success !",
                    //     text: data['message'],
                    //     icon: "success",
                    //     button: "OK !",
                    // });
                    window.location.href=window.location.href;
                }
                else{
                    swal({
                        title: "Opps!",
                        text: "Something went wrong!",
                        icon: "warning",
                        button: "OK !",
                    });
                }
            },
            error:function(err){
                swal({
                    title: "Error !",
                    text: "Some error",
                    icon: "error",
                    button: "OK !",
                });
            }
        })
    })
</script>
{{--End  delete wishlist--}}

@endsection

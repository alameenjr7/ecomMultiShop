@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{__('messages.compare')}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.compare')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Compare Area  -->
    <div class="clearfix compare_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="compare-list">
                        <div class="table-responsive" id="compare">
                            @include('frontend.layouts._compare')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection

@section('scripts')
{{-- move cart--}}
<script>
    $('.move-to-cart').on('click',function(e){
        e.preventDefault();
        var rowId=$(this).data('id');
        var token="{{csrf_token()}}";
        var path="{{route('compare.move.cart')}}";

        $.ajax({
            url:path,
            type:"POST",
            data:{
                _token:token,
                rowId:rowId,
            },
            // beforeSend:function(){
            //     $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
            // },
            // complete:function(){
            //     $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
            // },
            success:function(data){
                if(data['status']){
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #wishlist_list').html(data['wishlist_list']);
                    $('body #compare').html(data['compare_list']);
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
    });
    $('.move-to-wishlist').on('click',function(e){
        e.preventDefault();
        var rowId=$(this).data('id');
        var token="{{csrf_token()}}";
        var path="{{route('compare.move.wishlist')}}";

        $.ajax({
            url:path,
            type:"POST",
            data:{
                _token:token,
                rowId:rowId,
            },
            // beforeSend:function(){
            //     $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to wishlist...');
            // },
            // complete:function(){
            //     $(this).html('<i class="fas fa-spinner fa-spin"></i> Moving to Cart...');
            // },
            success:function(data){
                if(data['status']){
                    $('body #cart_counter').html(data['cart_count']);
                    $('body #wishlist_list').html(data['wishlist_list']);
                    $('body #compare').html(data['compare_list']);
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

{{-- delete wishlist--}}
<script>
    $('.delete-compare').on('click',function(e){
        e.preventDefault();
        var rowId=$(this).data('id');
        var token="{{csrf_token()}}";
        var path="{{route('compare.delete')}}";

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
                    $('body #compare').html(data['compare_list']);
                    $('body #header-ajax').html(data['header']);
                    swal({
                        title: "Success !",
                        text: data['message'],
                        icon: "success",
                        button: "OK !",
                    });

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
@endsection

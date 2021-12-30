@extends('frontend.layouts.master')

@section('content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>{{__('messages.checkout_m')}}</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('messages.checkout_m')}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="clearfix order_complated_area">
                        <h5>{{__('messages.orderThx')}}</h5>
                        <p>{{__('messages.detailOrder')}}</p>
                        <p class="mb-0 orderid">{{__('messages.orderID')}} #{{$order}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

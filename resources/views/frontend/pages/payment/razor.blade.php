@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>{{__('messages.checkout')}}</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                    <li class="breadcrumb-item active">Razor Payment</li>
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
            <div class="col-md-12">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('error') !!}
                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                {!! Session::forget('success') !!}
                <div class="panel panel-default" style="margin-top: 30px;">
                    <h3>Payment With Razorpay for - ameentech.com </h3><br>
                    <div class="panel-heading">
                        <h2>Pay With Razorpay</h2>
                        <form action="{{route('razor.payment')}}" method="post">
                            @csrf
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{env('RAZOR_KEY')}}"
                                data-amount="{{($order->total_amount)*100*100}}"
                                data-buttontext="Pay {{$order->total_amount}} INR"
                                data-description="Payment"
                                data-name="AmeenTech"
                                data-image="{{asset('frontend/assets/img/core-img/logo.png')}}"
                                data-prefill.name="{{$order->full_name}}"
                                data-prefill.email="{{$order->email}}"
                                data-theme.color="#528FF0"
                            ></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

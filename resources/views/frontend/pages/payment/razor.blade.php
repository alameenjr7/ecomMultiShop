@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>Checkout</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                <form action="{{route('razor.payment')}}" method="post">
                    @csrf
                    <script
                        src="https//checkout.razorpay.com/v1/checkout.js"
                        data-key="{{env('RAZOR_KEY')}}"
                        data-amount="{{(Helper::currency_converter($order->total_amount))*100*100}}"
                        data-buttontext="Pay {{Helper::currency_converter($order->total_amount)}} USD"
                        data-description="Payment"
                        data-prefill.name="{{$order->full_name}}"
                        data-prefill.email="{{$order->email}}"
                        data-theme.color="#ff7529"
                    ></script>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

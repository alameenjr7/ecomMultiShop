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

<!-- Checkout Steps Area -->
<div class="checkout_steps_area">
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.billing')}}</a>
    <a class="active button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.shipping')}}</a>
    <a href="#"><i class="icofont-check-circled"></i> {{__('messages.payment')}}</a>
    <a href="#"><i class="icofont-check-circled"></i> {{__('messages.reviews')}}</a>
</div>
<!-- Checkout Steps Area -->

<!-- Checkout Area -->
<div class="checkout_area section_padding_100">
    <div class="container">

        <form action="{{route('checkout2.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="clearfix checkout_details_area">
                        <h5 class="mb-4">{{__('messages.ship_method')}}</h5>

                        <div class="shipping_method">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__('messages.method')}}</th>
                                            <th scope="col">{{__('messages.zone')}}</th>
                                            {{-- <th scope="col">Price</th> --}}
                                            <th scope="col">{{__('messages.choose')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($shippings)>0)
                                        @foreach ($shippings as $key=>$item)
                                        <tr>
                                            <th scope="row">{{$item->shipping_address}}</th>
                                            <td>{{$item->delivery_time}}</td>
                                            {{-- <td>{{Helper::currency_converter($item->delivery_charge)}}</td> --}}
                                            <td>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio{{$key}}" name="delivery_charge"
                                                        value="{{$item->delivery_charge}}" class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio{{$key}}"></label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="3">{{__('messages.methodFound')}}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="clearfix mt-3 checkout_pagination d-flex justify-content-end">
                        <a onclick="window.history.back();" class="mt-2 ml-2 btn btn-primary">{{__('messages.goback')}}</a>
                        <button type="submit" class="mt-2 ml-2 btn btn-primary">{{__('messages.continue')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Area End -->

@endsection

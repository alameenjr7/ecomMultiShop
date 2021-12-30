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

<!-- Checkout Step Area -->
<div class="checkout_steps_area">
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.billing')}}</a>
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.shipping')}}</a>
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.payment')}}</a>
    <a class="active " href="{{route('checkout4')}}"><i class="icofont-check-circled"></i> {{__('messages.reviews')}}</a>
</div>
<!-- Checkout Step Area -->

<!-- Checkout Area -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="clearfix checkout_details_area">
                    <h5 class="mb-30">{{__('messages.reviewOrder')}}</h5>

                    <div class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">{{__('messages.product')}}</th>
                                        <th scope="col">{{__('messages.unPrice')}}</th>
                                        <th scope="col">{{__('messages.qty')}}</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                        <tr>

                                            <td>
                                                <img src="{{$item->model->photo}}" alt="Product">
                                            </td>
                                            <td>
                                                <a href="{{'product.detail',$item->model->slug}}">{{$item->name}}</a>
                                            </td>
                                            <td>{{Helper::currency_converter($item->price)}}</td>
                                            <td>
                                                {{$item->qty}}
                                            </td>
                                            <td>{{Helper::currency_converter($item->subtotal())}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ml-auto col-12 col-lg-7">
                <div class="cart-total-area">
                    <h5 class="mb-3">{{__('messages.cartTotal')}}</h5>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>{{__('messages.subTotal')}}</td>
                                    <td>{{Helper::currency_converter(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</td>
                                </tr>
                                @if (\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'])
                                    <tr>
                                        <td>{{__('messages.shipping')}}</td>
                                        <td>{{Helper::currency_converter(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'])}}</td>
                                    </tr>
                                @endif
                                @if (\Illuminate\Support\Facades\Session::has('coupon'))
                                    <tr>
                                        <td>Coupon</td>
                                        <td>{{Helper::currency_converter(\Illuminate\Support\Facades\Session::get('coupon')['value'])}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Total</td>
                                    @if (\Illuminate\Support\Facades\Session::has('coupon') && \Illuminate\Support\Facades\Session::has('checkout'))
                                        <td>{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge']-\Illuminate\Support\Facades\Session::get('coupon')['value'])}}</td>
                                    @elseif (\Illuminate\Support\Facades\Session::has('coupon'))
                                        <td>{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'])}}</td>
                                    @elseif (\Illuminate\Support\Facades\Session::has('checkout'))
                                        <td>{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'])}}</td>
                                    @else
                                        <td>{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal()))}}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 checkout_pagination d-flex justify-content-end">
                        <a onclick="window.history.back();" class="mt-2 ml-2 btn btn-primary d-none d-sm-inline-block">{{__('messages.goback')}}</a>
                        <a href="{{route('checkout.store')}}" class="mt-2 ml-2 btn btn-success">{{__('messages.confirm')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End -->

@endsection

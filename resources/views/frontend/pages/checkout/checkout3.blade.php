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

<div class="checkout_steps_area">
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.billing')}}</a>
    <a class="complated button" onclick="window.history.back();"><i class="icofont-check-circled"></i> {{__('messages.shipping')}}</a>
    <a class="active" href="{{route('checkout3')}}"><i class="icofont-check-circled"></i> {{__('messages.payment')}}</a>
    <a href="#"><i class="icofont-check-circled"></i> {{__('messages.reviews')}}</a>
</div>

<!-- Checkout Area -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <form action="{{route('checkout3.store')}}" method="post">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="clearfix checkout_details_area">
                        <div class="payment_method">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five" aria-expanded="false"
                                                aria-controls="collapse_five"><i
                                                    class="icofont-cash-on-delivery-alt"></i> {{__('messages.cod')}}
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five" class="panel-collapse collapse show"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="cod" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">{{__('messages.cod')}}</label>
                                            </div>
                                            <p>{{__('messages.pleaseSend')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five1" aria-expanded="false"
                                                aria-controls="collapse_five1"><i
                                                    class="icofont-paypal-alt"></i> {{__('messages.payWith')}} PayPal
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five1" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="paypal" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">{{__('messages.payWith')}}
                                                    PayPal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five2" aria-expanded="false"
                                                aria-controls="collapse_five2"><i
                                                    class="fa fa-money"></i> {{__('messages.payWith')}} Razor
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five2" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="razor" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">{{__('messages.payWith')}}
                                                    Razor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five3" aria-expanded="false"
                                                aria-controls="collapse_five3"><i
                                                    class="fa fa-money"></i> {{__('messages.payWith')}} Orange Money
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five3" class="panel-collapse collapse "
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="om" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">{{__('messages.payWith')}}
                                                    Orange Money</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Payment Method -->
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="one">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_one" aria-expanded="false"
                                                aria-controls="collapse_one"><i class="icofont-mastercard-alt"></i> Pay
                                                with Credit Card</a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_one" class="panel-collapse collapse "
                                        role="tabpanel" aria-labelledby="one">
                                        <div class="panel-body">
                                            <div class="pay_with_creadit_card">
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck1">
                                                                <label class="custom-control-label"
                                                                    for="customCheck1">Credit or Debit Card</label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label for="cardNumber">Card Number</label>
                                                            <input type="text" class="form-control" id="cardNumber"
                                                                placeholder="" value="" >
                                                            <small id="card_info_store" class="form-text text-muted"><i
                                                                    class="fa fa-lock" aria-hidden="true"></i> Your
                                                                payment info is stored securely. <a href="#">Learn
                                                                    More</a></small>
                                                        </div>
                                                        <div class="mb-3 col-12 col-md-3">
                                                            <label for="expiration">Expiration</label>
                                                            <input type="text" class="form-control" id="expiration"
                                                                placeholder="MM / YY" value="" >
                                                        </div>
                                                        <div class="mb-3 col-12 col-md-3">
                                                            <label for="security_code">Security Code <a href="#"
                                                                    class="security_code_popover" data-container="body"
                                                                    data-toggle="popover" data-placement="top"
                                                                    data-content="" data-img="img/bg-img/cvc.jpg"> <i
                                                                        class="fa fa-question-circle"
                                                                        aria-hidden="true"></i></a></label>
                                                            <input type="text" class="form-control" id="security_code"
                                                                placeholder="" value="" >
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Single Payment Method -->
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="two">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_two" aria-expanded="false"
                                                aria-controls="collapse_two"><i class="icofont-paypal-alt"></i> Pay with
                                                PayPal</a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_two" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="two">
                                        <div class="panel-body">
                                            <div class="pay_with_paypal">
                                                <form action="#" method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label for="paypalemailaddress">Email Address</label>
                                                            <input type="email" class="form-control"
                                                                id="paypalemailaddress" placeholder="" value=""
                                                                >
                                                            <small id="paypal_info" class="form-text text-muted"><i
                                                                    class="fa fa-lock" aria-hidden="true"></i> Secure
                                                                online payments at the speed of want. <a href="#">Learn
                                                                    More</a></small>
                                                        </div>
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label for="paypalpassword">Password</label>
                                                            <input type="password" class="form-control"
                                                                id="paypalpassword" value="" >
                                                            <small id="paypal_password" class="form-text text-muted"><a
                                                                    href="#">Forget Password?</a></small>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Single Payment Method -->
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="three">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_three" aria-expanded="false"
                                                aria-controls="collapse_three"><i class="icofont-bank-transfer-alt"></i>
                                                Direct Bank Transfer</a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_three" class="panel-collapse collapse in"
                                        role="tabpanel" aria-labelledby="three">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Single Payment Method -->
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="four">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_four" aria-expanded="false"
                                                aria-controls="collapse_four"><i class="icofont-file-document"></i>
                                                Cheque Payment
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_four" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="four">
                                        <div class="panel-body">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="checkout_pagination d-flex justify-content-end mt-30">
                        <a onclick="window.history.back();" class="mt-2 ml-2 btn btn-primary">{{__('messages.goback')}}</a>
                        <button type="submit" class="mt-2 ml-2 btn btn-primary">{{__('messages.finalStep')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Area End -->

@endsection

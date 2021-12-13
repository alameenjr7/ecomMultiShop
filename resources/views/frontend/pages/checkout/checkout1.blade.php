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
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Checkout Step Area -->
<div class="checkout_steps_area">
    {{-- {% comment %} <a class="complated" href="checkout-1.html"><i class="icofont-check-circled"></i> Login</a> {%
    endcomment %} --}}
    <a class="active" href="{{route('checkout1')}}"><i class="icofont-check-circled"></i> Billing</a>
    <a href="{{route('checkout2')}}"><i class="icofont-check-circled"></i> Shipping</a>
    <a href="{{route('checkout3')}}"><i class="icofont-check-circled"></i> Payment</a>
    <a href="{{route('checkout4',$user->id)}}"><i class="icofont-check-circled"></i> Review</a>
</div>

<!-- Checkout Area -->
<div class="checkout_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any)
                    <div class="alert alert-danger" id="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <form action="{{route('checkout1.store')}}" method="post">
                @csrf
                <div class="col-12">
                    <div class="clearfix checkout_details_area">
                        <h5 class="mb-4">Billing Details</h5>
                        <div class="row">
                            @php
                            $name=explode(' ',$user->full_name)
                            @endphp
                            <div class="mb-3 col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" value="{{$name[0]}}" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" value="{{$name[1]}}" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email_address">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email Address" value="{{$user->email}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" min="9"
                                    value="{{$user->phone}}" placeholder="221 772050626">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    value="{{$user->country}}" placeholder="ex. Sénégal">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Street Address" value="{{$user->address}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="apartment_suite">Apartment/Suite/Unit</label>
                                <input type="text" class="form-control" id="apartment" name="apartment"
                                    placeholder="Apartment, suite, unit etc" value="{{old('apartment')}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City"
                                    value="{{$user->city}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State"
                                    value="{{$user->state}}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="number" class="form-control" id="postcode" name="postcode"
                                    placeholder="Postcode / Zip" value="{{$user->postcode}}">
                            </div>
                            <div class="col-md-12">
                                <label for="order-notes">Order Notes</label>
                                <textarea class="form-control" id="order-notes" va name="note" cols="30" rows="10"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>

                        <!-- Different Shipping Address -->
                        <div class="different-address mt-50">
                            <div class="mb-3 ship-different-title">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Ship to a same
                                        address?</label>
                                </div>
                            </div>
                            <div class="row shipping_input_field">
                                <div class="mb-3 col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="n_first_name" name="n_first_name"
                                        placeholder="First Name" value="{{$name[0]}}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="n_last_name" name="n_last_name"
                                        placeholder="Last Name" value="{{$name[1]}}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" class="form-control" id="n_email" name="n_email"
                                        placeholder="Email Address" value="{{$user->email}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="n_phone" name="n_phone" min="0"
                                        value="{{$user->phone}}" required>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="n_country" name="n_country"
                                        value="{{$user->n_country}}" placeholder="ex. Sénégal">
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="street_address">Street address</label>
                                    <input type="text" class="form-control" id="n_address" name="n_address"
                                        placeholder="Street Address" value="{{$user->n_address}}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="apartment_suite">Apartment/Suite/Unit</label>
                                    <input type="text" class="form-control" id="n_apartment" name="n_apartment"
                                        placeholder="Apartment, suite, unit etc" value="{{old('n_apartment')}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="city">Town/City</label>
                                    <input type="text" class="form-control" id="n_city" name="n_city"
                                        placeholder="Town/City" value="{{$user->n_city}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="n_state" name="n_state"
                                        placeholder="State" value="{{$user->n_state}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="number" class="form-control" id="n_postcode" name="n_postcode"
                                        placeholder="Postcode / Zip" value="{{$user->n_postcode}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="sub_total" value="{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()))}}">
                <input type="hidden" name="total_amount" value="{{Helper::currency_converter((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()))}}">
                {{-- @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                <input type="hidden" name="quantity" value="{{$item->qty}}">
                @endforeach --}}
                <div class="col-12">
                    <div class="checkout_pagination d-flex justify-content-end mt-50">
                        <a href="{{route('cart')}}" class="mt-2 ml-2 btn btn-primary">Go Back</a>
                        <button type="submit" class="mt-2 ml-2 btn btn-primary">Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Checkout Area -->

@endsection

@section('scripts')

<script>
    $('#customCheck1').on('change',function(e){
            e.preventDefault();
            if(this.checked){
                $('#n_first_name').val($('#first_name').val());
                $('#n_last_name').val($('#last_name').val());
                $('#n_email').val($('#email').val());
                $('#n_phone').val($('#phone').val());
                $('#n_country').val($('#country').val());
                $('#n_city').val($('#city').val());
                $('#n_postcode').val($('#postcode').val());
                $('#n_state').val($('#state').val());
                $('#n_address').val($('#address').val());
            }
            else{
                $('#n_first_name').val("");
                $('#n_last_name').val("");
                $('#n_email').val("");
                $('#n_phone').val("");
                $('#n_country').val("");
                $('#n_city').val("");
                $('#n_postcode').val("");
                $('#n_state').val("");
                $('#n_address').val("");
            }
        })
</script>

@endsection

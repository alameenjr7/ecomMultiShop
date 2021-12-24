@extends('frontend.layouts.master')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>My Account</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('messages.home')}}</a></li>
                    <li class="breadcrumb-item active">My Address</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- My Account Area -->
<section class="my-account-area section_padding_100_50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="my-account-navigation mb-50">
                    @include('frontend.user.sidebar')
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="my-account-content mb-50">
                    <p>The following addresses will be used on the checkout page by default.</p>

                    <div class="row">
                        <div class="mb-5 col-12 col-lg-6 mb-lg-0">
                            <h6 class="mb-3">Billing Address</h6>
                            @if(auth()->user()->address)
                                <address>
                                    {{$user->address}} <br>
                                    {{$user->state}}, {{$user->city}} <br>
                                    {{$user->country}} <br>
                                    {{$user->postcode}}
                                </address>
                            @else
                                <address>
                                    You have not set up this type of address yet.
                                </address>
                            @endif
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editAddress">Edit Address</a>

                            <!-- Modal -->
                            <div class="modal fade" id="editAddress" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false"
                                style="background: rgba(0, 0, 0, 0.5)">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{route('billing.address',$user->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <textarea name="address" class="form-control" id="address"
                                                        placeholder="ex. Liberte 6 etx.">{{$user->address}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Country</label>
                                                    <input name="country" class="form-control" id="country"
                                                        value="{{$user->country}}" placeholder="ex. Senegal">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <input name="city" class="form-control" id="city"
                                                        value="{{$user->city}}" placeholder="ex. Dakar">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Post code</label>
                                                            <input type="number" name="postcode" class="form-control" id="postcode"
                                                                value="{{$user->postcode}}" placeholder="ex. 00221">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">State</label>
                                                            <input name="state" class="form-control" id="state"
                                                                value="{{$user->state}}" placeholder="ex. state 1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                        <div class="col-12 col-lg-6">
                            <h6 class="mb-3">Shipping Address</h6>
                            @if(auth()->user()->n_address)
                                <address>
                                    {{$user->n_address}} <br>
                                    {{$user->n_state}}, {{$user->n_city}} <br>
                                    {{$user->n_country}} <br>
                                    {{$user->n_postcode}}
                                </address>
                            @else
                                <address>
                                    You have not set up this type of address yet.
                                </address>
                            @endif
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editShippingAddress">Edit Address</a>

                            <!-- Modal -->
                            <div class="modal fade" id="editShippingAddress" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false"
                                style="background: rgba(0, 0, 0, 0.5)">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Shipping Address
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{route('shipping.address',$user->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Shipping Address</label>
                                                    <textarea name="n_address" class="form-control" id="n_address"
                                                        placeholder="ex. Liberte 6 etx.">{{$user->n_address}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping Country</label>
                                                    <input name="n_country" class="form-control" id="n_country"
                                                        value="{{$user->n_country}}" placeholder="ex. Senegal">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shipping City</label>
                                                    <input name="n_city" class="form-control" id="n_city"
                                                        value="{{$user->n_city}}" placeholder="ex. Dakar">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Shipping Post code</label>
                                                            <input type="number" name="n_postcode" class="form-control"
                                                                id="n_postcode" value="{{$user->n_postcode}}"
                                                                placeholder="ex. 00221">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Shipping State</label>
                                                            <input name="n_state" class="form-control" id="n_state"
                                                                value="{{$user->n_state}}" placeholder="ex. state 1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account Area -->

@endsection

@section('styles')

<style>
    .footer_area{
        z-index: -1;
    }
</style>
@endsection

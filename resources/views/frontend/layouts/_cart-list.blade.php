<div class="col-12">
    <div class="cart-table">
        <div class="table-responsive">
            <table class="table table-bordered mb-30">
                <thead>
                    <tr>
                        <th scope="col"><i class="icofont-ui-delete"></i></th>
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
                            <th scope="row">
                                <i class="icofont-close cart_delete" data-id="{{$item->rowId}}"></i>
                            </th>
                            <td>
                                <img src="{{$item->model->photo}}" alt="Product">
                            </td>
                            <td>
                                <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>
                            </td>
                            <td>{{Helper::currency_converter($item->price)}}</td>
                            <td>
                                <div class="quantity">
                                    <input type="number" data-id="{{$item->rowId}}" class="qty-text" id="qty-input-{{$item->rowId}}" step="1" min="1" max="10" name="quantity" value="{{$item->qty}}">
                                    <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">
                                </div>
                            </td>
                            <td>{{Helper::currency_converter($item->subtotal())}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 col-lg-6">
    <div class="cart-apply-coupon mb-30">
        <h6>{{__('messages.HCP')}}</h6>
        <p>{{__('messages.EYCCH')}} &amp; {{__('messages.GAD')}}</p>
        <!-- Form -->
        <div class="coupon-form">
            <form action="{{route('coupon.add')}}" id="coupon-form" method="post">
                @csrf
                <input type="text" class="form-control" name="code" placeholder="Enter Your Coupon Code">
                <button type="submit" class="coupon-btn btn btn-primary">{{__('messages.applyC')}}</button>
            </form>
        </div>
    </div>
</div>

<div class="col-12 col-lg-5">
    <div class="cart-total-area mb-30">
        <h5 class="mb-3">{{__('messages.cartTotal')}}</h5>
        <div class="table-responsive">
            <table class="table mb-3">
                <tbody>
                    <tr>
                        <td>{{__('messages.subTotal')}}</td>
                        <td>{{Helper::currency_converter(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}</td>
                    </tr>
                    @if(\Illuminate\Support\Facades\Session::has('coupon'))
                        <tr>
                            <td>{{__('messages.saveA')}}</td>
                            <td>{{Helper::currency_converter(\Illuminate\Support\Facades\Session::get('coupon')['value'])}}

                            </td>
                        </tr>
                    @endif
                    {{-- <tr>
                        <td>VAT (18%)</td>
                        <td>$5.60</td>
                    </tr> --}}
                    @if (\Illuminate\Support\Facades\Session::has('coupon'))
                        <tr>
                            <td>Total</td>
                                <td>{{Helper::currency_converter(
                                    (float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']
                                )}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <a href="{{route('checkout1')}}" class="btn btn-primary d-block">{{__('messages.proCheck')}}</a>
    </div>
</div>

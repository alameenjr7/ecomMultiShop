<div class="single-product-area mb-30">
    <div class="product_image">
        <!-- Product Image -->
        @php
            $photo=explode(',',$product->photo)
        @endphp
        <img class="normal_img" src="{{asset($photo[0])}}" alt="{{$product->title}}">

        <!-- Product Badge -->
        <div class="product_badge">
            <span>{{$product->conditions}}</span>
            @if ($product->discount>0)
            <span class="mt-2">{{$product->discount}} %</span>
            @endif
        </div>

        <!-- Wishlist -->
        <div class="product_wishlist">
            <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$product->id}}"
                id="add_to_wishlist_{{$product->id}}"><i class="icofont-heart"></i></a>
        </div>

        <!-- Compare -->
        <div class="product_compare">
            <a href="javascript:void(0);" class="add_to_compare" data-id="{{$product->id}}" id="add_to_compare_{{$product->id}}"><i class="icofont-exchange"></i></a>
        </div>
    </div>

    <!-- Product Description -->
    <div class="product_description">
        <!-- Add to cart -->
        <div class="product_add_to_cart">
            <a href="javascript:void(0);" data-quantity="1" data-price="{{$product->offer_price}}" data-product-id="{{$product->id}}"
                class="add_to_cart" id="add_to_cart{{$product->id}}"><i class="icofont-shopping-cart"></i> Add to
                Cart</a>
        </div>

        <!-- Quick View -->
        <div class="product_quick_view">
            <a href="javascript:void(0);" data-target="#quickview{{$product->id}}" data-toggle="modal"><i class="icofont-eye-alt"></i>
                Quick View</a>
                {{-- data-target="#quickview{{$product->id}}"  --}}
        </div>

        <p class="brand_name">{{App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
        <a href="{{route('product.detail', $product->slug)}}">{{ucfirst($product->title)}}</a>
        @if ($product->discount>0)
            <h6 class="product-price">{{Helper::currency_converter($product->offer_price)}} <small><del
                class="text-danger">{{Helper::currency_converter($product->price)}} </del></small></h6>
        @else
            <h6 class="product-price">{{Helper::currency_converter($product->price)}}</h6>
        @endif
    </div>
    <div class="container">
        <!-- Quick View Modal Area -->
        @include('frontend.unuses._modal')
    </div>
</div>
<!-- Quick View Modal Area -->
{{-- <div class="modal fade" id="quickview{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="quickview"
    aria-hidden="true" data-backdrop="false" style="background: rgba(0,0,0,0.5);z-index:999999999999;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="quickview_pro_img">
                                    @php
                                    $photo=explode(',',$product->photo)
                                    @endphp
                                    <img class="first_img" src="{{asset($photo[0])}}" alt="{{$product->title}}">
                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span class="badge-new">{{$product->conditions}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="title">Boutique Silk Dress</h4>
                                    <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <h5 class="price">$120.99 <span>$130</span></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia
                                        expedita quibusdam aspernatur, sapiente consectetur accusantium
                                        perspiciatis praesentium eligendi, in fugiat?</p>
                                    <a href="#">View Full Product Details</a>
                                </div>
                                <!-- Add to Cart Form -->
                                <form class="cart" method="post">
                                    <div class="quantity">
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                            name="quantity" value="1">
                                    </div>
                                    <button type="submit" name="addtocart" value="5" class="cart-submit">Add to
                                        cart</button>
                                    <!-- Wishlist -->
                                    <div class="modal_pro_wishlist">
                                        <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                    </div>
                                    <!-- Compare -->
                                    <div class="modal_pro_compare">
                                        <a href="compare.html"><i class="icofont-exchange"></i></a>
                                    </div>
                                </form>
                                <!-- Share -->
                                <div class="share_wf mt-30">
                                    <p>Share with friends</p>
                                    <div class="_icon">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@section('scripts')
<script>
    $('#quickview').modal('show').css(
        {
            'margin-top':function(){
                return -($(this).height()/2)
            },
            'margin-left':function(){
                return -($(this).width()/2)
            }
        }
    )
</script>
@endsection


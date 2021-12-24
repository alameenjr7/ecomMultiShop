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


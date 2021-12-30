@if (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->count() <=0)
    <p class="text-center">{{__('messages.dontCompare')}}</p>
@else

<table class="table mb-0 table-bordered">
    <tbody>
        <tr>
            <td class="com-title">{{__('messages.proImage')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                @php
                    $photo=explode(',',$item->model->photo)
                @endphp

                <td class="com-pro-img">
                    <a href="{{route('product.detail',$item->model->slug)}}"><img src="{{asset($photo[0])}}" alt=""></a>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.proName')}}</td>

            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td><a href="{{route('product.detail',$item->model->slug)}}">{{ucfirst($item->name)}}</a></td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.rating')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td>
                    <div class="rating">
                        @for ($i=0;  $i<5;  $i++)
                            @if (round($item->model->reviews->avg('rate'))>$i)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-star-o" aria-hidden="true"></i>

                            @endif
                        @endfor
                    </div>
                </td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.price')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td>{{Helper::currency_converter($item->price)}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">Description</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
            <td>{!! html_entity_decode($item->model->summary) !!}</td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.category')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td>{{$item->model->category['title']}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.brand')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td>{{$item->model->brand['title']}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.available')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                @if ($item->model->stock>0)
                    <td class="instock">{{__('messages.instock')}}</td>
                @else
                    <td class="outofstock">{{__('messages.outStock')}}</td>
                @endif
            @endforeach
        </tr>
        <tr>
            <td class="com-title">{{__('messages.size')}}</td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td>{{$item->model->size}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="com-title"></td>
            @foreach (Gloudemans\Shoppingcart\Facades\Cart::instance('compare')->content() as $item)
                <td class="action">
                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="mb-1 compare_addTocart move-to-cart"><i class="icofont-shopping-cart"></i></a>
                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="mb-1 compare_addWishlist move-to-wishlist"><i class="icofont-heart"></i></a>
                    <a href="javascript:void(0);" data-id="{{$item->rowId}}" class="mb-1 remove_from_compare delete-compare"><i class="icofont-close"></i></a>
                </td>
            @endforeach
        </tr>
    </tbody>
</table>
@endif

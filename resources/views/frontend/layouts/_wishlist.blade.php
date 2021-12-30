<table class="table table-bordered mb-30">
    <thead>
        <tr>
            <th scope="col"><i class="icofont-ui-delete wishlist_delete" ></i></th>
            <th scope="col">Image</th>
            <th scope="col">{{__('messages.product')}}</th>
            <th scope="col">{{__('messages.unPrice')}}</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()>0)

            @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)

                <tr>
                    <th scope="row">
                        <i class="icofont-close wishlist_delete" data-id="{{$item->rowId}}"></i>
                    </th>
                    <td>
                        <img src="{{$item->model->photo}}" alt="Product">
                    </td>
                    <td>
                        <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>
                    </td>
                    <td>{{Helper::currency_converter($item->price)}}</td>

                    <td><a href="javascript:void(0);" data-id="{{$item->rowId}}" class="move-to-cart btn btn-primary btn-sm">{{__('messages.addToCart')}}</a></td>
                </tr>

            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">
                    {{__('messages.dontProduct')}}
                </td>
            </tr>
        @endif
    </tbody>
</table>


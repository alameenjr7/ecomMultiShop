@extends('backend.layouts.master')

@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Order</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Views</li>
                            <li class="breadcrumb-item active">Order view</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Color Pickers -->
            <div class="clearfix row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Payment Methode</th>
                                            <th>Condition</th>
                                            <th>Order Status</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->payment_method == 'cod' ? 'Cash on Delivery' : $order->payment_method }}
                                            </td>
                                            @if ($order->condition == 'pending')
                                                <td><span class="badge badge-info">{{ ucfirst($order->condition) }}</span>
                                                </td>
                                            @elseif ($order->condition=='processing')
                                                <td><span
                                                        class="badge badge-warning">{{ ucfirst($order->condition) }}</span>
                                                </td>
                                            @elseif ($order->condition=='delivered')
                                                <td><span
                                                        class="badge badge-primary">{{ ucfirst($order->condition) }}</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge badge-danger">{{ ucfirst($order->condition) }}</span>
                                                </td>
                                            @endif
                                            @if ($order->payment_status == 'paid')
                                                <td><span
                                                        class="badge badge-success">{{ ucfirst($order->payment_status) }}</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge badge-danger">{{ ucfirst($order->payment_status) }}</span>
                                                </td>
                                            @endif
                                            <td>{{ Helper::currency_converter($order->total_amount) }}</td>
                                            <td style="text-align: center;">
                                                <div class="row">
                                                    <a href="{{ route('order.facture',$order->id) }}"
                                                        data-target="#userID{{ $order->id }}" data-toggle="tooltip"
                                                        title="View facture"
                                                        class="float-left ml-1 btn btn-sm btn-outline-secondary"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{route('order.pdf',$order->id)}}" title="Download facture"
                                                        class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="table-responsive">
                                <table class="table mt-4 table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th>Product Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $item->photo }}" style="max-width:100px;">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ Helper::currency_converter($item->offer_price) }}</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                <td>{{ Helper::currency_converter($item->offer_price * $item->pivot->quantity) }}</td>
                                            </tr>
                                        @empty
                                            <td colspan="6" class="text-center">No orders</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">

                            </div>
                            {{-- <div class="py-3 border col-5">
                                <p>
                                    <strong>Subtotal</strong>: {{ number_format($order->sub_total, 2) }}
                                </p>
                                @if ($order->delivery_charge > 0)
                                    <p>
                                        <strong>Shipping</strong>: {{ number_format($order->sub_total, 2) }}
                                    </p>
                                @endif
                                @if ($order->delivery_charge > 0)
                                    <p>
                                        <strong>Coupon</strong>: {{ number_format($order->sub_total, 2) }}
                                    </p>
                                @endif
                                <p>
                                    <strong>Total</strong>: {{ number_format($order->sub_total, 2) }}
                                </p>

                                <form action="{{ route('order.status') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <strong>Status</strong>
                                    <select name="condition" class="form-control" id="">
                                        <option value="pending"
                                            {{                                             $order->condition == 'delivered' || $order->condition == 'cancellation' ? 'disabled' : '' }}
                                            {{ $order->condition == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing"
                                            {{                                             $order->condition == 'delivered' || $order->condition == 'cancellation' ? 'disabled' : '' }}
                                            {{ $order->condition == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="delivered" {{ $order->condition == 'cancellation' ? 'disabled' : '' }}
                                            {{ $order->condition == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancellation" {{ $order->condition == 'delivered' ? 'disabled' : '' }}
                                            {{ $order->condition == 'cancellation' ? 'selected' : '' }}>Cancellation</option>
                                    </select>
                                    <button class="mt-2 btn btn-sm btn-success">Valider</button>
                                </form>
                            </div> --}}
                            <div class="border col-12 col-lg-5">
                                <div class="cart-total-area mb-30">
                                    <div class="table-responsive">
                                        <table class="table mb-3">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td>{{ Helper::currency_converter($order->sub_total) }}</td>
                                                </tr>
                                                @if ($order->delivery_charge > 0)
                                                    <tr>
                                                        <td>Delivery Charge</td>
                                                        <td>{{ Helper::currency_converter($order->delivery_charge) }}</td>
                                                    </tr>
                                                @endif
                                                @if ($order->coupon > 0)
                                                    <tr>
                                                        <td>Coupon</td>
                                                        <td>{{ Helper::currency_converter($order->coupon) }}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>Total</td>
                                                    <td>{{ Helper::currency_converter($order->sub_total) }}</td>
                                                </tr>
                                            </tbody>
                                            <tbody>

                                                <form action="{{ route('order.status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td style="width: 30%">
                                                            <select name="condition" class="form-control" id="">
                                                                <option value="pending"
                                                                    {{ $order->condition == 'delivered' || $order->condition == 'cancellation' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'pending' ? 'selected' : '' }}>Pending
                                                                </option>
                                                                <option value="processing"
                                                                    {{ $order->condition == 'delivered' || $order->condition == 'cancellation' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'processing' ? 'selected' : '' }}>Processing
                                                                </option>
                                                                <option value="delivered"
                                                                    {{ $order->condition == 'cancellation' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'delivered' ? 'selected' : '' }}>Delivered
                                                                </option>
                                                                <option value="cancellation"
                                                                    {{ $order->condition == 'delivered' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'cancellation' ? 'selected' : '' }}>Cancellation
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><button class="mt-2 btn btn-sm btn-success">Valider</button>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success"
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    </script>
@endsection

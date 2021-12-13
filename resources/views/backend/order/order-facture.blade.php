@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Users
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Order</li>
                        {{-- <li class="breadcrumb-item active">Add users</li> --}}
                    </ul>
                    <p class="float-right"> Total Orders : {{\App\Models\Order::count()}}</p>
                </div>
            </div>
        </div>
        <div class="block-header">
            <div class="row">
                <div class="col-md-9">
                    <div class="card" style="min-width: 135%">
                        <div class="body" >
                            <div class="table-responsive">
                                <div id="invoice">
                                    {{-- <div class="toolbar hidden-print">
                                        <div class="text-right">
                                            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i>
                                                Print</button>
                                            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as
                                                PDF</button>
                                        </div>
                                        <hr>
                                    </div> --}}
                                    <div class="overflow-auto invoice" id="invoice">
                                        <div style="min-width: 600px">
                                            <header>
                                                <div class="row">
                                                    <div class="col">
                                                        <a target="_blank" href="https://lobianijs.com">
                                                            <img src="{{asset('frontend/assets/img/core-img/logo.png')}}"
                                                                data-holder-rendered="true" />
                                                        </a>
                                                    </div>
                                                    <div class="col company-details">
                                                        <h2 class="name">
                                                            <a target="_blank" href="https://kaay-deals.com">
                                                                KAAY-DEALS
                                                            </a>
                                                        </h2>
                                                        <div>Liberte 6 Ext., Dakar, SN</div>
                                                        <div>(+221) 772050626</div>
                                                        <div>kaaydeals@gmail.com</div>
                                                    </div>
                                                </div>
                                            </header>
                                            <main>
                                                <div class="row contacts">
                                                    <div class="col invoice-to">
                                                        <div class="text-gray-light">INVOICE TO:</div>
                                                        <h2 class="to">{{$order->first_name}} {{$order->last_name}}</h2>
                                                        <div class="address">{{$order->address}}</div>
                                                        <div class="email"><a
                                                                href="mailto:{{$order->email}}">{{$order->email}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col invoice-details">
                                                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                                        <div class="date">Date of Invoice: {{\Carbon\Carbon::parse($order->created_at)->format(' d/m/y')}}</div>
                                                        <div class="date">Due Date: {{\Carbon\Carbon::now()->format(' d/m/y')}}</div>
                                                    </div>
                                                </div>
                                                <table class="border cellspacing=0 cellpadding=0">
                                                    <thead class="table-border">
                                                        <tr>
                                                            <th>#</th>
                                                            {{-- <th class="text-left">DESCRIPTION</th> --}}
                                                            <th colspan="2" class="text-left">TITLE</th>
                                                            <th class="text-right">Unit PRICE</th>
                                                            <th class="text-right">QUANTITY</th>
                                                            <th class="text-right">TOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->products as $item)
                                                            <tr>
                                                                <td class="no">{{$loop->iteration}}</td>
                                                                {{-- <td class="text-left">
                                                                    <a target="_blank"
                                                                        href="#">
                                                                        <img src="{{$item->photo}}" alt="" style="width: 60px;heigth:60px;">
                                                                    </a>
                                                                </td> --}}
                                                                <td colspan="2">{{$item->title}}</td>
                                                                <td class="unit">{{Helper::currency_converter($item->offer_price)}}</td>
                                                                <td class="qty">{{$item->pivot->quantity}}</td>
                                                                <td class="total">{{Helper::currency_converter($item->offer_price * $item->pivot->quantity)}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td colspan="2">SUBTOTAL</td>
                                                            <td>{{Helper::currency_converter($order->sub_total)}}</td>
                                                        </tr>
                                                        @if ($order->delivery_charge>0)
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td colspan="2">DELIVERY CHARGE</td>
                                                                <td>{{Helper::currency_converter($order->delivery_charge)}}</td>
                                                            </tr>
                                                        @endif
                                                        @if ($order->coupon>0)
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td colspan="2">COUPON</td>
                                                                <td>{{Helper::currency_converter($order->coupon)}}</td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td colspan="2">GRAND TOTAL</td>
                                                            <td>{{Helper::currency_converter($order->total_amount)}}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="thanks">Thank you!</div>
                                                <div class="notices">
                                                    <div>NOTICE:</div>
                                                    <div class="notice">A finance charge of 1.5% will be made on unpaid
                                                        balances after 30 days.</div>
                                                </div>
                                            </main>
                                            <footer>
                                                Invoice was created on a computer and is valid without the signature and
                                                seal.
                                            </footer>
                                        </div>
                                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#printInvoice').click(function(){
        Popup($('.invoice')[0].otherHTML);
        function Popup(data)
        {
            window.print('.invoice');
            return true;
        }
    });
</script>
@endsection

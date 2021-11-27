<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout1()
    {
        $user=Auth::user();
        return view('frontend.pages.checkout.checkout1',compact('user'));
    }

    public function checkout2()
    {
        $user=Auth::user();
        return view('frontend.pages.checkout.checkout2',compact('user'));
    }

    public function checkout3()
    {
        $user=Auth::user();
        return view('frontend.pages.checkout.checkout3',compact('user'));
    }

    public function checkout4()
    {
        $user=Auth::user();
        return view('frontend.pages.checkout.checkout4',compact('user'));
    }

    public function checkoutComplete($order)
    {
        $user=Auth::user();
        $order=$order;
        return view('frontend.pages.checkout.checkout-complete',compact(['user','order']));
    }

    public function checkout1Store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'email'=>'email|required|exists:users,email',
            'phone'=>'string|required',
            'address'=>'string|required',
            'city'=>'string|required',
            'country'=>'string|nullable',
            'state'=>'string|nullable',
            'postcode'=>'numeric|nullable',
            'apartment'=>'string|nullable',
            'note'=>'string|nullable',
            'n_first_name'=>'string|nullable',
            'n_last_name'=>'string|nullable',
            'n_phone'=>'string|nullable',
            'n_address'=>'string|nullable',
            'n_country'=>'string|nullable',
            'n_city'=>'string|nullable',
            'n_state'=>'string|nullable',
            'n_postcode'=>'numeric|nullable',
            'n_apartment'=>'string|nullable',
            'sub_total'=>'required',
            'total_amount'=>'required',
        ]);
        // return $request->all();
        Session::put('checkout',[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'country'=>$request->country,
            'city'=>$request->city,
            'state'=>$request->state,
            'postcode'=>$request->postcode,
            'apartment'=>$request->apartment,
            'note'=>$request->note,
            'n_first_name'=>$request->n_first_name,
            'n_last_name'=>$request->n_last_name,
            'n_email'=>$request->n_email,
            'n_phone'=>$request->n_phone,
            'n_address'=>$request->n_address,
            'n_country'=>$request->n_country,
            'n_city'=>$request->n_city,
            'n_state'=>$request->n_sate,
            'n_postcode'=>$request->n_postcode,
            'n_apartment'=>$request->n_apartment,
            'sub_total'=>$request->sub_total,
            'total_amount'=>$request->total_amount,
            'quantity'=>$request->quantity,
        ]);

        $shippings=Shipping::where('status','active')->orderBy('shipping_address','ASC')->get();

        return view('frontend.pages.checkout.checkout2',compact('shippings'));
    }

    public function checkout2Store(Request $request)
    {
        $this->validate($request,[
            'delivery_charge'=>'nullable|numeric',
        ]);

        Session::push('checkout',[
            'delivery_charge'=>$request->delivery_charge,
        ]);
        return view('frontend.pages.checkout.checkout3');
    }

    public function checkout3Store(Request $request)
    {
        $this->validate($request,[
            'payment_method'=>'string|required',
            'payment_status'=>'string|in:paid,unpaid',
        ]);

        Session::push('checkout',[
            'payment_method'=>$request->payment_method,
            'payment_status'=>'paid',
        ]);
        // return Session::get('checkout');
        return view('frontend.pages.checkout.checkout4');
    }

    public function checkoutStore(Request $request)
    {
        $order=new Order();
        $order['user_id']=auth()->user()->id;
        $order['order_number']=Str::upper('ORD-'.Str::random(6));
        $order['sub_total']=(float) str_replace(',','',Session::get('checkout')['sub_total']);
        if(Session::has('coupon')){
            $order['coupon']=Session::get('coupon')['value'];
        }
        else{
            $order['coupon']=0;
        }

        $order['total_amount']=(float) str_replace(',','',Session::get('checkout')['sub_total'])+Session::get('checkout')[0]['delivery_charge']-$order['coupon'];


        $order['payment_method']=Session::get('checkout')['1']['payment_method'];
        $order['payment_status']=Session::get('checkout')['1']['payment_status'];
        $order['condition']='pending';
        $order['delivery_charge']=Session::get('checkout')['0']['delivery_charge'];
        $order['first_name']=Session::get('checkout')['first_name'];
        $order['last_name']=Session::get('checkout')['last_name'];
        $order['email']=Session::get('checkout')['email'];
        $order['phone']=Session::get('checkout')['phone'];
        $order['country']=Session::get('checkout')['country'];
        $order['city']=Session::get('checkout')['city'];
        $order['address']=Session::get('checkout')['address'];
        $order['state']=Session::get('checkout')['state'];
        $order['apartment']=Session::get('checkout')['apartment'];
        $order['postcode']=Session::get('checkout')['postcode'];
        $order['note']=Session::get('checkout')['note'];
        $order['n_first_name']=Session::get('checkout')['n_first_name'];
        $order['n_last_name']=Session::get('checkout')['n_last_name'];
        $order['n_email']=Session::get('checkout')['n_email'];
        $order['n_phone']=Session::get('checkout')['n_phone'];
        $order['n_country']=Session::get('checkout')['n_country'];
        $order['n_city']=Session::get('checkout')['n_city'];
        $order['n_address']=Session::get('checkout')['n_address'];
        $order['n_state']=Session::get('checkout')['n_state'];
        $order['n_apartment']=Session::get('checkout')['n_apartment'];
        $order['n_postcode']=Session::get('checkout')['n_postcode'];

        $status=$order->save();

        foreach(Cart::instance('shopping')->content() as $item)
        {
            $product_id[]=$item->id;
            $product=Product::find($item->id);
            $quantity=$item->qty;
            $order->products()->attach($product,['quantity'=>$quantity]);
        }

        if($status){
            // Mail::to($order['email'])->bcc($order['n_email'])->cc('ngomalameen90@gmail.com')->send(new OrderMail($order));
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('checkout.complete',$order['order_number'])->with('success','Successfully completed order - Can you verified your email address');
        }
        else{
            return redirect()->route('checkout1')->with('error','Please try again');
        }
    }
}

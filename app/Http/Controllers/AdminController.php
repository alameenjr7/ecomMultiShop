<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        $orders=Order::orderBy('id','DESC')->get();
        $order_sales=Order::select(DB::raw("SUM(total_amount) as total"),DB::raw("YEAR(created_at) year"))->where('payment_status','paid')->groupBy('year')->latest()->paginate(1);
        // dd($order_sales);
        return view('backend.index',compact('orders','order_sales'));
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){

        // List Orders
        $orders=Order::orderBy('id','DESC')->get();

        // Sales Report Annual
        $order_sales= Order::select(
            DB::raw('year(created_at) as year'),
            DB::raw('sum(total_amount) as total'),
        )
        ->where(DB::raw('date(created_at)'),'>=',Carbon::now()->subYear())
        ->where('condition','delivered')->whereYear('created_at', date('Y', strtotime('0 year')))
        ->groupBy('year')->get();
        $data= "";
        foreach($order_sales as $val){
            $data.=$val->total;
        }
        $chartData1 = $data;

        // Annual Revenue
        $annuals_revenues = Order::sum('total_amount');

        // Income Analysis
        $sales_monthly = DB::select(DB::raw("SELECT SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND DATE(created_at) BETWEEN CURRENT_DATE - INTERVAL 5 DAY AND CURRENT_DATE GROUP BY DATE(created_at) ORDER BY DATE(created_at)"));
        $data= "";
        foreach($sales_monthly as $val){
            $data.="$val->total,";
        }
        $chartData = $data;

        //Annual Sales Graphics
        $sales_annuals=Order::select(DB::raw("YEAR(created_at) year"),DB::raw("SUM(total_amount) as sales"))->where('condition','delivered')->where('payment_status','paid')->groupBy('year')->get()->toArray();
        // dd($sales_annuals);
        $json = json_encode($sales_annuals );

        //Annual Sales Graphics
        $rev_annuals=Product::select(DB::raw("YEAR(created_at) year"),DB::raw("SUM(offer_price) as revenue"))->where('status','active')->groupBy('year')->get()->toArray();
        // dd($rev_annuals);
        $json1 = json_encode($rev_annuals );

        //Precedent month
        $sales_precedent_monthly = DB::select(DB::raw("SELECT MONTH(`created_at`) AS month, SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND YEAR(`created_at`) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(`created_at`) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY MONTH(created_at) ORDER BY MONTH(created_at)"));
        $data= "";
        foreach($sales_precedent_monthly as $val){
            $data.="$val->total,";
        }
        $chartData2 = $data;

        //Actual month
        $sales_actual_monthly = DB::select(DB::raw("SELECT MONTH(`created_at`) AS month, SUM(total_amount) AS total FROM orders WHERE `condition`='delivered' AND YEAR(`created_at`) = YEAR(CURRENT_DATE - INTERVAL 0 MONTH) AND MONTH(`created_at`) = MONTH(CURRENT_DATE - INTERVAL 0 MONTH) GROUP BY MONTH(created_at) ORDER BY MONTH(created_at)"));
        $data= "";
        foreach($sales_actual_monthly as $val){
            $data.="$val->total,";
        }
        $chartData3 = $data;

        //different percent 2 last month
        $percent_monthPre= "";
        if($percent_monthPre != 0)
            $percent_monthPre = number_format((float) str_replace(',','',$chartData2)/(float) str_replace(',','',$chartData1) * 100,2);
        else
            $percent_monthPre = 0;


        $percent_monthAc= "";
        if($percent_monthAc != 0)
            $percent_monthAc = number_format((float) str_replace(',','',$chartData3)/(float) str_replace(',','',$chartData1) * 100,2);
        else
            $percent_monthAc = 0;


        $diff_percent= "";
        if($diff_percent != 0)
            $diff_percent = $percent_monthAc-$percent_monthPre;
        else
            $diff_percent = 0;

        // Sales Income Overall
        $salesIncomeOverall  = Order::select(DB::raw('SUM(total_amount) as total'),)->where('condition','delivered')->get();
        $data= "";
        foreach($salesIncomeOverall as $val){
            $data.=$val->total;
        }
        $chartData4 = $data;

        //count total product
        $total_productMonth = Product::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count();
        $total_product=Product::where('status','active')->count();


        //Last customers
        $lastCustomer=User::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count();
        $totalCustomer=User::where('status','active')->count();


        return view('backend.index',compact(
            'orders',
            'annuals_revenues',
            'chartData1',
            'json',
            'chartData',
            'chartData2',
            'chartData3',
            'diff_percent',
            'chartData4',
            'total_productMonth',
            'total_product',
            'lastCustomer',
            'totalCustomer',
            'json1'
        ));
    }
}
// SELECT MONTH(`created_at`), SUM(total_amount) FROM orders WHERE `condition`='delivered' GROUP BY MONTH(created_at) ORDER BY MONTH(created_at)

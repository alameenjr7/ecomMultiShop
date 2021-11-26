<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function home()
    {
        $banners=Banner::where(['status'=>'active','condition'=>'banner'])
            ->orderBy('id','desc')->limit('5')
            ->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])
            ->orderBy('id','desc')->limit('3')
            ->get();
        return view('frontend.index', compact(['banners', 'categories']));
    }

    //Shop
    public function shop(Request $request)
    {
        $products=Product::query();

        //category filter
        if(!empty($_GET['category']))
        {
            $slug=explode(',',$_GET['category']);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $products=$products->whereIn('cat_id',$cat_ids);
        }

        //brand filter
        if(!empty($_GET['brand']))
        {
            $slug=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $products=$products->whereIn('brand_id',$brand_ids);
        }

        //size filter
        if(!empty($_GET['size']))
        {
            $products=$products->where('size',$_GET['size']);
        }

        if(!empty($_GET['sortBy']))
        {
            if($_GET['sortBy']=='priceAsc'){
                $products=$products->where(['status'=>'active'])->orderBy('offer_price','ASC');
            }
            if($_GET['sortBy']=='priceDesc'){

                $products=$products->where(['status'=>'active'])->orderBy('offer_price','DESC');
            }
            if($_GET['sortBy']=='discAsc'){

                $products=$products->where(['status'=>'active'])->orderBy('price','ASC');
            }
            if($_GET['sortBy']=='discDesc'){

                $products=$products->where(['status'=>'active'])->orderBy('price','DESC');
            }
            if($_GET['sortBy']=='titleAsc'){

                $products=$products->where(['status'=>'active'])->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='titleDesc'){

                $products=$products->where(['status'=>'active'])->orderBy('title','DESC');
            }
        }
        if(!empty($_GET['price']))
        {
            $price=explode('-',$_GET['price']);
            $price[0]=floor($price[0]);
            $price[1]=ceil($price[1]);
            $products=$products->whereBetween('offer_price',$price)->where('status','active')->paginate(12);
        }
        else
        {
            $products=$products->where('status','active')->paginate(12);
        }

        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats=Category::where(['status'=>'active','is_parent'=>1])->with('products')->orderBy('title','ASC')->get();
        return view('frontend.pages.product.shop',compact('products','cats','brands'));
    }

    //shop filters
    public function shopFilter(Request $request)
    {
        $data=$request->all();

        //category filter
        $catUrl='';
        if(!empty($data['category']))
        {
            foreach($data['category'] as $category){
                if(empty($catUrl)){
                    $catUrl .='&category='.$category;
                }
                else{
                    $catUrl .=','.$category;
                }
            }
        }

        //sort filter
        $sortByUrl="";
        if(!empty($data['sortBy']))
        {
            $sortByUrl.='&sortBy='.$data['sortBy'];
        }

        //price filter
        $price_range_Url="";
        if(!empty($data['price_range']))
        {
            $price_range_Url.='&price='.$data['price_range'];
        }

        //brand filter
        $brand_Url="";
        if(!empty($data['brand']))
        {
            foreach($data['brand'] as $brand){
                if(empty($brand_Url)){
                    $brand_Url .='&brand='.$brand;
                }
                else{
                    $brand_Url .=','.$brand;
                }
            }
        }

        //size filter
        $sizeUrl="";
        if(!empty($data['size'])){
            $sizeUrl.='&size='.$data['size'];
        }

        // dd($price_range_Url);
        return \redirect()->route('shop',$catUrl.$sortByUrl.$price_range_Url.$brand_Url.$sizeUrl);
    }

    //auto-search
    public function autoSearch(Request $request)
    {
        $query=$request->get('term','');
        $products=Product::where('title','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach($products as $product){
            $data[]=array('value'=>$product->title,'id'=>$product->id);
        }
        if(count($data)){
            return $data;
        }
        else{
            return ['value'=>'No Result Found','id'=>''];
        }
    }

    //search
    public function search(Request $request)
    {
        $query=$request->input('query');
        $products=Product::where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(12);
        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $cats=Category::where(['status'=>'active','is_parent'=>1])->with('products')->orderBy('title','ASC')->get();

        return view('frontend.pages.product.shop',compact('products','cats','brands'));
    }

    // Product category
    public function productCategory(Request $request,$slug)
    {
        $categories=Category::with(['products'])->where('slug',$slug)->first();

        $sort='';

        if($request->sort!=null){
            $sort=$request->sort;
        }
        if($categories==null){
            return view('errors.404');
        }
        else{
            if($sort=='priceAsc'){
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','ASC')->paginate(12);
            }
            elseif($sort=='priceDesc'){

                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','DESC')->paginate(12);
            }
            elseif($sort=='discAsc'){

                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','ASC')->paginate(12);
            }
            elseif($sort=='discDesc'){

                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','DESC')->paginate(12);
            }
            elseif($sort=='titleAsc'){

                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(12);
            }
            elseif($sort=='titleDesc'){

                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(12);
            }
            else{
                $products=Product::where(['status'=>'active','cat_id'=>$categories->id])->paginate(12);
            }
        }
        $route='product-category';

        if($request->ajax()){
            $view=view('frontend.layouts._single-product',compact('products'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('frontend.pages.product.product-category', compact(['categories','route','products']));
    }

    //Product detail
    public function productDetail($slug)
    {
        $product=Product::with('rel_prods')->where('slug',$slug)->first();
        // return $product;
        if($product){
            return view('frontend.pages.product.product-detail',compact('product'));
        }
        else{
            return 'Product detail not found';
        }
    }

    //user auth
    public function userAuth()
    {
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.auth');
    }

    //Login
    public function loginSubmit(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:8',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active'])){
            Session::put('user',$request->email);

            if(Session::get('url.intended')){
                return Redirect::to(Session::get('url.intended'));
            }
            else{
                return redirect()->route('home')->with('success','Successfully login');
            }
        }
        else{
            return back()->with('error', 'Invalid email & password!');
        }
    }

    //register
    public function registerSubmit(Request $request)
    {
        $this->validate($request,[
            'username'=>'string|nullable|unique:users,username',
            'full_name'=>'required|string',
            'email'=>'email|required|unique:users,email',
            'password'=>'required|min:8|confirmed',
        ]);
        $data=$request->all();
        $check=$this->create($data);
        Session::put('user',$data['email']);
        Auth::login($check);
        if($check){
            return redirect()->route('home')->with('success', 'Successfully register');
        }
        else{
            return back()->with('error',['Please check your credentials']);
        }
    }

    private function create(array $data)
    {
        return User::create([
            'full_name'=>$data['full_name'],
            'username'=>$data['username'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
    }

    //user logout
    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return \redirect()->home()->with('success','Successfully');
    }

    //user dashboard
    public function userDashboard()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.user.dashboard',compact('user'));
    }

    public function userOrder()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.user.order',compact('user'));
    }

    public function userAccount()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.user.account',compact('user'));
    }

    public function userAddress()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.user.address',compact('user'));
    }

    public function blogDetail()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.pages.blog.single-blog',compact('user'));
    }

    public function contacts()
    {
        $user=Auth::user();
        // dd($user);
        return view('frontend.pages.contact.contact',compact('user'));
    }

    public function billingAddress(Request $request,$id)
    {
        $user=User::where('id',$id)->update([
                'country'=>$request->country,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'address'=>$request->address,
                'state'=>$request->state
            ]);
        if($user){
            return back()->with('success','Address Successfully Updated');
        }
        else{
            return back()->with('error','Something when wrong');
        }
    }

    public function shippingAddress(Request $request,$id)
    {
        $user=User::where('id',$id)->update([
            'n_country'=>$request->n_country,
            'n_city'=>$request->n_city,
            'n_postcode'=>$request->n_postcode,
            'n_address'=>$request->n_address,
            'n_state'=>$request->n_state
        ]);
        if($user){
            return back()->with('success','Shipping Address Successfully Updated');
        }
        else{
            return back()->with('error','Something when wrong');
        }
    }

    public function updateAccount(Request $request,$id)
    {
        $this->validate($request,[
            'newpassword'=>'nullable|min:8',
            'oldpassword'=>'nullable|min:8',
            'full_name'=>'required|string',
            'username'=>'nullable|string',
            'phone'=>'nullable|min:9',
        ]);
        $hashpassword=Auth::user()->password;

        if($request->oldpassword==null && $request->newpassword == null){
            User::where('id',$id)->update([
                'full_name'=>$request->full_name,
                'username'=>$request->username,
                'phone'=>$request->phone,
            ]);
            return back()->with('success','Successfully Updated');
        }
        else{
            if(Hash::check($request->oldpassword, $hashpassword)){
                if(!Hash::check($request->newpassword, $hashpassword)){
                    User::where('id',$id)->update([
                        'full_name'=>$request->full_name,
                        'username'=>$request->username,
                        'phone'=>$request->phone,
                        'password'=>Hash::make($request->newpassword),
                    ]);
                    return back()->with('success','Successfully Updated');
                }
                else{
                    return back()->with('error','New password can not be same with old password');
                }
            }
            else{
                return back()->with('error','Old password does not match');
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function calendar()
    {
        $user=auth('admin')->user();
        return view('backend.pages.calendar',compact('user'));
    }

    public function messages()
    {
        $user=auth('admin')->user();
        return view('backend.pages.messages',compact('user'));
    }

    public function profile()
    {
        $user=auth('admin')->user();
        return view('backend.pages.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $admin=ModelsAdmin::first();
        $status=$admin->update([
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$request->photo,
        ]);
        $status=$admin->fill($request->all());
        if($status){
            return back()->with('success','Admin successfully updated');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
}

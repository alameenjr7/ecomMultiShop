<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings(){
        $setting=Setting::first();
        return view('backend.settings.settings',compact('setting'));
    }

    public function settingsUpdate(Request $request){
        $setting=Setting::first();
        $status=$setting->update([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'favicon'=>$request->favicon,
            'logo'=>$request->logo,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'footer'=>$request->footer,
            'fax'=>$request->fax,
            'facebook_url'=>$request->facebook_url,
            'twitter_url'=>$request->twitter_url,
            'linkedin_url'=>$request->linkedin_url,
            'instagram_url'=>$request->instagram_url,
            'snapchat_url'=>$request->snapchat_url,
            'pinterest_url'=>$request->pinterest_url,
            'playStore_url'=>$request->playStore_url,
            'appStore_url'=>$request->appStore_url,
            'youtube_url'=>$request->youtube_url,
        ]);
        $status=$setting->fill($request->all());
        if($status){
            return back()->with('success','Setting successfully updated');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
}

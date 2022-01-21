<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;

class SettingController extends Controller
{
   
    public function index()
    {
        $site_settings = Setting::first();
        return view('admin.setting.setting_index', compact('site_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site_settings = Setting::first();
        return view('admin.setting.setting_form', compact('site_settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'site_title' => 'required|string|max:150',
            'site_logo' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
            'office_address' => 'required|string|max:255',
            'office_contact' => 'required|string|max:255',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'dribble_link' => 'nullable|string',
            'github_link' => 'nullable|string',
        ]);
        $setting = new Setting;
        $setting->site_title = $data['site_title'];
        $setting->office_address = $data['office_address'];
        $setting->office_contact = $data['office_contact'];
        $setting->facebook_link = $data['facebook_link'];
        $setting->twitter_link = $data['twitter_link'];
        $setting->linkedin_link = $data['site_title'];
        $setting->dribble_link = $data['dribble_link'];
        $setting->github_link = $data['github_link'];
        if ($image = $request->file('site_logo')) {
            $imageDestinationPath = 'uploads/settings';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $setting->site_logo = "$postImage";
        }

        $setting->save();
        Session::flash('success_message', 'Setting saved successfully.');
        return redirect()->route('setting_index');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $validateData = $request->validate([
            'site_title' => 'required|string',
            'site_logo' => 'nullable',
            'office_address' => 'nullable|string',
            'office_contact' => 'nullable|string',
            'facebook_link' => 'nullable|string',
            'twitter_link' => 'nullable|string',
            'linkedin_link' => 'nullable|string',
            'dribble_link' => 'nullable|string',
            'github_link' => 'nullable|string',
        ]);
        $setting = Setting::findOrFail($id);
        $setting->site_title = $data['site_title'];
        $setting->office_address = $data['office_address'];
        $setting->office_contact = $data['office_contact'];
        $setting->facebook_link = $data['facebook_link'];
        $setting->twitter_link = $data['twitter_link'];
        $setting->linkedin_link = $data['site_title'];
        $setting->dribble_link = $data['dribble_link'];
        $setting->github_link = $data['github_link'];
        if ($image = $request->file('site_logo')) {
            $imageDestinationPath = 'uploads/settings';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $setting->site_logo = "$postImage";
        }

        $status = $setting->save();
        if($status){
            Session::flash('success_message', 'Setting updated successfully.');
            return redirect()->route('setting_index');
        }else{
            Session::flash('error_message', 'Sorry ! there was problem while updating settings');
            return redirect()->route('setting_index');
        }
      
    }
    
}

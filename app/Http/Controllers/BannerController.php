<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
 
 

class BannerController extends Controller
{
    public function index(){
        $banner_info = Banner::latest()->get();
        return view('admin.banner.banner_index', compact('banner_info'));

    }

    public function create(){
        return view('admin.banner.banner_form');

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'banner_image' => 'required|image|max:1000',
        ]);
        $banner = new Banner;
        $banner->title = $data['title'];
        $banner->description = $data['description'];
        if ($image = $request->file('banner_image')) {
            $imageDestinationPath = 'uploads/banner/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $banner->banner_image = "$postImage";
        }
       
        $banner->save();
        Session::flash('success_message', 'Banner saved successfully.');
        return redirect()->route('banner_index');

    }

    public function edit_banner($id){
        $banner = Banner::findOrFail($id);
        return view('admin.banner.banner_form', compact('banner'));

    }

    public function update_banner(Request $request, $id){
        $banner = Banner::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'banner_image' => 'nullable|image|max:1000',
        ]);
        $banner->title = $data['title'];
        $banner->description = $data['description'];
        if ($image = $request->file('banner_image')) {
            $imageDestinationPath = 'uploads/banner/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $banner->banner_image = "$postImage";
        }
       
        $status = $banner->save();
        if($status){
            Session::flash('success_message', 'Banner updated successfully.');
            return redirect()->route('banner_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this banner.');
            return redirect()->route('banner_index');
        }
    }

    public function delete_banner($id){
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('success_message', "Banner is deleted successfully.");

    }
}

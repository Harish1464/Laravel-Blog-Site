<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class FeatureController extends Controller
{
    public function index(){
        $feature_info = Feature::latest()->get();
        return view('admin.feature.feature_index', compact('feature_info'));

    }

    public function create(){
        return view('admin.feature.feature_form');

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'feature_image' => 'nullable|image|max:1000',
        ]);
        $feature = new Feature;
        $feature->title = $data['title'];
        $feature->description = $data['description'];
        if ($image = $request->file('feature_image')) {
            $imageDestinationPath = 'uploads/features/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $feature->feature_image = "$postImage";
        }
       
        $feature->save();
        Session::flash('success_message', 'Setting saved successfully.');
        return redirect()->route('feature_index');

    }

    public function edit_feature($id){
        $feature = Feature::findOrFail($id);

        return view('admin.feature.feature_form', compact('feature'));

    }

    public function update_feature(Request $request, $id){
        $feature = Feature::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'feature_image' => 'nullable|image|max:1000',
        ]);
        $feature->title = $data['title'];
        $feature->description = $data['description'];
        if ($image = $request->file('feature_image')) {
            $imageDestinationPath = 'uploads/features/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $feature->feature_image = "$postImage";
        }
        $status = $feature->save();
        if($status){
            Session::flash('success_message', 'Setting updated successfully.');
            return redirect()->route('feature_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this feature.');
            return redirect()->route('feature_index');
        }
    }

    public function delete_feature($id){
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->back()->with('success_message', "Feature is deleted successfully.");

    }

}

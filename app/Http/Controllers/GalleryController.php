<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use DB;

class GalleryController extends Controller
{
    public function index(){
        $gallery_info = Gallery::latest()->get();
        return view('admin.gallery.gallery_index', compact('gallery_info'));

    }

    public function create(){
        return view('admin.gallery.gallery_form');

    }

    public function store(Request $request){
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
            'title' => 'required|string',
            'image.*' => 'required|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
        ]);
        $gallery = new Gallery;
        $gallery->title = $data['title'];
        if ($images = $request->file('image')) {
            foreach($images as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = public_path().'/uploads/gallery';
                $file->move($destinationPath, $picture);
                $gallery->image .= "$picture, ";
            }
        }
        $gallery->save();
        Session::flash('success_message', 'Gallery saved successfully.');
        return redirect()->route('gallery_index');

    }

    public function delete_banner($id){
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->back()->with('success_message', "Gallery is deleted successfully.");

    }
}

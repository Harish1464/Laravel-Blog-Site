<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        return view('admin.about.about_index', compact('about'));

    }

    public function create(){
        $about = About::first();
        return view('admin.about.about_form', compact('about'));

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'author' => 'required|string|max:50',
        ]);
        $about = new About;
        $about->title = $data['title'];
        $about->description = $data['description'];
        $about->author = $data['author'];
        $about->save();
        Session::flash('success_message', 'About us Content saved successfully.');
        return redirect()->route('about_index');

    }

    public function update(Request $request, $id){
        $data = $request->all();
        $about = About::findOrFail($id);
        $validateData = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'author' => 'nullable|string',
        ]);
        $about->title = $data['title'];
        $about->description = $data['description'];
        $about->author = $data['author'];
        $about->save();
        Session::flash('success_message', 'About us Content updated successfully.');
        return redirect()->route('about_index');

    }
}

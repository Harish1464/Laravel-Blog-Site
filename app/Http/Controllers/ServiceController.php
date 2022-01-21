<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(){
        $service_info = Service::latest()->get();
        return view('admin.service.service_index', compact('service_info'));

    }

    public function create(){
        return view('admin.service.service_form');

    }

    public function store(Request $request){
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
            'service_title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'item_title' => 'required|string|max:100',
            'service_icon' => 'nullable|image|max:5000',
            "features.*"  => "required|string|distinct|min:3",
        ]);
        $service = new Service;
        $service->service_title = $data['service_title'];
        $service->description = $data['description'];
        $service->item_title = $data['item_title'];
        if($data['features']){
            foreach($data['features'] as $key=>$feature){
                $features[$key] = $feature;
            }
            $service->features= implode(", ", $features); 
        }
        if ($image = $request->file('service_icon')) {
            $imageDestinationPath = 'uploads/services/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $service->service_icon = "$postImage";
        }
       
        $status = $service->save();
        if($status){
            Session::flash('success_message', 'Service saved successfully.');
            return redirect()->route('service_index');
        }else{
            Session::flash('error_message', 'Sorry ! there was problem while adding Service.');
            return redirect()->back();
        }
    }

    public function edit_service($id){
        $service = Service::findOrFail($id);
        return view('admin.service.service_form', compact('service'));

    }

    public function update_service(Request $request, $id){
        $service = Service::findOrFail($id);
        $data = $request->all();
        // dd($data);
        $validateData = $request->validate([
            'service_title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'item_title' => 'required|string|max:100',
            'service_icon' => 'nullable|image|max:5000',
            "features.*"  => "required|string|distinct|min:3",
        ]);
        $service->service_title = $data['service_title'];
        $service->description = $data['description'];
        $service->item_title = $data['item_title'];
        if($data['features']){
            foreach($data['features'] as $key=>$feature){
                $features[$key] = $feature;
            }
            $service->features= implode(", ", $features); 
        }
        if ($image = $request->file('service_icon')) {
            $imageDestinationPath = 'uploads/services/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $service->service_icon = "$postImage";
        }
        $status = $service->save();
        if($status){
            Session::flash('success_message', 'Service updated successfully.');
            return redirect()->route('service_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this service.');
            return redirect()->route('service_index');
        }
    }

    public function delete_service($id){
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success_message', "Service is deleted successfully.");

    }

}

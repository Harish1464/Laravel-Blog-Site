<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function index(){
        $client_info = Client::latest()->get();
        return view('admin.client.client_index', compact('client_info'));

    }

    public function create(){
        return view('admin.client.client_form');

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|string|max:150',
            'logo' => 'image|required|max:5000',
            'link' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $client = new Client;
        $client->name = $data['name'];
        $client->link = $data['link'];
        $client->description = $data['description'];
        if ($image = $request->file('logo')) {
            $imageDestinationPath = 'uploads/clients/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $client->logo = "$postImage";
        }
        $client->save();
        Session::flash('success_message', 'client saved successfully.');
        return redirect()->route('client_index');

    }

    public function edit_client($id){
        $client = Client::findOrFail($id);
        return view('admin.client.client_form', compact('client'));

    }

    public function update_client(Request $request, $id){
        $client = Client::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'name' => 'required|string|max:150',
            'logo' => 'image|nullable|max:5000',
            'link' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $client->name = $data['name'];
        $client->link = $data['link'];
        $client->description = $data['description'];
        if ($image = $request->file('logo')) {
            $imageDestinationPath = 'uploads/clients/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $client->logo = "$postImage";
        }
        $status = $client->save();
        if($status){
            Session::flash('success_message', 'Client updated successfully.');
            return redirect()->route('client_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this client.');
            return redirect()->route('client_index');
        }
    }

    public function delete_client($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->back()->with('success_message', "Client is deleted successfully.");

    }
}

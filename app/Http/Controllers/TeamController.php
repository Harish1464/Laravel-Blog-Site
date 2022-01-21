<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index(){
        $member_info = Team::latest()->get();
        return view('admin.team.member_index', compact('member_info'));

    }

    public function create(){
        return view('admin.team.member_form');

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'member_name'=> 'required|string|max:150',
            'designation'=> 'required|string|max:150',
            'image'=> 'required|image|max:2000',
            'description'=> 'required|string|max:255',
            'google_link'=> 'required|string',
            'twitter_link'=> 'required|string',
            'facebook_link'=> 'required|string',
            'linkedin_link'=> 'required|string',
        ]);
        $team = new Team;
        $team->member_name = $data['member_name'];
        $team->designation = $data['designation'];
        $team->description = $data['description'];
        $team->google_link = $data['google_link'];
        $team->twitter_link = $data['twitter_link'];
        $team->facebook_link = $data['facebook_link'];
        $team->linkedin_link = $data['linkedin_link'];
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/team/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $team->image = "$postImage";
        }
        $team->save();
        Session::flash('success_message', 'Team member detail saved successfully.');
        return redirect()->route('member_index');

    }

    public function edit_member($id){
        $member = Team::findOrFail($id);
        return view('admin.team.member_form', compact('member'));

    }

    public function update_member(Request $request, $id){
        $member = Team::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'member_name'=> 'required|string|max:150',
            'designation'=> 'required|string|max:150',
            'image'=> 'nullable|image|max:2000',
            'description'=> 'required|string|max:255',
            'google_link'=> 'required|string',
            'twitter_link'=> 'required|string',
            'facebook_link'=> 'required|string',
            'linkedin_link'=> 'required|string',
        ]);
        $member->member_name = $data['member_name'];
        $member->designation = $data['designation'];
        $member->description = $data['description'];
        $member->google_link = $data['google_link'];
        $member->twitter_link = $data['twitter_link'];
        $member->facebook_link = $data['facebook_link'];
        $member->linkedin_link = $data['linkedin_link'];
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/team/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $member->image = "$postImage";
        }
        $status = $member->save();
        if($status){
            Session::flash('success_message', 'Team updated successfully.');
            return redirect()->route('member_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this member.');
            return redirect()->route('member_index');
        }
    }

    public function delete_member($id){
        $member = Team::findOrFail($id);
        $member->delete();
        return redirect()->back()->with('success_message', "Team is deleted successfully.");

    }


}

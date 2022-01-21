<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class SkillController extends Controller
{
    public function index(){
        $skill_info = Skill::latest()->get();
        return view('admin.skill.skill_index', compact('skill_info'));

    }

    public function create(){
        return view('admin.skill.skill_form');

    }

    public function store(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'skill_count' => 'required|integer',
        ]);
        $skill = new Skill;
        $skill->title = $data['title'];
        $skill->description = $data['description'];
        $skill->skill_count = $data['skill_count'];
        $skill->save();
        Session::flash('success_message', 'skill saved successfully.');
        return redirect()->route('skill_index');

    }

    public function edit_skill($id){
        $skill = Skill::findOrFail($id);
        return view('admin.skill.skill_form', compact('skill'));

    }

    public function update_skill(Request $request, $id){
        $skill = Skill::findOrFail($id);
        $data = $request->all();
        $validateData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'skill_count' => 'required|integer',
        ]);
        $skill->title = $data['title'];
        $skill->description = $data['description'];
        $skill->skill_count = $data['skill_count'];
        $status = $skill->save();
        if($status){
            Session::flash('success_message', 'Skill updated successfully.');
            return redirect()->route('skill_index');
        }else{
            Session::flash('error_message', 'sorry ! there was problem while updating this skill.');
            return redirect()->route('skill_index');
        }
    }

    public function delete_skill($id){
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->back()->with('success_message', "Skill is deleted successfully.");

    }
}

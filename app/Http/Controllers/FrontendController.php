<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Setting;
use App\Models\About;
use App\Models\Feature;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Client;
use App\Models\Service;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $banner_info = Banner::latest()->get();
        $site_setting = Setting::first();
        $about_info = About::first();
        $feature_info = Feature::orderBy('created_at','desc')->take(3)->get();
        $skill_info = Skill::orderBy('created_at','desc')->take(4)->get();
        $team_info = Team::orderBy('created_at','desc')->take(4)->get();
        $client_info = Client::orderBy('created_at','desc')->take(4)->get();
        $service_info = Service::orderBy('created_at','desc')->take(3)->get();
        $gallery_info = Gallery::latest()->get();
        return view('frontend.index', compact('banner_info', 'site_setting', 'about_info', 'feature_info', 'skill_info', 'team_info', 'client_info', 'service_info', 'gallery_info'));

    }
}

@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        <h3 class="text-center">Site Settings</h3>
        <hr>
        <form method="post" action="{{route('setting_store')}}" enctype="multipart/form-data" >
            @csrf
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="site_title" required name="site_title" value="{{$site_settings->site_title}}"  class="form-control form-control-lg" />
                            <label class="form-label required" for="site_title">Site Title</label>
                            @error('site_title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="office_address" required name="office_address" value="{{$site_settings->office_address}}" class="form-control form-control-lg" />
                            <label class="form-label required" for="office_address">Office Address</label>
                            @error('office_address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="office_contact" required name="office_contact" value="{{$site_settings->office_contact}}" class="form-control form-control-lg" />
                            <label class="form-label required" for="office_contact">Office Contact</label>
                            @error('office_contact')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="file" id="site_logo" name="site_logo"  class="form-control form-control-lg" />
                            <label class="form-label" for="site_logo">Site Logo</label>
                            @error('site_logo')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="facebook_link" name="facebook_link" value="{{$site_settings->site_title}}" class="form-control form-control-lg" />
                            <label class="form-label" for="facebook_link">Facebook Link</label>
                            @error('facebook_link')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="twitter_link" name="twitter_link" value="{{$site_settings->twitter_link}}" class="form-control form-control-lg" />
                            <label class="form-label" for="twitter_link">Twitter Link</label>
                            @error('twitter_link')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="linkedin_link" name="linkedin_link" value="{{$site_settings->linkedin_link}}" class="form-control form-control-lg" />
                            <label class="form-label" for="linkedin_link">Linked Link</label>
                            @error('linkedin_link')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="dribble_link" name="dribble_link" value="{{$site_settings->dribble_link}}" class="form-control form-control-lg" />
                            <label class="form-label" for="dribble_link">Dribble Link</label>
                            @error('dribble_link')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <input type="text" id="github_link" name="github_link" value="{{$site_settings->github_link}}" class="form-control form-control-lg" />
                            <label class="form-label" for="github_link">Github Link</label>
                            @error('github_link')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <input class="btn btn-danger btn-lg" type="reset" value="Cancel" />

                    <input class="btn btn-warning btn-lg" type="submit" value="Update Settings" />
                </div>
        </form>
    </div>
</div>
@endsection()
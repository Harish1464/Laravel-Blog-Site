@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('member_index')}}">View all Members</a>
        </div>
        <div class="card-header">
            @isset($member)
                    <form method="post" action="{{route('update_member', $member->id)}}" enctype="multipart/form-data" >
                        @csrf  
                @else
                    <form method="post" action="{{route('member_store')}}" enctype="multipart/form-data" >
                        @csrf             
                @endisset
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="member_name" required name="member_name" class="form-control form-control-lg" value="{{@$member->member_name}}" />
                                <label class="form-label required" for="member_name">Name</label>
                                @error('member_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="designation" required name="designation" class="form-control form-control-lg" value="{{@$member->designation}}" />
                                <label class="form-label required" for="designation">Designation</label>
                                @error('designation')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" required name="description" class="form-control form-control-lg" value="{{@$member->description}}"/>
                                <label class="form-label required" for="description">Description</label>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="file" accept="image/*"  id="image" name="image" class="form-control form-control-lg" />
                                <label class="form-label required" for="image">Image</label>
                                @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="google_link" name="google_link" class="form-control form-control-lg" value="{{@$member->google_link}}"/>
                                <label class="form-label" for="google_link">Google Link</label>
                                @error('google_link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="twitter_link" name="twitter_link" class="form-control form-control-lg" value="{{@$member->twitter_link}}"/>
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
                                <input type="text" id="facebook_link" name="facebook_link" class="form-control form-control-lg" value="{{@$member->facebook_link}}" />
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
                                <input type="text" id="linkedin_link" name="linkedin_link" class="form-control form-control-lg" value="{{@$member->linkedin_link}}"/>
                                <label class="form-label" for="linkedin_link">Linkedin Link</label>
                                @error('linkedin_link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    @isset($member)
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <img src="{{asset('../uploads/member/'.$member->image)}}" width="80px" alt=" {{$member->title}}">
                            @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input class="btn btn-danger btn-lg" type="reset" value="Cancel" />
                        <input class="btn btn-success btn-lg" type="submit" value="Update" />
                    </div>
                @else
                    <div class="col-md-6">
                        <input class="btn btn-danger btn-lg" type="reset" value="Cancel" />
                        <input class="btn btn-warning btn-lg" type="submit" value="Submit" />
                    </div>

                @endisset
            </form>
        </div>

    </div>
</div>
@endsection()
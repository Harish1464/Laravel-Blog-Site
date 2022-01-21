@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('feature_index')}}">View all Features</a>
        </div>
        <div class="card-header">
            @isset($feature)
                <form method="post" action="{{route('update_feature', $feature->id)}}" enctype="multipart/form-data" >
                    @csrf  
            @else
                <form method="post" action="{{route('feature_store')}}" enctype="multipart/form-data" >
                    @csrf             
            @endisset
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="title" required name="title" class="form-control form-control-lg" value="{{@$feature->title}}"/>
                                <label class="form-label required" for="title">Feature Title</label>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" required name="description" class="form-control form-control-lg" value="{{@$feature->description}}" />
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
                                <input type="file" id="feature_image"  name="feature_image" class="form-control form-control-lg" />
                                <label class="form-label required" for="feature_image">Feature Image</label>
                                @error('feature_image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        @isset($feature)
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <img src="{{asset('../uploads/features/'.$feature->feature_image)}}" width="80px" alt=" {{$feature->title}}">
                                @error('feature_image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <input class="btn btn-danger btn-lg" type="reset" value="Cancel" />
                        @isset($feature)
                            <input class="btn btn-success btn-lg" type="submit" value="Update" />
                        @else
                            <input class="btn btn-warning btn-lg" type="submit" value="Submit" />
                        @endif
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection()
@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('banner_index')}}">View all Banners</a>
        </div>
        <div class="card-header">
                @isset($banner)
                    <form method="post" action="{{route('update_banner', $banner->id)}}" enctype="multipart/form-data" >
                        @csrf  
                @else
                    <form method="post" action="{{route('banner_store')}}" enctype="multipart/form-data" >
                        @csrf             
                @endisset
        
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="title" name="title" required class="form-control form-control-lg" value="{{@$banner->title}}"/>
                                <label class="form-label required" for="title">Banner Title</label>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" required name="description" class="form-control form-control-lg" value="{{@$banner->description}}" />
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
                                <input type="file" id="banner_image" name="banner_image" class="form-control form-control-lg" />
                                <label class="form-label required" for="banner_image">Banner Image</label>
                                @error('banner_image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @isset($banner)
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <img src="{{asset('../uploads/banner/'.$banner->banner_image)}}" width="80px" alt=" {{$banner->title}}">
                                @error('banner_image')
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
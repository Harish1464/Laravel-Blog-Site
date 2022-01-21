@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('about_index')}}">View About Us Content</a>
        </div>
        <div class="card-header">
            @isset($about)
            <form method="post" action="{{route('about_update', $about->id)}}" enctype="multipart/form-data" >
                @csrf  
            @else
                <form method="post" action="{{route('about_store')}}" enctype="multipart/form-data" >
                    @csrf             
            @endisset
                        <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="title" required name="title" value="{{@$about->title}}" class="form-control form-control-lg" />
                                <label class="form-label required" for="title">About Title</label>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="textarea" required id="description" name="description" value="{{@$about->description}}" class="form-control form-control-lg" />
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
                                <input type="text" id="author" required name="author" value="{{@$about->author}}" class="form-control form-control-lg" />
                                <label class="form-label required" for="author">Author</label>
                                @error('author')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input class="btn btn-danger btn-lg" type="reset" value="Cancel" />

                        <input class="btn btn-warning btn-lg" type="submit" value="Update Content" />
                    </div>
            </form>
        </div>

    </div>
</div>
@endsection()
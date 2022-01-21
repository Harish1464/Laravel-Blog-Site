@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('client_index')}}">View all Clients</a>
        </div>
        <div class="card-header">
            @isset($client)
            <form method="post" action="{{route('update_client', $client->id)}}" enctype="multipart/form-data" >
                @csrf  
            @else
                <form method="post" action="{{route('client_store')}}" enctype="multipart/form-data" >
                    @csrf             
            @endisset
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="name" required name="name" class="form-control form-control-lg" value="{{@$client->name}}"/>
                                <label class="form-label required" for="name">Client's Name</label>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="file" accept="image/*"  id="logo" name="logo" class="form-control form-control-lg" />
                                <label class="form-label required" for="logo">Logo</label>
                                @error('logo')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="link" required name="link" class="form-control form-control-lg" value="{{@$client->link}}"/>
                                <label class="form-label required" for="link">Web Link</label>
                                @error('link')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" name="description" class="form-control form-control-lg" value="{{@$client->description}}"/>
                                <label class="form-label" for="description">Description</label>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @isset($client)
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <img src="{{asset('../uploads/clients/'.$client->logo)}}" width="80px" alt=" {{$client->title}}">
                                @error('logo')
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

                    @endif
            </form>
        </div>

    </div>
</div>
@endsection()
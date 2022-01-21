@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('service_index')}}">View all Services</a>
        </div>
        <div class="card-header">
            @isset($service)
            <form method="post" action="{{route('update_service', $service->id)}}" enctype="multipart/form-data" >
                @csrf  
            @else
                <form method="post" action="{{route('service_store')}}" enctype="multipart/form-data" >
                    @csrf             
            @endisset
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="service_title" required name="service_title" class="form-control form-control-lg" value="{{@$service->service_title}}"/>
                                <label class="form-label required" for="service_title">Service Title</label>
                                @error('service_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" required name="description" class="form-control form-control-lg" value="{{ @$service->description}}"/>
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
                                <input type="text" id="item_title" required name="item_title" class="form-control form-control-lg" value="{{ @$service->item_title}}"/>
                                <label class="form-label required" for="item_title">Item Title</label>
                                @error('item_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div  class="col-md-6 mb-4">
                            <div id="dynamic_field">
                                <div class="form-outline">
                                    <input type="text" id="features" required name="features[]" class="form-control form-control-lg" value="{{ @$service->features}}"/>
                                    <label class="form-label required" for="features">Features</label>
                                    <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                    @error('features')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="file" id="service_icon"  name="service_icon" class="form-control form-control-lg" />
                                <label class="form-label required" for="service_icon">Service Icon</label>
                                @error('service_icon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                       

                    </div>
                    @isset($service)
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <img src="{{asset('../uploads/services/'.$service->service_icon)}}" width="80px" alt=" {{$service->title}}">
                                @error('service_image')
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

@section('js')
<script type="text/javascript">
   
   $(document).ready(function () {
                var i = 1;
                $('#add').click(function () {
                    i++;
                    $('#dynamic_field').append('<div class="form-outline" id="row' + i + '"><input type="text" id="features" name="features[]" class="form-control form-control-lg" /><td><button type="button" name="add" class="btn btn-danger btn_remove" id="' + i + '"><i class="fa fa fa-trash"></i></button></td>@error('features')<div class="alert alert-danger">{{ $message }}</div>@enderror</div>');
                });
                $(document).on('click', '.btn_remove', function () {
                    var button_id = $(this).attr("id");

                    $('#row' + button_id + '').remove();
                });
            });
   
</script>

@endsection
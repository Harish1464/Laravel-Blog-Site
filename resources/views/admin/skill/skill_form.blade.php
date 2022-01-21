@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="container">
        
        <div class="card-header">
            <a class="btn btn-warning text-center" href="{{route('skill_index')}}">View all Skills</a>
        </div>
        <div class="card-header">
            @isset($skill)
            <form method="post" action="{{route('update_skill', $skill->id)}}" enctype="multipart/form-data" >
                @csrf  
            @else
                <form method="post" action="{{route('skill_store')}}" enctype="multipart/form-data" >
                    @csrf             
            @endisset
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="title" required name="title" class="form-control form-control-lg" value="{{@$skill->title}}" />
                                <label class="form-label required" for="title">Skill Title</label>
                                @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="description" required name="description" class="form-control form-control-lg" value="{{@$skill->description}}" />
                                <label class="form-label required"  for="description">Description</label>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="skill_count" required name="skill_count" class="form-control form-control-lg" value="{{@$skill->skill_count}}"/>
                                <label class="form-label required" for="skill_count">Skill Count in %</label>
                                @error('skill_count')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @isset($skill)
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
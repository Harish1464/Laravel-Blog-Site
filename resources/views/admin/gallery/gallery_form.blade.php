@extends('layouts.admin')
@section('main-content')
<div class="row">
<div class="container">
	<form action="{{route('gallery_store')}}" method="POST" role="form" enctype="multipart/form-data">
		@csrf
		<legend>Image Gallery</legend>
		<div class="form-group">
			<label for="title" class="required">Image Gallery Title</label>
			<input type="text" title name="title" class="form-control"/>
		</div>
		<div class="form-group">
			<label class="required" for="image">Image</label>
			<input type="file" required name="image[]" multiple="true">
		</div>
		<button type="submit" class="btn btn-warning">Submit</button>
	</form>
</div>
</div>
@endsection()
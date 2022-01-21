@extends('layouts.admin')
@section('main-content')
  @include('admin.partials._message')
<section class="content">
  <div class="container-fluid">
    <div class="row d-flex justify-content-center">
      <div class="col-md-9">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>User</b>Profile</a>
          </div>
          <div class="card-body">
            <div class="text-center">
              @if($admin->image)
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{asset($admin->image)}}"
                  alt="User profile picture">
              @else
                  <img class="profile-user-img img-fluid img-circle"
                  src="../assets/dist/img/user4-128x128.jpg"
                  alt="User profile picture">
              @endif

                   <h3 class="profile-username text-center">{{$admin->name}}</h3>

                   <p class="text-muted text-center">{{$admin->phone}}</p>
            </div>
            <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$admin->name}}" placeholder="Enter name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$admin->phone}}" placeholder="Phone">
                  </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}} "placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{$admin->address}}" placeholder="Address">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="image">Profile Image</label>
                  <input type="file" class="form-control" id="image" name="image" name="image" accept="image/*">
                </div>
                <div class="form-group col-md-2">
                  <label for="role">Role</label>
                  <select id="role" name="role" class="form-control">
                    <option disabled>Choose...</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="status">Status</label>
                  <select id="status" name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-warning">Update Profile</button>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
     
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection()
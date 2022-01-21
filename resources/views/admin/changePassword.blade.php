@extends('layouts.admin')

@section('main-content')


  <div class="d-flex justify-content-center">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1">Change Password</a>
      </div>
      @include('admin.partials._message')

      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
        
        <form action="{{route('updatePassword')}}" method="post" enctype="multipart/form-data">
          @csrf
        
          <div class="input-group mb-3">
            <input type="password" name="current_password"  id="current_password" class="form-control" placeholder="Current Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p id="correct_password"></p>


          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mt-3 mb-1">
          Remember your password ? <a href="{{route('adminLogin')}}"> Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

@endsection

@section('js')
  <script>
    $("#current_password").keyup(function(){
      var current_password = $("#current_password").val();
      // alert(current_password);
      $.ajax({
        headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token" ]').attr('content')
        },
        type: 'post',
        url: '{{route('checkCurrentPassword')}}', 
        data: {
          current_password:current_password
        },
        success: function(resp){
          if(resp == "true"){
            $("#correct_password").text("Current password matches.").css("color", "green");
          }else if(resp == "false"){
            $("#correct_password").text("Password does not matches.").css("color", "red");
          }
        }, error: function(resp){
          alert("Error");

        }
      });
    });
  </script>
@endsection
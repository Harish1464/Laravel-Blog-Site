<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @php
        $current_user = Auth::guard('admin')->user();
      @endphp


      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-th-large"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> {{$current_user->name}}
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{route('userProfile')}}" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> My Profile
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="{{route('changePassword')}}" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('adminLogout')}}" class="dropdown-item">
            <i class="fa fa-sign-out-alt mr-2"></i> Log Out
          </a>
          <div class="dropdown-divider"></div>

      </li>
    </ul>
  </nav>
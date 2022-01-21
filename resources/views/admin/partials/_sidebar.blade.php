<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('../Template/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('adminDashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Dashboard Board
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('setting_index')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
                Site Settings
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('banner_index')}}" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
                Banner
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('about_index')}}" class="nav-link">
              <i class="nav-icon fa fa-address-card"></i>
                About Us
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('feature_index')}}" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              Features
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('skill_index')}}" class="nav-link">
              <i class="nav-icon fa fa-laptop-code"></i>
              Skills
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('member_index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              Our Team
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('client_index')}}" class="nav-link">
              <i class="nav-icon fas fa-apple-alt"></i>
              Our Clients
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('service_index')}}" class="nav-link">
              <i class="nav-icon fas fa-rocket"></i>
              Services
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('gallery_index')}}" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              Gallery
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
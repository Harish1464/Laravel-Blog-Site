@include('frontend.partials._header')
    <body class="page-aqua hidden-body">

		<!-- Navigation -->
		@include('frontend.partials._navbar')
		
    @yield('main-content')
					
		<!-- Footer -->
		@include('frontend.partials._footer')		
		         
	    <!-- Javascript  -->
	    @include('frontend.partials._scripts_footer')
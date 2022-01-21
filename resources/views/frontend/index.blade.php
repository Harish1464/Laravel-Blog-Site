@extends('layouts.frontend')

@section('main-content')
    	<!-- Home -->
		<section id="first" class="home text-center bg1 fullheight">
			<a class="anchor" id="row1"></a>
			<div class="headline-wrapper fullheight">
				<div class="headline slides">
					<div class="flexslider">
						<ul class="slides">
                            @isset($banner_info)
                                @foreach($banner_info as $banner)
                                    <li>
                                        <h2><span class="emphasis">{{$banner->title}}</span></h2>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <h2><span class="emphasis">Add</span> content for this place.</h2>
                                </li>
                            @endif
						</ul>
					</div>
				</div>
			</div>	
		</section>
		
		<!-- About -->
		<section id="second" class="about text-center">
			<a class="anchor" id="row2"></a>
			
			<div class="wrapper bg-colored ">	
				<div class="container">
					<div class="row">
						@isset($about_info)
                                <div class="span12">
                                    <h2>{{$about_info->title}}</h2>
                                    <h3>{{$about_info->description}}</h3>
                                    <p>- {{$about_info->author}}</p>
                                </div>
                        @else
                                <div class="span12">
                                    <h2>Add About us</h2>
                                </div>
                        @endif
					</div>
				</div>
			</div>
			<div class="wrapper">	
				<div class="container story">			
					<div class="row">
						<div class="span12">
							<h2>What we do?</h2>
							<h3><span class="emphasis">We</span> work to bring you the best of the best in each<br />
							of our <span class="emphasis">beautifully cooked stuff</span></h3>
						</div>
					</div>
	
					<div class="row waypoint-1">
                        @isset($feature_info)
                            @foreach($feature_info as $feature)
                            <div class="span4 what-we-do text-center hidden-element-1">
                                <div class="full-rounded">
                                    <i class="quivee-icon icon-rocket icon-4x"></i>
                                </div>
                                <h4 class="bold">{{$feature->title}}</h4>
                                <p>{{$feature->description}}</p>
                            </div>
                            @endforeach
                        @else
                                <div class="span4 what-we-do text-center hidden-element-1">
                                    <h2>Add Feature</h2>
                                </div>
                        @endif
					</div>
				</div>
			</div>
			
			<div class="wrapper bg-white">	
				<div class="container story">			
					<div class="row">
						<div class="span12">
							<h2>Our skills</h2>
							<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
						</div>
					</div>
					<div class="row waypoint-4">
					@isset($skill_info)
						@foreach($skill_info as $skill)
							<div class="span3 skills hidden-element-4 mar-t30">
									<h4>{{$skill->title}}</h4>
									<div class="percentage" data-percent="{{$skill->skill_count}}"><span>{{$skill->skill_count}}</span>%</div>
									<p>{{$skill->description}}</p>
								</div>
						@endforeach
					@else
						<div class="span3 skills hidden-element-4 mar-t30">
								<h4>Web design</h4>
								<div class="percentage" data-percent="95"><span>95</span>%</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in est justo. Nam facilisis urna volutpat ligula sagittis, a dictum enim interdum. </p>
							</div>
					@endif
					</div>
				</div>
			</div>			
		</section>
		
		<!-- Background Image -->
		<section id="third" class="text-center bg2">
			<div class="headline-wrapper fullheight pattern">
				<div class="headline">
					<div class="headline-holder">
						<h2><span class="emphasis">Creativity</span> require the courage to let go of certainties</h2>
						<p class="headline-author">Erich Fromm</p>
					</div>	
				</div>
			</div>
		</section>
		
		<!-- Team -->
		<section id="fourth" class="team text-center">
			<a class="anchor" id="row3"></a>
			
			<div class="wrapper bg-colored ">	
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Meet Out Team</h2>
							<h3>Design is about making things good (and then better) and right (and fantastic) 
							for the people who use and encounter them.</h3>
							<p>- Matt Beale</p>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper">	
				<div class="container">			
					<div class="row">
						<div class="span12">
							<h2>Who we are?</h2>
							<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
						</div>
					</div>
					<div class="row waypoint-2">
					@isset($team_info)
						@foreach($team_info as $team)
							<div class="span3">
								<div class="member-wrapper hidden-element-2">
									<div class="member-photo">
										<a class="ilightbox-member-1" href="team-member-1.html" title="team member">
											<span class="hover">View full profile</span>
											<img src="{{asset('uploads/team/'.$team->image)}}" alt="image" />
										</a>
									</div>
									<div class="member-description">
										<h4 class="member-name">{{$team->member_name}}</h4>
										<p class="member-role">{{$team->designation}}</p>
										<p>{{$team->description}}</p>
										<ul class="unstyled inline">
											<li><a href="{{$team->twitter_link}}" title=""><i class="icon-twitter"></i></a></li>
											<li><a href="{{$team->linkedin_link}}" title=""><i class="icon-linkedin"></i></a></li>
											<li><a href="{{$team->google_link}}" title=""><i class="icon-google-plus-sign"></i></a></li>
										</ul>
									</div>
								</div><!-- team member wrapper -->	
							</div>

						@endforeach
					@else
						<div class="span3">
								<div class="member-wrapper hidden-element-2">
									<div class="member-photo">
										<a class="ilightbox-member-1" href="team-member-1.html" title="team member">
											<span class="hover">View full profile</span>
											<img src="images/team-1.jpg" alt="image" />
										</a>
									</div>
									<div class="member-description">
										<h4 class="member-name">Peter Ford</h4>
										<p class="member-role">CEO and Founder</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in est justo. Nam facilisis urna volutpat ligula sagittis, a dictum enim interdum. Etiam vitae diam eget velit tempor suscipit.</p>
										<ul class="unstyled inline">
											<li><a href="index.html#" title=""><i class="icon-twitter"></i></a></li>
											<li><a href="index.html#" title=""><i class="icon-linkedin"></i></a></li>
											<li><a href="index.html#" title=""><i class="icon-google-plus-sign"></i></a></li>
										</ul>
									</div>
								</div><!-- team member wrapper -->	
							</div>
					@endif		
					</div>
				</div>
			</div>
			
			<div class="wrapper bg-white">
				<div class="container">			
					<div class="row">
						<div class="span8">
							<div class="template-message">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque fau
								non iaculis. Fusce a augue ante, pellentesque faucibus risus non iaculis</p>
							</div>
						</div>
						<a href="index.html#" class="span3 btn btn-quivee btn-large" title="Buy this template">
							Buy this template
						</a>					
					</div>
				</div>	
			</div>
		</section>			
		
		<!-- Background Image -->
		<section id="fifth" class="text-center bg3">
			<div class="headline-wrapper fullheight pattern">
				<div class="headline">
					<div class="headline-holder">
						<h2 class="headline">Good <span class="emphasis">design</span> is good business</h2>
						<p class="headline-author">Thomas J. Watson</p>
					</div>	
				</div>
			</div>
		</section>
		
		<!-- Services -->
		<section id="sixth" class="services text-center">
			<a class="anchor" id="row4"></a>
			
			<div class="wrapper bg-colored ">	
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Services</h2>
							<h3>Every single project we undertake is planned first<br />
							in conjunction with the client, to ensure it provides the desired results.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper">	
				<div class="container">			
					<div class="row">
						<div class="span12">
							<h2>Some things we can do for you</h2>
							<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
						</div>
					</div>
					<div class="row waypoint-3">
					@isset($service_info)
					
							@foreach($service_info as $service)
							<div class="span4">
								<div class="service-wrapper hidden-element-3">
									<h4>{{$service->service_title}}</h4>
									<div class="full-rounded">
										<i class="icon-cog icon-5x"></i>
										<!-- <img src="{{asset('uploads/services/'. $service->service_icon)}}" alt=""> -->
									</div>
									<p>{{$service->description}}</p>
									<dl>
										<dt>{{$service->item_title}}</dt>

										
										

										@foreach((explode(", ",$service->features)) as $item)
											<dd>{{$item}}</dd>	
										@endforeach	
									</dl>
								</div><!-- service-wrapper -->
							</div>

							@endforeach
					@endif		

					</div>
				</div>
			</div>
			<div class="wrapper bg-white">
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Clients</h2>
							<h3>Here are a few customers we’ve worked with</h3>
						</div>
					</div>
					
					<div class="client-wrapper mar-t30">
						<div class="row text-center">
							@isset($client_info)
								@foreach($client_info as $client)
								<img class="client-logo span2" src="{{'uploads/clients/'.$client->logo}}" alt="logo" />
								@endforeach
							@else
								<img class="client-logo span2" src="images/client-1.png" alt="logo" />
							@endif
						</div>
					</div>
				</div>		
			</div>
		</section>
		
		<!-- Background Image -->
		<section id="seventh" class="text-center bg4">
			<div class="headline-wrapper fullheight pattern">
				<div class="headline">
					<div class="headline-holder">
						<h2 class="headline">Real <span class="emphasis">web designers</span> write code. Always have, always will</h2>
						<p class="headline-author">Jeffrey Zeldman</p>
					</div>	
				</div>
			</div>
		</section>
		
		<!-- Portfolio -->
		<section id="eighth" class="portfolio text-center">
			<a class="anchor" id="row5"></a>
			
			<div class="wrapper bg-colored">	
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Portfolio</h2>
							<h3>Every single project we undertake is planned first<br />
							in conjunction with the client, to ensure it provides the desired results.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper">	
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Below are a selection of what we've been doing recently.</h2>
							<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
						</div>
					</div>
					<div class="row">
						<div class="span12">
							<ul id="portfolio-filter" class="unstyled inline">
								<li class="active"><a class="all btn btn-quivee" href="index.html#all" data-filter="*">All</a></li>
								<li><a data-filter=".web-design" class="web-design btn btn-quivee" href="index.html#web-design" data-rel="web-design">Web Design</a></li>
								<li><a data-filter=".photography" class="photography btn btn-quivee" href="index.html#photography" data-rel="photography">Photography</a></li>
								<li><a data-filter=".logo-design" class="logo-design btn btn-quivee" href="index.html#logo-design" data-rel="logo-design">Logo Design</a></li>
							</ul>
						</div>
					</div>
					<ul id="portfolio-list" class="row isotope">

						@foreach($gallery_info as $gallery)
							<li class="span3 block web-design" data-type="web-design">
								<a class="portfolio-thumb" href="images/portfolio-1.png" title="portfolio">
									@foreach((explode(", ",$gallery->image)) as $item)
										<img class="portfolio-image" src="{{asset('uploads/gallery/'.$item)}}" alt="portfolio image" />
									@endforeach	
								</a>
							</li>
						@endforeach
						
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-2.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-2.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block logo-design" data-type="logo-design">
							<a class="portfolio-thumb" href="images/portfolio-3.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-3.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-4.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-4.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block logo-design" data-type="logo-design">
							<a class="portfolio-thumb" href="images/portfolio-5.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-5.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block web-design" data-type="web-design">
							<a class="portfolio-thumb" href="images/portfolio-6.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-6.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block logo-design" data-type="logo-design">
							<a class="portfolio-thumb" href="images/portfolio-7.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-7.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-8.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-8.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block web-design" data-type="web-design">
							<a class="portfolio-thumb" href="images/portfolio-9.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-9.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-10.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-10.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block logo-design" data-type="logo-design">
							<a class="portfolio-thumb" href="images/portfolio-11.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-11.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block web-design" data-type="web-design">
							<a class="portfolio-thumb" href="images/portfolio-12.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-12.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-13.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-13.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block logo-design" data-type="logo-design">
							<a class="portfolio-thumb" href="images/portfolio-14.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-14.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block photography" data-type="photography">
							<a class="portfolio-thumb" href="images/portfolio-15.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-15.png')}}" alt="portfolio image" />
							</a>
						</li>
						<li class="span3 block web-design" data-type="web-design">
							<a class="portfolio-thumb" href="images/portfolio-16.png" title="portfolio">
								<img class="portfolio-image" src="{{asset('Template/frontend/images/portfolio-16.png')}}" alt="portfolio image" />
							</a>
						</li>
					</ul>	
				</div>
			</div>
			<div class="wrapper bg-white">
				<div class="container">			
					<div class="row">
						<div class="span8">
							<div class="template-message">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque fau
								non iaculis. Fusce a augue ante, pellentesque faucibus risus non iaculis</p>
							</div>
						</div>
						<a href="index.html#" class="span3 btn btn-quivee btn-large" title="Buy this template">
							Buy this template
						</a>					
					</div>
				</div>	
			</div>
		</section>			
					
		<!-- Background Image -->
		<section id="ninth" class="text-center bg5">
			<div class="headline-wrapper fullheight pattern">
				<div class="headline">
					<div class="headline-holder">
						<h2 class="headline"><span class="emphasis">Creativity</span> is the greatest rebellion in existence</h2>
						<p class="headline-author">Osho</p>
					</div>	
				</div>
			</div>
		</section>			
		
		<!-- Contact -->
		<section id="tenth" class="contact text-center">
			<a class="anchor" id="row6"></a>
			
			<div class="wrapper bg-colored">	
				<div class="container">
					<div class="row">
						<div class="span12">
							<h2>Contact</h2>
							<h3>We always love to hear form people.<br />
							If you want to know our service or simply ‘Say Hello’ feel free to contact us.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<form class="contact-form" method="get" action="contact-form">
							<div class="span4 offset2">
								<label class="hidden-phone text-left" for="inputName">Name</label>
								<div class="text-left">
									<input class="span4" type="text" id="inputName" name="inputName" placeholder="Please insert your full name" required>
								</div>
							</div>
							<div class="span4">
								<label class="hidden-phone text-left" for="inputEmail">Email</label>
								<div class="text-left">
									<input class="span4" type="text" id="inputEmail" name="inputEmail" placeholder="Please insert your email" required>
								</div>
							</div>
							<div class="span10 offset2">
								<label class="hidden-phone text-left" for="inputSubject">Subject</label>
								<div class="text-left">
									<input class="span8" type="text" id="inputSubject" name="inputSubject" placeholder="Please insert the subject" required>
								</div>
							</div>
							<div class="span10 offset2">
								<label class="hidden-phone text-left" for="inputMessage">Message</label>
								<div class="text-left">
									<textarea class="span8" rows="8" id="inputMessage" name="inputMessage" placeholder="Please insert the subject" required></textarea>
								</div>
							</div>
							<button type="submit" class=" span8 offset2 btn btn-quivee btn-large">Submit</button>
						</form>
					</div>
				</div>
			</div>

			<div class="map">
				<img src="{{asset('Template/frontend/images/map.jpg')}}" alt="map">
			</div>	
		</section>			

@endsection
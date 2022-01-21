<footer >
			<div class="wrapper bg-colored">
				<div class="container text-center">
					<div class="row">
						<div class="span12">
							<a href="index.html#" class="logo-footer">{{$site_setting->site_title}}</a>
							<ul class="unstyled inline footer-icons">
								<li><a class="full-rounded" href="{{$site_setting->twitter_link}}" title="social"><i class="icon-twitter"></i></a></li>
								<li><a class="full-rounded" href="{{$site_setting->facebook_link}}" title="social"><i class="icon-facebook"></i></a></li>
								<li><a class="full-rounded" href="{{$site_setting->linkedin_link}}" title="social"><i class="icon-linkedin"></i></a></li>
								<li><a class="full-rounded" href="{{$site_setting->dribble_link}}" title="social"><i class="icon-dribbble"></i></a></li>
								<li><a class="full-rounded" href="{{$site_setting->github_link}}" title="social"><i class="icon-github"></i></a></li>
							</ul>
							<p>&copy; 2013 - {{ now()->year }},  {{$site_setting->site_title}}</p>
						</div>
					</div>
				</div>
			</div>		
		</footer>
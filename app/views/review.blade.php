<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>Popcorn - Free Movie Opinion Polls</title> 
	<meta name="description" content="Movie reviews and ratings" />	    
	<meta name="keywords" content="Twitter based movie suggestions">
	<meta property="og:title" content="Twitter world opinions">
	<link rel="shortcut icon" href="images/logo.png">
	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style("assets/fancybox/jquery.fancybox-v=2.1.5.css") }}
    {{ HTML::style("assets/css/font-awesome.min.css") }}
	
	{{ HTML::style("assets/css/style.css") }}
	{{ HTML::style("assets/css/bg_anim.css") }}
	{{ HTML::style("assets/css/search.css") }}
	{{ HTML::style("assets/css/review.css") }}
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	{{ HTML::style("assets/css/movie_card.css") }}
	<!--graph references-->
	{{ HTML::script("assets/js/jquery-1.10.2.min.js") }}
	{{ HTML::script("assets/js/html5shiv.js") }}
	{{ HTML::script("assets/js/jquery.easing.1.3.js") }}
	
	{{ HTML::script("assets/js/script.js") }}
	{{ HTML::script("assets/js/knockout-3.0.0.js") }}
	{{ HTML::script("assets/js/globalize.min.js") }}
	{{ HTML::script("assets/js/dx.chartjs.js") }}
	{{ HTML::script("assets/js/guage.js") }}
		<!--end graph references-->
		
</head>

<body>

	<div class="navbar navbar-fixed-top" data-activeslide="1">
		<div class="container">
		
			<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse" style="z-index:200;">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			
			<div class="nav-collapse collapse navbar-responsive-collapse">
			
				<ul class="nav row">

					<li data-slide="1" class="col-12 col-sm-2"><a id="menu-link-1" href="#slide-1" title="Next Section"><span class="icon icon-home"></span> <span class="text">HOME</span></a></li>
					
					
					<li data-slide="2" class="col-12 col-sm-2"><a id="menu-link-2" href="#tweets" title="Next Section"><span class="icon icon-twitter"></span> <span class="text">TWEETS</span></a></li>

					<li data-slide="4" class="col-12 col-sm-2"><a id="menu-link-3" href="index.html#slide-3" title="Book Tickets in a theatre near you"><span class="icon icon-money"></span> <span class="text">BOOK TICKETS</span></a></li>
					
					
				</ul>
				<div class="row">
					<div class="col-sm-2 active-menu"></div>
				</div>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->
	
	
	<!-- === Arrows === -->
	
	
	
	<!-- === MAIN Background === -->
	
	
	<!-- === Review Section === -->
	<div class="slide story" id="review" data-slide="2">
		<div class="container">
			
			<div class="row title-row">
				<div class="col-12 font-thin">Reviews and <span class="font-semibold">twitter sentiments</span></div>
			</div><!-- /row -->
			<div class="paragraphs">
				<div class="row">
					<div class="span4">
						<div class="content-heading clearfix media">
							<div class="pull-right wall">
								<img src="{{ $data['posterImage'] }}" width="400" />
							</div>
							<div class="details">
								<div class="heading">
									<h1 id="movie_name">{{ $data['title'] }}</h1>
									<h4>{{ $data['tagline'] }}</h4>
									<h5>{{ $data['releaseDate'] }}</h5>
								</div>
								<div class="synopsis">
									<p>{{ $data['overview'] }}
									</p>
									<p><span class="font-semibold" style="color:gold;">Actors</span>: {{ $data['castList'] }}</p>
									<p><span class="font-semibold" style="color:gold;">Genre</span>: {{ $data['genreList'] }}</p>
									<p><span class="font-semibold" style="color:gold;">Runtime</span>: {{ $data['runtime'] }} mins</p>
									<p><span class="font-semibold" style="color:gold;">Rating</span>: {{ $data['voteAverage'] }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				
				<div class="content">
			
				
				<div id="chartContainer" style="width: 100%; height: 240px;"></div>
				
		</div>
				</div>
			</div>
			
		</div><!-- /container -->
	</div><!-- /slide2 -->
	
	
	<!-- === Twitter Section === -->
	<div class="slide story" id="tweets" data-slide="2">
		<div class="container">
			
			<div class="row title-row">
				<div class="col-12 font-thin"><span class="font-semibold">Recent tweets</span> about the Movie</div>
			</div><!-- /row -->
			<div class="paragraphs" id="tweet_loader">
				<!--<div class="row">
					<div class="tweet">
						<div class="user_image">
							<img src="images/user.jpg" width="60" alt="">
						</div>
						<div class="tweet_text">
							<div class="meta">
								<p>John Doe</p>
								<p>12th Mon, 15:30</p>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus architecto doloremque inventore rerum dolorum iure vitae molestias recusandae! Impedit, blanditiis voluptates illum dicta repudiandae consectetur mollitia unde eos eaque nam.</p>
						</div>
					</div>
				</div>-->
				


				
			</div>
			
		<!-- /slide2 -->

	<!-- SCRIPTS -->
	
	
	{{ HTML::script("assets/fancybox/jquery.fancybox.pack-v=2.1.5.js") }}
	{{ HTML::script("assets/js/card.js") }}
	{{ HTML::script("assets/js/load_feeds.js") }}
	
	<!-- fancybox init -->
	<script>
	$(document).ready(function(e) {
		var lis = $('.nav > li');
		menu_focus( lis[0], 1 );
		
		$(".fancybox").fancybox({
			padding: 10,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
		
		   $('#chartContainer').dxLinearGauge({
				scale: {
					startValue: 0, endValue: 10,
					majorTick: {
						color: '#ffffff',
						tickInterval: 2
					},
					label: {
						indentFromTick: -3
					}
				},
				rangeContainer: {
					offset: 10,
					ranges: [
						{ startValue: 0, endValue: 4, color: '#B25348' },
						{ startValue: 4, endValue: 7, color: '#E2FF71' },
						{ startValue: 7, endValue: 10, color: '#32FF23' }
					]
				},
				valueIndicator: {
					offset: 20
				},
				subvalueIndicator: {
					offset: -15
				},
				title: {
					text: 'Movie rating',
					font: { size: 36 }
				},
				value: 	{{ $data['voteAverage'] }},
				subvalues: [7, 9.2]
			});
	
	});
	</script>

</html>
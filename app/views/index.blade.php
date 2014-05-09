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
	
	<link rel="prefetch" href="images/zoom.png">
		
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

					<li data-slide="1" class="active"><a id="menu-link-1" href="#slide-1" title="Back to top"><span class="icon icon-home"></span> <span class="text">HOME</span></a></li>
					<li data-slide="2" class=""><a id="menu-link-2" href="#slide-2" title="trending movies"><span class="icon icon-star"></span> <span class="text">TOP TRENDING</span></a></li>
					
					<li data-slide="4" class=""><a href="http://www.google.com" title="Book Tickets in a theatre near you"><span class="icon icon-money"></span> <span class="text">BOOK TICKETS</span></a></li>
					
					<li data-slide="6" class=""><a id="menu-link-6" href="#slide-6" title="Connect with social media"><span class="icon icon-envelope"></span> <span class="text">CONTACT</span></a></li>
					<li data-slide="5" class=""><a id="menu-link-5" href="#slide-6" title="Search for movies "><span class="icon icon-search"></span> <span class="text"> SEARCH</span></a></li>
					<li  class="col-12 col-sm-2">
					
				</ul>
				<div class="row">
					<div class="col-sm-2 active-menu"></div>
				</div>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->
	
	
	
	
	
	<!-- === MAIN Background === -->
	<div class="slide story anim" id="slide-1" data-slide="1">
		<div class="container">
			<div id="home-row-1" class="row clearfix">
				<div class="col-12">
					<h1 class="font-semibold" style="color:#CCB202;">Popcorn <span class="font-thin"style="color:#ffffff;" >Movies</span></h1>
					<h4 class="font-thin">We are  <span class="font-semibold">your guide to catching up with the </span> latest flicks .</h4>
					<br>
					<br>
				</div><!-- /col-12 -->
			</div><!-- /row -->
			<div id="home-row-2" class="row clearfix">
				<div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="2">
				{{ HTML::image("assets/images/trending.png", 'alt', array( 'width' => 180)) }}
				</div><span>Trending movies  </span><span class="icon icon-comments"></div>
				<div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="5">
				{{ HTML::image("assets/images/review.png", 'alt', array( 'width' => 60)) }}
				</div><span>Movie Reviews and comments  <span class="icon icon-star-half-full"></span></div>
				<div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="4">
				{{ HTML::image("assets/images/ticket.png", 'alt', array( 'width' => 180)) }}
				</div><span>Book Tickets  </span><span class="icon icon-ticket"></div>
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /slide1 -->
	
	<!-- === Slide 2 === -->
	<div class="slide story" id="slide-2" data-slide="2">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-thin">Recent and  <span class="font-semibold"style="color:#1792A6;">Most Trending </span> Releases <span class="icon icon-film"></span></div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div><!-- /row -->
			<div class="row subtitle-row">
				<div class="col-12 font-thin">What to <span class="font-semibold"style="color:#CCB202;"> lookout for</span></div>
			</div><!-- /row -->
			<div class="row content-row">
				
	<ul id="popular_movie_list">
		
	</ul>
	

</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /slide2 -->
	
	<!-- === SLide 3 - Portfolio -->
	<!-- /slide3 -->
	
	<!-- === Slide 4 - Process === -->
	<!--<div class="slide story" id="slide-4" data-slide="4">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-thin">Book your tickets <span class="font-semibold"> with ease! <span class="icon icon-ticket"></span></span></div>
			</div>
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div>
			<div class="row subtitle-row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-10 font-light">Select the movie you want to watch and buy tickets</div>
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div>
			<div class="row content-row">
				<div class="selectors">
  				<form action="" method="">        
	   				<label>Select movie name</label><select>
	  				<option value="Movie1">movie1</option>
	  				<option value="Movie2">movie2</option>
	  				<option value="Movie3">movie3</option>
	  				<option value="Movie4">movie4</option>
					</select>
					<label>Filter by Genre</label><select>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
					</select>
					<label>Filter by Language</label><select>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
					</select>
					

  				</form>
  				</div>
			</div>
		</div>
	</div>-->
<!-- /slide4 -->
	
	<!-- === Slide 5 === -->
	<div class="slide story" id="slide-5" data-slide="5">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-thin">Find movie reviews <span class="font-semibold"> with the push of a button! <span class="icon icon-comment"></span></span></div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div><!-- /row -->
			<div class="row subtitle-row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-10 font-light">Search for movie reviews</div>
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div><!-- /row -->
			<div class="row content-row">
			<div class="search">
  					<form action="" method="">  
  					<div class="sbox">     
   					<input type="search" id="search_box" placeholder="Search for movies">      
    				<button id="search_button">Go  </button>
  					</div>
  			</div> 
  			
  			<div id="search_result_list">
  				<ul>
  					
  				</ul>
  			</div>
				<!--<div class="selectors">
  				<form action="" method="">
  				<div class="movie_name">    
	   				<label>Select movie name</label><select>
	  				<option value="Movie1">movie1</option>
	  				<option value="Movie2">movie2</option>
	  				<option value="Movie3">movie3</option>
	  				<option value="Movie4">movie4</option>
					</select>
					</div>
					<div class="movie_gen"> 
					<label>Filter by Genre</label><select>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
	  				<option value="genre">genre</option>
					</select>
					</div>
					<div class="movie_lang">
					<label>Filter by Language</label><select>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
	  				<option value="language">language</option>
					</select>
					</div>
					</form>
					</form>

  				</div>-->
			</div><!-- /row -->
		</div><!-- /container -->
	</div>
	<!-- /slide5 -->
	
	<!-- === Slide 6 / Contact === -->
	<div class="slide story" id="slide-6" data-slide="6">
		<div class="container">
			<div class="row title-row">
				<div class="col-12 font-light">Get <span class="font-semibold"> Connected  <span class="icon icon-mobile-phone"></span></span></div>
			</div><!-- /row -->
			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div><!-- /row -->
			<div class="row subtitle-row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-10 font-light">Feel free to share ,like and Recommend our page !</div>
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div><!-- /row -->
			<div id="contact-row-4" class="row">
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-phone"></i></a></p>
					<span class="hover-text font-light ">+9126941860</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-envelope"></i></a></p>
					<span class="hover-text font-light ">info@popcorn.in</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-home"></i></a></p>
					<span class="hover-text font-light ">Bangalore, India<br>zip code 98443</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="http://www.facebook.com/pages/Popcorn/552949734821602"><i class="icon icon-facebook"></i></a></p>
					<span class="hover-text font-light ">facebook/popcornmovies</span></a>
				</div><!-- /col12 -->
				<div class="col-12 col-sm-2 with-hover-text">
					<p><a target="_blank" href="#"><i class="icon icon-twitter"></i></a></p>
					<span class="hover-text font-light ">@popcorn</span></a>
				</div><!-- /col12 -->
				<div class="col-sm-1 hidden-sm">&nbsp;</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /Slide 6 -->
	
</body>

	<!-- SCRIPTS -->
	
	
	{{ HTML::script("assets/js/jquery-1.10.2.min.js") }}
	<!--{{ HTML::script("assets/js/jquery-migrate-1.2.1.min.js") }}-->
	<!--{{ HTML::script("assets/js/bootstrap.min.js") }}-->
	{{ HTML::script("assets/js/jquery.easing.1.3.js") }}
	
	{{ HTML::script("assets/js/script.js") }}
	{{ HTML::script("assets/js/menu.js") }}
	{{ HTML::script("assets/js/load_popular.js") }}
	{{ HTML::script("assets/js/search.js") }}
	
	<!-- fancybox init -->
	<script>
	$(document).ready(function(e) {
		/*var lis = $('.nav > li');
		menu_focus( lis[0], 1 );
		
		$(".fancybox").fancybox({
			padding: 10,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});*/
		
	
	});
	</script>

</html>
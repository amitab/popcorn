<!DOCTYPE html>
<html class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Movie Review | {{ $movie['title'] }}</title>
    <meta content="" name="description" />
    <link rel="Shortcut Icon" type="image/x-icon" href="#" />
    
	<link href="project-detail-page.html" rel="next" />
	<link href="index.html" rel="prev" />
    <meta name="author" content="" />
    <meta name="format-detection" content="" />

    <!-- Styles -->
    <link href="{{ URL::asset('styles/main.css') }}" rel="stylesheet" media="screen, print" type="text/css">
</head>
<body>
<div id="container">
<section id="content">
            
    <div id="work-bio">
        <header>
            <div id="preamble">
                <h1 id="movie-title">{{ $movie['title'] }}</h1>
                <h2>{{ $movie['release_date'] }}</h2>
                <h3>{{ $movie['tagline'] }}</h3>
                <p>{{ $movie['overview'] }}</p>
                <p><a href="{{ $movie['homepage'] }}" rel="external" target="_blank">Visit Homepage</a></p>
            </div>
            <h4>Reviews</h4>
            <div id="reviews">
                @for ($i = 0; $i < min(5, count($movie['reviews'])); $i++)
                    @if ($movie['reviews'][$i]['score']['pos'] > $movie['reviews'][$i]['score']['neg'])
                        <div class="review positive">
                    @else
                        <div class="review negative">
                    @endif
                        {{ $movie['reviews'][$i]['review'] }}
                    </div>
                @endfor
            </div>
        </header>
    </div>
    
    <section id="work-visuals">
        <ul id="tweets">
            <li id="main"><img src="{{ $movie['backdrop'] }}"></li>
        </ul>
    </section>

</section>
</div><!-- container -->

<script type="text/javascript">
    const buildItem = (image, tweet, scores, name) => {
        return `<li class="tweet ${scores.pos > scores.neg ? 'positive' : 'negative'}">
            <div class="cover">
                <img src="${image}" alt="" title="${name}">
            </div>
            <div class="text">${tweet}</div>
        </li>`;
    };
    var keyword = document.getElementById('movie-title').innerText.toLowerCase().replace(/ /g,'');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', `/tweet/${keyword}`, true);

    xhr.onload = function () {
        var list = document.getElementById('tweets');
        var htmlString = '';
        JSON.parse(xhr.response).forEach((tweet) => {
            console.log(tweet);
            htmlString += buildItem(tweet.user.profile_image, tweet.tweet, tweet.score, tweet.user.name);
        });
        list.innerHTML += htmlString;
    };
    xhr.send(null);

</script>

</body>
</html>
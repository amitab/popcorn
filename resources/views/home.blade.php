<!DOCTYPE html>
<html class="no-js">
<head>


    <!-- Meta info -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <meta content="" name="description">
    <meta name="author" content="">
    <meta name="format-detection" content="">

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('styles/main.css') }}" rel="stylesheet" media="screen, print" type="text/css">
</head>
<body>

    <div id="container" style="left: 0px;">
        <section id="content">
            <header class="section-heading">
                <h1>Now Playing</h1>
            </header>
            <div id="now-playing" class="movies"><ul></ul></div>
            <header class="section-heading">
                <h1>Popular Movies</h1>
            </header>
            <div id="popular-movies" class="movies"><ul></ul></div>
        </section>
    </div>
    <script type="text/javascript">
        const buildItem = (image, id, popularity, releaseDate, title) => {
            return `<li>
                <a href="/content/review/${id}">
                    <div class="content-summary">
                        <div class="info">
                            <h2>${title}</h2>
                            <h3>${releaseDate}</h3>
                        </div>
                        <div class="loves">
                            <span>${popularity}</span>
                        </div>
                    </div>
                    <img src="${image}" alt="${title}">
                </a>
            </li>`;
        };

        const makeCall = (url, location) => {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);

            xhr.onload = function () {
                var list = document.getElementById(location).children[0];
                var htmlString = '';
                JSON.parse(xhr.response).forEach((movie) => {
                    console.log(movie);
                    htmlString += buildItem(
                        movie.poster, movie.id, movie.popularity,
                        movie.release_date, movie.title);
                });
                list.innerHTML = htmlString;
            };
            xhr.send(null);
        }

        makeCall('/content/popular', 'popular-movies');
        makeCall('/content/now_playing', 'now-playing');
    </script>

</body>
</html>
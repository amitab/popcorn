$(document).ready(function() {
	
	function loadPopular() {
		$.ajax({
			url: "/content/popular",
			type: "post",
			data: {
				'load' : 'popular'
			},
			success: function(data){
				html = '';
				$.each( data, function( index, movie ){
					
					html += '<li class="movie_item">';
					html += '<div class="movie_card">';
					html +='<div class="movie_image">';
					html +='<img src=' + movie.poster + '>';
					html +='</div>';
					html +='<div class="mov_foot">';
					html +='<div class="movie_details">';
					html +='<div class="movie_header"><a href="/content/review/' + movie.id + '">' + movie.title + '</a></div>';
					html +='<div class="movie_release_date">' + movie.releaseDate.date + '</br>Rating : ' + movie.voteAverage + '</div>';
					html +='</div>';
					html +='<div class="movie_footer">';
					html +='<ul>';
					html +='<li title="Book Tickets in a theatre near you"><i class="icon icon-ticket"></i>';
					html +='</li><li title="Review"><i class="icon icon-film"></i>';
					html +='</li><li title="Like count"><i class="icon icon-heart"></i>';
					html +='</li><li title="Share"><i class="icon icon-share"></i>';
					html +='</li>';
					html +='</ul>';
					html +='</div>';
					html +='</div>';
					html +='</div>';
					html +='</li>';
					
				});
				
				$('#popular_movie_list').append(html);
				console.log(data);
			},
			error:function(){
				$("#result").html('There is error while submit');
			}
		});
	}
				  
	loadPopular();
	
});
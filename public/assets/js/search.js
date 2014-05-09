$(document).ready(function() {
	
	function showLoading(element) {
		
		var loadingText = 'Loading...';
		
		var loading = '<div style="display: inline-block; margin-top: 40px;"><div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div><div class="loading_text">' + loadingText + '</div></div>';
		$(element).html(loading);
	}
	
	function search(keyword, element) {
		$.ajax({
			url: "/search",
			type: "post",
			data: {
				'keyword' : keyword
			},
			success: function(data){
				html = '';
				$.each( data, function( index, movie ){
					
					html += '<li class="movie_item">';
					html += '<div class="movie_card">';
					html +='<div class="movie_image">';
					if(movie.poster.search('.jpg') === -1) {
						html +='<img src="assets/images/placeholder.png" height="375">';
					} else {
						html +='<img src=' + movie.poster + '>';
					}
					html +='</div>';
					html +='<div class="mov_foot">';
					html +='<div class="movie_details">';
					html +='<div class="movie_header"><a href="/content/review/' + movie.id + '">' + movie.title + '</a></div>';
					html +='<div class="movie_release_date">' + movie.releaseDate.date + '</br>Rating : ' + movie.voteAverage + '</div>';
					html +='</div>';
					html +='<div class="movie_footer">';
					html +='<ul>';
					html +='<li title="Book Tickets in a theatre near you"><a href=""><i class="icon icon-ticket"></a></i>';
					html +='</li><li title="Review"><a href="/content/review/' + movie.id + '"><i class="icon icon-film"></a></i>';
					html +='</li><li title="Like count"><div class="liker"><i class="icon icon-heart"></div></i>';
					html +='</li><li title="Share"><a href=""><i class="icon icon-share"></a></i>';
					html +='</li>';
					html +='</ul>';
					html +='</div>';
					html +='</div>';
					html +='</div>';
					html +='</li>';
					
				});
				$(element).html('');
				$(element).append(html);
				//console.log(data);
			},
			error:function(){
				$("#result").html('There is error while submit');
			}
		});
	}
	
	
	$(document).on('click', '#search_button', function(event) {
		event.preventDefault();
		var keyword = $('#search_box').val();
		showLoading('#search_result_list > ul');
		search(keyword ,'#search_result_list > ul');
	});
		
	$(document).on('click', '.liker', function(){
		$(this).find('i.icon.icon-heart').addClass('liked');
	});
	
});
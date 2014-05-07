$(document).ready(function () {
	
	function loadTweets(keyword) {
		
		$.ajax({
			url: '/tweet',
			type: 'post',
			dataType: 'json',
			data: {
				'keyword' : keyword
			},
			success: function(data){
				var html = '';
				$.each( data, function( index, tweet ){
					
					html += '<div class="row">';
					if(tweet.score.neg > tweet.score.pos) {
						html += '<div class="tweet negative">';
					} else if(tweet.score.neg < tweet.score.pos) {
						html += '<div class="tweet positive">';
					} else {
						html += '<div class="tweet">';
					}
					html += '<div class="user_image">';
					html += '<img src="' + tweet.user.profile_image_url + '" width="60" alt="">';
					html += '</div>';
					html += '<div class="tweet_text">';
					html += '<div class="meta">';
					html += '<p>' + tweet.user.name + '</p>';
					html += '<p>' + tweet.created_at + '</p>';
					html += '</div>';
					html += '<p>' + tweet.text + '</p>';
					html += '</div></div></div>';
				
				});
				
				$('#tweet_loader').html(html);
				console.log(data);
			},
			error:function(){
				$("#result").html('There is error while submit');
			}
		});
	}
				
	var movieName = $('#movie_name').text();
	loadTweets(movieName);
	
});
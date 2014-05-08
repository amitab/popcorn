$(document).ready(function () {
	
	function showLoading(element) {
		
		var loadingText = 'Loading...';
		
		var loading = '<div style="display: inline-block;"><div class="windows8"><div class="wBall" id="wBall_1"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_2"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_3"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_4"><div class="wInnerBall"></div></div><div class="wBall" id="wBall_5"><div class="wInnerBall"></div></div></div><div class="loading_text">' + loadingText + '</div></div>';
		$(element).html(loading);
	}
	
	function loadTweets(keyword, element) {
		
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
				
				$(element).html('');
				$(element).html(html);
				//console.log(data);
			},
			error:function(){
				$("#result").html('There is error while submit');
			}
		});
	}
				
	var movieName = $('#movie_name').text();
	showLoading('#tweet_loader');
	loadTweets(movieName, '#tweet_loader');
	
});
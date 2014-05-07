$(document).ready(function () {
	
	function loadTweets(keyword) {
		
		$.ajax({
			url: "/tweet/" + keyword,
			type: "post",
			data: array{
				'keyword' : keyword
			},
			success: function(data){
				$.each( data, function( index, tweet ){
					tweet.created_at
					tweet.text
					tweet.user.name
					tweet.user.profile_image_url
					tweet.retweet_count
					tweet.score.pos
					tweet.score.neg
				});
			},
			error:function(){
				$("#result").html('There is error while submit');
			}
		});
	}
	
});
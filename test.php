<!DOCTYPE html>
<html>
<head>
	<title>Full Screen test</title>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<style type="text/css">
	#vid-player {
		display: none;
		position: absolute;
		top: 0px;
		left: 0px;
		background-color: #EBEBEB;
		padding: 5%;
		/*border: solid 1px #000;*/
	}
</style>
<body>
<a href="#" onclick="playVideo();">Click to know more &raquo;</a>
<div id="vid-player">
	 <!--   -->
</div>
<script>

function youtubeEmbed(w, h, url) {
	return $('<iframe />', {
		width: w,
		height: h,
		src: url
	});
}

	function playVideo() {
		var w = $(document).width();
		var h = $(document).height();

		var player = $("#vid-player").css("width", w).css("height", h).show("fast");
		var youTubeObject = youtubeEmbed(0.9 * w, 0.9 * h, "http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=1");
		player.html(youTubeObject);
		player.click(function(e) {
			youTubeObject.remove();
			player.hide();
		});
	}
</script>
</body>
</html>
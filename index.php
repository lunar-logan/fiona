<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Fiona fashion</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://github.com/makeusabrew/bootbox/releases/download/v4.4.0/bootbox.min.js"></script>
    
    <style type="text/css">
    	@import url(https://fonts.googleapis.com/css?family=Poiret+One);
    	* {
    		/*font-family: 'Poiret One', cursive;*/
    	}
    	.jumbotron.babe {
    		background-image: url('assets/img/back1.jpg');
    		background-position: center;
    		background-size: cover;
    		background-repeat: no-repeat;
    	}
    </style>

</head>
<body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Fiona</a>
        </div>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron babe">
      <div class="container" style="padding-top: 15.5%;" id="root">
        <!-- <h1>Giving you a look you deserve</h1> -->
        <!-- <p>One stop solution for hairstyle, makeup, designer dress and designer accessories under one roof</p> -->
        <p>
        	<a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a>
        	<a class="btn btn-success btn-lg" href="#" role="button" id="request">Request a look &raquo;</a>
        </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Fiona fashions</p>
      </footer>
    </div> <!-- /container -->

<script>
	$(document).ready(function() {
		var h = $('body').height();
		console.log(h);
		$('.jumbotron.babe').css('height', h + 'px');

		$('#request').on('click', function() {
			bootbox.dialog({
				title: 'Book appointment',
				message: ' <form role="form">\
							  <div class="form-group">\
							    <label for="name">Name:</label>\
							    <input type="text" class="form-control" id="name">\
							  </div>\
							  <div class="form-group">\
							    <label for="phone">Phone:</label>\
							    <input type="text" class="form-control" id="phone">\
							  </div>\
							  <div class="form-group">\
							    <label for="loc">Location:</label>\
							    <input type="text" class="form-control" id="loc">\
							  </div>\
							</form>',
				buttons: {
					success: {
						label: "Done",
						className: "btn-success",
						callback: function() {
							var name = $('#name').val();
							var phone = $('#phone').val();
							var loc = $('#loc').val();

							$.post("book.php", {name: name, phone:phone, loc: loc}, function(data) {
								console.log(data);
								data = JSON.parse(data);
								if(data["code"] === 0) {
									alert("Great choice! we'll contact you soon");
								} else {
									alert("Something went bad, please try again");
								}
							});

      					}
					}
				}
			});	
		});
	});
</script>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>fiona fashions</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
<div id="root" class="root">
	<div id="root-header">
		<div id="logo"><img src="assets/img/logo.png" width="120"></div>
	</div>


	<div id="main-container">
		<div id="desc">
			<div id="main-desc">Giving you a look you deserve</div>
			<div id="sub-desc">One stop solution for hairstyle, makeup, designer dress and designer accessories under one roof</div>
			<div id="actions">
				<a href="#" class="btn grey">Learn more &raquo;</a>
				<a href="#booking-anchor" class="btn green">Book an appointment &raquo;</a>
			</div>
		</div>


	</div>
	<a name="booking-anchor"></a>
	<div id="booking" class="container">
		<div class="form-container">
			<h1>Book an appointment</h1>	
			<form action="">
				<table>
					<tr>
					<td><input type="text" id="name" placeholder="Your name"></td></tr>

					<tr>
					<td><input type="text" id="phone" placeholder="Your phone number"></td></tr>

					<tr>
					<td><input type="text" id="event" placeholder="Event"></td></tr>

					<tr>
					<td><input type="submit" value="Book Appointment"></td></tr>
				</table>
			</form>
		</div>
		<div class="message-container" id="messages">
		</div>
	</div>
	<div id="footer">
		<div id="social">
			<div>
				CONNECT WITH US
			</div>

			<div id="social-icons">
				<!-- <div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>-->
				<a href="https://www.facebook.com/fionafashions/"><img src="assets/img/fb.svg" alt="Facebook" width="20" height="20"></a>
				<a href="https://www.facebook.com/fionafashions/"><img src="assets/img/tw.svg" alt="Twitter" width="20" height="20"></a>
				<a href="https://www.facebook.com/fionafashions/"><img src="assets/img/in.svg" alt="Instagram" width="20" height="20"></a>
				<a href="https://www.facebook.com/fionafashions/"><img src="assets/img/ut.svg" alt="Youtube" width="20" height="20"></a>
			</div>

			<div style="font-size: 11px;">Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

		</div>
		<div id="copy">
			&copy; 2016, Fiona fashions
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('form').submit(function() {
			var name = $('#name').val();
			var phone = $('#phone').val();
			var event = $('#event').val();

			if(name !== null && name !== '' && phone !== null && phone !== '') { // I left the event purposely
				$.post("book.php",
					{
						name: name,
						phone: phone,
						event: event
					},
					function(data) {
						if(data.code === 0) {
							$('#name').val('');
							$('#phone').val('');
							$('#event').val('');
							$('#messages')
							.html("Appointment has been booked. We'll contact you soon")
							.show("fast");
						} else {
							// hope this doesn't sees the light of the day
							$('#messages')
							.html("Something went bad, please try to book again")
							.show("slow");
						}
					} 
				);
			} else {
				$('#messages')
					.html("Please fill in all the required details")
					.show("slow");
			}

			return false;
		});
	});
</script>
</body>
</html>
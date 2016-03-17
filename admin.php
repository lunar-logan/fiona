<?php
session_start();

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'fi');

function db_config() {
	mysql_connect(HOST, USER, PASSWORD) or die(mysql_error());
	mysql_select_db(DATABASE) or die(mysql_error());
}

function logout() {
	$_SESSION['user'] = NULL;
	session_destroy();
}

function sanitize_name($name ) {
	return mysql_escape_string(htmlentities($name));
}

function sanitize_passkey($pass) {
	return sha1($pass);
}

function is_session_set() {
	return isset($_SESSION['user']) and $_SESSION['user'] !== NULL;
}

function try_login() {

	if(is_session_set()) {
		return TRUE;
	}

	$user = filter_input(INPUT_POST, "uname");
	$pass = filter_input(INPUT_POST, "pass");
	if($user == NULL || $user == FALSE || $pass == NULL || $pass == FALSE) {
		return FALSE;
	}

	db_config();

	$user = sanitize_name($user);
	$pass = sanitize_passkey($pass);

	$sql = "SELECT * FROM users WHERE `username`='$user' AND `password`='$pass';";
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0) {
		$usr = mysql_fetch_assoc($result);
		$_SESSION['user'] = array(
			"username" => $usr['username'],
			"id"	   => $usr['id']
		);
		return TRUE;
	}

	return FALSE;
}

function get_orders() {
	db_config();

	$query = "SELECT * FROM bookings;";
	$res = mysql_query($query) or die(mysql_error());
	return $res;
}

if(isset($_GET['logout'])) {
	logout();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Fiona | AI</title>
</head>
<body>
<h1>Welcome to A.I. (Admin Interface)</h1>

<?php if(!try_login()): ?>
<h2>Enter your credentials to continue</h2>
<form method="POST" action="admin.php">
	<table>
		<tr>
			<td><label>Username</label></td>
			<td><input type="text" name="uname" placeholder="Your username"></input></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="pass" placeholder="Your password"></input></td>
		</tr>
		<tr>
			<td><input type="submit" value="Enter"></input></td>
		</tr>
	</table>
</form>
<?php else: ?>
	<h2>Hello <?php echo $_SESSION['user']['username']; ?></h2>
	<a href="admin.php?logout">Click to logout</a>

	<table border="1">
		<tr>
			<th>Ocassion</th>
			<th>Location</th>
			<th>Contact details</th>
		</tr>
		<?php
			while ($row = mysql_fetch_assoc(get_orders())) {
				echo '<tr>'.
						'<td>'.$row['type'].'</td>'.
						'<td>'.$row['venue'].'</td>'.
						'<td>'.$row['phone'].'</td>'.
						'</tr>';
			}
		?>
	</table>
<?php endif; ?>
</body>
</html>
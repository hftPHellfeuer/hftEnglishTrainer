<?php
include 'userManagement.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
 
<?php
include_once 'navigationBar.php';

navigationBar ();

if (isset ( $errorMessage )) {
	echo $errorMessage;
}
?>

    <!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="assets/css/ie10-viewport-bug-workaround.css"
		rel="stylesheet">

<?php
if (isset ( $_GET ['login'] )) {
	$email = $_POST ['email'];
	$passwort = $_POST ['passwort'];

	if (isset($_POST ['isTeacher'])){
		$result = loginTeacher( $email, $passwort );
	} else{
		$result = loginStudent ( $email, $passwort );
	}

	if ($result == null) {
		echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3>User / password wrong</h3></div>";
	} else {
		header ( "Location: index.php" );
	}
}
?>
<div class="jumbotron col-md-6 col-md-offset-3">
		<h1>Login</h1>
		<form action="?login=1" method="post">
			<div class="form-group ">
				<input type="email" placeholder="Email" name="email"
					class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="passwort" placeholder="Password"
					class="form-control">
			</div>
			<div class="form-group">
				<input type="checkbox" name="isTeacher">Login as Teacher</input>
			</div>
			
			<br>
			<button type="submit" class="btn btn-success btn-lg">Log in</button>
		</form>
	</div>
</body>
</html>
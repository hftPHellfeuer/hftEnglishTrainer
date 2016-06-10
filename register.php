<?php
include 'userManagement.php';

session_start ();

if (isset ( $_GET ['register'] )) {
	$email = $_POST ['email'];
	$passwort = $_POST ['passwort'];
	
   $result = register($email, $passwort);
   
   if ($result ==null){
       echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Can not register Student</h3></div>";
    }else{
       header("Location: test.php");
    }
    
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
 
<?php
if (isset ( $errorMessage )) {
	echo $errorMessage;
}
?>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<div class="jumbotron col-md-6 col-md-offset-3">
    <h1>
        Login
        </h1>
<form action="?register=1" method="post">
            <div class="form-group ">
              <input type="email" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="passwort" placeholder="Password" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-lg">Register</button>
</form>
</div>
</body>
</html>
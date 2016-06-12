<?php
include 'chapters.php';
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<title>Insert Chapter</title>
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
	if (isset ( $_GET ['insert'] )) {
		$name = $_POST ['name'];
		$description = $_POST ['description'];
		$result = addChapter ( $name, $description );
		// echo ($result);
		if ($result == 0) {
			echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Chapter Added</h3></div>";
		} else {
			echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Error adding chapter </h3></div>";
		}
	}
	?>
			
	<div class="jumbotron col-md-6 col-md-offset-3">

		<h1>Add new Chapter</h1>

		<form action="?insert=1" method="post">
			<div class="form-group ">Name:</div>
			<div class="form-group ">
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group ">Description:</div>
			<div class="form-group">
				<input type="text" name="description" class="form-control">
			</div>
			<br>
			<button type="submit" class="btn btn-success btn-lg">Insert</button>
		</form>
	</div>
</body>
</html>
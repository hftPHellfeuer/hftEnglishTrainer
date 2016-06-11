<?php
include 'chapters.php';
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Student to Chapter</title>
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
		$studentId = $_POST ['studentId'];
		$chapterId = $_POST ['chapterId'];
		echo "s" . $studentId;
		echo "c" . $chapterId;
		//TODO Check if connection already exist
		$result = addStudentToChapter( $studentId, $chapterId );
		// echo ($result);
		if ($result == 0) {
			echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Added Student to Chapter </h3></div>";
		} else {
			echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Error adding Student to Chapter </h3></div>";
		}
	}
	?>
		
	
	<div class="jumbotron col-md-6 col-md-offset-3">

		<h1>Add Student to Chapter</h1>

		<form action="?insert=1" method="post">
			<div class="form-group ">Student:</div>
			<div class="form-group ">
				<?php
				$students = getAllStudents ();
				
				echo '<select name="studentId" class="form-control">';
				foreach ( $students as $student ) {
					echo '<option value="' . $student ['Id'] . '">' . $student ['Name'] . " (".  $student ['EMail'] .") </option>";
				}
				echo "</select>";
				?>	
			</div>
			<div class="form-group ">Chapter:</div>
			<div class="form-group">
				<?php
				$chapters = getAllChaptersAdmin ();
				
				echo '<select name="chapterId" class="form-control">';
				foreach ( $chapters as $chapter ) {
					echo '<option value="' . $chapter ['Id'] . '">' . $chapter ['Name'] . " (".  $chapter ['Description'] .") </option>";
				}
				echo "</select>";
				?>	
			</div>
			<br>
			<button type="submit" class="btn btn-success btn-lg">Add</button>
		</form>
	</div>
</body>
</html>
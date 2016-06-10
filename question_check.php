<!DOCTYPE html>
<html>
<head>
<title>Check your answer</title>
</head>
<body>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="assets/css/ie10-viewport-bug-workaround.css"
		rel="stylesheet">
    
<?php
include 'questions.php';
$i = $_GET ['i'] + 1;
// Check if answer was correct and display right solution if it wasn't
// $result = answerQuestion($_GET['questionId'], $_GET['studentAnswer'], 1);
$result = "Not correct.";
?>

	<div class="jumbotron col-md-6 col-md-offset-3">
		<h1>Check your answer</h1>
		<form name="form" action="question_show.php" method="get">
			<div class="form-group ">
			Answer given: <?php echo $_GET ['studentAnswer'] ?>	
			</div>
			<div class="form-group ">
			Status: <?php echo $result; ?>	
			</div>
			<input type="hidden" name="nextQuestion" value="nextQuestion"
				class="form-control"> <input type="hidden" name="i"
				value="<?php echo $i?>">

			<div class="form-group ">
				<input type="submit" value="Next question"
					class="btn btn-success btn-lg">
			</div>
		</form>


	</div>
<?php
echo 'DEBUG <br/> QuestionId: ' . $_GET ['questionId'] . '<br/>';
echo 'Answer: ' . $_GET ['studentAnswer'] . '<br/>';
?>
</body>

</html>
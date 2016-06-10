<!DOCTYPE html>
<html>
<head>
<title>Question</title>
</head>
<body>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="assets/css/ie10-viewport-bug-workaround.css"
		rel="stylesheet">

	<div class="jumbotron col-md-6 col-md-offset-3">
<?php
include 'questions.php';

$questions = getQuestionsForChapter ( 1, 1 );

if ($_GET ['i'] == count ( $questions )) {
	echo '

		<h1>All questions answered. Go to new chapter</h1>
		<form name="form" action="index.php" method="get">
			<div class="form-group ">
				<input type="submit" value="Go back to main page!"
					class="btn btn-success btn-lg"><br />
			</div>
		</form>';

	} else { handleOneQuestion ( $questions[ $_GET ['i']] ); } 
	
	
	function handleOneQuestion($question) {
		echo '<h2>'.$question ['Text'].'</h2>';
		echo '<form name="form" action="question_check.php" method="get">' .
					"<input type=\"hidden\" name=\"questionId\"value=" . $question ['Id'] . ">" . 
					'<input type="hidden" name="i" value="'.$_GET ['i'].'">
					<div class="form-group "><input type="text" name="studentAnswer" id="studentAnswer" value="" class="form-control"></div>
					<div class="form-group "><input type="submit" value="Submit" class="btn btn-success btn-lg"></div>
			</form>
	'; 
		
	
}
?>
</div>
</body>
</html>
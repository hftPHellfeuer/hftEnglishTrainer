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
<?php
include_once 'navigationBar.php';

navigationBar();
?>
	<div class="jumbotron col-md-6 col-md-offset-3">
<?php

include 'questions.php';

$chapterId = $_POST['Chapter'];
$questions = getQuestionsForChapter ( $chapterId, getUserId() );

if ($_POST ['i'] == count ( $questions )) {
	echo '

		<h1>All questions answered. Go to new chapter</h1>
		<form name="form" action="index.php" method="get">
			<div class="form-group ">
				<input type="submit" value="Go back to main page!"
					class="btn btn-success btn-lg"><br />
			</div>
		</form>';

	} else { handleOneQuestion ( $questions[ $_POST ['i']]); } 
	
	
	function handleOneQuestion($question) {
		echo '<h1>Please answer the following question</h1>'; 
		echo '<div class="form-group ">'.$question ['Text'] . '?</div>'; 
		echo '<form name="form" action="question_check.php" method="post">' .
					"<input type=\"hidden\" name=\"questionId\"value=" . $question ['Id'] . ">" . 
					'<input type="hidden" name="Answer" value="'.$question ['Answer'].'"> 
					<input type="hidden" name="i" value="'.$_POST ['i'].'"> 
					<input type="hidden" name="Chapter" value="'.$_POST['Chapter'].'">
					<div class="form-group "><input type="text" name="studentAnswer" id="studentAnswer" value="" class="form-control"></div>
					<div class="form-group "><input type="submit" value="Submit" class="btn btn-success btn-lg"></div>
			</form>
	'; 
		echo 'Debug: Id: ' . $question ['Id'] . ' Answer: ' . $question	['Answer'] . '	<br /> <br />';
		echo "Chapter: " .  $_POST ['Chapter'];
	
}
?>
</div>
</body>
</html>
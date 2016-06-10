<!DOCTYPE html>
<html>
<head>

	<?php
	include_once 'questions.php';
	include_once 'userManagement.php';

	$i = $_GET ['i'] + 1;
	// Check if answer was correct and display right solution if it wasn't

	$questions = getQuestionsForChapter ( 1, 1 );
	$myQuestion = $questions[$i -1];
	$result = answerQuestion($_GET['questionId'], $_GET['studentAnswer'], getUserId());
	if ($result== 0)
	{
		$title = 'Good Job!';
	}elseif($result == 1){
		$title = 'Sorry that\'s wrong...';
	}else{
		$title = 'Error Code: 0'. $result;
	}
	//$result = "Not correct.";
	echo('<title>'.$title.'</title>');

	?>


</head>
<body>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="assets/css/ie10-viewport-bug-workaround.css"
		rel="stylesheet">
    


	<div class="jumbotron col-md-6 col-md-offset-3">
		<h1><?php   echo($title) ?></h1>
		<form name="form" action="question_show.php" method="get">
			<div class="form-group ">
				<?php
					echo('<p><h2>'.$myQuestion ['Text']. ':  </h2></p>');
					echo('<p><h2> Correct Answer: ' .$myQuestion ['Answer']. '</h2></p>');
					echo ('<p><h2> Your Answer: ' .$_GET ['studentAnswer'].'</h2></p>') ?>

			</div>
			<input type="hidden" name="nextQuestion" value="nextQuestion"
				class="form-control"> <input type="hidden" name="i"
				value="<?php echo $i?>">
			<br>
			<div class="form-group ">
				<input type="submit" value="Next question"
					class="btn btn-success btn-lg">
			</div>
		</form>


	</div>
<?php
//echo 'DEBUG <br/> QuestionId: ' . $_GET ['questionId'] . '<br/>';
//echo 'Answer: ' . $_GET ['studentAnswer'] . '<br/>';
?>
</body>

</html>
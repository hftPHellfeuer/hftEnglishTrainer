<?php
	include 'questions.php';
	echo 'QuestionId: ' . $_GET['questionId'] . '<br/>';
	echo 'Your answer: ' . $_GET['studentAnswer'] . '<br/>';

	//Check if answer was correct and display right solution if it wasn't
	//echo answerQuestion($_GET['questionId'], $_GET['studentAnswer'], 1);
	
	$i = $_GET['i'] + 1;
	//Continue
	echo '<form name="form" action="question_show.php" method="get">
			<input type="hidden" name="nextQuestion" value="nextQuestion">
			<input type="hidden" name="i" value="'.$i.'">
			<input type="submit" value="Next question"><br/>
		  </form>';
	

?>
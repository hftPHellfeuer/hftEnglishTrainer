<?php
include 'questions.php';

$questions = getQuestionsForChapter ( 1, 1 );

if ($_GET ['i'] == count ( $questions )) {
	echo ("All questions answered. Go to new chapter.");
	echo '	<form name="form" action="index.php" method="get">
				<input type="submit" value="Go back to main page!"><br/>
			</form>';
} else {
	handleOneQuestion ( $questions[ $_GET ['i']] );
}

function handleOneQuestion($question) {
	echo 'Please answer the following question: <br/>';
	echo $question ['Text'] . '? <br>';
	echo 'Answer:';
	echo '<form name="form" action="question_check.php" method="get">' .
			"<input type=\"hidden\" name=\"questionId\"value=" . $question ['Id'] . ">" .
			'<input type="hidden" name="i" value="'.$_GET ['i'].'"><br/>
			 <input type="text" name="studentAnswer" id="studentAnswer" value=""><br/>
			<input type="submit" value="Submit"><br/>
		  </form>';

	echo 'Debug: Id: ' . $question ['Id'] . ' Answer: ' . $question ['Answer'] . '<br/><br/>';
}
?>
<html>
<a href="login.php">Login</a>
<a href="logout.php">Logout</a>
<a href="register.php">Register</a>
<a href="admin.php">Admin</a>

<br />
<br />
<br />
<br />
<br />
<br />
<br />

<?php
include 'questions.php';

// AnswerQuestion(8, 'PhP',2);

$questions = getQuestionsForChapter ( 1, 1 );

foreach ( $questions as $question ){
	echo 'Please answer the following question: <br/>';
	echo $question['Text'] . '? <br>';
	echo 'Answer:';
	echo '<input type="text" name="Answer" value=""><br/>';
	echo '<input type="submit" value="Submit"><br/>';

	//Check if answer was correct and display right solution if it wasn't
	//answerQuestion($question['Id'], Answer, 1);
	
	
	//Continue
}
	
	
print_r ( $questions );

// GetQuestions ();

?>
</html>
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
include_once 'navigationBar.php';
		
		navigationBar();
		
include_once 'questions.php';
include_once 'userManagement.php';

$i = $_POST ['i'] + 1;
$chapter = $_POST['Chapter'];

// Check if answer was correct and display right solution if it wasn't

 $result = answerQuestion($_POST['questionId'], $_POST['studentAnswer'], getUserId());
 
 if ($result == 0){
 	$resultText = "Correct Answer.";
 } else if($result == 1){
 	$resultText = "Wrong Answer. Correct answer is: " .$_POST['Answer'];
 } else if($result == 2){
 	$resultText = "You are not allowed to answer that question. Ask your teacher to unlock this Chapter for you.";
 } else if($result == 3){
 	$resultText = "Question does not exist. Ask your teacher.";
 } else if($result == 3){
 	$resultText = "There is something wrong with your student profile. Ask your teacher.";
 }
?>

	<div class="jumbotron col-md-6 col-md-offset-3">
		<h2>  <?php echo $resultText; ?>	</h2>
		<form name="form" action="question_show.php" method="post">
			<div class="form-group ">
				<?php echo $_POST ['Question'].'?' ?>
			</div>
			<div class="form-group ">
			Answer given: <?php echo $_POST ['studentAnswer'] ?>	
			</div>

			<input type="hidden" name="nextQuestion" value="nextQuestion">
			<input type="hidden" name="i" value="<?php echo $i?>">
			<input type="hidden" name="Chapter" value="<?php echo $chapter?>">

			<div class="form-group ">
				<input type="submit" value="Next question"
					class="btn btn-success btn-lg">
			</div>
		</form>


	</div>
<?php
/*echo 'DEBUG <br/> QuestionId: ' . $_POST ['questionId'] . '<br/>';
echo 'studentAnswer: ' . $_POST ['studentAnswer'] . '<br/>';
echo 'correctAnswer: ' . $_POST ['Answer'] . '<br/>';
echo "StudentID: " . getUserId();
echo "Chapter: " .  $_POST ['Chapter'];
*/?>
</body>

</html>

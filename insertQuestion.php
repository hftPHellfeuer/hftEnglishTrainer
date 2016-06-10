<?php
include 'questions.php';
session_start ();
if (isset ( $_GET ['insert'] )) {
	$chapter = $_POST ['chapter'];
	$question = $_POST ['question'];
    $answer = $_POST ['answer'];
   $result = addQuestionToChapter( $question, $answer, $chapter);
   echo($result);
   if ($result == 0){
       echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Question Added</h3></div>";
    }else{
        echo "<div class='jumbotron col-md-6 col-md-offset-3' > <h3> Chapter does not exist </h3></div>";
    }    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Insert Question</title>
</head>
<body>
 
<?php
if (isset ( $errorMessage )) {
	echo $errorMessage;
}
?>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<div class="jumbotron col-md-6 col-md-offset-3">
    <h1>
        Add new Questions
        </h1>
<form action="?insert=1" method="post">
			<div class="form-group ">Chapter name:</div>
            <div class="form-group ">
              <input type="text" name="chapter" class="form-control">
            </div>
            <div class="form-group ">Question:</div>
            <div class="form-group">
              <input type="text" name="question" placeholder="question" class="form-control">
            </div>
            <div class="form-group ">Answer:</div>
            <div class="form-group">
              <input type="text" name="answer" placeholder="answer" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success btn-lg">Insert</button>
</form>
</div>
</body>
</html>
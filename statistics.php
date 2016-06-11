<?php
include_once 'navigationBar.php';
include 'userManagement.php';

navigationBar();

?>
<?php 
if (isset ( $errorMessage )) {
	echo $errorMessage;
}
?>

    <!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="assets/css/ie10-viewport-bug-workaround.css"
		rel="stylesheet">

<!DOCTYPE html>
<html>
<head>
<title>Insert Question</title>
</head>
<body>


<table style="width:100%">
<?php
	echo '<tr><td><b>Student</b></td><td><b>Question</b></td><td><b>Correct tries</b></td><td><b>Wrong tries</b></td><td><b>Wrong answers</b></td></tr>';

	$stats = getStatistics();
	foreach ( $stats as $stat ) {
		echo '<tr><td>>' . $stat ['Student_Id'] . '</td><td>' . $stat ['Question_Id'] . "</td><td>" . $stat ['correctTrys'] . "</td><td>" . $stat ['wrongTrys'] . "</td><td>" . $stat ['wrongAnswers'] . '</td></tr>';
	}

?>
</table>


</body>

</html>
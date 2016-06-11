<html>
<?php
include_once 'chapters.php';
include_once 'navigationBar.php';

navigationBar ();

echo ('<div class="col-md-8 col-md-offset-2">');
if (isLogedIn ()) {
	
	echo "<h1>Chapters</h1>";
	if (isTeacher()){
		$chapters = getAllChaptersAdmin();
	}else{
		$chapters = getAllChapters ( getUserId () );
	}
	
	
	if ($chapters == null) {
		echo "There are currently no chapters unlocked for you. Please ask your teacher. <br/> At the moment it is not possible to start the quiz.";
	} else {
		foreach ( $chapters as $chapter ) {
			echo '<p><b>' . $chapter ['Id'] . ')</b><u>' . $chapter ['Name'] . "</u>: " . $chapter ['Description'] . '</p>';
		}
		
		// TODO use combobox?
		
		echo "<h1>Start the game</h1>";
		echo '	<form name="form" action="question_show.php" method="get">
				Please enter the chapter: <input type="text" name="Chapter" value="1"><br/>
				<input type="hidden" name="i" value="0"><br/>
				<input class=\'btn btn-success btn-lg\' type="submit" value="Start the Quiz!"><br/>
			</form>';
	}
} else {
	echo "Welcome <br> Please Log In before playing <br> <div class='btn btn-success btn-lg'> <a href='login.php'> Log In </a></div>";
}
echo ('</div>');

?>
</html>
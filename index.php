<html>
<?php
include_once 'chapters.php';
include_once 'navigationBar.php';

navigationBar ();

echo ('<div class="col-md-8 col-md-offset-2">');
if (isLogedIn ()) {
	
	echo "<h1>Chapters</h1>";
	if (isTeacher ()) {
		$chapters = getAllChaptersAdmin ();
		// assuming teacher can't play
		print_chapters ( $chapters );
	} else {
		$chapters = getAllChapters ( getUserId () );
		
		if ($chapters == null) {
			echo "There are currently no chapters unlocked for you. Please ask your teacher. <br/> At the moment it is not possible to start the quiz.";
		} else {
			
			print_chapters ( $chapters );

			echo "<h1>Start the game</h1>";
			echo '	<form name="form" action="question_show.php" method="get">
				Please select the chapter:';
			
			echo '<select name="Chapter" class="form-control">';
			foreach ( $chapters as $chapter ) {
				echo '<option value="' . $chapter ['Id'] . '">' . $chapter ['Name'] . " (" . $chapter ['Description'] . ") </option>";
			}
			echo "</select>";
			echo '
				<input type="hidden" name="i" value="0"><br/>
				<input class=\'btn btn-success btn-lg\' type="submit" value="Start the Quiz!"><br/>
			</form>';
		}
	}
} else {
	echo "Welcome <br> Please Log In before playing <br> <div class='btn btn-success btn-lg'> <a href='login.php'> Log In </a></div>";
}
echo ('</div>');
function print_chapters($chapters) {
	foreach ( $chapters as $chapter ) {
		echo '<p><b>' . $chapter ['Id'] . ')</b><u>' . $chapter ['Name'] . "</u>: " . $chapter ['Description'] . '</p>';
	}
}

?>
</html>
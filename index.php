<html>
<?php
session_start();
include_once 'chapters.php';
include_once 'navigationBar.php';
		
		navigationBar();

if (isset($_SESSION['id'])) {
	echo($_SESSION['id']);
}else{
	echo('session is empty');
}
		echo "<h1>Chapters</h1>";
		$chapters = getAllChapters();
		foreach ($chapters as $chapter){
			echo $chapter['Id'] . " Name " . $chapter['Name']. " Descr. " . $chapter['Description'] . '<br/>';
		}
		
		echo "<h1>Start the game</h1>";
echo '	<form name="form" action="question_show.php" method="get">
			Please enter the chapter: <input type="text" name="Chapter" value="1"><br/>
			<input type="hidden" name="i" value="0"><br/>
			<input type="submit" value="Start the Quiz!"><br/>
		</form>';

?>
</html>
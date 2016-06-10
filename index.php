<html>
<?php
session_start();
session_unset();
session_regenerate_id(true);
include_once 'chapters.php';
include_once 'navigationBar.php';
		
		navigationBar();

$cookie_name = 'id';
if(!isset($_COOKIE[$cookie_name])) {
	echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
	echo "Cookie '" . $cookie_name . "' is set!<br>";
	echo "Value is: " . $_COOKIE[$cookie_name];
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
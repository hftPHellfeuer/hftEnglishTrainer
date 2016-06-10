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
include 'chapters.php';
		echo "<h1>Chapters</h1>";
		$chapters = getAllChapters();
		foreach ($chapters as $chapter){
			echo $chapter['Id'] . " Name " . $chapter['Name']. " Descr. " . $chapter['Description'];
		}
		
		echo "<h1>Start the game</h1>";
echo '	<form name="form" action="question_show.php" method="get">
			Please enter the chapter: <input type="text" name="Chapter" value="1"><br/>
			<input type="hidden" name="i" value="0"><br/>
			<input type="submit" value="Start the Quiz!"><br/>
		</form>';

?>
</html>
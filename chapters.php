<?php
include 'db_access.php';

function addChapter($name, $description){

	$sql = "INSERT INTO Chapter (Name, Description) VALUES ('$name', '$description');";
	
	$conn = OpenConnection ();
	
	$stmt = sqlsrv_query ( $conn, $sql );
	if ($stmt == false) {
		echo "Error in executing statement.\n";
		die ( print_r ( sqlsrv_errors (), true ) );
	}
	
	if ($stmt == false) {
		echo "Could not insert chapters.\n";
		$result = 1;
	} else {
		$result= 0;
		}
	
	
	/* Free the statement and connection resources. */
	sqlsrv_free_stmt ( $stmt );
	CloseConnection ( $conn );
	
	return $result;
	
}

function getAllChaptersAdmin() {

	$sql = "SELECT * from Chapter";
	return getChapters($sql);
}

function getAllChapters($studentID) {

	$sql = "SELECT * from Chapter inner join Student_Chapter on Chapter_Id = Id Where Student_Id = '{$studentID}'";
	return getChapters($sql);
}

function getChapters($sql){
	$conn = OpenConnection ();
	
	$stmt = sqlsrv_query ( $conn, $sql );
	if ($stmt == false) {
		echo "Error in executing statement.\n";
		die ( print_r ( sqlsrv_errors (), true ) );
	}
	
	$chapters = array ();
	
	if ($stmt == false) {
		echo "Could not load chapters.\n";
		die ( print_r ( sqlsrv_errors (), true ) );
	} else {
		$count = 0;
		while ( $row = sqlsrv_fetch_array ( $stmt, SQLSRV_FETCH_ASSOC ) ) {
			array_push ( $chapters, array (
					'Id' => $row ['Id'],
					'Name' => $row ['Name'],
					'Description' => $row ['Description']
			) );
			$count ++;
		}
	}
	
	/* Free the statement and connection resources. */
	sqlsrv_free_stmt ( $stmt );
	CloseConnection ( $conn );
	
	return $chapters;
}

function addStudentToChapter($studentId, $chapterId){

	$sql = "INSERT INTO Student_Chapter (Student_Id, Chapter_Id) VALUES ('$studentId', '$chapterId');";
	
	$conn = OpenConnection ();
	
	$stmt = sqlsrv_query ( $conn, $sql );
	if ($stmt == false) {
		echo "Error in executing statement.\n";
		die ( print_r ( sqlsrv_errors (), true ) );
	}
	
	if ($stmt == false) {
		echo "Could not add student to chapter.\n";
		$result = 1;
	} else {
		$result= 0;
	}
	
	
	/* Free the statement and connection resources. */
	sqlsrv_free_stmt ( $stmt );
	CloseConnection ( $conn );
	
	return $result;
}


?>
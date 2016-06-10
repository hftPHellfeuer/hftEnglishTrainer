<?php
include 'db_access.php';

function addChapter($name, $description){
	
}

function getAllChapters() {
	
	$sql = "SELECT * FROM Chapter";
	
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
?>
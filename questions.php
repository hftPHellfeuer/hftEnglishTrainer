<?php
include 'db_access.php';
function GetQuestions() {
	try {
		$sql = "SELECT * FROM Question";

		$conn = OpenConnection ();
		
		$stmt = sqlsrv_query ( $conn, $sql );
		if ($stmt == false) {
			echo "Error in executing statement 3.\n";
			die ( print_r ( sqlsrv_errors (), true ) );
		}
		
		$count = 0;
		echo "Questions:<br/>";
		while ( $row = sqlsrv_fetch_array ( $stmt, SQLSRV_FETCH_ASSOC ) ) {
			echo ($row ['Text'] . " -> " . $row ['Answer']);
			echo ("<br/>");
			$count ++;
		}
		sqlsrv_free_stmt ( $stmt );
		
		CloseConnection ( $conn );
	} catch ( Exception $e ) {
		echo ("Error!");
	}
}

//https://msdn.microsoft.com/en-us/library/cc626303(v=sql.105).aspx
//TODO
function GetQuestions_StoredProcedure() {

}
?>
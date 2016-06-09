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
function getQuestionsForChapter($chapterId, $studentId)
{

    $sql = "{call GetQuestionsForChapter( ?, ?, ? )}";
    $result= 34;
    $params = array(
        array($chapterId, SQLSRV_PARAM_IN),
        array($studentId, SQLSRV_PARAM_IN),
        array($result, SQLSRV_PARAM_OUT)
    );

    $conn = OpenConnection ();
		/* Execute the query. */
	$stmt = sqlsrv_query ( $conn, $sql, $params );
	
	$questions = array();
	
	if ($stmt == false) {
		echo "Could not load Questions.\n";
		die ( print_r ( sqlsrv_errors (), true ) );
	} else {
		$count = 0;
		while ( $row = sqlsrv_fetch_array ( $stmt, SQLSRV_FETCH_ASSOC ) ) {
			//echo ($row ['Text'] . " -> " . $row ['Answer']);
			//echo ("<br/>");
			array_push($questions, array('Id' => $row['Id'], 'Text' => $row ['Text'], 'Answer' => $row ['Answer']));
			$count ++;
			
		}
	}

    /*Free the statement and connection resources. */
    sqlsrv_free_stmt( $stmt);
    sqlsrv_close( $conn);
    
    return $questions;

}

function answerQuestion($questionId, $answer, $studentId)
{

	$tsql_callSP = "{call AnswerQuestion( ?, ?, ?, ? )}";
	$result= -1;
	$params = array(
		array($questionId, SQLSRV_PARAM_IN),
		array($answer, SQLSRV_PARAM_IN),
		array($studentId, SQLSRV_PARAM_IN),
		array($result, SQLSRV_PARAM_OUT)
	);

	$conn = OpenConnection ();
	/* Execute the query. */
	$stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);
	if( $stmt3 === false )
	{
		echo "Error in executing statement 3.\n";
		die( print_r( sqlsrv_errors(), true));
	}

	echo "result of answering question: ".$result;
	/*				0 - Correct Answer
--					1 - wrong Answer
--					2 - not allowed to answer
--					3 - question does not exist
--					4 - student does not exist
	 */

	/*Free the statement and connection resources. */
	sqlsrv_free_stmt( $stmt3);
	sqlsrv_close( $conn);
	
	return $result;

}

function addQuestionToChapter($Question,$Answer , $ChapterId)
{
	/* Define the Transact-SQL query. Use question marks (?) in place of
    the parameters to be passed to the stored procedure */
	$tsql_callSP = "{call AddQuestionToChapter( ?, ?, ?,?)}";

	/* Define the parameter array. By default, the first parameter is an
    INPUT parameter. The second parameter is specified as an INOUT
    parameter. Initializing $vacationHrs to 8 sets the returned PHPTYPE to
    integer. To ensure data type integrity, output parameters should be
    initialized before calling the stored procedure, or the desired
    PHPTYPE should be specified in the $params array.*/

    $result= -1;
	$params = array(
		array($Question, SQLSRV_PARAM_IN),
		array($Answer, SQLSRV_PARAM_IN),
		array($ChapterId, SQLSRV_PARAM_IN),
        array($result, SQLSRV_PARAM_OUT)
	);


	$conn = OpenConnection ();
	/* Execute the query. */
	$stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);
	if( $stmt3 === false )
	{
		echo "Error in executing statement 3.\n";
		die( print_r( sqlsrv_errors(), true));
	}

	/*Free the statement and connection resources. */
	sqlsrv_free_stmt( $stmt3);
	CloseConnection ( $conn );
    return $result;
}


?>
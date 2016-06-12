<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 10.06.2016
 * Time: 20:44
 */
include_once 'db_access.php';


$questionId = 1;
$answer = 'eight';
$studentId = 1;
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
    $test = sqlsrv_errors() ;
    $a = $test[0];
    echo($a[2] .'<br>');


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

?>
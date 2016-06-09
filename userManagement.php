<?php
include 'db_access.php';
function login($email, $password)
{
        try {
		$sql = "SELECT * FROM [dbo].[Student] where EMail = '{$email}' AND Password= '{$password}'";
		$conn = OpenConnection ();
		$result = sqlsrv_query ( $conn, $sql );
		#checks if the search was made
        if($result === false){
      	sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
            return null;
        }

#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
    	sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
       return null;
}else{

#creates sessions
    while($row = sqlsrv_fetch_array($result)){
      $userinfo=  array( $row['Id'],$row['Name'],$row['EMail'] , false);
    }
#redirects user
    	sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
        return $userinfo;
}

	} catch ( Exception $e ) {
		sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
       return null;
	}
}

?>
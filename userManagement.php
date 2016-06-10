<?php
include 'db_access.php';
function loginStudent($email, $password)
{
    return internalLogin($email, $password, false);
}

function loginTeacher($email, $password)
{
    return internalLogin($email, $password, true);
}

private function internalLogin($email, $password, $teacher)
{
     try {
         if ($teacher)
         {
             $sql = "SELECT * FROM [dbo].[Teacher] where EMail = '{$email}' AND Password= '{$password}'";
         }else {
             $sql = "SELECT * FROM [dbo].[Student] where EMail = '{$email}' AND Password= '{$password}'";
         }
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
      $userinfo=  array( $row['Id'],$row['Name'],$row['EMail'] , $teacher);
    }
#redirects user
    	sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
        
        
        if ($userinfo !=null) 
    {
       $_SESSION['id'] = $result[0];
       $_SESSION['name'] = $result[1];
       $_SESSION['email'] = $result[2];
       $_SESSION['teacher'] = $result[3];
    }
        return $userinfo;
}


function logout()
{
    $_SESSION['id'] = null;
    $_SESSION['name'] = null;
    $_SESSION['email'] = null;
    $_SESSION['teacher'] = null;
}

function isLogedIn()
{
    return $_SESSION['id'] != null;
}
function isTeacher()
{
    return $_SESSION['teacher'] == true;
}

function getUserInfo()
{
    return array($_SESSION['id'] , $_SESSION['name'] , $_SESSION['email'], $_SESSION['teacher']);
}

function registerUser($email, $password)
{
      try {
        
        $sql = "INSERT INTO [dbo].[Student] values('{$email}' ,'{$password}')";
        $conn = OpenConnection ();
		$result = sqlsrv_query ( $conn, $sql );
		#checks if the search was made
        if($result == false){
      	sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
            return null;
        }

        # Try log in the new User
     	loginStudent( $email, $password);
        
        sqlsrv_free_stmt ( $result );
		CloseConnection ( $conn );
        
        return $userinfo;
}

?>
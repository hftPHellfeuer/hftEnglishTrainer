<?php
include_once 'db_access.php';
function loginStudent($email, $password)
{
    return internalLogin($email, $password, false);
}

function loginTeacher($email, $password)
{
    return internalLogin($email, $password, true);
}

function internalLogin($email, $password, $teacher)
{
    if ($teacher) {
        $sql = "SELECT * FROM [dbo].[Teacher] where EMail = '{$email}' AND Password= '{$password}'";
    } else {
        $sql = "SELECT * FROM [dbo].[Student] where EMail = '{$email}' AND Password= '{$password}'";
    }
    $conn = OpenConnection();
    $result = sqlsrv_query($conn, $sql);
    #checks if the search was made
    if ($result === false) {
        sqlsrv_free_stmt($result);
        CloseConnection($conn);
        return null;
    }

#checks if the search brought some row and if it is one only row
    if (sqlsrv_has_rows($result) != 1) {
        sqlsrv_free_stmt($result);
        CloseConnection($conn);
        return null;
    } else {

#creates sessions
        while ($row = sqlsrv_fetch_array($result)) {
            $userinfo = array($row['Id'], $row['Name'], $row['EMail'], $teacher);
        }
#redirects user
        sqlsrv_free_stmt($result);
        CloseConnection($conn);


        if ($userinfo != null) {
            setcookie("user_id", $userinfo[0], time()+360000, '/', Null);
            setcookie("user_name", $userinfo[1], time()+360000, '/', Null);
            setcookie("user_email", $userinfo[2], time()+360000, '/', Null);
            setcookie("user_teacher", $userinfo[3], time()+360000, '/', Null);
        }
        return $userinfo;
    }
}


    function logout()
    {
        setcookie("user_id", "", time()-360000, '/', Null);
        setcookie("user_name","", time()-360000, '/', Null);
        setcookie("user_email", "", time()-360000, '/', Null);
        setcookie("user_teacher","", time()-360000, '/', Null);
    }

    function isLogedIn()
    {
        return isset($_COOKIE['user_id']);
    }

    function isTeacher()
    {
        return isset($_COOKIE['user_teacher']) && $_COOKIE['user_teacher'] == true;
    }

    function getUserName()
    {
        if (isset($_COOKIE['user_id']))
        {
            return $_COOKIE['user_name'];
        }else{
            return null;
        }
    }

    function getUserId()
    {
        if (isset($_COOKIE['user_id']))
        {
            return $_COOKIE['user_id'];
        }else{
            return null;
        }
    }

    function registerUser($Name, $email, $password)
    {
        $sql = "INSERT INTO [dbo].[Student] values('{$Name}' ,'{$email}' ,'{$password}')";
        $conn = OpenConnection();
        $result = sqlsrv_query($conn, $sql);
        #checks if the search was made
        if ($result === false) {
           // sqlsrv_free_stmt($result);
            CloseConnection($conn);
            return null;
        }

        # Try log in the new User
        $userinfo = loginStudent($email, $password);

        sqlsrv_free_stmt($result);
        CloseConnection($conn);

        return $userinfo;
    }


?>
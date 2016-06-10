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
            $_SESSION['id'] = $result[0];
            $_SESSION['name'] = $result[1];
            $_SESSION['email'] = $result[2];
            $_SESSION['teacher'] = $result[3];
            setcookie("id", $result[0], time()+3600, '/', Null);
            session_write_close();
        }
        return $userinfo;
    }
}


    function logout()
    {
        unset($_SESSION['id'] );
        unset($_SESSION['name'] );
        unset($_SESSION['email'] );
        unset($_SESSION['teacher'] );
    }

    function isLogedIn()
    {
        return isset($_SESSION['id']) ;
    }

    function isTeacher()
    {
        return isset($_SESSION['teacher']) && $_SESSION['teacher'] == true;
    }

    function getUserInfo()
    {
        if (isset($_SESSION['id']))
        {
            return array($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['teacher']);
        }else{
            return null;
        }

    }

    function registerUser($email, $password)
    {
        $sql = "INSERT INTO [dbo].[Student] values('{$email}' ,'{$password}')";
        $conn = OpenConnection();
        $result = sqlsrv_query($conn, $sql);
        #checks if the search was made
        if ($result == false) {
            sqlsrv_free_stmt($result);
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
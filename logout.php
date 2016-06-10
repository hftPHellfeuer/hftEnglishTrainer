<?php
include userManagement.php;
if (isLogedIn())
{
    echo "logged In <br>";
}
if (isTeacher())
{
    echo "Teacher";
}

echo "Logout erfolgreich";
?>
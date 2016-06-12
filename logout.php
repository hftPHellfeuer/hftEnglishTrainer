<?php
include 'userManagement.php';

include_once 'navigationBar.php';

navigationBar();

logout();
header("Location: index.php");

?>
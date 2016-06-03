<?php
echo "<html>";

echo "Under construction.";
phpinfo();

$connectionInfo = array("UID" => "HftAdmin@hft-projects", "pwd" => "", "Database" => "EnglishTraining", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:hft-projects.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn){
	echo "Connection established.<br />";
}
else{
	echo "Connection could not be established.<br />";
	die( print_r( sqlsrv_errors(), true));
}

//-----------------------------------------------
// Perform operations with connection.
//-----------------------------------------------

/* Close the connection. */
sqlsrv_close( $conn);

echo "</html>"
?>
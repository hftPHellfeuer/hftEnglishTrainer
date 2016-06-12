<?php
if (!function_exists('OpenConnection')){
function OpenConnection() {
	$connectionInfo = array (
			"UID" => "HftAdmin@hft-projects",
			"pwd" => "database2016#",
			"Database" => "EnglishTraining",
			"LoginTimeout" => 30,
			"Encrypt" => 1,
			"TrustServerCertificate" => 0 
	);
	$serverName = "tcp:hft-projects.database.windows.net,1433";
	$conn = sqlsrv_connect ( $serverName, $connectionInfo );
	
	if ($conn) {
		//echo "Connection established.<br />";
	} else {
		echo "Connection could not be established.<br />";
		die ( print_r ( sqlsrv_errors (), true ) );
	}
	
	return $conn;
}
}
if (!function_exists('CloseConnection')){
function CloseConnection($conn) {
	sqlsrv_close ( $conn );
}
}

?>
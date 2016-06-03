<?php
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
		echo "Connection established.<br />";
	} else {
		echo "Connection could not be established.<br />";
		die ( print_r ( sqlsrv_errors (), true ) );
	}

	return $conn;
}

//todo: stored procedure approach (wie?) und wiederverwendbar machen
function ReadData() {
	try {
		$conn = OpenConnection ();
		$tsql = "SELECT * FROM Question";
		$getProducts = sqlsrv_query ( $conn, $tsql );
		if ($getProducts == FALSE)
			die ( FormatErrors ( sqlsrv_errors () ) );
			$productCount = 0;
			while ( $row = sqlsrv_fetch_array ( $getProducts, SQLSRV_FETCH_ASSOC ) ) {
				echo ($row ['Text']);
				echo ("<br/>");
				$productCount ++;
			}
			sqlsrv_free_stmt ( $getProducts );
			sqlsrv_close ( $conn );
	} catch ( Exception $e ) {
		echo ("Error!");
	}
}
?>
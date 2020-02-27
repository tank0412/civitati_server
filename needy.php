<?php

$TYPE = $_GET["TYPE"];

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");

if (strcmp($TYPE, "I") == 0 ) {
	$ID = $_GET["ID"];
	$NAME = $_GET["NAME"];
    $REASON = $_GET["HELP_REASON"];
	$ADDRESS = $_GET["ADDRESS"];
	$TELEPHONE = $_GET["TELEPHONE"];
	$sql = "INSERT INTO NEEDY (ID,NAME, HELP_REASON, ADDRESS, TELEPHONE ) VALUES ('" . $ID . "','". $NAME . "','" . $REASON .  "','" . $ADDRESS . "','" . $TELEPHONE . "')";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
}

if (strcmp($TYPE, "SC") == 0 ) {
	$sql = "SELECT * FROM NEEDY";
	$result = $link->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt >= 0) {
		echo($row_cnt);
	}
}

if (strcmp($TYPE, "SA") == 0 ) {
	$sql = "SELECT * FROM NEEDY";
	$result = $link->query($sql);
	
	$newArr = array();
    while ( $db_field = mysqli_fetch_assoc($result) ) {
    $newArr[] = $db_field;
     }
    echo json_encode($newArr);
}

mysqli_close($link);
?>
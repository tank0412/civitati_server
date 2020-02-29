<?php

$TYPE = $_GET["TYPE"];

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");


if (strcmp($TYPE, "I") == 0 ) {
	$ID = $_GET["ID"];
	$ASSISTANT_NICKNAME = $_GET["ASSISTANT_NICKNAME"];
	$NEEDY_ID = $_GET["NEEDY_ID"];
	$HELP_INFO = $_GET["HELP_INFO"];
	$HELP_DATE = $_GET["HELP_DATE"];

	
	$sql = "INSERT INTO HELP_NEEDY (ID,ASSISTANT_NICKNAME,NEEDY_ID,HELP_INFO,HELP_DATE)
	VALUES ('" . $ID . "','". $ASSISTANT_NICKNAME . "','" . $NEEDY_ID .  "','" . $HELP_INFO . "','" . $HELP_DATE . "')";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
}

if (strcmp($TYPE, "SC") == 0 ) {
	$sql = "SELECT * FROM HELP_NEEDY";
	$result = $link->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt >= 0) {
		echo($row_cnt);
	}
}

mysqli_close($link);
?>
<?php

$TYPE = $_GET["TYPE"];

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");

//Register User
if (strcmp($TYPE, "I") == 0 ) {
	$ID = $_GET["ID"];
    $USER_NICKNAME = $_GET["USER_NICKNAME"];
	$NEEDY_HELP_ID = $_GET["NEEDY_HELP_ID"];
	$sql = "INSERT INTO NOTIFICATIONS (ID, USER_NICKNAME,NEEDY_HELP_ID) VALUES ('" . $ID . "','" . $USER_NICKNAME . "','" . $NEEDY_HELP_ID . "')";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
}

mysqli_close($link);
?>
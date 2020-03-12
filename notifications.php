<?php

$TYPE = $_GET["TYPE"];

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");

//Insert Notification
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

if (strcmp($TYPE, "SU") == 0 ) {
	$USER_NICKNAME = $_GET["USER_NICKNAME"];
	$sql = "SELECT * FROM NOTIFICATIONS WHERE USER_NICKNAME='" . $USER_NICKNAME . "'";
	$result = $link->query($sql);
	
	$newArr = array();
    while ( $db_field = mysqli_fetch_assoc($result) ) {
    $newArr[] = $db_field;
     }
    echo json_encode($newArr);
}

if (strcmp($TYPE, "DR") == 0 ) {
	$ID = $_GET["ID"];
	$USER_NICKNAME = $_GET["USER_NICKNAME"];
	$sql = "DELETE FROM NOTIFICATIONS WHERE ID=" . $ID . " AND USER_NICKNAME='" . $USER_NICKNAME . "'" ;
if ($link->query($sql) === TRUE) {
    echo "Record was deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
}

mysqli_close($link);
?>
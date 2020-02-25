<?php

$TYPE = $_GET["TYPE"];

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");

//Register User
if (strcmp($TYPE, "I") == 0 ) {
	$NICKNAME = $_GET["NICKNAME"];
    $PASSWORD = $_GET["PASSWORD"];
	$sql = "INSERT INTO USERS (NICKNAME, PASSWORD) VALUES ('" . $NICKNAME . "','" . $PASSWORD . "')";
if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
}


mysqli_close($link);
?>
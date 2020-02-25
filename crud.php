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

//Login User
if (strcmp($TYPE, "S") == 0 ) {
	$NICKNAME = $_GET["NICKNAME"];
    $PASSWORD = $_GET["PASSWORD"];
	$sql = "SELECT * FROM USERS WHERE NICKNAME ='" .  $NICKNAME . "' AND " . "PASSWORD='" . $PASSWORD . "'";
	$result = $link->query($sql);
if ($result->num_rows > 0) {
    echo "Login success";
} else {
    echo "Login fail";
}
}

mysqli_close($link);
?>
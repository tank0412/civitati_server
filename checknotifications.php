<?php

$link = mysqli_connect("localhost", "id12603992_admin", "admin", "id12603992_civitati");

	$sql = "SELECT NICKNAME FROM USERS" ;
	$resultUser = $link->query($sql);
	while($rowU = $resultUser->fetch_assoc())
	{
	//now we have suer nickname
	$ASSISTANT_NICKNAME = $rowU['NICKNAME'];
	//echo($ASSISTANT_NICKNAME);
	
	$currentDateTime = date('Y-m-d');
	$nexttDateTime = $currentDateTime;
	date_add($nexttDateTime, date_interval_create_from_date_string('3 days'));
	$sql = "SELECT ID FROM HELP_NEEDY WHERE ASSISTANT_NICKNAME='" . $ASSISTANT_NICKNAME . "'" . " AND HELP_DATE BETWEEN '" . $currentDateTime . "' AND '" . date('Y-m-d', strtotime($nexttDateTime. ' + 3 days')) . "'" ;
	//echo($sql);
	$result = $link->query($sql);
	
	$payload   = [];
	//Iterate the rows
	while($row = $result->fetch_assoc())
	{
	$ID = $row['ID'];
    //echo($ID);
	//check is it have already have notifications
	$sql = "SELECT ID FROM NOTIFICATIONS WHERE NEEDY_HELP_ID=" . $ID . " AND USER_NICKNAME='" . $ASSISTANT_NICKNAME . "'" ;
	$result2 = $link->query($sql);
	//echo($sql);
	if (mysqli_num_rows($result2) == 0) { 
		
    //results is empty, so make notification
	$sql = "SELECT * FROM NOTIFICATIONS" ;
	$result2 = $link->query($sql);
	$RECORD_ID = mysqli_num_rows($result2);
	$RECORD_ID = $RECORD_ID + 1;
	//so now we have correct record id
	//echo($sql);
	$sql = "INSERT INTO NOTIFICATIONS (ID, USER_NICKNAME,NEEDY_HELP_ID) VALUES ('" . $RECORD_ID . "','" . $ASSISTANT_NICKNAME . "','" . $ID  . "')";
    //echo($sql);
	
	if ($link->query($sql) === TRUE) {
		echo "New record created successfully";
	}
	
	}
	}
	}
	
mysqli_close($link);
?>
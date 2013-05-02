<?php
include '../global.php';

$result = mysql_query("SELECT * FROM codes WHERE id = '".$_REQUEST['i']."' AND salt = '".$_REQUEST['s']."'");

if (mysql_num_rows($result) == 0) {
	echo "URL not found";
}

else {
	$code = mysql_fetch_array($result);
	if ($code['action'] == 'url') {
		mysql_query("INSERT INTO clicks SET code = '".$code['id']."', time = NOW(), userdata = '".$_SERVER['HTTP_USER_AGENT']."'"); 
		//update points before redirect
			
			points($code['user'],$point['scan'],"scan: ".$code['id']);
			
		header("Location: ".$code['data']);
	}
	else {
	echo "This QR Code is not associated with a URL<br>".$code['action'].": ".$code['data'];
	}
}

?>
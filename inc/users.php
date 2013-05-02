<?php
$result = mysql_query("SELECT * FROM users WHERE facebook = '".$user_data['id']."'");


	if (mysql_num_rows($result) == 0) {
	mysql_query("INSERT INTO users SET facebook = '".$user_data['id']."', lastlogin = NOW(), name = '".$user_data['name']."', first_name = '".$user_data['first_name']."', last_name = '".$user_data['last_name']."', link = '".$user_data['link']."', gender = '".$user_data['gender']."'");
	$result2 = mysql_query("SELECT * FROM users WHERE facebook = '".$user_data['id']."'");
	$user = mysql_fetch_array($result2);
	
	points ($user_data['id'],$point['login'],"Daily Login");
	
	}
	
	else {
	$user = mysql_fetch_array($result);
	}

//get number of codes user has created
$result2 = mysql_query("SELECT * FROM codes WHERE user = '".$user['facebook']."'");
$user['numcodes'] = mysql_num_rows($result2);

//daily login point
$resultdp = mysql_query("SELECT * FROM points WHERE date LIKE '$today%' AND userid = '".$user['facebook']."' AND reason LIKE 'Daily Login'");
if (mysql_num_rows($resultdp) == 0) {
points($user['facebook'],$point['login'],"Daily Login");
}

//get points
$result3 = mysql_query("SELECT * FROM points WHERE userid = '".$user['facebook']."' ORDER BY date DESC LIMIT 1");
if (mysql_num_rows($result3) > 0) {
$userpoints = mysql_fetch_array($result3);
$user['points'] = $userpoints['total'];
}
else {
	$user['points'] = 0;
}

?>
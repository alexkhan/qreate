<?php
session_start();
header('P3P: CP="CAO PSA OUR"');
$db = mysql_pconnect(host,user,pass);
mysql_select_db("qreate");

$now = time() + (7 * 24 * 60 * 60);
$today = date('Y-m-d');
$weekago = date('Y-m-d', strtotime('-1 week'));

//Points Setup
$point['login'] = 1;
$point['share'] = 10;
$point['scan'] = 5;
$point['invite'] = 3;
$point['refer'] = 15;
$point['status'] = 15;

require_once ('/mnt/stor9-wc1-dfw1/635376/www.getmefriends.com/web/content/qreate/facebook.php');

function points ($userinput, $points, $reason) {
	$userinput = addslashes($userinput);
$now = time() + (7 * 24 * 60 * 60);
$today = date('Y-m-d');
$weekago = date('Y-m-d', strtotime('-1 week'));

$result = mysql_query("SELECT * FROM points WHERE userid = '$userinput' ORDER BY date DESC LIMIT 1");
$userpoints = mysql_fetch_array($result);
$newpt = $userpoints['total'] + $points;
mysql_query("INSERT INTO points SET userid = '$userinput', points = '$points', total = '$newpt', reason = '$reason', date = NOW()");
$user['points'] = $newpt;

	$resultrolling=mysql_query("SELECT * FROM points WHERE userid = '$userinput' AND date >= '$weekago'");
		$rollingsum = 0;
		while ($pointsum = mysql_fetch_array($resultrolling)) {
			$rollingsum = $rollingsum + $pointsum['points'];
		}
	

mysql_query("UPDATE users SET points = '$newpt', points_7 = '$rollingsum' WHERE facebook = '".$userinput."'");
}

$user_data = get_facebook_data();

	if ($user_data) {
	include_once ('/mnt/stor9-wc1-dfw1/635376/www.getmefriends.com/web/content/qreate/inc/users.php');
	}
	

?>
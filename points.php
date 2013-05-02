<?php
session_start();
include 'global.php';


$fileid = $_REQUEST['fileid'];
if (!$_SESSION['fbshare'][$fileid] && $_REQUEST['fileid'] && $_REQUEST['userid'] && $_REQUEST['key'] == md5("nnd1".$_REQUEST['fileid'].$_REQUEST['userid'])) {


	points($user_data['id'],$point['status'],"share qr code: ".$_REQUEST['fileid']);
	$_SESSION['fbshare'][$fileid] = true;


}
?>
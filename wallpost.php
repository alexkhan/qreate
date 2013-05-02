<?php

$result = mysql_query("SELECT * FROM codes WHERE id = '".addslashes($_GET['i'])."' AND salt = '".$_GET['salt']."' LIMIT 1");
$code = mysql_fetch_array($result);

$post['image'] = urlencode('http://getmefriends.com/qreate/saved/'.$code['image'].'.png');
$post[''];


set_user_status("I just created a QR code with qreate!",$media);
?>
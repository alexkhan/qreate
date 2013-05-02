<?php
session_start();
require 'global.php';
?>
<h2>QReate your QR Code.</h2><br />
<?php
//set everything up
require_once 'facebook.php';
$user_data = get_facebook_data();
require_once 'global.php';
$fileid = time().rand(1,9999999999999999999);
$salt = rand(10,99);
$_SESSION['filename'] = $fileid;


//build qr url
	if ($_REQUEST['url']) {
		
		if (!strstr($_POST['url'],"http://")) {
		$_POST['url'] = "http://".$_POST['url'];
		}
		
	$result = mysql_query("INSERT INTO codes SET action = 'url', data = '".addslashes($_POST['url'])."', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	$url = "http://getmefriends.com/qreate/t?i=$codeid&s=$salt";
	}
	
	else if ($_REQUEST['sms']) {
	$_POST['sms'] = preg_replace('(\D+)', '', $_POST['sms']);
	$url = addslashes("smsto:".$_POST['sms'].":".$_POST['message']);
	$result = mysql_query("INSERT INTO codes SET action = 'sms', data = '$url', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	}
	
	else if ($_REQUEST['email']) {
	$url = addslashes("mailto:".$_POST['email']);
	$result = mysql_query("INSERT INTO codes SET action = 'email', data = '$url', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	}
	
	
	else if ($_REQUEST['phone']) {
	$_POST['phone'] = preg_replace('(\D+)', '', $_POST['phone']);
	$url = addslashes("tel:".$_POST['phone']);
	$result = mysql_query("INSERT INTO codes SET action = 'phone', data = '$url', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	}
	
	
	else if ($_REQUEST['vcard']) {
	$url = addslashes("MECARD:N:".$_POST['name'].";ADR:".$_POST['address'].";TEL:".$_POST['phone'].";EMAIL:".$_POST['email'].";");
	$result = mysql_query("INSERT INTO codes SET action = 'vcard', data = '$url', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	}
	
	
	else {
	$url = addslashes($_REQUEST['text']);
	$result = mysql_query("INSERT INTO codes SET action = 'text', data = '$url', salt = '$salt', user = '".$user_data['id']."', file = '$fileid'");
$codeid = mysql_insert_id($db);
	}
	

//run the function
include 'lib/qrlib.php';
QRcode::png($url, "saved/$fileid.png", "L", "10", 2);


ob_start();
//recolor image to purple
$image = imagecreatefrompng("saved/$fileid.png");
$c1 = sscanf("000000","%2x%2x%2x");
$c2 = sscanf($_POST['color'] ,"%2x%2x%2x");
$cIndex = imagecolorexact($image,$c1[0],$c1[1],$c1[2]);
imagecolorset($image,$cIndex,$c2[0],$c2[1],$c2[2]);

imagepng($image);
$contents = ob_get_contents();
ob_end_clean();

$fh = fopen("saved/$fileid.png", "w" );
fwrite( $fh, $contents );
fclose( $fh );

points($user_data['id'],1,"create qr code: $fileid");

?>
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=400,height=500,left = 483,top = 234');");
}

</script>
<h3>Well that was easy!</h3>
<div class="code" style="position:relative; left:-11px; width:330px;"><img src="../saved/<?=$fileid?>.png" /><br />
</div>
<p>Right click to download. Don't forget to share, send and post to earn more coins. </p>     <br />
     <div id="step4">   
        <h3>Step 4: Share, send, post to compete </h3>
        <div style="position:relative; left:-10px; width:110%;">
        <a href="javascript:void(0)" onclick="javascript:shareonfb()"><img src="images/share.png" /></a><a href="javascript:popUp('../email.php')"><img src="images/send.png" /></a><a href="javascript:void(0)" onclick="javascript:posttowall()"><img src="images/post.png" /></a>
             </div>

  <div id="fb-root"></div>
 
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
      <script src="http://connect.facebook.net/en_US/all.js"> </script>
      <script>
         FB.init({ 
            appId:'227879170558662', cookie:true, 
            status:true, xfbml:true 
		
         });
		 
function posttowall() {


         FB.ui({
	method: 'feed',
	name: 'Qreate',
	link: 'http://apps.facebook.com/qreateq',
	picture: 'http://getmefriends.com/qreate/saved/<?=$fileid?>.png',
	description: 'My QR code from qreate',
	message: 'QReate, share, win. QReate is a social tool that not only helps you share content with your friends via QR codes, but rewards you for it as well.'
	},
	 function(response) {
     if (response && response.post_id) {
		$.get("../points.php", { fileid: "<?=$fileid?>", userid: "<?=$user_data['id']?>", key: "<?=md5("nnd1".$fileid.$user_data['id'])?>" } );
     } 
   
	 }
	);
}


function shareonfb() {


         FB.ui({
	method: 'send',
	name: 'Qreate',
	link: 'http://apps.facebook.com/qreateq',
	picture: 'http://getmefriends.com/qreate/saved/<?=$fileid?>.png',
	description: 'My QR code from qreate',
	message: 'QReate, share, win. QReate is a social tool that not only helps you share content with your friends via QR codes, but rewards you for it as well.'
	},
	 function(response) { 
     if (response) {
		$.get("../points.php", { fileid: "<?=$fileid?>share", userid: "<?=$user_data['id']?>", key: "<?=md5("nnd1".$fileid."share".$user_data['id'])?>" } );
     } 
   
	 }
	);
}

      </script>
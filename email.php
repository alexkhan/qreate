<?php
error_reporting(0);
include 'global.php';
session_start();

if ($_REQUEST['op'] == 'send') {
require_once('inc/class.mail.php');
$mail             = new PHPMailerLite(); 
$mail->IsMail();
$body             = file_get_contents('inc/email.html');
$body             = str_replace("[message]",$_POST['message'],$body);
$body             = str_replace("[imagepath]","http://www.getmefriends.com/qreate/saved/".$_SESSION['filename'].".png",$body);

$mail->SetFrom('qreate@getmefriends.com', $user_data['name']);

$address = $_POST['email'];
$mail->AddAddress($address, $_POST['name']);

$mail->Subject    = "My QR code from Qreate!";
$mail->AltBody    = $_POST['message'];

$mail->MsgHTML($body);

$mail->AddAttachment("saved/".$_SESSION['filename'].".png");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "
  <html><head>
  <title>QReate</title>
  </head>
  <body onLoad=\"setTimeout('self.close()',2000)\">
  
  <h1 style='text-align:center; font-size:24px; color:#a44398;'><br /><br />Success! You will be redirected shortly.</h1>
  </body></html>";
}

}


else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" href="app/style/style.css">
<script type="text/javascript" src="app/js/jquery.js"></script>
<script type="text/javascript" src="app/js/formstyle.js"></script>
<script type="text/javascript" src="app/js/formstyled.js"></script>
<script type="text/javascript" src="app/js/formpost.js"></script>
<script type="text/javascript" src="app/js/dropdown.js"></script>
<script src="app/js/facebox.js" type="text/javascript"></script>



<script>
$(document).ready(function(){
	//$('.styled').customStyle();
});
</script>

<title>QReate</title>
</head>
<body>


<div style="width:80%; margin:20px auto;">
<h1>Share it with a friend!</h1>
<form method="post"  action="email.php?op=send">
	Friend's Name<br />
    <input type="text" class="styled" name="name"><br /><br />
    Friend's Email<br />
    <input type="text" class="styled" name="email"><br /><br />
    Message in Email<br />
  	<textarea class="styled" name="message" rows="6">QReate, share, win. QReate is a social tool that not only helps you share content with your friends via QR codes, but rewards you for it as well. A few simple steps are all it takes to engage and interact on a whole new level.</textarea><br />
<br />
<input class="styled" type="submit" value="Send" style="height:46px; width:335px;">
</form>

</div>


</body>
</html>
<?php } ?>
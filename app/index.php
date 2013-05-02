<?php header('P3P: CP="CAO PSA OUR"');
include_once ('../global.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>QReate</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/formstyle.js"></script>

<link rel="stylesheet" href="style/style.css">



</head>

<body>
<?php
if ($_SESSION['refreshcount']) {
$_SESSION['refreshcount'] = $_SESSION['refreshcount'] + 1;
}
else {
$_SESSION['refreshcount'] = 1;
}
if ($_SESSION['refreshcount'] >= 5) {
echo '<script type="text/javascript">
if (window != top) top.location.href = location.href;
</script>';
}

?>
<div id="container">
<div id="header"><?php include_once ('nav.php');?></div>	<div id="main" class=" clearfix roundCorners">
    <div id="logo"><a href="index.php"><img src="images/logo.jpg" /></a></div>
        <div id="col1">
        	<div id="welcome" class="largeText">
            <p>QReate is a <span style="color:#652d8a; font-size:20px;">social tool</span> that not only helps you share content with your friends via <span style="color:#008fc5; font-size:20px;">QR codes</span>, but lets you <span style="color:#a54399; font-size:20px;">compete</span> against them as well. A few simple steps are all it takes to engage and interact on a whole new level.</p>
            </div>
        </div>
        <div id="col2">
        	<div id="banner">
            	<div class="inner">
                	<div class="profilePic"><fb:profile-pic uid="loggedinuser" facebook-logo="true" width="120" size="normal"></fb:profile-pic></div>
                    <p>Hi<? if ($user_data['first_name']) { echo ' '.$user_data['first_name']; } ?>! Welcome to QReate!</p>
              </div>
            </div><div id="startBtn">
            <?php
			if ($user_data) {
				?>
            <a href="welcome.php"><img src="images/startBtn.jpg" /></a><br /><br />
            <a href="qcoins.php"><img src="images/howtoBtn.png" /></a>
            <?php } 
			else {
			?>
            <fb:login-button perms="user_status,status_update,publish_stream"></fb:login-button><br /><br />
			<a href="qcoins.php"><img src="images/howtoBtn.png" /></a>
            <?php } ?></div>
        </div>
			<div style="clear:both;"></div>
    	    	    	<?php include_once('infobar.php'); ?>
    <div id="footer"><?php include_once('footer.php')?></div>

    </div>
</div>

<script>
window.fbAsyncInit = function() {
FB.Canvas.setSize({height: 950}); 
}; 
$(document).ready(function(){
	$('select').customStyle();
});

</script>


</body>
</html>
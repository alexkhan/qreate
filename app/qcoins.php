<?php header('P3P: CP="CAO PSA OUR"'); ?>
<?php
include '../global.php';
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

<body style="min-height:2500px;">
<div id="container">
<div id="header"><?php include_once ('nav.php');?></div>	<div id="main" class=" clearfix roundCorners">
    	<div id="logo"><a href="index.php"><img src="images/logo.jpg" /></a></div>
                <div id="banner">
            <div class="inner">
                <div class="profilePic"><fb:profile-pic uid="loggedinuser" facebook-logo="true" width="120" size="normal"></fb:profile-pic></div>
                <p>Hi<? if ($user_data['first_name']) { echo ' '.$user_data['first_name']; } ?>! QReate.Share.Win</p>
          </div>
        </div>
		<div id="nocol" style="width:80%;">
    <div>
		<h1>How to play.</h1>
        
        <h3>Step 1: QReate your QR code and select a color.</h3>
        <p>If you're just starting out you will only have 1 color choice. As you QReate content and share with friends you'll have opportunities to unlock other colors. You will earn 1 QCoin for every QR code you QReate.</p>
        <div class="hline"></div>
        <h3>Step 2: Share your content one of three ways.</h3>
        <p>After you have generated a QR Code you will have an opportunity to share your content socially. The first button - <em>labled share</em> - will send a message to a facebook friend, group, or combination of either. These messages do not appear on anyones wall, only in their message box.</p><br />
        <p>The second button - <em>labled email</em> - will allow you to email your QR code using your computers email client.</p><br />
        <p>The third button - <em>labled post</em> - will generate an option for you to post a custom message to your wall. The wall post will contain the QR code you just generated and a message of your choosing.</p>
        <div class="hline"></div>
        <h3>Step 3: Check the leaderboard</h3> <p>Find out your rank and see where you stand among your friends! The more you QReate the more colors you unlock.</hp>
        <br /><br /><br />
        
      <div id="stats" class="faq" style="text-align:left;">  <h2>Scoring</h2>
		<div class="statItem clearfix"><h3>1 QCoin</h3><img src="images/coinSmall.jpg" /><p>Just for signing up.</p></div>
		<div class="statItem clearfix"><h3>1 QCoin</h3><img src="images/coinSmall.jpg" /><p>Each time you log in.</p></div>
        <div class="statItem clearfix"><h3>1 QCoin</h3><img src="images/coinSmall.jpg" /><p>For every QR Code QReated</p></div>
        <div class="statItem clearfix"><h3>5 QCoins</h3><img src="images/coinSmall.jpg" /><p>When QR codes containing url's are scanned</p></div>
        <div class="statItem clearfix"><h3>10 QCoins</h3><img src="images/coinSmall.jpg" /><p>For every QR Code Shared</p></div>
        <div class="statItem clearfix"><h3>15 QCoins</h3><img src="images/coinSmall.jpg" /><p>For posting a QReate QR code to your wall!</p></div></div>    
    </div>
    <br /><br /><br />
    	<h2>Unlocking Colors</h2>
        <p>The more content you QReate and share - the more opportunities you get to unlock hidden colors. Below you'll find the required QCoin values to unlock the next color.</p>
    <div id="stats" class="faq" style="text-align:left;"> 
            <div class="statItem clearfix teal"><!--<ol></ol>--><h3>Level 1</h3><p>50 QCoins</p></div>
            <div class="statItem clearfix lightpurple"><!--<ol></ol>--><h3>Level 2</h3><p>250 QCoins</p></div>
            <div class="statItem clearfix orange"><!--<ol></ol>--><h3>Level 3</h3><p>450 QCoins</p></div>
            <div class="statItem clearfix marine"><!--<ol></ol>--><h3>Level 4</h3><p>650 QCoins</p></div>
            <div class="statItem clearfix navyblue"><!--<ol></ol>--><h3>Level 5</h3><p>850 QCoins</p></div>
            <div class="statItem clearfix green"><!--<ol></ol>--><h3>Level 6</h3><p>1050 QCoins</p></div>
            <div class="statItem clearfix red"><!--<ol></ol>--><h3>Level 7</h3><p>1250 QCoins</p></div>
            <div class="statItem clearfix silver"><!--<ol></ol>--><h3>Level 8</h3><p>1450 QCoins</p></div>
            <div class="statItem clearfix gold"><!--<ol></ol>--><h3>Level 9</h3><p>1650 QCoins</p></div>    
    </div>
        
        
</div>
  <div class="clearfix"></div>
    	<?php include_once('infobar.php'); ?>
    <div id="footer"><?php include_once('footer.php')?></div>

    </div>
</div>

<script>

$(document).ready(function(){
	$('select').customStyle();
});

window.fbAsyncInit = function() {
FB.Array.forEach([200, 600, 1000, 2000, 5000, 10000], function(delay) {
setTimeout(function() { FB.Arbiter.inform("setSize", FB.Canvas._computeContentSize()) }, delay)
});
}; 
</script>

</body>
</html>
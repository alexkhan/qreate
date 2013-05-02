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
<script>
$(document).ready(function(){
	$('select').customStyle();
	$('.color').radioStyle();
});
</script>
</head>

<body>
<div id="container">
	<div id="header"></div>
	<div id="main" class=" clearfix roundCorners">
    	<div id="logo"><img src="images/logo.jpg" /></div>
        <div id="col1">
        	<div id="welcome" class="largeText clearfix">
            	<div class="profilePic" style="width:90px; height:80px; float:left;"></div><h2 style="float:right; width:180px;"><br /><?=$user_data['first_name']?>,<br /><span style="font-size:16px;">Welcome back.</span></h2>
            </div>
            
            <div id="stats">
            	<div class="statItem" style="border-top:none; padding:0;"></div>
                <div class="statItem clearfix"><h3>QCoins<br />earned</h3><img src="images/coinSmall.jpg" /><p class="largeText"><?=$user['points']?></p></div>
                <div class="statItem clearfix"><h3>QR Codes<br />shared</h3><img src="images/shareSmall.jpg" /><p class="largeText"><?=$user['points']?></p></div>
                <div class="statItem clearfix" style="border-bottom:none;"><h3>QR Colors<br />unlocked</h3><img src="images/swatchSmall.jpg" /><p class="largeText"><?=$user['points']?></p></div>
			</div>
        
        </div>
        <div id="col2">
        	<div id="form">
            	<h2>QReate your QR Code.</h2><br />
                <h3>Step 1: What do you want to send?</h3>
                <select name="color" class="styled">
                    <option value="url">URL or Hyperlink</option>
                    <option value="sms">SMS</option>
                    <option value="text">Text Message</option>
                    <option value="phone">Phone Number</option>
                    <option value="vcard">V Card</option>
                </select>
                <span class="mySelectBoxClass"></span>
                <br />
                
                
                 <div id="url" style="visibility:visible">
                <h3>Step 2: URL you want to send</h3>
				<input type="text" name="url" class="element text medium" maxlength="255" /><br /><br />
                <input class="btn" type="submit" align="right" value="" />
                </div>
                
                 <div id="sms" style="visibility:hidden">
                <h3>Step 2: URL you want to send</h3>
				<input type="text" name="sms" class="element text medium" maxlength="255" /><br /><br />
                <input class="btn" type="submit" align="right" value="" />
                </div>
                
                 <div id="email" style="visibility:hidden">
                <h3>Step 2: URL you want to send</h3>
				<input type="text" name="email" class="element text medium" maxlength="255" /><br /><br />
                <input class="btn" type="submit" align="right" value="" />
                </div>
                
                 <div id="phone" style="visibility:hidden">
                <h3>Step 2: URL you want to send</h3>
				<input type="text" name="phone" class="element text medium" maxlength="255" /><br /><br />
                <input class="btn" type="submit" align="right" value="" />
                </div>
                
                 <div id="vcard" style="visibility:hidden">
                <h3>Step 2: URL you want to send</h3>
				<input type="text" name="url" class="element text medium" maxlength="255" /><br /><br />
                <input class="btn" type="submit" align="right" value="" />
                </div>
                
                <h3>Step 3: Choose your color</h3>
                <div id="chooseColor"><input type="radio" name="color" class="color purple" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color teal" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color lightpurple" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color orange" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color navyblue" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color green" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color red" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color yellow" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color silver" /><span class="swatch"></span><br />
                <input type="radio" name="color" class="color gold" /><span class="swatch"></span></div>
                
                

                
                <br /><br /><br />
                <h3>Step 3: Share, send, post to compete </h3>
                <div style="position:relative; left:-10px; width:110%;">
                <a><img src="images/share.png" /></a><a><img src="images/send.png" /></a><a><img src="images/post.png" /></a></div>
            </div>
        </div>
			<div class="clearfix"></div>
    	    	<?php include_once('infobar.php'); ?>
    <div id="footer">disclaimer | privacy policy | contact | official rules</div>

    </div>
</div>



</body>
</html>
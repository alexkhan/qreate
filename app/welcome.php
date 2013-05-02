<?php
header('P3P: CP="CAO PSA OUR"');
include_once ('../global.php');
unset($_SESSION['refreshcount']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>QReate</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/formstyle.js"></script>
<script type="text/javascript" src="js/formstyled.js"></script>
<script type="text/javascript" src="js/formpost.js"></script>
<script type="text/javascript" src="js/dropdown.js"></script>
<script src="js/facebox.js" type="text/javascript"></script>


<link rel="stylesheet" href="style/style.css">
<link href="style/facebox.css" media="screen" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
window.fbAsyncInit = function() {
FB.Canvas.setSize({height: 1100}); 
}; 


$(document).ready(function() {
	$('#formstyled').formPersona({		  
		radiowidth: '23px',
		radioheight: '23px',
		radiobg: 'url(images/overradio.png)',
		
	});
});
</script>
<script>
$(document).ready(function(){
	$('.styled').customStyle();
});
</script>





</head>

<body>
<div id="container">

	<div id="header"><?php include_once ('nav.php');?></div>
	<div id="main" class=" clearfix roundCorners">
    <div id="logo"><a href="index.php"><img src="images/logo.jpg" /></a></div>
        <div id="col1">
        	<div id="welcome" class="largeText clearfix">
            	<div class="profilePic" style="width:90px; height:80px; float:left;"><fb:profile-pic uid="loggedinuser" facebook-logo="true" size="small"></fb:profile-pic></div><h2 style="float:right; width:180px; margin-top:5px;"><?=$user_data['first_name']?>,<br /><span style="font-size:16px;">Welcome back.</span></h2>
          </div>
            
            <div id="stats">
            	<div class="statItem" style="border-top:none; padding:0;"></div>
                <div class="statItem clearfix"><h3>QCoins<br />earned</h3><img src="images/coinSmall.jpg" /><p class="largeText"><?=$user['points']?></p></div>
                <div class="statItem clearfix"><h3>QR Codes<br />
                created</h3><img src="images/shareSmall.jpg" /><p class="largeText"><?=$user['numcodes']?></p></div>
                <div class="statItem clearfix" style="border-bottom:none;"><h3>QR Colors<br />unlocked</h3><img src="images/swatchSmall.jpg" /><p class="largeText"><?php
				if ($user['points'] < 50) { echo '1'; }
				else if ($user['points'] < 250) { echo '2'; }
				else if ($user['points'] < 450) { echo '3'; }
				else if ($user['points'] < 650) { echo '4'; }
				else if ($user['points'] < 850) { echo '5'; }
				else if ($user['points'] < 1050) { echo '6'; }
				else if ($user['points'] < 1250) { echo '7'; }
				else if ($user['points'] < 1450) { echo '8'; }
				else if ($user['points'] < 1650) { echo '9'; }
				else  { echo '10'; }
				?></p></div>
			</div>
        
      </div>
        <div id="col2">
       	  <div id="form">
          <form id="formstyled" action="../process.php" method="post">
            	<h2>QReate your QR Code.</h2><br />
                <h3>Step 1: What do you want to send?</h3>
			  <div class="select"><select name="qroptions" id="qroptions" class="styled">
                    <option value="url">URL or Hyperlink</option>
                    <option value="sms">Text Message</option>
                    <option value="phone">Phone Number</option>
                    <option value="vcard">V Card</option>
                    <option value="display">Display Message</option>
                </select></div>
                <br />
                
                <div id="boxes">
                 <div id="url">
                <h3>Step 2: URL you want to send</h3>
                <label>Be sure to start with http://</label>
                <input name="url" type="text" class="element text medium" maxlength="255" />
                <br /><br />
                </div>
                
                 <div id="sms">
                <h3>Step 2: SMS/text message to send</h3>
                <label>Phone Number</label>
                <input type="text" name="sms" placeholder="Phone Number" clearonfocus="true" /><br /><br />
				<label>Text Message</label>
                <textarea name="message" class="element text medium" maxlength="255"></textarea><br /><br />
                </div>
                
                 <div id="email">
                <h3>Step 2: Email address</h3>
				<input type="text" name="email" class="element text medium" maxlength="255" /><br /><br />
                </div>
                
                 <div id="phone">
                <h3>Step 2: Phone number to call</h3>
				<input type="text" name="phonenum" class="element text medium" maxlength="255" placeholder="Phone" clearonfocus="true" /><br /><br />
                </div>
                
                 <div id="vcard">
                <h3>Step 2: VCard Information</h3>
                Name:<br />
				<input type="text" name="vcard" class="element text medium" maxlength="255" placeholder="Name" clearonfocus="true" /><br /><br />
                Address:<br />
                <input type="text" name="address" class="element text medium" maxlength="255" placeholder="Address" clearonfocus="true" /><br /><br />
                Phone:<br />
                <input type="text" name="phone" class="element text medium" maxlength="255" placeholder="Phone" clearonfocus="true" /><br /><br />
                Email<br />
                <input type="text" name="email" class="element text medium" maxlength="255" placeholder="Email" clearonfocus="true" /><br /><br />
                <br />
                </div><!--end vcard div -->
                
                
                  <div id="display">
                <h3>Step 2: Message</h3>
                <textarea name="display" class="element text medium" maxlength="255"></textarea><br /><br />				
                </div>
                
                </div><!--end boxes div -->
                
                <h3>Step 3: Choose your color</h3>
                <div id="chooseColor">
                <ul class="nolist radio">
				<li class="purple"><input type="radio" name="color" class="color" value="990099" checked="checked" /></li>
                <? if ($user['points'] >= 50) { ?><li class="teal"><input type="radio" name="color" class="color teal" value="009999" /></li><? } ?>
                <? if ($user['points'] >= 250) { ?><li class="lightpurple"><input type="radio" name="color" class="color lightpurple" value="cc99cc" /></li><? } ?>
                <? if ($user['points'] >= 450) { ?><li class="orange"><input type="radio" name="color" class="color yellow" value="ff9900" /></li><? } ?>
                <? if ($user['points'] >= 650) { ?><li class="marine"><input type="radio" name="color" class="color orange" value="00d9c7" /></li><? } ?>
                <? if ($user['points'] >= 850) { ?><li class="navyblue"><input type="radio" name="color" class="color navyblue" value="000033" /></li><? } ?>
                <? if ($user['points'] >= 1050) { ?><li class="green"><input type="radio" name="color" class="color green" value="009933" /></li><? } ?>
                <? if ($user['points'] >= 1250) { ?><li class="red"><input type="radio" name="color" class="color red" value="cc0000" /></li><? } ?>
                <? if ($user['points'] >= 1450) { ?><li class="silver"><input type="radio" name="color" class="color silver" value="c0d4d2" /></li><? } ?>
                <? if ($user['points'] >= 1650) { ?><li class="gold"><input type="radio" name="color" class="color gold" value="ffcc00" /></li><? } ?>
                <div style="clear:both;"></div>
				</ul>
                </div><br /><br />
                <input class="btn" type="submit" id="submit" align="right" value="" /><br /><br />
            </form>
          </div>
  </div>
		  <div style="clear:both;"></div>
       	    	<?php include_once('infobar.php'); ?>

    <div id="footer"><?php include_once('footer.php')?></div>

    </div>
</div>


</body>
</html>
<?php
//header("Location: app");

//header( 'Location: http://www.getmefriends.com/qreate/app' ) ;

//require 'global.php';

?>
<html>
<head>
<title>qreate sample</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/form.css">
<div id="fb-root"></div>

</head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '227879170558662', status: true, cookie: false,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
<div style="width:98%; margin:50px auto;"><h3 style="float:left; width:30%;"><img src="images/qliqWeb.jpg" width="200"/></h3>
<?php





if ($user_data) {

include 'inc/users.php';
	
	
	?>
<div id="stylized" style="width:55%; float:left;" class="shadow">

<?php
if (!$_REQUEST['do']) {
	?>
  <form method="post" action="?do=make" class="formstyle">
    <div class="form_description">
      <h2>Create your qliq code</h2>
      <p>Enter a url, text message, phone number, or sms</p>
    </div>
    
    <ul >
      <li id="li_11" >
        <label class="description" for="element_11">URL/QR Content </label>
        <div>
          <input type="text" name="url" class="element text medium" maxlength="255" />
        </div>
      </li>
      <div class="clear"></div>
      <li><label class="description">QR Color</label>
        <div>
        <select name="color">
        	<option value="990099">Purple</option>
            <option value="cc0000">Red</option>
            <option value="0066cc">Blue</option>
            <option value="009933">Green</option>
            <option value="ff9900">Yellow</option>
        </select>
        </div>
      </li>
      <div class="clear"></div>
      <li class="buttons">
     	 <input class="button_text" type="submit" value="Generate QR" />
      </li>
      <div class="clear"></div>
    </ul>
  </form>
<?php }
else if ($_REQUEST['do'] == 'make') {
include 'process.php';
}
else if ($_REQUEST['share']) {
	include 'wallpost.php';
}
?>
</div>
  <div class="clear"></div>
<?php } else { ?>
<fb:login-button perms="email,status_update,publish_stream,read_friendlists"></fb:login-button><br>
You need to be logged into Facebook to use qreate!
<? } ?>


<div class="clear"></div></div>
</body>
</html>
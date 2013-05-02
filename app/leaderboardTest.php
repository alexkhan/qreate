<?php header('P3P: CP="CAO PSA OUR"'); ?>
<?php
include_once ('../global.php');

if ($_REQUEST['week']) {
	$seven = '_7';
}
if ($_REQUEST['friends']) {
global $arval;

$arval = get_facebook_data("friends",get_facebook_access_token());


function addquery($start) {

	if ($arval['data'][$start]['id']) {
		$continue = true;
	}

	return " OR facebook = '".$arval['data'][$start]['id']."'";


}

$start = 0;
$query = " WHERE facebook = '".$user_data['id']."'";

foreach ($arval as $key=>$value) {
	
	$query .= addquery($start);
	
	$start = $start+1;
	
	if ($continue) {
		addquery($start);
	}
	
}

addquery($start);

}


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

<body style="min-height:2600px;">
<div id="container">
<div id="header"><?php include_once ('nav.php');?></div>	<div id="main" class=" clearfix roundCorners">
    	<div id="logo"><a href="index.php"><img src="images/logo.jpg" /></a></div>
                <div id="banner">
            <div class="inner">
                <div class="profilePic"><fb:profile-pic uid="loggedinuser" facebook-logo="true" width="120" size="normal"></fb:profile-pic></div>
                <p>Hi<? if ($user_data['first_name']) { echo ' '.$user_data['first_name']; } ?>! Where do you rank?</p>
          </div>
        </div>
		<div id="nocol" style="background:url(images/topthree.png) no-repeat 0 85px; left:0;">
<div class="inner">

<a class="button" href="leaderboardTest.php">All Time</a> <a class="button" href="leaderboardTest.php?week=true">Weekly</a> <a class="button" href="leaderboardTest.php?friends=true">Friends</a><br /><br />

        	<h1>Leaderboard</h1>
            <div style="position:absolute;left:5px; z-index:20;"><img src="images/medals.png"/></div>
<? $result = mysql_query("SELECT * FROM users $query ORDER BY points$seven DESC LIMIT 3");
while ($leaders = mysql_fetch_array($result)) {
	if ($seven) {
		$leaders['points'] = $leaders['points_7'];
		}
		echo '<div class="leaderItem">
				<h4>'.$leaders['first_name'].'</h4>
				<div class="leaderPic"><fb:profile-pic uid="'.$leaders['facebook'].'" facebook-logo="false" width="165" size="normal"></fb:profile-pic></div>
				<h2>QCoins:'.$leaders['points'].'</h2>
				</div>';
}
		?> 
        <div class="clearfix">
</div><br /><br /><br /><br />
        <? $result = mysql_query("SELECT * FROM users $query ORDER BY points$seven DESC LIMIT 3, 10");
while ($leaders = mysql_fetch_array($result)) {
	
		if ($seven) {
		$leaders['points'] = $leaders['points_7'];
		}
	
		echo '<div style="width:623px; border-bottom:1px solid #92cbe1; padding:20px 0; border-top:1px solid #bde9f9;">
				<div style="overflow:hidden; float:left; border:2px solid #FFF; width:100px; max-height:100px; margin-right:30px;"><fb:profile-pic uid="'.$leaders['facebook'].'" facebook-logo="false" width="140" size="normal"></fb:profile-pic></div>
				<h3 style="float:left; height:100px; line-height:100px; margin-left:50px;">'.$leaders['first_name'].' | Total: '.$leaders['points'].'</h3>
				<div class="clearfix"></div>
				</div>
			';
}
		?>    
</div>        
        </div>

  <div class="clearfix"></div>
     	<?php include_once('infobar.php'); ?>
    <div id="footer">disclaimer | privacy policy | contact | official rules</div>

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
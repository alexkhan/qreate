<?php
include '../global.php';

//echo "https://graph.facebook.com/1518720038/friends?access_token=".get_facebook_access_token()

global $arval;

$arval = get_facebook_data("friends",get_facebook_access_token());

$start = 0;
$query = "";

foreach ($arval as $key=>$value) {
	
	$query .= addquery($start);
	
	$start = $start+1;
	
	if ($continue) {
		addquery($start);
	}
	
}

addquery($start)



function addquery($start) {

	if ($arval['data'][$start]['id']) {
		$continue = true;
	}

	return " OR WHERE facebook = '".$arval['data'][$start]['id']."'";


}


?>

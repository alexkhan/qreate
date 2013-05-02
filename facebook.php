<?php

/*
 * facebook.php: A Facebook Connect utility script.
 *
 * Allows easy integration of FBML and Facebook Connect features.
 *
 * Adds the new JavaScript SDK to the page output,
 * so FBML tags are automatically available and parsed.
 *
 * Could this be OOP?  Yes, but I honestly felt it would
 * make it harder to use.
 */

require_once "facebook.config.php";






// DO NOT CHANGE THIS!  ONLY CHANGE facebook.config.php!
if (FACEBOOK_APP_ID == "Enter your Facebook Application ID here" || FACEBOOK_SECRET == "Enter your Facebook Secret here")
    die("You need to configure Easy Facebook with your Facebook Application ID and Secret.  Modify facebook.config.php with these values.");

// Insert the FB JS SDK code into the output buffer
function insert_fb_html($buffer) {
    $return = str_replace("<html", '<html xmlns:fb="http://www.facebook.com/2008/fbml" ', $buffer);
    $return = str_replace("</body>", '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js"></script><script> FB.init({appId: ' . FACEBOOK_APP_ID . ', status: true, cookie: true, xfbml: true}); FB.Event.subscribe(\'auth.login\', function(response)
{
    if(navigator.userAgent.toLowerCase().indexOf("safari") > -1) {
        if (response.session) {
            $(\'body\').prepend("<form id=\'safariFix\'></form>");
            $(\'#safariFix\')
                .attr(\'method\', \'POST\')
                .attr(\'action\', location.href)
                .append(\'<input type="hidden" name="session" id="safariFix_session" />\');

            $(\'#safariFix_session\').attr(\'value\', JSON.stringify(response.session));

            $(\'#safariFix\').submit();
        }
    } else {
        window.location.reload(); // Whenever the user logs in, we refresh the page
    }
});</script></body>', $return);
    return $return;
}

// Parse out cookie data and verify the Facebook cookie
function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
  ksort($args);
  $payload = '';
  foreach ($args as $key => $value) {
    if ($key != 'sig')
      $payload .= $key . '=' . $value;
  }
  return (md5($payload . $application_secret) != $args['sig']) ? null : $args;
}

// Get the access token from the Facebook cookie data
function get_facebook_access_token() {
   $cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);

    if (!$cookie || !isset($cookie['access_token']))
        return null;

    return $cookie['access_token'];
}

/*
 * Query the FB Graph API with a given OAuth access token.
 *
 * Without a connection, we return a User array for the currently
 * logged in user.  Properties for Users are documented here:
 *
 * http://developers.facebook.com/docs/reference/api/user
 *
 * Available "connections" for the first parameter:
 *
 * Friends: friends
 * News feed: home
 * Profile feed (Wall): feed
 * Likes: likes
 * Movies: movies
 * Books: books
 * Notes: notes
 * Photo Tags: photos
 * Photo Albums: albums
 * Videos: videos
 * Events: events
 * Groups: groups
 * Statuses: statuses
 *
 * The FB developers API explains the properties of each type:
 * http://developers.facebook.com/docs/reference/api
 */
function get_facebook_data($connection = null, $token = null) {
    if (!$token) { // Get token from facebook cookie
        $token = get_facebook_access_token();

        if (!$token)
            return null;
    }

    $uri = 'https://graph.facebook.com/me';

    if ($connection)
        $uri .= '/' . $connection;

    $data = get_web_data($uri.'?access_token='.$token);
    return (!$data) ? null : json_decode($data, true);
}




/*
 * Call the FB "Old REST API" (which is not really REST).
 *
 * http://developers.facebook.com/docs/reference/rest/
 *
 * The first parameter is the method name to call.
 *
 * The second parameter is name/value pair of parameters to supply
 * to the FB API URL.
 *
 * The OAuth access token can either be supplied as a param or
 * fetched out of the user's cookie.
 *
 * See the "set_user_status" function for an example of how to use this bad boy.
 *
 */
function call_rest_method($method, $params = array(), $token = null) {
    if (!$token) { // Get token from facebook cookie
        $token = get_facebook_access_token();

        if (!$token)
            return null;
    }

    // Add access_token uri param
    $params['access_token'] = $token;

    $uri = 'https://api.facebook.com/method/'.$method.'?'.http_build_query($params);
    $data = get_web_data($uri);
    return (!$data) ? null : json_decode($data, true);
}

/*
 * Set a user's status.
 * This is meant as an example of how to use call_rest_method.
 */
function set_user_status($status,$image) {
    $uid = get_facebook_uid();

    if (!$uid)
        return;

    $params = array(
        'message' => $status,
		'attachment' => $image,
        'uid' => $uid
    );

    return call_rest_method('stream.publish', $params);
}

// Check if the user is logged in, and return the UID if so
function get_facebook_uid() {
    $cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
    return $cookie !== null && isset($cookie['uid']) ? $cookie['uid'] : null;
}

// Check the FB cookie to see if the user is logged in
// This function is fairly unnecessary, but I wanted to include it
// for clarity.
function is_facebook_logged_in() {
    return get_facebook_uid() != null;
}

// Function to use cURL or file_get_contents depending on what's enabled
function get_web_data($uri) {
	if (function_exists('curl_exec')) {
		$handle = curl_init();
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($handle, CURLOPT_URL, $uri);
        $result = curl_exec($handle);
		
		if (curl_errno($handle)) {
			curl_close($handle);
			return NULL;
		}
		
		$http_status = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		
		if (substr($http_status, 0, 1) == '4' || substr($http_status, 0, 1) == '5') {
			curl_close($handle);
			return NULL;
		}

		curl_close($handle);
        return $result;
	} else if (ini_get('allow_url_fopen')) {
        return file_get_contents($uri);
    }
}

ob_start("insert_fb_html");
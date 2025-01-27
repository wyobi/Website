<?php
if (isset($_POST['action'])) { // Checking for submit action
	require_once 'MCAPI.class.php';
	require_once 'config.inc.php'; // Write your apikey in this file

	if ($_POST['action'] == 'add') {
		$email		= trim(strip_tags(addslashes($_POST['email'])));
		$api		= new MCAPI($apikey);
		$merge_vars	= array(); // write the merge variables here!
		
		// By default this sends a confirmation email - you will not see new members
		// until the link contained in it is clicked!
		$retval		= $api->listSubscribe($listId, $email, $merge_vars);
		
		if ($api->errorCode) echo 'error|Please enter a valid email address!'; // an error message
		else echo 'success|Done! Please check your email & confirm.'; // an success message
	}
} else { // Submit action false
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	header('Location: index.html');	
}
?>
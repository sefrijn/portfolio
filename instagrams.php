<?php
	require("lib/settings.php");

	$content = file_get_contents('https://api.instagram.com/v1/users/2035248189/media/recent?access_token='.$insecret);

	echo($content);

?>
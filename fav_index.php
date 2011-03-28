<?php
	// PONGSOCKET TWEET ARCHIVE
	// Front page
	
	require "inc/preheader.php";
	$q = $db->query("SELECT `".DTP."favorites`.*, `".DTP."tweetusers`.`screenname`, `".DTP."tweetusers`.`realname`, `".DTP."tweetusers`.`profileimage` FROM `".DTP."favorites` LEFT JOIN `".DTP."tweetusers` ON `".DTP."favorites`.`favinguserid` = `".DTP."tweetusers`.`userid` ORDER BY `".DTP."favorites`.`time` DESC LIMIT 25");
	$pageHeader = "Recent tweets";
	$home       = true;
	require "inc/header.php";
	echo tweetsHTML($q);
	require "inc/footer.php";
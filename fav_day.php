<?php
	// PONGSOCKET TWEET ARCHIVE
	// Day page
	
	require "inc/preheader.php";
	
	$filterMode = "favorites";
	
	$m = ltrim($_GET['m'], "0");
	$d = ltrim($_GET['d'], "0");
	if(!is_numeric($d) || !is_numeric($m) || !is_numeric($_GET['y']) || (is_numeric($d) && ($d > 31 || $d < 1)) || (is_numeric($m) && ($m > 12 || $m < 1)) || (is_numeric($_GET['y']) && $_GET['y'] < 2000)){ errorPage("Invalid year, month or day. Please specify a valid date."); }
	
	$q = $db->query("SELECT `".DTP."favorites`.*, `".DTP."tweetusers`.`screenname` AS faving_screenname, `".DTP."tweetusers`.`realname` AS faving_screenname, `".DTP."tweetusers`.`profileimage` AS faving_profileimage FROM `".DTP."favorites` LEFT JOIN `".DTP."tweetusers` ON `".DTP."favorites`.`favinguserid` = `".DTP."tweetusers`.`userid` WHERE YEAR(FROM_UNIXTIME(`time`" . DB_OFFSET . ")) = '" . s($_GET['y']) . "' AND MONTH(FROM_UNIXTIME(`time`" . DB_OFFSET . ")) = '" . s($m) . "' AND DAY(FROM_UNIXTIME(`time`" . DB_OFFSET . ")) = '" . s($d) . "' ORDER BY `".DTP."favorites`.`time` DESC");
	
	$selectedDate = array("y" => $_GET['y'], "m" => $m, "d" => $d);
	$pageTitle    = date("F jS, Y", mktime(1,0,0,$m,$d,$_GET['y']));
	$preBody      = displayDays($_GET['y'], $m, null, false);
	
	require "inc/header.php";
	echo tweetsHTML($q, "fav_day");
	require "inc/footer.php";
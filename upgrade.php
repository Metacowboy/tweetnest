<?php
	// PONGSOCKET TWEET ARCHIVE
	// Upgrade tables to 0.8.1
	
	require "inc/preheader.php";
	$db->query("ALTER TABLE `".DTP."tweets` CHANGE `tweetid` `tweetid` VARCHAR(100) NOT NULL") or die($db->error());
	
	// Favorites table
	$q = $db->query("CREATE TABLE IF NOT EXISTS `".$DTP."favorites` (`id` int(10) unsigned NOT NULL AUTO_INCREMENT, `favinguserid` bigint(20) NOT NULL, `userid` bigint(20) unsigned NOT NULL, `screenname` varchar(25) NOT NULL, `profileimage` varchar(255) NOT NULL, `tweetid` varchar(100) NOT NULL, `type` tinyint(4) NOT NULL DEFAULT '0', `time` int(10) unsigned NOT NULL, `text` varchar(255) NOT NULL, `source` varchar(255) NOT NULL, `favorite` tinyint(4) NOT NULL DEFAULT '0', `extra` text NOT NULL, `coordinates` text NOT NULL, `geo` text NOT NULL, `place` text NOT NULL, `contributors` text NOT NULL, PRIMARY KEY (`id`), FULLTEXT KEY `text` (`text`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8");
	echo "Done! You can delete me now.\n";
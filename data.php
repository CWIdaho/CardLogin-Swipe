<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/helpout.php';
	
	try
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
		$sql = 'SELECT swipeid, cwiid, location, swipeday, swipetype FROM swipes ORDER BY cwiid DESC';
		$result = $pdo->query($sql);
	}
	catch (PDOException $e)
	{
		$output = 'Error fetching guests.' . '<br/>' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
		exit();
	}
	foreach($result as $row)
	{
		$data[] = array(
			'swipeid' => $row['swipeid'], 
			'cwiid' => $row['cwiid'], 
			'location' => $row['location'], 
			'swipeday' => $row['swipeday'], 
			'swipetype' => $row['swipetype']
			);
	}
	include 'dataquery.php';

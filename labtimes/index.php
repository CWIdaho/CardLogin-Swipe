<?php
	include $_SERVER['DOCUMENT_ROOT'] . 'shared/helpout.php';
	
	try
	{
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
		$sql = 'SELECT swipeid, cwiid, location, swipedate, timein, timeout, subtime(cast(timeout as time), cast(timein as time)) as totaltime, swipetype 
			FROM swipes 
			ORDER BY cwiid';
		$result = $pdo->query($sql);
	}
	catch (PDOException $e)
	{
		$output = 'Error fetching guests.' . '<br/>' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
		exit();
	}
	foreach($result as $row)
	{
		$data[] = array(
			'swipeid' => $row['swipeid'], 
			'cwiid' => $row['cwiid'], 
			'location' => $row['location'], 
			'swipedate' => $row['swipedate'], 
			'timein' => $row['timein'], 
			'timeout' => $row['timeout'], 
			'totaltime' => $row['totaltime'],
			'swipetype' => $row['swipetype']
			);
			
	}
	include 'dataquery.php';

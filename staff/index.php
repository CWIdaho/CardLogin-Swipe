<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';
if( userIsLoggedIn() and userHasRole(2) )
{
	$cwiid = $_SESSION['cwiid'];
	include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
	try
	{
		$sql = 'SELECT location, swipeday FROM swipes WHERE cwiid = :cwiid ORDER BY swipeday';
		$s = $pdo->prepare($sql);
        $s->bindValue(':cwiid', $cwiid);
        $s->execute();
	}
	catch (PDOException $e)
	{
		$output = 'Error fetching student times.' . '<br/>' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
		exit();
	}
	$result = $s->fetchAll();
	if( count($result) > 0 )
	{
		foreach($result as $row)
		{
			$data[] = array(
				'location' => $row['location'], 
				'swipeday' => $row['swipeday']
				);
		}

	}else{
		$output = 'Get your butt to school!';
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
		exit();
	}
}
include 'swipe-query.php';
	exit();

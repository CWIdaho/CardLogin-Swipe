<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';
if( userIsLoggedIn() and userHasRole(3) )
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
		$output = 'Error fetching students.' . '<br/>' . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
		exit();
	}
	$result = $s->fetchAll();
	foreach($result as $row)
	{
		$data[] = array(
			'location' => $row['location'], 
			'swipeday' => $row['swipeday']
			);
	}
	include 'swipe-query.php';
	exit();
}

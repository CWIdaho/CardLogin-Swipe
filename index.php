<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
if( isset($_REQUEST['login']) )
{
    header( 'Location: ./gateway/' );
    exit();
}

if( isset($_REQUEST['action']) and $_REQUEST['action'] == 'swipein')
{
	$studentID = $_POST['studentID'];
	$percentPos = strpos($studentID, "%") +1;
	$questionPos = strpos($studentID, "?");
	$_studentID = substr($studentID, $percentPos, -1);
	$checkID = substr($studentID, 9, 1);
	$locationID = substr($studentID, 0, 9);
	try
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
		$sql = 'INSERT INTO swipes SET
			cwiid = :cwiid,
			location = :location,
			swipetype = :swipetype';
		$s = $pdo->prepare($sql);
		$s->bindValue(':cwiid', $_studentID);
		$s->bindValue(':location', $locationID);
		$s->bindValue(':swipetype', $checkID);
		$s->execute();
	}
	catch( PDOException $e )
	{
		$output = "New student not added: " . $e->getMessage();
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
		exit();
	}
	$feedback = "new record created successfully"."\n".$_studentID."\n".$locationID."\n".$checkID;
}
include 'swipeIN.html';
?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . 'shared/access.php';
include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/magic.php';
if( isset($_REQUEST['login']) )
{
    header( 'Location: ./gateway/' );
    exit();
}
if( isset($_REQUEST['action']) and $_REQUEST['action'] == 'swipeon')
{
	date_default_timezone_set('America/Boise');
	$now = time();
	$autoout = $now+(75*60);
	$timein = date('H:i:s', $now);
	$timeout = date('H:i:s',$autoout);
	$studentID = $_POST['studentID'];
	$percentPos = strpos($studentID, "%") +1;
	$questionPos = strpos($studentID, "?");
	$_studentID = substr($studentID, $percentPos, -1);
	//$swipetype = substr($studentID, 8, 1);
    $swipetype = "O"; // FOR TESTING ONLY PLZ ENABLE TOP LINE IN PROD
	$locationID = substr($studentID, 0, 10);
	if( $swipetype == 'I')
	{
		try
		{
			include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
			$sql = 'INSERT INTO swipes SET
				cwiid = :cwiid,
				location = :location,
				swipedate = CURRENT_DATE,
				timein = :timein,
				timeout = :timeout,
				swipetype = :swipetype';
			$s = $pdo->prepare($sql);
			$s->bindValue(':cwiid', $_studentID);
			$s->bindValue(':location', $locationID);
			$s->bindValue(':timein', $timein);
			$s->bindValue(':timeout', $timeout);
			$s->bindValue(':swipetype', $swipetype);
			$s->execute();
		}
		catch( PDOException $e )
		{
			$output = "Error: " . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
			exit();
		}
		$feedback = "Swipe IN successful!"."<br>".$_studentID."<br>".$locationID."<br>".$swipetype;
	} else {
		$feedback = "You broke it!" . $swipetype . $autoout;
	}
	if( $swipetype == 'O'){
		try
		{
			include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
			$sql = 'UPDATE swipes SET								
				timeout = CURRENT_TIME,
				swipetype = :swipetype
                WHERE cwiid = :cwiid AND swipetype = "I" and swipedate = CURRENT_DATE';
			$s = $pdo->prepare($sql);
			$s->bindValue(':cwiid', $_studentID);			
			$s->bindValue(':swipetype', $swipetype);
			$s->execute();
		}
		catch( PDOException $e )
		{
			$output = "Error: " . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
			exit();
		}
		$feedback = "Swipe OUT successful! \n".$_studentID."\n".$locationID."\n".$swipetype;
	}
}
include 'swipeon.html';
?>
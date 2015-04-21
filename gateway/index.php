<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';

//  THIS CONTROLS THE "Forgot your password" LINK IN THE LOGIN FORM.
if( isset($_REQUEST['forgot']) )
{
	if (isset($_POST['action']) and $_POST['action'] == 'newcreds' )
	{
		if( $_POST['email'] == '' or $_POST['cwiid'] == '' or $_POST['newpass'] == '' )
		{
			$loginError = "I think you forgot something.";
		}
		if($_POST['newpass'] != $_POST['copypass'])
		{
			$loginError='Passwords do not match.';
		}
		$email = $_POST['email'];
		$cwiid = $_POST['cwiid'];
		$password = md5($_POST['newpass'] . 'student');
		if( !userIsValid( $cwiid, $email ) )
		{
			$loginError = "Now your're just making things up ".$email;
		}    
		else
		{
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
		try
		{
		$sql = 'UPDATE users SET password = :password WHERE email = :email AND cwiid = :cwiid';
		$s = $pdo->prepare($sql);
		$s->bindValue(':password', $password);
		$s->bindValue(':email', $email);
		$s->bindValue(':cwiid', $cwiid);
		$s->execute();
		}
		catch (PDOException $e)
		{
		$output = 'Password remains the same.';
		include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
		exit();
		}
		header( 'Location: .' );
		exit();
		}
	}
	include 'new-creds.php';
	exit();
}
//  DISPLAYS LOGIN PAGE
if( userIsLoggedIn() ) 
{
    //  TAKE USER TO PROPER AREA AFTER SIGN-IN
    if( userHasRole(0) ) {
        header('Location: /superuser/');
        exit();
    }
    if( userHasRole(1) ) {
        header('Location: /admin/');
        exit();
    }
    if( userHasRole(2) ) {
        header('Location: /staff/');
        exit();
    }
    if( userHasRole(3) ) {
        header('Location: /student/');
        exit();
    }
}	
else{
	include 'login.php';
	exit();
}
?>
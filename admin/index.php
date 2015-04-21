<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';
if( userIsLoggedIn() and userHasRole(1) )
{
	if( isset( $_GET['addstudent'] ) ) 
	{
		if( isset( $_POST['action'] ) and $_POST['action'] == 'new-stud' )
		{
			if( $_POST['cwiid'] == '' )
			{
				$output = "Blank id field: ";
				include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
				exit();
			}
			include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
			$password = md5($_POST['password'] . 'cwidstud');
			$number = $_POST['cwiid'];
			$number = substr($number, 0, -1);
			$number = substr($number,11);
			try
			{
				$sql = 'INSERT INTO users SET
					cwiid = :cwiid,
					email = :email,
					password = :password,
					fname = :fname,
					lname = :lname';
				$s = $pdo->prepare($sql);
				$s->bindValue(':cwiid', $number);
				$s->bindValue(':email', $_POST['email']);
				$s->bindValue(':password', $password);
				$s->bindValue(':fname', $_POST['fname']);
				$s->bindValue(':lname', $_POST['lname']);
				$s->execute();
			}
			catch( PDOException $e )
			{
				$output = "New student not added: " . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
				exit();
			}
			$setrole = 3;
			try
			{
				$sql = 'INSERT INTO usersrole SET 
					userid = :userid,
					roleid = :roleid';
				$s = $pdo->prepare($sql);
				$s->bindValue(':userid', $number);
				$s->bindValue(':roleid', $setrole);
				$s->execute();
			}
			catch (PDOException $e)
			{
				$output = "New role not assigned: " . $e->getMessage();
				include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
				exit();
			}
			header('Location: .');
			exit();
		}
		include 'student-form.php';
		exit();
	}
}
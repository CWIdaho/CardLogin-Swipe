<?php
include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'shared/access.php';

if( userIsLoggedIn() and userHasRole(0) )
{
    if( isset($_GET['students']) )
    {
        include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
        try
        {
            $sql = 'SELECT cwiid, fname, lname, email, role FROM users
			INNER JOIN usersrole ON users.cwiid = userid
			INNER JOIN roles ON roleid = roles.id
			WHERE roles.id = 3';
            $result = $pdo->query($sql);
        }
        catch (PDOException $e)
        {
            $output = 'Error fetching students.' . '<br/>' . $e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
            exit();
        }
        foreach($result as $row)
        {
            $data[] = array(
                'cwiid' => $row['cwiid'], 
                'fname' => $row['fname'], 
                'lname' => $row['lname'], 
				'email' => $row['email']
                );
        }
		$who = $row['role'].'s';
        include 'data-query.php';
        exit();
    }
    
    if( isset($_GET['staff']) )
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
        try
        {
            $sql = 'SELECT cwiid, fname, lname, email, role FROM users
			INNER JOIN usersrole ON users.cwiid = userid
			INNER JOIN roles ON roleid = roles.id
			WHERE roles.id = 2';
            $result = $pdo->query($sql);
        }
        catch (PDOException $e)
        {
            $output = 'Error fetching data.' . '<br/>' . $e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'] .'shared/output.php';
            exit();
        }
        foreach($result as $row)
        {
            $data[] = array(
                'cwiid' => $row['cwiid'], 
                'fname' => $row['fname'], 
                'lname' => $row['lname'], 
				'email' => $row['email']
                );
        }
		$who = $row['role'].'s';
        include 'data-query.php';
        exit();
    }
	
	if( isset($_GET['admin']) )
    {
        include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
        try
        {
            $sql = 'SELECT cwiid, fname, lname, email, role FROM users
			INNER JOIN usersrole ON users.cwiid = userid
			INNER JOIN roles ON roleid = roles.id
			WHERE roles.id = 1';
            $result = $pdo->query($sql);
        }
        catch(PDOException $e)
        {
            $output = 'Data is nowhere to be found.';
            include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
            exit();
        }
        foreach($result as $row)
        {
            $data[] = array(
                'cwiid' => $row['cwiid'], 
                'fname' => $row['fname'], 
                'lname' => $row['lname'], 
				'email' => $row['email']
                );
        }
		$who = $row['role'].'s';
        include 'data-query.php';
        exit();
    }
	
	if( isset($_GET['swipes']) ) 
	{
		include $_SERVER['DOCUMENT_ROOT'] . 'shared/connect.php';
		try
		{
			$sql = 'SELECT swipeid, cwiid, location, swipeday, swipetype FROM swipes';
			$result = $pdo->query($sql);
		}
		catch(PDOException $e)
		{
			$output = 'Swipes are nowhere to be found.' . '<br/>' . $e->getMessage();
			include $_SERVER['DOCUMENT_ROOT'] . 'shared/output.php';
			exit();
		}
		foreach($result as $row)
		{
			$students[] = array(
				'swipeid'=>$row['swipeid'], 
				'cwiid'=>$row['cwiid'], 
				'location'=>$row['location'], 
				'swipeday'=>$row['swipeday'], 
				'swipetype'=>$row['swipetype']
			);
		}
		include 'student-query.php';
		exit();
	}

    include 'superuser-page.html';
    exit();
}
else {
    header( 'Location: /gateway/');
	exit();
}

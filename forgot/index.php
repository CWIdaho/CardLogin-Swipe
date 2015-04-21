<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/magic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/access.php';
if (isset($_POST['action']) and $_POST['action'] == 'newcreds' )
{
    if( $_POST['email'] == '' or $_POST['passcode'] == '' or $_POST['newpass'] == '' )
    {
        $loginError = "I think you forgot something.";
    }
    if($_POST['newpass'] != $_POST['copypass'])
    {
        $loginError='Passwords do not match.';
    }
    $email = $_POST['email'];
    $password = md5($_POST['newpass'] . 'beam');
    $passcode = md5($_POST['passcode'].'stream');
    if( !userIsValid($email, $passcode) )
    {
        $loginError = "Now your're just making things up.";
    }    
    else
    {
    include $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
    try
    {
    $sql = 'UPDATE user SET password = :password WHERE email = :email AND passcode = :passcode';
    $s = $pdo->prepare($sql);
    $s->bindValue(':password', $password);
    $s->bindValue(':email', $email);
    $s->bindValue(':passcode', $passcode);
    $s->execute();
    }
    catch (PDOException $e)
    {
    $output = 'Password remains the same.';
    include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
    exit();
    }
    header( 'Location: /admin/' );
    exit();
    }
}
include 'new-creds.php';
exit();
?>
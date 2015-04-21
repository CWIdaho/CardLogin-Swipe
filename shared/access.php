<?php

function userIsValid($cwiid, $email)
{
    include '/connect.php';
    try
    {
    $sql = 'SELECT COUNT(*) FROM users WHERE cwiid = :cwiid and email = :email';
    $s = $pdo->prepare($sql);
    $s->bindValue(':cwiid', $cwiid);
    $s->bindValue(':email', $email);
    $s->execute();
    }
    catch (PDOException $e)
    {
    $output = 'Error searching for User.';
    include '/output.php';
    exit();
    }
    $row = $s->fetch();

    if ($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function userIsLoggedIn()
{
  if (isset($_POST['action']) and $_POST['action'] == 'login')
  {
    if (!isset($_POST['cwiid']) or $_POST['cwiid'] == '' or
      !isset($_POST['password']) or $_POST['password'] == '')
    {
      $GLOBALS['loginError'] = 'Please fill in both fields';
      return FALSE;
    }
    $password = md5($_POST['password'] . 'student');
    if (databaseContainsUser($_POST['cwiid'], $password))
    {
      session_start();
      $_SESSION['loggedIn'] = TRUE;
      $_SESSION['cwiid'] = $_POST['cwiid'];
      $_SESSION['password'] = $password;
      return TRUE;
    }
    else
    {
      session_start();
      unset($_SESSION['loggedIn']);
      unset($_SESSION['cwiid']);
      unset($_SESSION['password']);
      $GLOBALS['loginError'] = 'Incorrect user or password.';
      return FALSE;
    }
  }
  if (isset($_POST['action']) and $_POST['action'] == 'logout')
  {
    session_start();
    unset($_SESSION['loggedIn']);
    unset($_SESSION['cwiid']);
    unset($_SESSION['password']);
    header('Location: ' . $_REQUEST['goto']);
    exit();
  }
  session_start();
  if (isset($_SESSION['loggedIn']))
  {
    return databaseContainsUser($_SESSION['cwiid'], $_SESSION['password']);
  }
}

function databaseContainsUser($cwiid, $password)
{
  include '/connect.php';
  try
  {
    $sql = 'SELECT COUNT(*) FROM users WHERE cwiid = :cwiid AND password = :password';
    $s = $pdo->prepare($sql);
    $s->bindValue(':cwiid', $cwiid);
    $s->bindValue(':password', $password);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $output = 'User not found.';
    include '/output.php';
    exit();
  }
  $row = $s->fetch();

  if ($row[0] > 0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

function userHasRole($role)
{
  include '/connect.php';
  try
  {
    $sql = "SELECT COUNT(*) FROM users
        INNER JOIN usersrole ON users.cwiid = userid
        INNER JOIN roles ON roleid = roles.id
        WHERE cwiid = :cwiid AND roles.id = :roleid";
    $s = $pdo->prepare($sql);
    $s->bindValue(':cwiid', $_SESSION['cwiid']);
    $s->bindValue(':roleid', $role);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $output = 'Error searching for user roles.';
    include '/output.php';
    exit();
  }

  $row = $s->fetch();

  if ($row[0] > 0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

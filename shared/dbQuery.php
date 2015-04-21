<?php
// display search form
include '../shared/connect.php';
try { // Select-a-band
    $result =$pdo->query('SELECT id, name FROM user WHERE userid = 3';
    } 
    catch (PDOException $e)
{
$output = 'Could not fetch users.' . '<br/>' . $e->getMessage();
include '../shared/output.php';
exit();
}
foreach ($result as $row)
{$users[] = array('id' => $row['id'], 'name' => $row['name');}

try
{$result =$pdo->query('SELECT id, email FROM user WHERE userid = 3';} // Select-a-band
catch (PDOException $e)
{
$output = 'Could not fetch users.' '<br/>' . $e->getMessage();
include '../shared/output.php';
exit();
}
foreach ($result as $row)
{$users[] = array('id' => $row['id'], 'name' => $row['name');}

try // Select-a-song
{
    $result =$pdo->query('SELECT id, title, band FROM song';
} 
    catch (PDOException $e)
{
    $output = 'Could not fetch songs.' . '<br/>' . $e->getMessage();
    include '../shared/output.php';
    exit();
}
foreach ($result as $row)
{$songs[] = array('id' => $row['id'], 'title' => $row['title');}
include '/searchform.php';
<?php
/* GRAB STATES FROM DATABASE FOR THE DROPDOWN LIST */
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/connect.php';
try
{
    $sql = 'SELECT state, longstate FROM states';
    $result = $pdo->query($sql);
}
catch(PDOException $e)
{
    $output = 'States are nowhere to be found.' . '<br/>' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . '/shared/output.php';
    exit();
}
foreach( $result as $row )
{
    $states[] = array('state'=>$row['state'], 'longstate'=>$row['longstate'] );
}

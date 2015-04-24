<?php
date_default_timezone_set('America/Boise');
$now = time();
$autoout = $now+(75*60);
$timein = date('H:i:s', $now);
$timeout = date('H:i:s',$autoout);
echo $timein;
echo $timeout;
?>
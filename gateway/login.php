<?php include  '../shared/helpout.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="http://fonts.googleapis.com/css?family=Righteous" rel="stylesheet" type="text/css">
<link href="css/logincss.css" rel="stylesheet" type="text/css" >
<link rel="icon" type="image/png" href="favicon.ico" />
<title>MaSCA SWIPE</title>
</head>
<body onLoad="setFocus()">
<header class="header">
<img src="logo.png" alt="MaSCA" style="width:200px;height:200px;">
</header>

<section class="box">
<div id="logform">
<h2>Welcome to the </br>MATH SOLUTION CENTER</h2>
<p class="error">
	<?php if( isset($loginError) ): ?>
	<?php htmlout($loginError); ?>
	<?php endif; ?>
</p>
<form action="" method="post">
    <fieldset>
	<p>Enter ID Number: 
        <input type="text" name="cwiid" id="cwiid" autofocus required />
	</p>
	<p>Enter Password: 
        <input type="password" name="password" id="password" required />
	</p>
        <input type="hidden" name="action" value="login" />
        <input type="submit" value="Log In" />
    </fieldset>
    <p class="smaller"><a href="?forgot">Forgot your password?</a></p>
</form>
</div>
</section>
</body>
</html>
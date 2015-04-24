<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/helpout.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="" rel="stylesheet" type="text/css" />
        <script>
            function goBack() { window.history.back() };
        </script>
        <title>M.A.T.S.</title>
	</head>
	<body>
        <header>
            <h1>MathLab Attendance Tracking System</h1>
        </header>
        <div id="banner">
        <h2>Student Registry</h2>
        </div>
        <form action="" method="post">
		<h4>All fields required</h4>
            <fieldset>
                <legend></legend>
				<label for="email">Enter Your E-mail</label>
                <input type="email" name="email" id="email" autofocus="true" required />
				<br/>
				<label for="password">Choose a Password</label>
                <input type="password" name="password" id="password" required />
				<br/>
				<label for="fmane">Enter Your First Name</label>
                <input type="text" name="fname" id="fname" required /></label>
				<br/>
				<label for="lname">Enter Your Last Name</label>
                <input type="text" name="lname" id="lname" required /></label>
                <br/>
				<label for="cwiid">Enter Your Student ID</label>
                <input type="text" name="cwiid" id="cwiid" required />
				<br/>
                <input type="hidden" name="action" value="new-stud">
                <input type="submit" value="Enter">
            </fieldset>
        </form>
	</body>
</html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/helpout.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link rel="icon" type="image/png" href="favicon.ico" />
        <script>
            function goBack() { window.history.back() };
        </script>
        <title>M.A.T.S.</title>
	</head>
	<body>
        <header id="header">
            <div class="logo">MathLab Attendance Tracking System</div>
        </header>
        <h2>Student Registry</h2>
        <form action="" method="post">
		<h4>All fields required</h4>
            <fieldset>
                <legend></legend>
				<label for="email">Enter E-mail</label>
                <input type="email" name="email" id="email" autofocus required />
				<br/>
				<label for="password">Choose a Password</label>
                <input type="password" name="password" id="password" required />
				<br/>
				<label for="fmane">Enter First Name</label>
                <input type="text" name="fname" id="fname" required /></label>
				<br/>
				<label for="lname">Enter Last Name</label>
                <input type="text" name="lname" id="lname" required /></label>
                <br/>
				<label for="cwiid">Enter Student ID</label>
                <input type="text" name="cwiid" id="cwiid" required />
				<br/>
                <input type="hidden" name="action" value="new-stud">
                <input type="submit" value="Enter">
            </fieldset>
        </form>
	</body>
</html>
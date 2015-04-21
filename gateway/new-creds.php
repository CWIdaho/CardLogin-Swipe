<?php
   include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/helpout.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="/css/mainstyle.css" rel="stylesheet" type="text/css" />
        <script>
            function goBack() { window.history.back() };
        </script>
        <title>Password Reset</title>
    </head>
     <body>
        <form action="" method="post">
            <fieldset>
                <legend>Reset Your Password</legend>
				<p>Student e-mail: 
                <input type="email" name="email" autofocus></p>
				<p>Student ID: 
                <input type="text" name="cwiid"></p>
				<p>New Password: 
                <input type="password" name="newpass"></p>
				<p>Copy password: 
                <input type="password" name="copypass"></p>
				<p>
                <input type="hidden" name="action" value="newcreds">
                <input type="submit" value="Update"></p>
            </fieldset>
            <p class="error">
                <?php if (isset($loginError)): ?>
                <?php htmlout($loginError); ?>
                <?php endif; ?>
            </p>
	    </form>
    </body>
</html>

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
        <title>trackstack.us | Reset My Credz</title>
    </head>
     <body class="main">
        <header>
            <div class="logo"><p>trackstack</p></div>
            <div class="title"></div>
            <div class="links">
                <button id="backButton" type="button" onclick="goBack()">Back</button>
            </div>
        </header>
        <div class="shim"></div>
        <div id="banner">
            <h1></h1>
        </div>
        <form action="" method="post">
            <fieldset>
                <legend>Reset Your Credz</legend>
                <input type="email" id="email" name="email" placeholder="Enter Your Email" autofocus="true" />
                <input type="password" id="passcode" name="passcode" placeholder="Enter Your Secret" />
                <input type="password" id="newpass" name="newpass" placeholder="New Password" />
                <input type="password" id="copypass" name="copypass" placeholder="Copy Password"/>
                <br/>
                <input type="hidden" name="action" value="newcreds" />
                <input type="submit" value="Reset" />
            </fieldset>
            <p class="error">
                <?php if (isset($loginError)): ?>
                <?php htmlout($loginError); ?>
                <?php endif; ?>
            </p>
	    </form>
        <div class="shim"></div>
    </body>
</html>

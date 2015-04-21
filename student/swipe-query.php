<?php include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/helpout.php'; ?>
<html lang="en">
    <head>
        <title>Email List</title>
        <meta charset="UTF-8" />
        <link href="" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h4>Your times, Master</h4>
		<p><?php include $_SERVER['DOCUMENT_ROOT'] . 'logout.php'; ?></p>
        <table>
            <?php foreach($data as $student): ?>
            <tr>
                <td><?php htmlout($student['location']); ?></td>
                <td><?php htmlout($student['swipeday']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/helpout.php'; ?>
<html lang="en">
    <head>
        <title>Staff Section</title>
        <meta charset="UTF-8" />
        <link href="" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h4>Your Lab Times</h4>
        <table>
            <?php foreach($data as $set): ?>
            <tr>
				<td><?php htmlout($set['swipedate']); ?></td>
                <td><?php htmlout($set['timein']); ?></td>
                <td><?php htmlout($set['timeout']); ?></td>
                <td><?php htmlout($set['totaltime']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
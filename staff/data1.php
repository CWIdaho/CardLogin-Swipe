<?php include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/helpout.php'; ?>
<html lang="en">
    <head>
        <title>Staff Section</title>
        <meta charset="UTF-8" />
        <link href="" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h4>Your Students</h4>
        <table>
            <?php foreach($data as $set): ?>
            <tr>
                <td><?php htmlout($set['studid']); ?></td>
                <td><?php htmlout($set['fname']); ?></td>
                <td><?php htmlout($set['lname']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . 'shared/helpout.php'; ?>
<html lang="en">
    <head>
        <title>Email List</title>
        <meta charset="UTF-8" />
        <link href="" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h4>A list of all the <?php htmlout($who);?>.</h4>
        <table>
            <?php foreach($data as $student): ?>
            <tr>
                <td><?php htmlout($student['cwiid']); ?></td>
                <td><?php htmlout($student['fname']); ?></td>
                <td><?php htmlout($student['lname']); ?></td>
                <td><?php htmlout($student['email']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
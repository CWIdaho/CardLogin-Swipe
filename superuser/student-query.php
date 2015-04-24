<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/helpout.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Swipe List</title>
	</head>
    <body>
        <h4>Student Swipe Times</h4>
		
		<table>
			<tr>
				<th>Swipe ID</th>
				<th>Student ID</th>
				<th>Location</th>
				<th>Day & Time</th>
				<th>Type</th>
			</tr>
            <?php foreach($students as $student): ?>
            <tr>
                <td><?php htmlout($student['swipeid']); ?></td>
                <td><?php htmlout($student['cwiid']); ?></td>
                <td><?php htmlout($student['location']); ?></td>
                <td><?php htmlout($student['swipeday']); ?></td>
                <td><?php htmlout($student['swipetype']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </body>
</html>
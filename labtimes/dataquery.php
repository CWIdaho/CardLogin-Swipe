<html lang="en">
    <head>
        <title>Data List</title>
        <meta charset="utf-8" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
		<style>
		table,th,td{
			padding:5px;
			border: 1px solid tan;
			}
			th {
				background-color:linen;
			}
		</style>
    </head>
    <body>
        <h4>Data in the database:</h4>
        <table>
            <tr>
                <th>Swipe ID</th>
                <th>Student ID</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
				<th>Total Time</th>
                <th>Swipe Type</th>
            </tr>
            <?php foreach($data as $cell): ?>
            <tr>
                <td><?php htmlout($cell['swipeid']); ?></td>
                <td><?php htmlout($cell['cwiid']); ?></td>
                <td><?php htmlout($cell['location']); ?></td>
                <td><?php htmlout($cell['swipedate']); ?></td>
                <td><?php htmlout($cell['timein']); ?></td>
                <td><?php htmlout($cell['timeout']); ?></td>
                <td><?php htmlout($cell['totaltime']); ?></td>
                <td><?php htmlout($cell['swipetype']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
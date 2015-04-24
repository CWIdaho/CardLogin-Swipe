<html lang="en">
    <head>
        <title>Data List</title>
        <meta charset="utf-8" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
		<style>
		td,tr,thead {padding:10px;}
		</style>
    </head>
    <body>
	<form action="" method="get">
            <input type="text" name="choice">
            <?php if( isset( $feedback ) ): ?>
            <?php htmlout( $feedback ); ?>
            <?php endif; ?>
    </form>
	
        <h4>Data in the database:</h4>
        <table>
            <tr>
                <th>Time Id</th>
                <th>Location</th>
                <th>Time In</th>
				<th>Time Out</th>
                <th>Swipe Type</th>
                <th>Total Time</th>
            </tr>
            <?php foreach($data as $cell): ?>
            <tr>
                <td><?php htmlout($cell['swipeid']); ?></td>
                <td><?php htmlout($cell['location']); ?></td>
                <td><?php htmlout($cell['swipeday']); ?></td>
                <td><?php htmlout($cell['swipetime']); ?></td>
                <td><?php htmlout($cell['swipetype']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
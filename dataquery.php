<html lang="en">
    <head>
        <title>Data List</title>
        <meta charset="utf-8" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h4>Data in the database:</h4>
        <table>
            <tr>
                <th>Email</th>
                <th>Entry Date</th>
            </tr>
            <?php foreach($data as $cell): ?>
            <tr>
                <td><?php htmlout($cell['swipeid']); ?></td>
                <td><?php htmlout($cell['cwiid']); ?></td>
                <td><?php htmlout($cell['location']); ?></td>
                <td><?php htmlout($cell['swipeday']); ?></td>
                <td><?php htmlout($cell['swipetype']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
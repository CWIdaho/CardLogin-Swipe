<?php
	require_once 'header.php';
?>
<!-- Code goes here -->
    <section id="main">
        <table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Location ID</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Cumulative Time</th>
            </tr>
        
        
            <?php
                if($_SERVER["REQUEST_METHOD"] == 'POST')
                {
                    $_result = $dbconnector->getSwipes($_POST["search"]);
                  
                    foreach ($_result as $row){
                        
                        echo '<tr>';
                        echo '<td>' . $row['swipeid'] . '</td>';
                        echo '<td>' . $row['cwiid'] . '</td>';
                        echo '<td>' . $row['location'] . '</td>';
                        echo '<td>' . $row['swipeday'] . '</td>';
                        echo '<td>' . $row['swipetype']. '</td>';
                        echo '</tr>';
                        
                        
                    }
                    

                }
            ?>
       </table>
    </section>
<?php
	require_once 'footer.php';
?>

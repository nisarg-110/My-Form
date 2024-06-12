<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-color: cyan;
            }
            table{
                background-color: white;
                color: black;
            }
        </style>
    </head>
</html>

<?php
include "connection.php";
error_reporting(0);

$query = "SELECT * FROM form";
$data = mysqli_query($connection, $query);

$total = mysqli_num_rows($data);
// $result = mysqli_fetch_assoc($data);



if ($total != 0) {
    ?>

    <h2 align="center">Display All Records</h2>
    <center>
        <table border="3" cellspacing="7" width="85%">
            <tr>
                <th width="10%">First Name</th>
                <th width="10%">Last Name</th>
                <th width="10%">Gender</th>
                <th width="20%">Email</th>
                <th width="10%">Phone Number</th>
                <th width="25%">Address</th>
            </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>".$result['fname']."</td>
                    <td>".$result['lname']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['address']."</td>
                </tr>";
        }
    }   
    else {
        echo "Table not present";
    }

        ?>
    </table>
</center>


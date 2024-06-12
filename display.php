<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-color: #f2f2f2;
            }
            table{
                background-color: white;
                color: black;
            }
            th, td {
                padding: 10px;
                text-align: center;
                border: 3px solid #ddd;
            }
            .update, .delete {
                background-color: green;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 22px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
                margin: 5px;
                display: inline-block;
            }
            .delete {
                background-color: red;
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
        <table border="3" cellspacing="7" width="100%">
            <tr>
                <th width="8%">ID</th>
                <th width="8%">First Name</th>
                <th width="10%">Last Name</th>
                <th width="10%">Gender</th>
                <th width="20%">Email</th>
                <th width="10%">Phone Number</th>
                <th width="24%">Address</th>
                <th width="15%">Operations</th>
            </tr>

        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>".$result['id']."</td>
                    <td>".$result['fname']."</td>
                    <td>".$result['lname']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['address']."</td>

                    <td>
                        <a href='update_design.php?id=$result[id]'><input type='button' value='Update' class='update'></a>
                        <a href='delete.php?id=$result[id]'><input type='button' value='Delete' class='delete' onclick = 'return checkdelete()'></a>
                    </td>
                </tr>";
        }
    }   
    else {
        echo "Table not present";
    }

        ?>
    </table>
</center>

<script>
    function checkdelete(){
        return confirm('Are you sure. You want to delete this record ?');
    }
</script>


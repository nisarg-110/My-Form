<?php
include("connection.php");
$id = $_GET['id'];
$query = "DELETE FROM FORM WHERE id = '$id'";
$data = mysqli_query($connection, $query);

if ($data) {
    echo "Record Deleted";
    ?>
    <meta http-equiv = "refresh" content = "0; url = http://localhost/My-Form/display.php" /> 
    <?php
} else {
    echo "Failed To Delete" . mysqli_error($connection);
}
?>

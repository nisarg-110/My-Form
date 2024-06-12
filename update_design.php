<?php include("connection.php");
$id = $_GET['id'];
$query = "SELECT * FROM form where id='$id'";
$data = mysqli_query($connection, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">
                Update My Form
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php echo $result['password']; ?>" class="input" name="password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" value="<?php echo $result['cpassword']; ?>" class="input" name="conpassword" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <select name="gender" required>
                        <option value="Not Select">Select</option>
                        <option value="Male" <?php
                                                if ($result['gender'] == 'Male') {
                                                    echo "selected";
                                                }
                                                ?>>
                            Male</option>
                        <option value="Female" <?php
                                                if ($result['gender'] == 'Female') {
                                                    echo "selected";
                                                }
                                                ?>>
                            Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Email</label>
                    <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" value="<?php echo $result['phone']; ?>" class="input" maxlength="10" name="phone" required>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address" required>
                    <?php echo $result['address']; ?>
                    </textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        <p>&nbsp Agree to terms and conditions</p>
                    </label>
                </div>
                <div class="input_field">
                    <input type="submit" value="Update Details" class="btn" name="update">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if ($_POST["update"]) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $pwd = $_POST["password"];
    $cpwd = $_POST["conpassword"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $query = "UPDATE form 
        SET fname='$fname', 
            lname='$lname', 
            password='$pwd', 
            cpassword='$cpwd', 
            gender='$gender', 
            email='$email', 
            phone='$phone', 
            address='$address' 
        WHERE id='$id'";
    $data = mysqli_query($connection, $query);


    if ($data) {
        echo "<script>alert('Record Updated')</script>";
        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/My-Form/display.php" /> 

        <?php 
    } else {
        echo "Failed to update" . mysqli_error($connection);
    }
}
?>
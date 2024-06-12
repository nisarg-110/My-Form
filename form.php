<?php include("connection.php");?>

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
                My Form
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpassword" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <select name="gender" required>
                        <option value="Not Select">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label>Email</label>
                    <input type="text" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" maxlength="10" name="phone" required>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address" required></textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                        <p>&nbsp Agree to terms and conditions</p>
                    </label>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
    if($_POST["register"]) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $pwd = $_POST["password"];
        $cpwd = $_POST["conpassword"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $query = "INSERT INTO FORM (fname, lname, password, cpassword, gender, email, phone, address) VALUES ('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$address')";
        $data = mysqli_query($connection, $query);

        
        if($data){
            echo "Data inserted";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost/My-Form/display.php" /> 
            <?php
        }
        else{
            echo "Failed" . mysqli_error($connection);
        }
    }
?>

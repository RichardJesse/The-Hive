<?php
session_start();
    $update = 0;
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        include 'connect.php';

        $username = $_POST['username']; 
        $email = $_POST['email'];
        $account_type = $_POST['accountType'];

        $sql = "UPDATE customer_details SET username='$username', email='$email', account_type='$account_type' WHERE username='$username'";

        $result = mysqli_query($connect, $sql);
        if ($result){
            // code...
            $update = 1;
        } else{
            echo mysqli_error($connect);
        }
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet"  href="style.css">
    <!--box icons-->
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,600;1,400;1,500&family=Lobster&family=Montserrat:ital,wght@0,300;0,400;1,400;1,500&family=Quicksand&display=swap" rel="stylesheet">

</head>

<body>
    <a href="#" class="logo"><i class='bx bxs-home'></i>HONEY</a>


    <ul class="navilist">
            <li><a href="signup.php">Signup</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">AboutUs</a></li>
            <li><a href=" index.php">Ourshop</a></li>
            <li><a href="index.php">OurCustomer</a></li>
            <li><a href=" index.php">ContactUs</a></li>
             <li><a href="profile.php" class="active">Profile</a></li>
            <li><a href="logout.php">LogOut</a></li>
           
            
        </ul>

    <style>
        h1, p {
            text-align: center;
            color: var(--main-color);
            font-size: 50px;
        }
    </style>
    <h1>My Profile</h1>

    <div class="upload">

            <i class = "fa fa-camera"></i>
    </div>
    <p>Welcome to your profile</p>

    <form method="post">
        <table width="50%" style="margin: auto;">
            <tr>
                <td>Username
                     <input type="text" placeholder="Enter another Username" name="username" id="username" >
                </td>
            </tr>
            <tr>
                <td>Email
                <input type="text" placeholder="Enter another Email" name="email" id="email" >
                </td>
            <tr>
                 <td>Account Type
                     <select id="accountType" name="accountType">
       <option>--Select Account--</option>
       <option value="Customer">Customer</option>
       <option value="Admin">Admin</option>
     </select><br><br>



            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Update Profile">
                </td>
            </tr>
        </table>
    </form>
    <?php
        if ($update) {
            // code...
            echo "<script> alert('Profile updated successfully')</script>";
            //echo "<p style='text-align: center;'>Profile updated successfully</p>";
        }
    ?>
</body>

</html>
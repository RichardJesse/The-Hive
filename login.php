<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customer_details WHERE email='$email'";
  $result = mysqli_query($connect, $sql);
  if ($result) {
   $recordnumber = mysqli_num_rows($result);
   if ($recordnumber>0) {
     $row = mysqli_fetch_assoc($result);
     $id = $row['user_id'];
     $email = $row['email'];
     $password_hash = $row['password'];

    if( password_verify($password, $password_hash)){

      //sessions 

      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
      header("location:home.php");

    }
     else{
    echo "Not successful";
   }
  }

  }
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<link rel="stylesheet"  href="style.css">
	<!--box icons-->
	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,600;1,400;1,500&family=Lobster&family=Montserrat:ital,wght@0,300;0,400;1,400;1,500&family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<a href="#" class="logo"><i class='bx bxs-home'></i>HONEY</a>
		<ul class="navilist">
      <li><a href="signup.php">Signup</a></li>
      <li><a href="login.php" class="active">Login</a></li>
      <li><a href="index.php">Home</a></li>
     <li><a href="index.php">AboutUs</a></li>
      <li><a href=" index.php">Ourshop</a></li>
      <li><a href="index.php">OurCustomer</a></li>
      <li><a href=" index.php">ContactUs</a></li>
      <li><a href="logout.php">LogOut</a></li>

      
    </ul>
		<div class="navi-icons">
			<a href=""><i class='bx bx-search'></i></a>
			<a href=""><i class='bx bxs-cart'></i></a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	 
	</header>


	<form action="index.php" method="post">
		  <br>
     <br>
      <br>
       <br>
       	  <br>
    <hr>


     <label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password">

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>


  <div  >
    
    <br>
    <span class="psw">Forgot <a href="#" style="color:var(--main-color)">password?</a></span>
  </div>
</form>
<div style="text-align: center;, color: white;">Dont't have an account? <a href="signup.php" style="color:var(--main-color)">SignUp</a></div>





<!--javascript-->
    <script>
    //form validation
    function validateForm(){

    let email = document.getElementById('email').value;

    let password = document.getElementById('password').value;

    let passResult = document.getElementById('passresult');

    if ( email == '' || password == '' ) {
    alert('Fields should not be empty');
    return false;
    }

    if (password.length < 8 ) {
        passResult.innerHTML = 'password should have 8 characters max';
        return false;

      }
      else {
        passResult.innerHTML = '';
      }


    if (!password.match(/^(?=.*\d)(?=.*[a-z]).{6,}$/)) {
    //regular expression and if you want ur password to have numbers and letters

    passResult.innerHTML = 'password should have numbers and lowercase alphabet characters only';
    return false;
    }
    else{
        passResult.innerHTML = '';

    }

    alert('successfully logged in');
      return true;

    }


    
    </script>


</body>
</html>
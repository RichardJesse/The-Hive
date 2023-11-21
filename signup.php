
<?php
include 'connect.php';
$success = 0;
$unsuccess =0;
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $username = $_POST['username']; 
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $accountType = $_POST['accountType'];


  $mysql = "SELECT * FROM customer_details WHERE email = '$email'";
  $myresult = mysqli_query($connect,$mysql);
  if ($myresult) {
    $recordnumber = mysqli_num_rows($myresult);

    if ($recordnumber>0) {
      $unsuccess = 1;
     
    }
    else{
     $sql = "INSERT INTO customer_details(username,email,password,accountType) VALUES('$username','$email','$password_hash', '$accountType')";
$result = mysqli_query($connect, $sql);
if ($result) {
 $success = 1;
}
else{
  die(mysqli_error($result));
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
	<title>Sign Up</title>
	<link rel="stylesheet"  href="style.css">
	<!--box icons-->
	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,600;1,400;1,500&family=Lobster&family=Montserrat:ital,wght@0,300;0,400;1,400;1,500&family=Quicksand&display=swap" rel="stylesheet">
</head>
<body background="wall.jpg">
	<header>
		<a href="#" class="logo"><i class='bx bxs-home'></i>HONEY</a>

		<ul class="navilist">
			<li><a href="signup.php" class="active">Signup</a></li>
			<li><a href="login.php">Login</a></li>
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

	<br>

<form method="post">
	 <div class="forms">
    <br>
     <br>
      <br>
       <br>
    <hr>

    <label for="Username">Username</label>
    <input type="text" placeholder="Enter Username" name="username" id="username" >

    <label for="Email">Email</label>
    <input type="text" placeholder="Enter Email" name="email" id="email" >

    <label for="psw">Password</label>
    <input type="password" placeholder="Enter Password" name="password" id="password">
    <div id="passresult" class="result"></div>

   
     <label>Account Type</label>
		<select id="accountType" name="accountType">
	   <option>--Select Account--</option>
       <option value="Customer">Customer</option>
       <option value="Admin">Admin</option>
     </select><br><br>




     <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:var(--main-color)">Terms & Privacy</a>.</p>

    <div>
      <button type="submit" class="signupbtn" action="login.php">Sign Up</button>
    </div>
  </div>
</form>
<div style="text-align:center; ">Already have an account? <a href="login.php" style="color:var(--main-color)">Log In</a></div>

<?php
if ($success) {
  echo "<div style='color: color:var(--main-color)'; text-align:center'>Signup Successful</div>";
}

if ($unsuccess) {
  echo "<div style='color: white; text-align:center'>Email Already Exists</div>";
}
?>


<!--javascript-->
         <script>
            //form validation
            function validateForm(){
            let username = document.getElementById('username').value;

            let email = document.getElementById('email').value;
            

            let password = document.getElementById('password').value;


            let passResult = document.getElementById('passresult');

            let upassResult = document.getElementById('upassresult');

            let accountType = document.getElementById('accountType').value;


            if ( username == '' || dob == '' || email == '' || password == '' || rpassword == '' ) {
				alert('Fields should not be empty');
				return false;
			}

			let letters = /^[A-Za-z]+$/;

			if (!username.match(letters)) {
				alert('username should have only alphabetic characters and no space');
				return false;
			}
			
			let today = new Date();
            let birthDate = new Date(dob);
            let age = today.getFullYear() - birthDate.getFullYear();
            if (age < 16) {
            alert("Minimum age requirement not met");
            return false;
            }

			

			if (password.length < 8 ) {
				passResult.innerHTML = 'password should have 8 characters max';
				return false;

			}
			else {
				rpassResult.innerHTML = '';
			}
	
			if (!password.match(/^(?=.*\d)(?=.*[a-z]).{6,}$/)) {
				//regular expression and if you want ur password to have numbers and letters

				passResult.innerHTML = 'password should have numbers and lowercase alphabet characters only';
				return false;
			}
			else{
				passResult.innerHTML = '';

			}

            // If all validations pass, show success message
            alert(''+ username + ",You have successfully registered as a " + accountType+ '.');
            return true;
            
		    






            

            
            }
        </script>


<script type="script.js"></script>
</body>
</html>
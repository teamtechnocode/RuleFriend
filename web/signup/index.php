<?php

session_start();

include '../config.php';

if( isset($_POST['submit']) )
{
	 
    if(empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['dob']) )
    {
        echo"<script type='text/javascript'>
        alert('All Fields Are Required');
        window.location.href='/signup/index.php';
        </script>";
    }
    
    $email = bugRemoval($_POST['email']);
    $password1 = bugRemoval($_POST['password1']);
    $password2 = bugRemoval($_POST['password2']);
    $name = bugRemoval($_POST['name']);
    $mobile = bugRemoval($_POST['mobile']);
    $dob = bugRemoval($_POST['dob']);
    

    if($password1 != $password2)
    {
        echo"<script type='text/javascript'>
        alert('Password do not match');
        window.location.href='/signup/index.php';
        </script>";
    }
    
    else 
    {
        $sql="SELECT * FROM user WHERE mobile='$mobile' OR email='$email'";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        
        if($count==1)
        {
            echo"<script type='text/javascript'>
            alert('This Mobile no. or Email already exists');
            window.location.href='/signup/index.php';
            </script>";
        }
        else
        {
        
            $sql="INSERT INTO `user`(`name`, `email`, `password`, `mobile`,`dob`) VALUES ('".$name."','".$email."','".$password1."','".$mobile."','".$dob."')";
            $result=mysqli_query($conn,$sql);
            
            $_SESSION["username"]=$username;
            
            echo"<script type='text/javascript'>
            alert('Your Account Is Created');
            window.location.href='../dashboard.php';
            </script>";
            exit();
        }
     }
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Registration Form </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css file --> 
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<!-- //css file -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Cuprum:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web-fonts -->

</head>

<body>
    
	<!-- title -->
	<h1>
		<span>R</span>egistration
		<span>F</span>orm
	</h1>
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form validate="true" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
				<label for="exampleInputName">Name</label>
				<input type="text" class="form-control" name="name" id="ename" style="text-transform:uppercase" placeholder="Enter Name" required>
			
				</div>
			 
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="email" id="mail" aria-describedby="emailHelp" placeholder="Enter email"   required>
			</div>
	
			
			<div class="form-group">
				<label for="exampleMobile1">Mobile Number</label>
				<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile number"   required>
			</div>
			
			
			<div class="form-group">
				<label for="exampledob">Date Of Birth</label>
				<input type="date" class="form-control" name="dob" id="dob" placeholder="DD/MM/YYYY"   required>
			</div>
			
				<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input maxlength="15" minlength="3" type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password"
				    required>
			</div>
			<div class="form-group">
				<label for="exampleConfirmPassword1">Confirm Password</label>
				<input maxlength="15" minlength="3" type="password" class="form-control" id="exampleConfirmPassword1" name="password2" placeholder="Confirm Password" required data-match="password1"
				    data-match-field="#exampleInputPassword1">
			</div>

	        
	        
				
			
			<div class="form-group">
				<label class="checkbox-inline">
				<input type="checkbox" value="true" name="terms" required>	I agree to the terms and conditions
				</label>
				</div>
				<input type="hidden" name="type" value="student" class="form-control" >
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<a href="../login" align="center"><p style="color:#FFFFFF">Already Registired</p></a><p></p><br>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<p>&copy;Copyright© 2019 RuleFriend | Hosted on <a href="https://hostdust.com/index.php">HostDust</a>
		</p>
	</div>
	<!-- //copyright -->

	<!-- Jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->
	<!-- Jquery -->
	<script src="js/jquery-simple-validator.min.js"></script>
	<!-- //Jquery -->
..................................
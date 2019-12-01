
<?php
include '../config.php';
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="keywords" content="Login Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	
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
        		<span>L</span>ogin
		</h1>
		

	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
		<form validate="true" action="../logged.php" method="post">
			
			<div class="form-group">
				<label for="exampleInputEmail1">Email </label>
				<input type="text" class="form-control" name="myusername" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input maxlength="15" minlength="3" type="password" name="mypassword" class="form-control" id="exampleInputPassword1" placeholder="Password"
				    required>
			</div>
			<button type="submit" class="btn btn-primary">login</button>
			<div class="form-group">
		<br>
		<a href="../signup" align="left"><p style="color:#FFFFFF">Signup</p></a><p></p><br>
		<a href="../forget" align="left"><p style="color:#FFFFFF">Forgotten Password?</p></a>
			</div>
		</form>

		
	</div>
	
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<p>&copy; Copyright 2019 RuleFriend | Hosted on 
			<a href="https://hostdust.com">Hostdust</a>
		</p>
	</div>
	<!-- //copyright -->

	<!-- Jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->
	<!-- Jquery -->
	<script src="js/jquery-simple-validator.min.js"></script>
	<!-- //Jquery -->

</body>

</html>
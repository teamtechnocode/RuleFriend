<?php
require "../config.php";

/*if(isset($_POST['username'])){
    $username = $_POST['filename'];
}
if(isset($username)){ 
    echo "USERNAME".$username;
}

if(isset($_POST['password'])){
    $password = $_POST['filename'];
}
if(isset($password)){ 
    echo "PASSWORD".$password;
}*/

    $email = bugRemoval($_POST['email']);
    $password1 = bugRemoval($_POST['password']);
   // $password2 = bugRemoval($_POST['password2']);
    $name = bugRemoval($_POST['name']);
    $mobile = bugRemoval($_POST['mobile']);

$mysql_get_users = mysqli_query($conn,"SELECT * FROM user where username='$username';");

$get_rows = mysqli_affected_rows($conn);

if($get_rows >=1){
echo "USERNAME ALREADY EXISTS";
die();
}

else{
#echo "user do not exists";

//echo $password;

$sql_qry="INSERT INTO `user`(`name`, `email`, `password`, `mobile`) VALUES ('".$name."','".$email."','".$password1."','".$mobile."')";

if(mysqli_query($conn,$sql_qry))
    echo "DATA INSERTED SUCCESSFULLY";
else
    echo "DATA INSERTION ERROR".mysqli_error($conn);

}


?>
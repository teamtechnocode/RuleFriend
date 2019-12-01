<?php
require "../config.php";

$username=$_POST["email"];
$password=$_POST["password"];

$sql_qry="SELECT * FROM user WHERE email='$username' AND password='$password'";

$res=mysqli_query($conn,$sql_qry);

if(mysqli_num_rows($res)>0)
{
    $row=mysqli_fetch_assoc($res);
    $name=$row["email"];
    $pass=$row["password"];
    echo "WELCOME";
}

else
{
    echo "NO SUCH USERNAME FOUND";
}
?>
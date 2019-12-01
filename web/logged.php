<?php

session_start();

if( isset($_POST['myusername']) )
{
     include 'config.php';

     $myusername=bugRemoval($_POST['myusername']); 
     $mypassword=bugRemoval($_POST['mypassword']); 

     $sql="SELECT * FROM user WHERE email='$myusername' AND password='$mypassword'";
     $result=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($result);

     if($count==1)
     {
          $_SESSION["myusername"]=$myusername;

          echo"<script type='text/javascript'>
          window.location.href='dashboard.php';
          </script>";
     }
     else
     {
             echo"<script type='text/javascript'>
               alert('The username or password you entered is incorrect');
               window.location.href='/login';
               </script>";
          
     }
}
else
{
     echo"<script type='text/javascript'>
     alert('Oops something went wrong');
     window.location.href='/loginp';
     </script>";
}
?>
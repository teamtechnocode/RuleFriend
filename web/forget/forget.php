<?php
include '../config.php';
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $_POST['email'];
    $email_subject = "Forgetten Password - Rulefriend";
    $sql_qry="SELECT password FROM user WHERE email='".$_POST['email']."';";
		$resp=mysql_query($sql_qry);
		$data=mysql_fetch_assoc($resp);
		$count=mysql_num_rows($resp);
		if($count==1){
		    $password=$data['password'];
		}
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
   
    $email_from = "rakesh@rulefriend.tk"; // required
   
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_to)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Requested details below.\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "password: ".clean_string($password)."\n";
   // $email_message .= "Email: ".clean_string($email_from)."\n";
   // $email_message .= "Mobile: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <center>
Your password has been sent to your email address kindly change it after login.
<br>
Note:- Wait for email to arrive it may take upto 5-10 mins. Kindly check in your spam box also, and if find in spam then mark it as not spam.
<br><br><a href="https://rulefriend.tk/login">Login Here</a>
</center>
<?php
 
}
?>

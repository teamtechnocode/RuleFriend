<!-- Database connection -->
<?
error_reporting(E_ALL);
$host = "localhost"; 
$username = "rulefrie_rulefrie"; 
$password = "Rakesh@121#"; 
$dbname = "rulefrie_rulefriend";
$sitename = "RuleFriend";
$sitelink = "https://rulefriend.tk";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn,"SET NAMES utf8");
	
?>

<?php 
function bugRemoval($variable)
{
return(mysqli_real_escape_string($GLOBALS['conn'],$variable));
}

?>
<?php

include '../config.php';

$question = bugRemoval($_POST['question']);
$description = bugRemoval($_POST['description']);
$category = bugRemoval($_POST['category']);    

$sql="INSERT INTO `question`(`question`, `description`, `category`) VALUES ('".$question."','".$description."','".$category."')";
$result=mysqli_query($conn,$sql);

#echo $result;

echo "Your Query Submitted Successfully";

exit();

?>
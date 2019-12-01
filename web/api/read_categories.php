<?php
    include 'config.php';

    // Create connection
    //$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

    /*if ($conn->connect_error) {

     die("Connection failed: " . $conn->connect_error);
    } */

    $request=$_POST["request spinner data"];
    
    if(strcmp($request,"request spinner data"))
    {

    $sql = "SELECT title FROM category ORDER BY id DESC";

    $result=mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) >0) {
    $data=mysqli_fetch_assoc($result);
     $json = json_encode($data);
     echo $json;
     }
    
    else 
    {
     echo "No Results Found.";
    }
    }
    
    else
    {
        echo "Unable to reach to the server";
    }
    
    ?>
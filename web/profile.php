<?php 

include 'header.php';
if(isset($_POST['image']))
{
    
              $target_dir = "user_uploads/";
              $target_file = $target_dir . $myusername ."_".$_POST['mobile']. ".jpg";
              $uploadOk = 1;
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"]))
              {
                   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false)
                   {
                        $uploadOk = 1;
                   }
                   else
                   {
                        echo"<script type='text/javascript'>
                        alert('This file is not an image');
                        window.location.href='profile.php';
                        </script>";

                        $uploadOk = 0;
                   }
              }
             
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 10240000)
              {
                   echo"<script type='text/javascript'>
                   alert('Your image size more then 10 MB Please reduce its size and try again');
                   window.location.href='profile.php';
                   </script>";

                   $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" )
              {
                   echo"<script type='text/javascript'>
                   alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed');
                   window.location.href='profile.php';
                   </script>";

                   $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0)
              {
              // if everything is not ok
              }
              else
              {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                    {
                        mysqli_query($conn,"UPDATE user SET img='https://rulefriend.tk/".$target_file."' where `id`='".$_POST['id']."'");
                        echo "<script type='text/javascript'>
                        alert('Your image is updated');
                        window.location.href='profile.php';
                        </script>";
                    }
              }
}


if( isset($_POST['name']) )
     {
         
       

         
         
          
              mysqli_query($conn,"UPDATE user SET name='".$_POST['name']."', email='".$_POST['email']."', gender='".$_POST['gender']."', mobile='".$_POST['mobile']."', dob='".$_POST['dob']."', address='".$_POST['address']."', city='".$_POST['city']."', state='".$_POST['state']."' where id='".$_POST['id']."'");
              echo "<script type='text/javascript'>
              alert('Your profile is updated');
              window.location.href='profile.php';
              </script>";
          
          
          

     }
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Profile Page</title>


        <div class="page-wrapper">
           
            <div class="container-fluid">
                
                
                
            
                
                
        
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View And Edit Profile</h4>
                            </div>
                            <div class="card-block">
                                
                                
                                
                                
                                    <div class="form-body">
                                        <h3 class="card-title">Image Upload</h3>
                                        <hr>








<form method="POST" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
    
    <div class="alert alert-danger">Uploading your orignal photos is mandatory</div>
    <center>
        <img src="<?php echo $row['img']; ?>" height="200px" alt="IMAGE">
    </center>
        <br>
    
        <div class="row">
            
            <div class="col-md-3">
                
            </div>
            <div class="col-md-3">
                    <input type="file" name="fileToUpload" >
            </div>
            
            <div class="col-md-3">
                <div class="form-actions">
                    <button type="submit" name="image" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    
    
</form>
               
               <br>
               
                <h3 class="card-title">Person Info</h3>
               
               
                <hr>
                 <form method="POST" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                      
                                              
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                                                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="email" id="eemail" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>" required>
			
                                                
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    

                                                   <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" name="dob" value="<?php echo $row['dob']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleMobile1">Mobile Number</label>
				<input type="tel" class="form-control" name="mobile" id="emobile" 
		value="<?php echo $row['mobile']; ?>"   required>
                                                    
                                                </div>
                                            </div>
                                          
                                        </div>
                                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleMobile1">Address</label>
				<input type="tel" class="form-control" name="address" id="eaddress" 
		value="<?php echo $row['address']; ?>"   required>
                                                    
                                                </div>
                                            </div>
                                       
                                        </div>
                                      <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">City</label>
                                                    

                                                   <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">State</label>
                                                    <input type="text" name="state" value="<?php echo $row['state']; ?>" class="form-control" >
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        
                                    </div>
                                </form>

                        </div>
                    </div>
                   </div>
                </div>
                    
                
                
                
                
                
                
                
                
            </div>
            
<?php include 'footer.php'; ?>
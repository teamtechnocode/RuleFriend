<?php 
include 'header.php';
function do_alert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
    
      if (isset($_POST['submit']))
      {
          $oldpassword = ($_POST['oldpassword']);
		$newpassword = ($_POST['newpassword']);
		$repeatnewpassword = ($_POST['repeatnewpassword']);
		
		$queryget = mysqli_query($conn,"SELECT password FROM user WHERE email='$myusername'");
		$row = mysqli_fetch_array($queryget);
		
		$oldpassworddb = $row['password'];
		//check pass
		if ($oldpassword==$oldpassworddb)
		{
		
		
		
		//check twonew pass
		if ($newpassword==$repeatnewpassword)
		{
		//success
		//change pass in db
	
		 if (strlen($newpassword)>25||strlen($newpassword)<3)   
		{
		do_alert("Password must be betwwen 3 & 25");
		 
		}

		else
		{
		
				$querychange = mysqli_query($conn,"
				UPDATE user SET password='$newpassword' WHERE email='$myusername'
				");
				
				session_destroy();
				do_alert("Your pass has been changed."); 
                
                echo "<script>
window.location.href='login/index.php';
</script>";
		
		
		
		}
		}
		else
				do_alert("New Pass don't match"); 
				
	
		
		
		
		}
		else
			do_alert("Old Pass don't match"); 
		
		
			
		
		
		
		}
	



?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Change Password</title>

<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Change Password</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Change Password</h4>
                            </div>
                            <div class="card-block">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                               
                                    
                                    <div class="form-group">
                                        <label for="pwd1">Old Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="oldpassword" class="form-control" placeholder="Enter Old Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd1">New Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd2">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-lock"></i></div>
                                            <input type="password" name="repeatnewpassword" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submit" value='Change Password'class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>

                        </div>
                    </div>
                   </div>
                </div>

                
                
                
                
                
                
                </div
                
                
                
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>
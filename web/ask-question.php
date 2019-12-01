<?php 

include 'header.php'; 

if (isset($_POST['submit']))
      {
       if(empty($_POST['question']) || empty($_POST['description']) || empty($_POST['category']) )
    {
        echo"<script type='text/javascript'>
        alert('All Fields Are Required');
        window.location.href='#';
        </script>";
    }
    $question = bugRemoval($_POST['question']);
    $description = bugRemoval($_POST['description']);
    $category = bugRemoval($_POST['category']);   
     $id = bugRemoval($_POST['id']);   
      $sql="INSERT INTO `question`(`question`, `description`, `category`,`user_id`,`status`) VALUES ('".$question."','".$description."','".$category."','".$id."','pending')";
            $result=mysqli_query($conn,$sql);
              echo"<script type='text/javascript'>
            alert('Your Quer is submited');
            window.location.href='dashboard.php';
            </script>";
            exit();
      }
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Ask Question</title>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Ask Question</li>
                        </ol>
                    </div>
                </div>
      
                   
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Ask Question</h4>
                            </div>
                            <div class="card-block">
                                
                                
                                
                                
                                    <div class="form-body">
                
                	<form validate="true" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    
                                              
               <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Question</label>
                     <input type="text" class="form-control" name="question" placeholder="Your Question" >
                  </div>
                                            </div>
                                          
                                        </div>
                 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Question Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                                            </div>
                                          
                                        </div>
                    
                                        
                                        
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                    <label for="exampleFormControlSelect1">Question Category</label>
                      <select class="form-control" name="category" required>
                         <option value="" disabled selected>Select a Project</option>
                                        <?php 
                                            $sql1="SELECT id,title FROM category ORDER BY id DESC";
                                            $result1=mysqli_query($conn,$sql1);
                                            while( $row1 = mysqli_fetch_assoc( $result1 ) ) {
                                                echo '<option value="'.$row1['id'].'">'.$row1['title'].'</option>';
                                            }
                                        ?>
                        </select>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        
                 <div class="form-actions">
                                        <button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Ask?</button>
                                        
                                    </div>
                </div>
                </form>
          </div>
                    </div>
                   </div>
                </div>
                
                
            </div>
 
<?php include 'footer.php'; ?>
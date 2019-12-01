<?php 

include 'header.php'; 
if (isset($_POST['submit']))
      {
       if(empty($_POST['answer']) )
    {
        echo"<script type='text/javascript'>
        alert('All Fields Are Required');
        window.location.href='#';
        </script>";
    }
    $answer = bugRemoval($_POST['answer']);
      $ques_id = bugRemoval($_POST['ques_id']);
        $user_id = bugRemoval($_POST['user_id']);
      $sql="INSERT INTO `answer`(`ques_id`, `answer`, `user_id`,`status`) VALUES ('".$ques_id."','".$answer."','".$user_id."','pending')";
            $result=mysqli_query($conn,$sql);
              echo"<script type='text/javascript'>
            alert('Your answer is under moderation.');
            window.location.href='dashboard.php';
            </script>";
      }
if (isset($_GET['id']))
{
    $id = bugRemoval($_GET['id']);
    $sql = mysqli_query($conn,"SELECT * FROM question WHERE id=$id && status = 'approved'");
    if(mysqli_num_rows($sql) != 0)
    {
        while($row=mysqli_fetch_array($sql))
        {
            $user_id = $row['user_id'];
            $question = $row['question'];
            $description = $row['description'];
            $ques_id = $row['id'];
            $sql2 = mysqli_query($conn,"SELECT * FROM user WHERE $user_id");
            while($row2=mysqli_fetch_array($sql2))
            {
                $img = $row2['img'];
                $name = $row2['name'];
            }
        }
    }
    else
    {
        echo"<script type='text/javascript'>
        alert('It looks like yo don't wanna ask anything!);
        window.location.href='dashboard.php';
        </script>";
    }
}
else
{
    echo"<script type='text/javascript'>
        alert('It looks like yo don't wanna ask anything!);
        window.location.href='dashboard.php';
        </script>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Question</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Question</li>
                        </ol>
                    </div>
                </div>
      
                   
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Question</h4>
                            </div>
                            <div class="card-block">
                                
                                
                                <?php
                                
                                echo '<div class="col-md-6 col-lg-6 col-xlg-4">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-3 text-center">
                                                <a href="#"><img src="'.$img.'" alt="'.$name.'" class="img-circle img-responsive"></a>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <h4 class="mb-0"><a href="question.php?id='.$ques_id.'"> '.$question.' </a></h4> 
                                                <small>by '.$name.'</small>
                                                <address>
                                                <h6 class="mb-0"> Description </h6> 
                                                   '.$description.'
                                                </address>
                                                 <small><a href="https://lmgtfy.com/?q='.$question.'">Search Legal data</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                
                                
                                echo'<h3>Solutions</h3>';
                                ?>
                                 <form validate="true" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                 <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                 
                
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="ques_id" value="$ques_id">
                    <input type="text" placeholder="Submit Your Answer" class="form-control" name="answer" id="Answer"/>
                    <button type="submit" name="submit" class="btn btn-success">Submit!</button>
            </form>
            </div>
            </div>
            </div>
                                <?php
                                $sql2 = mysqli_query($conn,"SELECT * FROM answer WHERE ques_id='$ques_id' && status = 'approved'");
                                if(mysqli_num_rows($sql2) != 0)
                                {
                                    while($row2=mysqli_fetch_array($sql2))
                                    {
                                        $answer = $row2['answer'];
                                        $id2 = $row2['user_id'];
                                         $row3=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE id='$id2'"));
                                         $img3 = $row3['img'];
                                         $name3 = $row3['name'];
                                       echo '<div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 text-center">
                                        <a href="#"><img src="'.$img3.'" alt="'.$name3.'" class="img-circle img-responsive"></a>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                     
                                        <h3>'.$name3.'</h3>
                                        <address>
                                           '.$answer.'
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>';
                                        echo '<br>';
                                    }
                                    
                                }
                                else
                                {
                                    echo 'No Answers Found<br><a href="https://lmgtfy.com/?q='.$question.'">Search Legal data</a>';
                                }
                                ?>
                                
                          </div>  
          
                    </div>
                   </div>
                </div>
                
                
            </div>
 
<?php include 'footer.php'; ?>
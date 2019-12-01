<?php 

include 'header.php'; 
if (isset($_POST['submit']))
{
    
    if(!empty($_POST['voice-search']))
    {
        $string = bugRemoval($_POST['voice-search']);
         $unwanted_words=array("a","an","and","are","has","he","in","i","is","am","to","was","were","will","as","at","be","by","for","from","it","its","of","on","that","the","with",",","?","/","!","#","*","&",".","%","what","why","[","]","+","-","_");
        
        $string = str_replace($unwanted_words, "", $string);
        $like = '';
        $i = 0;
        $array_temp = explode(' ', $string);
        $array = array_filter($array_temp); 

        foreach($array as $temp)
        {
            if($i != 0)
            {
                
                $like .= ' || ';
            }
            $i++;
            $temp = '[[:<:]]'.$temp.'[[:>:]]';
            $like .= "question RLIKE '$temp' || description RLIKE '$temp'";
        }
        if(isset($like))
        {
            $sql = mysqli_query($conn,"SELECT * FROM question WHERE $like && status = 'approved'");
        }
    }
    else
    {
        echo"<script type='text/javascript'>
        alert('It looks like yo don't wanna ask anything!);
        window.location.href='#';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?> | Dashboard</title>
<script>$('a.yourlink').click(function(e) {
    e.preventDefault();
    window.open('http://rulefriend.tk/ask-question.php');
    window.open('https://lmgtfy.com/?q=<?php echo $_POST['voice-search']; ?>');
});
</script>
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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Search Your Solutions!</h4>
                            </div>
                            <div class="card-block">
                                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                
            <form validate="true" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-actions">
                    <input type="text" placeholder="Search me..." name="voice-search" id="note-textarea"/>
                    <button type="submit" name="submit" class="btn btn-success">Search!</button>
                </div>
            </form>
             <?php
             if (isset($_POST['submit']))
             {
                 if(isset($sql) && mysqli_num_rows($sql) != 0)
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
                                           '.$description.'
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                 }
                 else
                 {
                     echo 'NO data found<br><br><a href="ask-question.php">Submit Your Query!</a>';
                      echo '';
                    
                 }
             }
             ?>
   	            
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            </div>
            </div>
            </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php include 'footer.php'; ?>
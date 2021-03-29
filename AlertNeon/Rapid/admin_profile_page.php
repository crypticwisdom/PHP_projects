<?php include "inc/header1.php";
session_start();
if( isset($_GET['q'] ) && $_GET['q'] == "adminProfile" ){
include "handlers/upload_handler.php";
$adminID = $_SESSION['Admin_ID'];
    $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
        $sql = "select * from AdminTable where Admin_ID = '$adminID' ;";
            $run = mysqli_query($connection, $sql);
            $fetch = mysqli_fetch_assoc($run);
             if(  $fetch['Admin_ID'] == $adminID ){
                echo "
                <div class='alert alert-success text-center'><a href='#' data-dismiss='alert'>Now Active</a></div>
                ";
            }else{
                header("location:admin_login.php");
                exit();
             }
     $sql1 = "select * from MessageOne where Admin_ID='$adminID' ;";
        $query = mysqli_query($connection, $sql1);
            if($query){
               $fetch = mysqli_fetch_assoc($query);
                  
                 // $lastID = mysqli_insert_id($connection);
          //echo $lastID;
            }else{
                  echo "bad";
            }
}else{
    header("location:admin_login.php");
                exit();
}
?>
<!DOCTYPE html>
    <html lang="en">

    <body>
    <script src="inc/ajax/ajaxAdminProfile.js"> </script>
         <div class="container">

           <div class="text-center">img</div>
         <div class="row">
            <div class="col-lg-6 col-md-6">
                <button class="btn btn-success form-control" value="<?php echo $adminID;?>" onclick="getProfile(this.value)" > Your Profile </button>
                <p class="text-danger" id="profile"> </p>
            </div>

            <div class="col-lg-6 col-md-6">
                <form action="<?php echo htmlspecialchars('admin_profile_page.php?q=adminProfile') ;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">

                <input type="file" name="file" class="form-control" >  
                <input type="submit" name="upload" value="upload" class="form-control btn btn-primary">
                <?php echo '<p class="text-center text-success">'.$successmessage.'</p>';?>
                <?php echo '<p class="text-danger">'.$errormessage1.'</p>';?><br>
                <?php echo '<p class="text-danger">'.$errormessage2.'</p>' ;?>
                <?php echo '<p class="text-danger">'.$errormessage3.'</p>';?>
                <?php echo '<p class="text-danger">'.$errormessage4.'</p>';?><br>
                <?php echo '<p class="text-danger">'.$errormessage5.'</p>';?>

                </div>
                </form>
            </div>
         </div>
<div class="row">
<div class="col-lg-6 col-md-6 btn btn-dark">

<br>
<p class="text-center display-4 text-dark" ><i class="fa fa-arrow-right"></i><a href="adminmessage.php?q=adminmessage" class="anchor">Messages</a></p>
<br>

</div>

<div class="col-lg-6 col-md-6 ">

</div>


</div>


         </div>




    </body>






<?php include "inc/footer.php"; ?>
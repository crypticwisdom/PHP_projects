<?php include "inc/header.php" ;?>
<?php include 'handlers/admin_login_handler.php';

if( isset($_GET['q']) ){
    if( $_GET['q'] == 'signed'){
        echo "<h2 class='text-success text-center wow bounceInDown'>Hurray!! you have Successfully joined our platform, Please login.</h2>";
    }
}else if( isset($_GET['f']) ){
if( $_GET['f'] == 'not'){
        echo "<h2 class='text-danger text-center wow bounceInDown' data-wow-delay='0.2s'>Invalid Login Details.</h2>";
    }
  }
// }else if($_GET['is_online'] == 'yes'){
//   echo "<h2 class='text-danger text-center wow flipInY' data-wow-delay='0.2s'>Seems like you are logged in elsewhere.</h2>";
// }


?>
<div class="container wow bounceInDown" id="mycontainer">
  <div class="form">
        <h2 class="text-center">Administrator Sign-Up page</h2>

     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?>" method="POST" role="form">

        <div class="form-group">
            <label for="admin" class="sr-only"> Admin </label>
            <i class="fa fa-user"></i><input type="text" class="form-control" name="admin_workName" maxLength="50" placeholder="Work Name">
            <div class="text-danger wow bounceInDown"><?php echo $msg1 ;?></div>
        </div>

        <div class="form-group">
            <label for="password" class="sr-only"> Password </label>
            <i class="fa fa-lock"></i><input type="password" class="form-control" name="admin_password" maxLength="30" minLength="6" placeholder="Password">
             <div class="text-danger wow bounceInDown"><?php echo $msg2 ;?></div>
        </div>

        <div class="text-center">
            <input type="submit" value="Log-in" name="Join" class="btn btn-danger">
            <br><br>
             <div class="text-danger wow bounceInDown"><?php echo $msg3 ;?></div>
        </div>

     </form>
  </div>
</div>

<?php  include "inc/footer.php"?>
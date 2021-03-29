<?php include 'inc/header.php'; ?>
<?php include 'handlers/cus_login_handler.php' ;?>

<div class="container">
<div class="row">
<div class="col-12 col-lg-3">
</div> <!-- end col -->
<div class="col-12 col-lg-6 wow bounceInUp" data-wow-delay="0.3s" id="mycontainer">
<div class="form">
<h2 class="text-center"> <span class="text-primary">Customer's Login Page</span> </h2>
<p class="text-center">Only Customer's are allowed to Login here.</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" role="form">

<!-- 
<div class="form-group">
<label for="username" class="sr-only">Account type</label>
<i class="fa fa-user"></i>
    <select class="form-control" name="account_type" >
        <option value="0">Select Account Type</option>
        <option value="admin">Admin</option>
        <option value="customer">Customer</option>
        <option value="ruler">Ruler</option>
    </select>
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"> <?php echo $msg1; ?></div>
</div> -->
<div class="form-group">
<label for="username" class="sr-only">Username</label>
<i class="fa fa-user"></i><input type="text" class="form-control" name="cus_username" placeholder="Your username" maxlength="30">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"> <?php echo $msg1; ?></div>
</div>

<div class="form-group">
<label for="lastname" class="sr-only">Lastname</label>
<i class="fa fa-user"></i><input type="password" name="cus_password" placeholder="Your Password" minlength="6" class="form-control">
<div class="validation"><?php //echo $msg2; ?></div>
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"> <?php echo $msg2; ?></div>
</div>

<div class="text-center text-danger wow bounceInUp" data-wow-delay="0.3s"> <?php echo $msg3; ?></div>
<div class="text-danger"> <?php echo $msg4; ?></div>
<div class="text-danger"> <?php echo $msg5; ?></div>
<div class="text-danger text-center"> <?php echo  $is_online_value; ?></div>

<div class="form-group">
<div class="text-center"><input type="submit" name="submit" class="btn btn-danger"  value="Log In"></div>
<br>

</div>
</form>

</div>
</div> <!-- end col -->
<div class="col-12 col-lg-3">
</div> <!-- end col -->

</div> <!-- end row -->
</div> <!-- end container -->
<?php include 'inc/footer.php'; ?>
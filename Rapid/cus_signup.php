<?php include 'inc/header.php' ?>
<?php include 'handlers/cus_signup_handler.php' ;?>
<div class="container wow bounceInDown" data-wow-delay="0.3s" id="mycontainer">
<div class="form">
<h1 class="text-center"> <span class="text-primary"> Customer's Sign-up Page </span> </h1>
<p class="text-center">Only Customer's are allowed to Sign-Up here.</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" role="form">
    
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="firstname" class="sr-only">Firstname</label>
<i class="fa fa-user"></i><input type="text" name="cus_firstname" class="form-control" placeholder="Your firstname" maxlength="40">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg1; ?></div>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="Lastname" class="sr-only">Lastname</label>
<i class="fa fa-user"></i><input type="text" name="cus_lastname" class="form-control" placeholder="Your Lastname" maxlength="40">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg2; ?></div>
</div>
</div>

</div>

<div class="form-group">
<label for="Email" class="sr-only">Email</label>
<i class="fa fa-envelope"></i><input type="email" name="cus_email" class="form-control" placeholder="Your email" maxlength="40">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg3; ?></div>
</div>



<div class="form-check">
<label for="gender" class="form-check-label"><b class="text-primary">Select Gender</b></label><br>
<i class="fa fa-male"></i><span class="text-secondary">Male</span> <input type="radio" name="cus_gender" id="gender" value="male">

</div>

<div class="form-check">
<i class="fa fa-female"></i><span class="text-secondary">Female</span> <input type="radio" name="cus_gender" id="gender" value="female">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg4; ?></div>
</div>

<div class="form-group">
<label for="" class="sr-only">Phone</label>
<i class="fa fa-phone">+234</i><input type="tel" name="cus_phone"  pattern="[0-9]{11}" class="form-control" maxlength="11" >
<div class="text-left">Format:<i class='text-danger'>8080000000</i></div>
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg5; ?></div>
</div>


<div class="form-group">
<label for="Username" class="sr-only">Username</label>
<i class="fa fa-user"></i><input type="text" name="cus_username" class="form-control" placeholder="Choose a Username" maxlength="30">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg6; ?></div>
</div>
</div>

<div class="form-group">
<label for="address" class="sr-only">Address</label>
<i class="fa fa-home"></i><input type="text" name="cus_address" class="form-control" placeholder="Your address" maxlength="200">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg7; ?></div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="password1" class="sr-only">Password</label>
<i class="fa fa-lock"></i><input type="password" name="cus_secret" class="form-control" placeholder="Your Password" minlength="6" maxlength="30">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg8; ?></div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label for="password2" class="sr-only">Password</label>
<i class="fa fa-lock"></i><input type="password" name="cus_password" class="form-control" placeholder="Confirm Password" minlength="6" maxlength="30">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg9; ?></div>
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg10; ?></div>
</div>
</div>

</div>

<div class="text-danger"><?php echo $msg11; ?> </div>
<div class="text-danger"><?php echo $msg12; ?> </div>
<h3 class="text-danger text-center wow bounceInUp" data-wow-delay='0.4s'><?php echo $msg13; ?> </h3>
<div class="form-group">
<div class="text-center"><input type="submit" name="cus_submit" class="btn btn-danger" value="Sign Up"></div>
<br>
</div>
</form>

</div>  
</div>



<?php include 'inc/footer.php' ?>
<?php include 'inc/header.php'; include 'handlers/admin_signup_handler.php'; ?>

<body>
<script src="inc/ajax/ajaxPrice.js"> </script>
<script src="inc/ajax/ajaxGetAdminEmail.js"></script>
<div class="container wow bounceInUp" data-wow-delay="0.3s" id="mycontainer">

    <div class="form">
    <h1 class='text-center text-secondary '>Admin Sign-Up Page</h1>
    <p class="text-center text-primary">This page is strictly for anyone that wishes to join our Platform.</p>
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST" role="form">

      <div class="row">

        <div class="col-6">
            <div class="form-group">
                <label for = "firstname" class="sr-only">Firstname</label>
                 <i class="fa fa-user"></i> <input type="text" class="form-control" name="admin_firstname" id="firstname" placeholder="Firstname" maxlength="40">
            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg1 ;?></div>
         </div>

         <div class="col-6">
            <div class="form-group">
                <label for = "lastname" class="sr-only">Lastname</label>
                 <i class="fa fa-user"></i> <input type="text" class="form-control" name="admin_lastname" id="lastname" placeholder="Lastname" maxlength="40">
            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg2 ; ?></div>
          </div>


          <div class="col-6">
            <div class="form-group">
                <label for = "email" class="sr-only">Email</label>
                 <i class="fa fa-envelope"></i> <input type="email" class="form-control" name="admin_email" id="email" onkeyup="getEmail(this.value)" placeholder="E-mail Address" maxlength="70">
           <p class="text-danger" id="get" ></p>
            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg3 ; ?></div>
         </div>

         <div class="col-6">
            <div class="form-group">
                <label for = "admin_phone" class="sr-only">admin_phone</label>
                 <i class="fa fa-phone"></i> <input type="tel" class="form-control" maxlength="11" pattern="[0-9]{11}" name="admin_phone" id="admin_phone" placeholder="Phone Number">
            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg4 ; ?></div>
          </div>

           <div class="col-6">
            <div class="form-check">
<label for="gender" class="form-check-label"><b class="text-primary">Select Gender</b></label><br>
<i class="fa fa-male"></i><span class="text-secondary">Male</span> <input type="radio" name="admin_gender" id="gender" value="male">
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg5; ?></div>
</div>

<div class="form-check">
<i class="fa fa-female"></i><span class="text-secondary">Female</span> <input type="radio" name="admin_gender" id="gender" value="female">

</div>
<div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div>
         </div>

         <div class="col-6">
            <div class="form-group">
                <label for = "dateOfBirth" class="sr-only">Date Of Birth</label>
                 <i class="fa fa-user"></i> <input type="date" class="form-control" name="admin_dob" id="dateOfBirth" placeholder="Date Of Birth">

            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg6; ?></div>
          </div>

           <div class="col-6">
            <div class="form-group">
                <label for = "address" class="sr-only">Address</label>
                 <i class="fa fa-address-card"></i> <input type="text" class="form-control" name="admin_address" id="address" placeholder="address" maxlength="200">
            </div>
          <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg7 ; ?></div>
         </div>

         <div class="col-6">
            <div class="form-group">
                <label for = "workName" class="sr-only">Work Name</label>
                 <i class="fa fa-user"></i> <input type="text" class="form-control" name="admin_workName" onkeyup="getWorkName(this.value)" id="workName" placeholder="Work Name" maxlength="40">
                <div class="text-secondary" id="workName"></div>
           </div>
           <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div>
          </div>

           <div class="col-6">
            <div class="form-group">
                <label for = "firstname" class="sr-only">Business Type</label>
                 <i class="fa fa-user"></i>
                 <select  class="form-control" name="admin_BusType" onchange="price(this.value)">
                    <option value="">--Business Type--</option>
                    <option value="graphics">Graphics</option>
                    <option value="web">Web Development</option>

                 </select>

            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div>
         </div>

         <div class="col-6">
            <div class="form-group">

                <label for = "admin_price" class="sr-only">Admin_price</label>
                 <i class="fa fa-money">  &#8358; </i> <input type="number" class="form-control" name="admin_price" placeholder="Price" maxlength="11">

            </div>
                 <p id="price" ></p>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div>
          </div>

           <div class="col-6">
            <div class="form-group">
                <label for = "password1" class="sr-only">Password</label>
                 <i class="fa fa-lock"></i> <input type="password" class="form-control" minLength="6" name="admin_password1" id="password1" placeholder="Password">

            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div>
         </div>

         <div class="col-6">
            <div class="form-group">
                <label for = "password2" class="sr-only">Confirm Password</label>
                 <i class="fa fa-lock"></i> <input type="password" class="form-control" minLength="6" name="admin_password2" id="password2" placeholder="Confirm Password">

            </div>
            <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php echo $msg13; ?></div>
          </div>

            </div>
                <div class="form-group">

                     <div class="text-center"><input type="submit" name="admin_submit" class="btn btn-danger" value="Sign-Up"></div>

                <div class="validation text-danger wow fadeInDown" data-wow-delay="0.68s"><?php ?></div> <br>
                </div>
        </form>
    </div>
</div>

</body>


<?php include 'inc/footer.php' ;?>
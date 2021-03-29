<?php include "inc/header.php"?>
<?php

  $_GET['p']="";
  include"inc/ConnectionClass.php";
  $db_op = new DbOperation();

  $admin_password_not_match="";
  $password_not_match="";
  $admin_signup_msg="";
  $sucess="";

    include"inc/Validation.php";
    include"signup_form_handler.php";
    include"login_form_handler.php";

  if( isset($_GET['q']) and $_GET['q'] == "member_not_found" ){
    echo"
        <div class='container'>
          <p class='text-center alert alert-danger'>
            <a href='#' data-dismiss='alert'><i class='fa fa-warning text-danger'></i> YOU NEED AN ACCOUNT TO CONTINUE</a>
          </p>
        </div>
    ";
  }

//for member validation err
    

    // $r = $db_op->select('* from profilechecker where UserID=978');
    // $db_op->fetch($r, 'UserID');
    // ech

    // var_dump($r);
    // $db_op->insert('profilechecker', "(UserID, Status) Values('978', '33')");
    // $db_op->update('profilechecker', 'UserID="34", Status="6" where UserID="3"');
    // $db_op->delete('profilechecker');
    // $db_op->kill_db();

    ?>
<!-- sign up message -->
<p style="font-size:150%" class="container text-center text-success"><?php echo $sucess;?></p>
  
 

<div><?php echo $admin_signup_msg;?></div>
<div class="container text-danger" style="font-size:150%"><?php echo $admin_password_not_match;?></div>

<div class=" container text-danger wow flipInX" style="font-size:150%"><?php echo $member_error_all; ?></div>
<div class="container bg-dark" id="register">

  <div class="row"><!-- start of row 1-->

  <div class="col-md-8 col-lg-6" id="form">
      <div class="form">
              <div class="row">
                  <div class="col-md-4 col-lg-4"><br>
                    <p  class="text-light">Change Sign-Up type:<select name="register" class="text-light bg-primary form-control" id="" onchange="run(this.value,'form_temp.php?p=', 'form', 'error')">
                      <option value="0">Sign-Up Options</option>
                      <option value="1">Admin</option>
                    </select></p>
                </div>
                <div class="col-md-8 col-lg-8"><br><h3 class="text-success">Become a registered Member</h3></div>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"><!--form-->
              <div class="form-row">
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="text" name="member_firstname" class="form-control" id="firstname" placeholder="Your Firstname"  />
                  <div class="validation text-danger"><?php echo $member_firstname; ?></div>
                </div>
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="text" class="form-control" name="member_lastname" id="lastname" placeholder="Your Lastname" />
                  <div class="validation text-danger"><?php echo $member_lastname; ?></div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="member_email" id="email" placeholder="Your Email e.g example@gmail.com" />
                <div class="validation text-danger"><?php echo $member_email; ?></div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="member_username" id="username" placeholder="Your Username" />
                <div class="validation text-danger"><?php echo $member_username; ?></div>
              </div>

              <div class="form-group">
                <input type="tel" class="form-control" name="member_phone_number" id="member_telephone" placeholder="09000000000 11 digits" minlength="11" maxlength="11"/>
                <div class="validation text-danger"><?php echo $member_phone_number; ?></div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="member_age" id="member_age" placeholder="Enter your age" />
                <div class="validation text-danger"><?php echo $member_age; ?></div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="password" name="member_password1" class="form-control" id="member_password1" placeholder="Enter Password"/>
                  <div class="validation text-danger"></div>
                </div>
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="password" class="form-control" name="member_password2" id="member_password2" placeholder="Confirm Password"/>
                  <div class="text-danger"><?php echo $password_not_match;?></div>
                </div>
              </div>
              
              <div class="form-group">
                <legend class="sr-only">Sign-Up</legend>
                <input type="submit" class=" bg-success btn btn-success" value="Sign-Up" name="member_sign_up">
                <p class="text-danger"><?php?></p> 
              </div>
            </form>
      </div>
    </div>

    <div class="col-md-2 col-lg-1">
      |<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>|<br>
    </div>
    
    <p class="text-danger">
    <div  class="col-md-4 col-lg-5">
      <div class="form" id="login_form">
        

      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> <!--also select from here for ajax-->
      <div class="row"><!-- start -->

          <div class="col-md-4 col-lg-5"><br>
            <div class="form-group">
              <!-- run(val, file, land, error="") -->
              <p  class="text-light">Change Login Option:<select onchange="run(this.value, 'form_temp.php?p=', 'login_form', 'error')" name="member_login" id="" class="text-light bg-primary form-control">
                <option value="0">Login Options</option>
                <option value="4">Admin</option>
                <option value="5">Super User</option>
              </select></p>
            </div>
          </div>

          <div class="col-md-4 col-lg-4">
            <br><h3 class="text-success">Login for Registered Member.</h3>
          </div>
        </div><!-- end -->

          <div class="form-group">
              <legend class="sr-only">Email Address</legend>
              <input type="email" placeholder="Email Address" name="member_email" class="form-control" maxlength="60" minlength="4">
              <p class="text-danger"><?php echo $login_error1;?></p>
          </div>

          <div class="form-group">
              <legend class="sr-only">Password</legend>
              <input type="password" name="member_password" placeholder="Enter Password" class=" form-control" maxlength="60" minlength="6">
              <p class="text-danger"><?php echo $login_error2; echo $login_pword_not_match?></p>
          </div>

          <div class="form-group">
            <legend class="sr-only">Login</legend>
            <input type="submit" class="bg-success btn btn-success" value="Login" name="member_login1">
            <p class="text-danger"><?php echo $login_error3?></p>
            <a href="">Forgot Password?</a>
        </div>

      </form>

      </div>

    </div>

  </div><!-- end of row 1 -->



</div>
<script type="text/javascript" src="inc/ajax.js">
  
</script>
<?php include"inc/footer.php"?>
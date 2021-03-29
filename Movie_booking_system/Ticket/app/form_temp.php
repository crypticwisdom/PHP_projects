<?php 

include"inc/Validation.php";
include"signup_form_handler.php";


$admin_login_error1=$admin_login_error2=$admin_login_error3=$admin_login_pword_not_match="";
if(isset($_GET['p']) && intval($_GET['p'])){
    $p = $_GET['p'];
 
    if($p == intval(1)){
      // this is admin signup
      $admin_firstname=$admin_lastname=$admin_email=$admin_username=$admin_phone_number=$admin_password1=$admin_password2=$office_code=$admin_errors_all="";
  
        echo '     
        <div class="form">
        <div class="row">
            <div class="col-md-4 col-lg-4"><br>
              <p  class="text-light">Change Sign-Up type:<select name="register" class="text-light bg-primary form-control" id="" onchange="run(this.value,\'form_temp.php?p=\', \'form\', \'error\')">
                <option value="0">Sign-Up Options</option>
                <option value="2">Member</option>
              </select></p>
          </div>
          <div class="col-md-8 col-lg-8"><br><h3  class="text-success">Become an Administrator</h3></div>
      </div>

      <form action="" method="POST"><!--form-->
        <div class="form-row">
          <div class="form-group col-sm-6 col-lg-6">
            <input type="text" name="admin_firstname" class="form-control" id="firstname" placeholder="Your Firstname"  />
            <div class="text-danger">'.$admin_firstname.'</div>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
            <input type="text" class="form-control" name="admin_lastname" id="lastname" placeholder="Your Lastname" />
            <div class="text-danger">'.$admin_lastname.'</div>
          </div>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="admin_email" id="email" placeholder="Your Email e.g example@gmail.com" />
          <div class="text-danger">'.$admin_email.'</div>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="admin_username" id="username" placeholder="Your Username" />
          <div class="text-danger">'.$admin_username.'</div>
        </div>

        <div class="form-group">
          <input type="tel" class="form-control" name="admin_phone_number" id="member_telephone" placeholder="09000000000 11 digits" minlength="11" maxlength="11"/>
          <div class="text-danger">'.$admin_phone_number.'</div>
        </div>
  
        <div class="form-row">
          <div class="form-group col-sm-6 col-lg-6">
            <input type="password" name="admin_password1" class="form-control" id="member_password1" placeholder="Enter Password"/>
            <div class="text-danger">'.$admin_password1.'</div>
          </div>
          <div class="form-group col-sm-6 col-lg-6">
            <input type="password" class="form-control" name="admin_password2" id="member_password2" placeholder="Confirm Password"/>
            <div class="text-danger">'.$admin_password2.'</div>
          </div>
        </div>

        <div class="form-row">
        <div class="form-group col-sm-6 col-lg-6">
          <input type="text" name="office_code" class="form-control" id="office_code" placeholder="Office Code"/>
          <div class="text-danger">'.$office_code.'</div>
        </div>
        <div class="form-group col-sm-6 col-lg-6">
          <legend class="sr-only">Sign-Up</legend>
          <input type="submit" class=" bg-success btn btn-success" value="Sign-Up" name="admin_sign_up">
          <div class="text-danger">'.$admin_errors_all.'</div>
        </div>
      </div>

      </form>
</div>
        ';
        

    }elseif($p == intval(2)){
      // member
      include'signup_form_handler.php';

        echo '
        <div class="form">
              <div class="row">
                  <div class="col-md-4 col-lg-4"><br>
                    <p  class="text-light">Change Sign-Up type:<select name="register" class="text-light bg-primary form-control" id="" onchange="run(this.value,\'form_temp.php?p=\', \'form\', \'error\')">
                      <option value="0">Sign-Up Options</option>
                      <option value="1">Admin</option>
                    </select></p>
                </div>
                <div class="col-md-8 col-lg-8"><br><h3 class="text-success">Become a registered Member</h3></div>
            </div>

            <form action="" method="post"><!--form-->
              <div class="form-row">
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="text" name="member_firstname" class="form-control" id="firstname" placeholder="Your Firstname"  />
                  <div class="validation text-danger">'.$member_firstname.'</div>
                </div>
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="text" class="form-control" name="member_lastname" id="lastname" placeholder="Your Lastname" />
                  <div class="validation text-danger">'.$member_lastname.'</div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="member_email" id="email" placeholder="Your Email e.g example@gmail.com" />
                <div class="validation text-danger">'.$member_email.'</div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="member_username" id="username" placeholder="Your Username" />
                <div class="validation text-danger">'.$member_username.'</div>
              </div>

              <div class="form-group">
                <input type="tel" class="form-control" name="member_phone_number" id="member_telephone" placeholder="09000000000 11 digits" minlength="11" maxlength="11"/>
                <div class="validation text-danger">'.$member_phone_number.'</div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="member_age" id="member_age" placeholder="Enter your age" />
                <div class="validation text-danger">'.$member_age.'</div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="password" name="member_password1" class="form-control" id="member_password1" placeholder="Enter Password"/>
                  <div class="validation text-danger"></div>
                </div>
                <div class="form-group col-sm-6 col-lg-6">
                  <input type="password" class="form-control" name="member_password2" id="member_password2" placeholder="Confirm Password"/>
                  <div class="validation text-danger">'.$password_not_match.'</div>
                </div>
              </div>
              
              <div class="form-group">
                <legend class="sr-only">Sign-Up</legend>
                <input type="submit" class=" bg-success btn btn-success" value="Sign-Up" name="member_sign_up">
                <p class="text-danger"><?php?></p>
                <div class="text-danger display-5 wow flipInX"><?php echo $member_error_all; ?></div>
              </div>
            </form>
      </div>
    ';
  
    }elseif($p == intval(3)){
      // this is login member
    echo '
    <form action="#" method="post"> <!--also select from here for ajax-->
    <div class="row"><!-- start -->

        <div class="col-md-4 col-lg-5"><br>
          <div class="form-group">
            <!-- run(val, file, land, error="") -->
            <p  class="text-light">Change Login Option:<select onchange="run(this.value, \'form_temp.php?p=\', \'login_form\', \'error\')" name="member_login" id="" class="text-light bg-primary form-control">
              <option value="0">Login Options</option>
              <option value="4">Admin</option>
              <option value="5">Super User</option>
            </select></p>
          </div>
        </div>

        <div class="col-md-4 col-lg-4">
          <br><h3 class="text-success">Login for Member</h3>
        </div>
      </div><!-- end -->

        <div class="form-group">
            <legend class="sr-only">Email Address</legend>
            <input type="email" placeholder="Email Address" name="member_email" class="form-control" maxlength="60" minlength="4">
            <p class="text-danger"><?php?></p>
        </div>

        <div class="form-group">
            <legend class="sr-only">Password</legend>
            <input type="password" name="member_password" placeholder="Enter Password" class=" form-control" maxlength="60" minlength="6">
            <p class="text-danger"><?php?></p>
        </div>

        <div class="form-group">
          <legend class="sr-only">Login</legend>
          <input type="submit" class="bg-success btn btn-success" value="Login" name="member_login2">
          <p class="text-danger"><?php?></p>
          <a href="">Forgot Password?</a>
      </div>

    </form>
    
    ';
    }elseif($p == intval(4)){
      // this is login admin
      echo '
      <form action="#" method="post"> <!--also select from here for ajax-->
      <div class="row"><!-- start -->
  
          <div class="col-md-4 col-lg-5"><br>
            <div class="form-group">
              <!-- run(val, file, land, error="") -->
              <p  class="text-light">Change Login Option:<select onchange="run(this.value, \'form_temp.php?p=\', \'login_form\', \'error\')" name="member_login" id="" class="text-light bg-primary form-control">
                <option value="0">Login Options</option>
                <option value="3">Member</option>
                <option value="5">Super User</option>
              </select></p>
            </div>
          </div>
  
          <div class="col-md-4 col-lg-4">
            <br><h3 class="text-success">Login Adminstrator</h3>
          </div>
        </div><!-- end -->
  
          <div class="form-group">
              <legend class="sr-only">Email Address</legend>
              <input type="email" placeholder="Email Address" name="admin_email" class="form-control" maxlength="60" minlength="4">
              <p class="text-danger"></p>
          </div>
  
          <div class="form-group">
              <legend class="sr-only">Password</legend>
              <input type="password" name="admin_password" placeholder="Enter Password" class=" form-control" maxlength="60" minlength="6">
              <p class="text-danger"></p>
          </div>
  
          <div class="form-group">
            <legend class="sr-only">Login</legend>
            <input type="submit" class="bg-success btn btn-success" value="Login" name="admin_login">
            <p class="text-danger"></p>
            <a href="">Forgot Password?</a>
        </div>
  
      </form>
      
      ';
      }elseif($p == intval(5)){
        // this is login super user
        echo '
        <form action="#" method="post"> <!--also select from here for ajax-->
        <div class="row"><!-- start -->
    
            <div class="col-md-4 col-lg-5"><br>
              <div class="form-group">
                <!-- run(val, file, land, error="") -->
                <p  class="text-light">Change Login Option:<select onchange="run(this.value, \'form_temp.php?p=\', \'login_form\', \'error\')" name="member_login" id="" class="text-light bg-primary form-control">
                  <option value="0">Login Options</option>
                  <option value="3">Member</option>
                  <option value="4">Admin</option>
                </select></p>
              </div>
            </div>
    
            <div class="col-md-4 col-lg-4">
              <br><h3 class="text-success">Login for SuperUser</h3>
            </div>
          </div><!-- end -->
    
            <div class="form-group">
                <legend class="sr-only">Email Address</legend>
                <input type="email" placeholder="Email Address" name="member_email" class="form-control" maxlength="60" minlength="4">
                <p class="text-danger"><?php?></p>
            </div>
    
            <div class="form-group">
                <legend class="sr-only">Password</legend>
                <input type="password" name="member_password" placeholder="Enter Password" class=" form-control" maxlength="60" minlength="6">
                <p class="text-danger"><?php?></p>
            </div>
    
            <div class="form-group">
              <legend class="sr-only">Login</legend>
              <input type="submit" class="bg-success btn btn-success" value="Login" name="member_login">
              <p class="text-danger"><?php?></p>
              <a href="">Forgot Password?</a>
          </div>
    
        </form>
        
        ';
        }
}else{
    header('location:../../index.php');
    die();
}

?>
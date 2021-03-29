<?php 
    
    
    $login_error1=$login_error2=$login_error3=$login_pword_not_match="";

    if(isset($_POST['member_login1']) and $_SERVER['REQUEST_METHOD']=='POST'){
       
        //checks if a field is false (which means empty field) then returns an error message
       $email = $sign_up->checks('member_email') == FALSE ? $login_error1 = "This field is empty": $sign_up->checks('member_email');
       $password = $sign_up->checks('member_password') == FALSE ? $login_error2 = "This field is empty": $sign_up->checks('member_password');
       
       
       if( $email == $login_error1 or $password == $login_error2){
        $login_error3 = "Please input all details";
       }else{
          
        if($db_op->select("* from user where email = '{$email}'") ){
          $hashed_password = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'password');
          if(password_verify($password, $hashed_password)){
              session_start();
              $_SESSION['member_id'] = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'user_id');
              $_SESSION['firstname'] = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'first_name');
                header('Location:member/land.php');
                die();
              
          }else{
            $login_pword_not_match = "<p class='text-light text-center wow flipInY'>Invalid Login Details</p>";
          }
        }

           
       }  
        

    }elseif(isset($_POST['member_login2']) and $_SERVER['REQUEST_METHOD']=='POST'){

               //checks if a field is false (which means empty field) then returns an error message
       $email = $sign_up->checks('member_email') == FALSE ? $login_error1 = "This field is empty": $sign_up->checks('member_email');
       $password = $sign_up->checks('member_password') == FALSE ? $login_error2 = "This field is empty": $sign_up->checks('member_password');
       
       
       if( $email == $login_error1 or $password == $login_error2){
        $login_error3 = "Please input all details";
       }else{
          
        if($db_op->select("* from user where email = '{$email}'") ){
          $hashed_password = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'password');
          if(password_verify($password, $hashed_password)){
              session_start();
              $_SESSION['member_id'] = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'user_id');
              $_SESSION['firstname'] = $db_op->single_fetch($db_op->select("* from user where email = '{$email}'"), 'first_name');
                header('Location:member/land.php');
                die();
              
          }else{
            $login_pword_not_match = "<p class='text-light text-center wow flipInY'>Invalid Login Details</p>";
          }
        }

           
       }
    }elseif(isset($_POST['admin_login']) and $_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $sign_up->checks('admin_email') == FALSE ? $login_error1 = "This field is empty": $sign_up->checks('admin_email');
        $password = $sign_up->checks('admin_password') == FALSE ? $login_error2 = "This field is empty": $sign_up->checks('admin_password');
       
       
       if( $email == $login_error1 or $password == $login_error2){
        $login_error3 = "Please input all details";
       }else{
          
        if($db_op->select("* from admin where email = '{$email}'")){
          $fetch = mysqli_fetch_array($db_op->select("* from admin where email = '{$email}'"));
          $hashed_password = $fetch['password'];
  
          if(password_verify($password, $hashed_password)){
              
              session_start();
              $_SESSION['admin_id'] = $db_op->single_fetch($db_op->select("* from admin where email = '{$email}'"), 'admin_id');
              $_SESSION['firstname'] = $db_op->single_fetch($db_op->select("* from admin where email = '{$email}'"), 'first_name');
                header('Location:admin/controls.php');
                die();
                 
          }else{
            $login_pword_not_match = "<p class='text-light text-center wow flipInY'>Invalid Login Details</p>";
          }
        }

           
       }

    //    for the super login handler make sure you use the same variable to store error messages, so that it would
    // reflect in the front page
        

    }
?>
<?php
if(isset($_GET['n'])){
    if($_GET['n'] == 'not'){
        echo "<div class='container wow bounceInDown' data-deley-time='0.3s'>";
     echo '<h3 class="text-center text-danger" > Ops!! Seeems we have no data related to this details<br>
     Please retry insert a valid input and try again/ <a href="cus_signup.php" class="btn btn-secondary"> Sign-Up</a> </h3>';
     echo "</div>";
    }else{
 echo 'your are not signed in';
    }
    }
if(isset($_GET['p'])){
    if($_GET['p'] == 'signed'){
        echo "<div class='container wow bounceInDown' data-deley-time='0.3s'>";
     echo '<h3 class="text-center" style="color:green"> Hurray!! PRO7JOB welcomes you to its Platform<br>
     Please Login</h3>';
     echo "</div>";
    }else{
        echo 'your are not signed in';
    }
    }

$msg1=$msg2=$msg3=$msg4=$msg5=$msg6=$msg7= $is_online_value="";
$username=$password=$sql=$result=$init=$bind=$stmt=$records="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit']) ){
$connection=mysqli_connect('localhost', 'root', '', 'AlertNeon');

function valid($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}


if(!empty($_POST['cus_username'])){
    $username= valid($_POST['cus_username']);
    
}else{
    $msg1="Please input your username";
}

if(!empty($_POST['cus_password'])){
    $password= $_POST['cus_password'];
}else{
    $msg2="Please input your password";
}

if( !empty($_POST['cus_username']) && !empty($_POST['cus_password'])){
 


$sql="SELECT * FROM CustomerTable WHERE Cus_UserName='$username' ;" ;
$result= mysqli_query($connection, $sql);
$records=mysqli_fetch_assoc($result);

     $pas = $records['Cus_Password']; 
     $cus_id = $records['CUS_ID'];

  if(password_verify($password, $pas)){
        session_start();
            $_SESSION['CUS_ID'] = $records['CUS_ID'];

                // $is_online = "select is_online from CustomerTable where CUS_ID = '$cus_id' ;";
                //     $run_is_online_stmt = mysqli_query($connection, $is_online);
                //         $is_online_record = mysqli_fetch_array($run_is_online_stmt);

                //             if( $is_online_record['is_online'] == 0 ){
                //                 $replace_is_online_status = "update CustomerTable set is_online= 1 where CUS_ID = '$cus_id' ";
                //                 if(mysqli_query($connection, $replace_is_online_status)){
                                   header("location:cus_profile.php?w=welcome");
                                    exit(); 
                            //         }else{
                            //             header("location:./inc/logout.php");
                            //             exit();
                            //         }
                                
                                
                            // }elseif($is_online_record['is_online'] == 1) {
                            //     $is_online_value = "You are logged in already";
                            // }else{
                            //     header("location:./inc/logout.php");
                            //     exit();
                            // }

            
             
               

            // echo $fetch_is_online_record;




  }   else{
    header('Location:cus_login.php?n=not');
    mysqli_close($connection);
    exit();
  }


}else{
    echo "<div class='text-center'>";
  
    echo "<h4 class='text-danger wow bounceInDown' data-delay='0.3s'> check inputs and retry again</h4>";
echo "</div>";
}

}else{
$msg3="Please input all fields";
}











?>
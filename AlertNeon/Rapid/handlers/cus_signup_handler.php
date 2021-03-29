<?php

$firstname=$lastname=$email=$gender=$phone=$username=$address=$password=$password1=$username1="";
$msg1=$msg2=$msg3=$msg4=$msg5=$msg6=$msg7=$msg8=$msg9=$msg10=$msg11=$msg12=$msg13=$msg14="";
$secret=$pwd=$sql=$result=$stmt=$bind=$init=$sql1=$query=$fetch=$sq=$resu=$find=$connection="";

if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['cus_submit'])){
   $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
    function valid($data){
        $data=htmlspecialchars($data);
        $data=stripslashes($data);
        $data=trim($data);       
        return $data;
    }
    
   if(!empty($_POST['cus_firstname'])){
$firstname = valid($_POST['cus_firstname']);
   }else{
$msg1="Please input your firstname";
   }

      if(!empty($_POST['cus_lastname'])){
$lastname = valid($_POST['cus_lastname']);
   }else{
$msg2="Please input your lastname";
   }

   if(!empty($_POST['cus_email'])){
    $email = valid($_POST['cus_email']);
       }else{
    $msg3="Please input your email";
       }
       if(!empty($_POST['cus_gender'])){
        $gender = valid($_POST['cus_gender']);
           }else{
        $msg4="Please input your gender";
           }
           if(!empty($_POST['cus_phone'])){
            $phone = valid($_POST['cus_phone']);
               }else{
            $msg5="Please input your phone";
               }
               if(!empty($_POST['cus_username'])){
                   $username = $_POST['cus_username'];
                   }else{
                $msg6="Please input your username";
                   }
                   if(!empty($_POST['cus_address'])){
                    $address = valid($_POST['cus_address']);
                       }else{
                    $msg7="Please input your address";
                       }
                      
                       if(!empty($_POST['cus_secret'])){
                          $secret=valid($_POST['cus_secret']);
                       }else{
                          $msg8="Please input your password";
                       }
                       if(!empty($_POST['cus_password'])){
                          $pwd=valid($_POST['cus_password']);
                       }else{
                          $msg9="Please input your password";
                       }

                     if($secret == $pwd){
                        $password1=valid($_POST['cus_password']);
                     }else{
                        $msg10="Password does not match";
                     }   
                   
                     
 if(!empty($_POST['cus_firstname']) && !empty($_POST['cus_lastname']) && !empty($_POST['cus_email']) &&
 !empty($_POST['cus_gender']) && !empty($_POST['cus_phone']) && !empty($_POST['cus_username']) &&
 !empty($_POST['cus_address']) && !empty($_POST['cus_secret']) && !empty($_POST['cus_password'])){

if( $secret !== $password1 ){
   $msg11="Can't submit, your passwords didn't match";
}else{
   $password=password_hash($password1, PASSWORD_DEFAULT);
$sql=" INSERT INTO customertable(Cus_Firstname, Cus_Lastname, Cus_Email, Cus_Gender, Cus_PhoneNo, Cus_Username, Cus_Address, Cus_Password ) values(?, ?, ?, ?, ?, ?, ?, ? );";
$init = mysqli_stmt_init($connection);
if(mysqli_stmt_prepare($init, $sql)){
   mysqli_stmt_bind_param($init, 'ssssisss', $firstname, $lastname, $email, $gender, $phone, $username, $address, $password);
   if(mysqli_stmt_execute($init)){
    ///////
    $sqlGetId = "select * from customertable where Cus_PhoneNo = '$phone' and Cus_Email = '$email' ;";
    $r = mysqli_query($connection, $sqlGetId);

    $f = mysqli_fetch_array($r);
    $adminNo = $f['CUS_ID'];

    $sqlquery = "insert into customerProfilePicture(CUS_ID, PictureName) values('$adminNo', '') ;";
    $sqlquery.="insert into customerProfileChecker(CUS_ID, Checker) values('$adminNo', 0) ;";
    $r1 = mysqli_multi_query($connection, $sqlquery);
    if($r1 == true){
       header('Location:cus_login.php?p=signed');
      mysqli_close($connection);
      die();
    }
   }else{
    echo "sign up problem";
   }

}else{
   $msg12="Bad connection";
}
   
}
   
}else{
$msg13="Can't signup";
                     }
   
}








?>
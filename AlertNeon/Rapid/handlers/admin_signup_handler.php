<?php

$firstname=$lastname=$email=$phone=$gender=$dob=$address=$workName=$BusType=$price=$password=$password1=$password2="";
$connection=$init=$sql=$prepare=$sql2=$res2="";
$msg1=$msg2=$msg3=$msg4=$msg5=$msg6=$msg7=$msg8=$msg9=$msg10=$msg11=$msg12=$msg13="";
    if( isset($_POST['admin_submit']) && $_SERVER['REQUEST_METHOD']=='POST' ){
    $connection=mysqli_connect('localhost', 'root', '', 'AlertNeon');
      function valid($data){
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
      }

       if(!empty($_POST['admin_firstname'])){
        $firstname= valid(ucwords($_POST['admin_firstname']));
       }else{
        $msg1="Input your Firstname";
       }

       if(!empty($_POST['admin_lastname'])){
        $lastname= valid(ucwords($_POST['admin_lastname']));
       }else{
        $msg2="Input your lastname";
       }

       if(!empty($_POST['admin_email'])){
        $email= valid($_POST['admin_email']);
       }else{
        $msg3="Input your email";
       }
       if(!empty($_POST['admin_phone'])){
        $phone= valid($_POST['admin_phone']);
       }else{
        $msg4="Input your phone Number";
       }
        if(!empty($_POST['admin_gender'])){
        $gender= valid($_POST['admin_gender']);
       }else{
        $msg5="Input your gender";
       }
       if(!empty($_POST['admin_dob'])){
        $dob= valid($_POST['admin_dob']);
       }else{
        $msg6="Input your dob";
       }
       if(!empty($_POST['admin_address'])){
        $address= valid($_POST['admin_address']);
       }else{
        $msg7="Input your address";
       }
       if(!empty($_POST['admin_workName'])){
        $workName= valid($_POST['admin_workName']);
       }else{
        $msg8="Input your Work Name";
       }

       if(!empty($_POST['admin_BusType'])){
        $BusType=valid($_POST['admin_BusType']);

       }else{
        $msg9="Input your BusType";
       }
       if(!empty($_POST['admin_price'])){
        $price= valid($_POST['admin_price']);
       }else{
        $msg10="Input your price";
       }
       if(!empty($_POST['admin_password1'])){
        $password1= $_POST['admin_password1'];
       }else{
        $msg11="Input your password";
       }
       if(!empty($_POST['admin_password2'])){
        $password2=$_POST['admin_password2'];
       }else{
        $msg12="Input your password";
       }


if(!empty($_POST['admin_firstname'] && $_POST['admin_lastname'] && $_POST['admin_email'] && $_POST['admin_phone'] && $_POST['admin_gender']
  && $_POST['admin_dob'] && $_POST['admin_BusType'] && $_POST['admin_price'] && $_POST['admin_password1'] && $_POST['admin_password2'])){
 if( $password1 == $password2 ){
         $password = password_hash($password2, PASSWORD_DEFAULT);
       }else{
            $msg13 = "Your password doesn't match";
       }

        $sql = "INSERT INTO AdminTable(Admin_Firstname, Admin_Lastname, Admin_Email, Admin_Gender, Admin_DOB, Admin_Address, Admin_WorkName, Admin_Phone, B_Name, Admin_Password)
        VALUES('$firstname', '$lastname', '$email', '$gender', '$dob', '$address', '$workName','$phone', '$BusType', '$password') ;";
     $result = mysqli_query($connection, $sql);

if($result){
    $sql1 = "select * from AdminTable where Admin_Email = '$email' and Admin_Password = '$password'  ;";
        $res1 = mysqli_query($connection, $sql1);
            $fetch = mysqli_fetch_assoc($res1);

      if($fetch['Admin_ID']){
            $admin_id = $fetch['Admin_ID'];
      mysqli_query($connection, "INSERT INTO BusinessType(B_Name, Admin_ID, Price) VALUES('$BusType', '$admin_id', '$price');");
      header('location:admin_login.php?q=signed');
      exit();

      }else{
        header('location:index.php');
        exit();
      }

}else{

}
}




mysqli_close($connection);

    }


?>
<?php

    if(isset($_GET['w']) && intval($_GET['w']) ){
       session_start();
        $_SESSION['AdminID'] = intval($_GET['w']);
        print_r($_SESSION);
            $cusid = $_SESSION['CUS_ID'];
            $adminid = $_SESSION['AdminID'];
            //echo $cusid;
        //echo $_SESSION['webAdminID'];
       // header('location:viewAdminProfile.php');
     $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
        $sql = "select * from StoredUsers where CUS_ID = '$cusid' and Admin_ID='$adminid' ;";
          $result = mysqli_query($connection, $sql);
            $fetch = mysqli_fetch_assoc($result);

              if( $fetch['CUS_ID'] == $cusid && $fetch['Admin_ID'] == $adminid ){
                   header('location:message.php?q=messages');
                   exit();
              }else{

              header('location:insertUser.php');
                 exit();
              }
         exit();

    }else{
   header('location:logout.php');
   exit();
    }


?>

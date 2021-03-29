<?php

    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
    //print_r($_SESSION);
    $cusid = $_SESSION['CUS_ID'];
    $adminid= $_SESSION['AdminID'];
    // check if user is already on the table
    $sql = "select * from StoredUsers where CUS_ID = '$cusid' and Admin_ID = '$adminid' ;";

    $run_query = mysqli_query($connection, $sql);
    $fetch = mysqli_fetch_array($run_query);

    if($fetch){
        // return to location if details are present
        header('location:viewAdminProfile.php');
        exit();
    }else{
        //else insert in StoredUsers
       $sql = "Insert into StoredUsers(CUS_ID, Admin_ID, AdminMessage, CustomerMessage) values('$cusid', '$adminid', '', '');";
                $result = mysqli_query($connection, $sql);

               if($result){
                            header('location:viewAdminProfile.php');
                            exit();
                            }

    }

        
            

?>
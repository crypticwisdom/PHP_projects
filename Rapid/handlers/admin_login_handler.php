<?php
    $msg1=$msg2=$msg3=$msg4=$msg5=$workName=$password=$connection=$sql=$result=$fetch="";
    if( isset($_POST['Join']) && $_SERVER['REQUEST_METHOD'] == "POST"){
            function validate($data){
                $data = htmlspecialchars($data);
                $data = stripslashes($data);
                $data = trim($data);
                return $data;
            }

        if( !empty($_POST['admin_workName']) ){
            $workname = validate($_POST['admin_workName']);
        }else{
            $msg1 = "Please input your Work Name";
        }

             if( !empty($_POST['admin_password']) ){
            $password = validate($_POST['admin_password']);
        }else{
            $msg2 = "Please input your password";
        }
            if( !empty($_POST['admin_workName'] && $_POST['admin_password']) ){
                $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
                    $sql = " select * from AdminTable where Admin_WorkName = '$workname' ;";
                        $result = mysqli_query($connection, $sql);
                            $fetch = mysqli_fetch_assoc($result);
       //print_r($fetch);


                            $hashed = $fetch['Admin_Password'];

                                if(password_verify($password, $hashed) === TRUE){
                                    session_start();
                                        $_SESSION['Admin_ID'] = $fetch['Admin_ID'];
                                        // $sql_presence = " select * from AdminTable where Admin_WorkName = '$workname' ;";
                                        //     $result_presence = mysqli_query($connection, $sql_presence);
                                        //         $fetch_presence = mysqli_fetch_assoc($result_presence);
                                        //         if($fetch_presence['is_online'] == 0){
                                        //               $update_presence = "update AdminTable set is_online = 1 where Admin_ID = '".$fetch["Admin_ID"]."' "; 
                                        //               $run_query = mysqlI_query($connection, $update_presence);    
                                        //         }else{

                                        //    header('Location:admin_login.php?is_online=yes');
                                        //     die();
                                        //         }
                                  

                                    header('location:admin_profile_page.php?q=adminProfile');
                                            mysqli_close($connection);

                                            exit();
                                }else{
                                        header('Location:admin_login.php?f=not');
                                            die();
  }

            }else{
                $msg3 = "Please input your details correctly";
            }

    }

?>
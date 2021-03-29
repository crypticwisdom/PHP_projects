<?php
session_start();
print_r($_SESSION);

$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
$admin = $_SESSION['Admin_ID'];
$cus_id = $_SESSION['CUS_ID'];
if(isset($admin)){

	mysqli_query($connection, "update AdminTable set is_online = 0 where Admin_Id = '$admin' ;");
}else if(isset($cus_id)){
 	mysqli_query($connection, "update CustomerTable set is_online = 0 where CUS_ID = '$cus_id' ;");
}
session_unset();

session_destroy();

header('Location:../index.php');

die();
?>
<?php
if( isset($_GET['q']) && $_GET['q'] == "adminmessage") {
include "inc/header1.php";
    session_start();
        $adminID = $_SESSION['Admin_ID'];
    // print_r($_SESSION);
$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');

// 


echo "<div class='container'>
        <div class='row text-center'>
        <div class='col-md-6'>
        <p class='text-success pull-right'>Your messages are being filtered</p>
        </div>
        
        </div>
        </div>
        ";
// fetch from stored users
$sql = "select * from StoredUsers where Admin_ID = '$adminID' and Messaged = 'yes';";
 $result = mysqli_query($connection, $sql);



 echo '
 <script type="text/javascript" src="inc/ajax/ajaxGetMessage.js"></script>
        

      <div id="message" style="overflow:scroll; width:auto; height:350px;">';



echo '</div>
<
';

$message = "";
$empty_space="";

}else{
header('location:logout.php');
exit();

}





?>
<?php include "./inc/footer1.php"?>
<?php 

// include "../../classes/db.php";
 session_start();
// $connection = new DB_class('localhost', 'root', '', 'AlertNeon');
// print_r($_SESSION);
$admin = $_SESSION['Admin_ID'];
// echo $admin;
// $admin_details = $connection->select("StoredUsers", "where Admin_ID = '$admin' and Messaged = 'yes' ");

// echo $connection->fetch($admin_details, 'CustomerMessage');

$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
$sql = "select * from StoredUsers where  Admin_ID = '$admin' and Messaged = 'yes' ;";
$result = mysqli_query($connection, $sql);
while ($fetch = mysqli_fetch_array($result)){

    
    // print_r($fetch);
    $cus_id = $fetch['CUS_ID'];
    
      echo '
      <a href="AdminMessageBox.php?q='.$cus_id.' ">
        <div class="container bg-secondary" style="border-radius:10px; padding:20px; overeflow="none">
        <div class="row">
        <table>
        <tr >
        <th class="col-lg-3" style="" >Message from: '.$fetch["CustomerUsername"].'</th>
        <th class="col-lg-3" style="" >Chatting from '.$fetch["CustomerAddress"].'</th>
        </tr>
        <tr>
         <td class="text-light col-lg-3" id ="message">Last Message : '.$fetch["CustomerMessage"].'</td>
         <td class="col-lg-3">'.$fetch["message_date"].'</td>
         </tr>
        </table>
        </div>
        </div>
        </a>
        <br/>
      ';

}





// $connection->
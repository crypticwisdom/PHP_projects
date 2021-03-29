<?php include "inc/header1.php";
$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
if(isset($_GET['q']) && $_GET['q'] == 'messages'){
session_start();

$cus_id = $_SESSION['CUS_ID'];
$admin_id = $_SESSION['AdminID'];

 echo "<div class='container'>
        <div class='row text-center'>
        <div class='col-md-6'>
        <p class='text-success text-center'>Your messages are being filtered</p>
        </div>
        <div class='col-md-6'>
        <a href='InsertUser.php' class='btn btn-success'>View Jobs</a>
        </div>
        </div>
        </div>
        ";
// print_r($_SESSION);


$message = "";
$empty_space="";

if(!empty($_POST['message']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

$message = $_POST['message'];



$get_message = "select * from MessageOne where Admin_ID = '$admin_id' and CUS_ID = '$cus_id' ORDER BY MOID DESC;";
$run_get_message_query = mysqli_query($connection, $get_message);
$fetch_get_message = mysqli_fetch_array($run_get_message_query);
$table_id =  $fetch_get_message['MOID'];

//if the  block of codes below goes out of this file, a user will not be able to send and recieve his/her first message,
// database table was suppose to contain a row of data by the customer.
// customer has an exception in fetching back his/her message

if($table_id == null){
    $cover_space_sql = "insert into MessageOne(Admin_ID, CUS_ID, CustomerMessage) values('$admin_id', '$cus_id', '$message' )";
    mysqli_query($connection, $cover_space_sql);
    header("location:./message.php?q=messages") ;
}

// block ends here


if(empty($fetch_get_message['CustomerMessage'])){
    //update with message

    $message_update = "update MessageOne set CustomerMessage = '$message' where MOID = '$table_id' ;";
    mysqli_query($connection, $message_update);
}else{
    $message_sql = "insert into MessageOne(Admin_ID, CUS_ID, CustomerMessage) values('$admin_id', '$cus_id', '$message');";
    mysqli_query($connection, $message_sql);

}

// to storedUser
$update_stored_user = "update StoredUsers set CustomerMessage = '$message', Messaged = 'yes' where CUS_ID = '$cus_id' and Admin_ID= '$admin_id' ;";
$run = mysqli_query($connection, $update_stored_user);


$get_user_details = "select * from CustomerTable where CUS_ID = '$cus_id' ;";
$run_get_user_details = mysqli_query($connection, $get_user_details);
$fetch_details = mysqli_fetch_array($run_get_user_details);

$user_name = $fetch_details['Cus_Username'];
// echo $user_name;
$user_address = $fetch_details['Cus_Address'];
// echo $user_address;
$date = date("d:h:m");
if($fetch_details){

    $update_stored_user2 = "update StoredUsers set CustomerUsername = '$user_name', CustomerAddress = '$user_address', message_date = '$date' where CUS_ID = '$cus_id' and Admin_ID = '$admin_id' and Messaged = 'yes' ;";
    $result3 = mysqli_query($connection, $update_stored_user2);
    
}

}else{
    $empty_space = "Can't send empty message";
}

// fetch messages

$getting_messages = "select * from MessageOne where Admin_ID = '$admin_id' and CUS_ID = '$cus_id' ;";
$run_get_message_query = mysqli_query($connection, $getting_messages);

echo ' <div class="container bg-secondary" style="width:auto; height: 360px;  border-radius:5px; ; overflow:scroll">';

while ($fetch = mysqli_fetch_array($run_get_message_query)) :
    echo '<div class="row">
        <div class="text-light col-md-6 col-lg-6">
        <p class=""  style="overflow:auto; background-color: rgb(3, 62, 31); border-radius:5px; padding:6px">'.$fetch['CustomerMessage'].'<i class = "pull-right fa fa-check-circle"></i></p>
            
        </div>
       
        <div class="text-light col-md-6 col-lg-6">
        <p class="" style="overflow:auto; background-color: rgb(1, 62, 73); border-radius:5px; padding:6px">'.$fetch['AdminMessage'].'</p></div>
         </div>';
    endwhile;

echo '</div>';


}else{
header('location:logout.php');
exit();

}
?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

<div class="container">
   <div class="form-group">
    <input type="text" name="message" id="text" class="form-control" placeholder="Your Message Goes In Here...">
    <button type="submit" class="form-control btn btn-success" name="submit"><i class="fa fa-send"></i>Send</button>
    <div class="text-danger wow flipInX"><?php echo $empty_space; ?></div>
    </div>

</div>

</form>

 <?php include "inc/footer.php" ;?>
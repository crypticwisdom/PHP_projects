<?php 

session_start();

include "./visitor_header.php";
include "./ConnectionClass.php";
$db_class = new DbOperation();

$time="";
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['book_now']) ){
print_r($_POST);

// get movie id
$raw_id = $_POST['venue'];
$split = explode('.', $raw_id);
$movie_id = $split[1];

    function pre_check($data){
        if(array_key_exists($data, $_POST)){
            return $_POST[$data] != "" ? $_POST[$data]: FALSE;
        }else{
            return "false";
        }
        
    }

$venue = pre_check('venue');
$time = pre_check('time');
$day = pre_check('days');
$seat_number = pre_check('seat_number');
$number_of_ticket = pre_check('number_of_ticket');
$ticket_type = pre_check('ticket_type');

if( pre_check('venue') == FALSE or pre_check('venue') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Venue field is Blank, Click here to go back.</a></p>";

}elseif(pre_check('time') == FALSE or pre_check('time') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Time field is Blank, Click here to go back.</a></p>";

}elseif(pre_check('days') == FALSE or pre_check('days') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Day field is Blank, Click here to go back.</a></p>";

}elseif(pre_check('seat_number') == FALSE or pre_check('seat_number') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Seat Number field is Blank, Click here to go back.</a></p>";

}elseif(pre_check('number_of_ticket') == FALSE or pre_check('number_of_ticket') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Number of Ticket field is Blank, Click here to go back.</a></p>";

}elseif(pre_check('ticket_type') == FALSE or pre_check('ticket_type') == "false" ){
    echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Ticket Type field is Blank, Click here to go back.</a></p>";

}else{

    $venue = pre_check('venue');
    $time = pre_check('time');
    $day = pre_check('days');
    $seat_number = pre_check('seat_number');
    $number_of_ticket = pre_check('number_of_ticket');
    $ticket_type = pre_check('ticket_type');

    if( $number_of_ticket < 1 ){
        echo"<p class='container alert alert-danger text-center' ><i class='fa fa-warning'> </i> <a href='./booking_handler.php?movie={$movie_id}' data-dismiss='alert' class='text-dark'>Error, Your Numer of Ticket cannot be <b>".pre_check('number_of_ticket')."</b> Click here to go back.</a></p>";
    }else{
        // $query = $db_class->insert();
        echo("insert into DB");
    }

   
}

echo $number_of_ticket;

print_r($_SESSION);
// if(array_key_exists('member_id', $_SESSION)){
//     echo "yes";
// }else{
//     header('Location:./../form.php?q=member_not_found');
//     die();
// }
}else{
    header('location:../../index.php');
    die();
}


?>
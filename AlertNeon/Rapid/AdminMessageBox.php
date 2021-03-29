<?php include "inc/header1.php";?>
<?php 
	$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');

	// from date, get am and pm

	// $date = date("H:i");
	// $morning_or_evening = "";

	// $ex = explode(":", "$date");
	// $hour = $ex[0];
	// $minutes = $ex[1];

	// if( $hour == 11 and $minutes > 59){
	// 	$morning_or_evening = "a.m";
	// }else{
	// 	$morning_or_evening = "p.m";
	// }
	// if($hour == 11 and $minutes > 59){
	// 	$morning_or_evening = "p.m";
	// }


	if( !empty($_GET['q']) && isset($_GET['q'])){
		//start session to get admin ID
		session_start();
		$admin_id = intval($_SESSION['Admin_ID']);
		// print_r($_SESSION);

		 echo '<div class="container text-center-sm wow bounceInDown">
                <h5 class="float-right text-danger">Time is: '.date("H:i").'</h4>
                <h5 class="text-success">
                
                </h4>
                </div><br>';
		
		$cus_id = intval($_GET['q']);

		


		// confirm cus_id adn also fetch message with query.

		$stmt = "select * from CustomerTable where CUS_ID = '$cus_id';";
		$run_stmt = mysqli_query($connection, $stmt);
		$fetch_run_stmt = mysqli_fetch_array($run_stmt);
		$empty_space = "";
		if($fetch_run_stmt['CUS_ID'] == $cus_id){
		//main chat area for admin with customers	
			
			//recieve message from input section

			if(isset($_POST['message_box']) && $_SERVER['REQUEST_METHOD'] == "POST"){
				// print_r($_POST);

				$empty_space=$message="";
				
				if(!empty($_POST['message_box'])){
					$message = $_POST['message_box'];
					//update to stay temporarily
					$up_to_storedUsers = "update storedUsers set AdminMessage='$message' where Admin_ID = '$admin_id' and CUS_ID = '$cus_id' ;";
					mysqli_query($connection, $up_to_storedUsers);
				}else{
					$empty_space = "<p class='text-danger wow flipInX text-center'>Type in Something...</p?";
				}

				//insert messgae
				// $insert_admin_message = "update MessageOne set AdminMessage = '$message' where Admin_ID = '$admin_id' and CUS_ID = '$cus_id';";
				// $run_insert_admin_message_query = mysqli_query($connection, $insert_admin_message);


				$get_cus_message = "select * from MessageOne where Admin_ID = '$admin_id' and CUS_ID = '$cus_id' ORDER BY MOID DESC";
				$data = mysqli_fetch_array(mysqli_query($connection, $get_cus_message));
				$table_id = "";
				if ($data['MOID'] != null){
					$table_id = ($data['MOID']);
				}else{
					$table_id = 0;
				}




				if(empty($data['AdminMessage'])){
				$upd = "update MessageOne set AdminMessage ='$message' where MOID ='$table_id' ;";
				mysqlI_query($connection, $upd);

				}else{
					$inserting_message = "insert into MessageOne(Admin_ID, CUS_ID, AdminMessage, CustomerMessage) values('$admin_id', '$cus_id', '$message', '')";
					mysqli_query($connection, $inserting_message);
				}
				//delete users message where table_id is located, in order to send admin message, to avoid creating a new record row.
				// get temporal message from storedUsers, to reinsert into new 

				// $delete_row = "delete CustomerMessage from MessageOne where MOID = '$table_id'";
				// if(mysqlI_query($connection, $delete_row)){
				// 	// update table_id with this admin's message.

				// 	// $inserting_message = "insert into MessageOne(Admin_ID, CUS_ID, AdminMessage, CustomerMessage) values('$admin_id', '$cus_id', $message), ;"

				// 	echo "deleted";
				// }else{
				// 	echo "can't delete";
				// }


			}


			//fetch record from MessageOne, to get admin and customer's id, then fetch messages.
			//get meassages from MessageOne
				$get_message = "select * from MessageOne where Admin_ID = '$admin_id' and CUS_ID='$cus_id' ;";
				$run_get_message_query = mysqli_query($connection, $get_message);
				
			echo '<br><div class ="container bg-secondary" style="width:auto; border-radius:10px; height:350px; overflow:scroll">';


				while($fetch_messages = mysqli_fetch_assoc($run_get_message_query)){
					echo '<div class="row">

<div class="text-light col-md-6 col-lg-6">
				        <p class="" style="overflow:auto; background-color: rgb(1, 62, 73); border-radius:5px; padding:6px">'.$fetch_messages['CustomerMessage'].'</p></div>
				         

				        <div class="text-light col-md-6 col-lg-6">
				        <p class=""  style="overflow:auto; background-color: rgb(3, 62, 31); border-radius:5px; padding:6px">'.$fetch_messages['AdminMessage'].'<i class = "pull-right fa fa-check-circle"></i></p>
				            
				        </div>
				       
				        </div>';
				}

			echo '</div>';


		}else{
			header("location: ./inc/logout.php");
			exit();
		}
		

	}else{
		header("location: ./inc/logout.php");
		exit();
	}


?>

<div class="container">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<div class="form-group">
	<input type="text" name="message_box" class="form-control" placeholder="Your message goes in here.">
	<button type="submit" name="send_message" value="Send" class="form-control btn btn-success">Send Message<i class="fa fa-send"></i></button>
	<p><?php echo $empty_space; ?>
</div>
</form>
</div>

<?php include "inc/footer1.php";?> 
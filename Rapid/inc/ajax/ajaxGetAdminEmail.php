<?php

if( isset($_REQUEST['q']) ){
    $q = $_REQUEST['q'];
}
 $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
    $sql = "SELECT * FROM AdminTable WHERE Admin_Email = '".$q."';";
        $result = mysqli_query($connection, $sql);
            //$fetch = mysqli_fetch_assoc($result);
               if($fetch['Admin_Email']){
                        echo "Sorry, this Email address already exist.";
                        return;
               }else{
                    echo "<p class='text-success'><i class='fa fa-thumbs-up'></i> Good to go.</p>";
                    return;
               }






?>


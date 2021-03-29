<?php
$errormessage1 =$errormessage2=$errormessage3=$errormessage4=$errormessage5=$successmessage="";
if( $_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['upload']) ):
    
    
//     $number_of_files_to_upload = count($_FILES['file']['name']);

//     $file_name = Array();

//     for ($i=1; $i <= $number_of_files_to_upload; $i++) { 
//         $file_array = $_FILES['file']['name'];
        
//         print_r($_FILES['file']);
//     }



// endif;

    //var_dump($_SESSION);
    $adminID = $_SESSION['Admin_ID'];

$file = $_FILES['file'];
//print_r($file);
    $fileName = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetmp_name = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
$explode = explode('.', $fileName);
    $extension = strtolower(end($explode));
$allowedExtension = array('png', 'jpeg', 'jpg');
    if( in_array($extension, $allowedExtension) ){
        if($filesize < 2000000){
            if($fileerror == 0){
 $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
                        $sql1 ="select ProjectName from AdminJobs where Admin_ID='$adminID';";
                        $query1 = mysqli_query($connection, $sql1);
//$fetch = mysqli_fetch_assoc($query1);
               while($fetch = mysqli_fetch_assoc($query1)){
               if(  $fetch['ProjectName'] == $fileName  ){
       $errormessage1= "<b>This file name already exits, please change it and try again.</b>";
       return;
                        }
              }
                        if($query1){
            $project = addslashes(file_get_contents($filetmp_name));
              $sql = "insert into AdminJobs(Admin_ID, Project, ProjectName) values('$adminID', '$project', '$fileName');";
                $query = mysqli_query($connection, $sql);
                if($query){
                $successmessage = "<b>You have successfully added your project.</b>";
                }else{
                $errormessage5 ="<b>There was an error adding this file.</b>";
                }
                        }

            }else{
            $errormessage2= "<b>An error occured while uploading this file.</b>";

            }
        }else{
        $errormessage3= "<b>This file should'nt be greater than 2MB.</b>";

        }
        }else{
        $errormessage4= "<b>PNG, JPEG AND JPG Files Only.</b>";

        }


endif;


?>





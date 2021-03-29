<?php
session_start();
$cusid = $_SESSION['CUS_ID'];

if(isset($_REQUEST['q'])){
$q = $_REQUEST['q'];
}else{
echo "Please try again or try to login";
}

$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');

if($q == $cusid){

$sql = "SELECT * FROM CustomerTable WHERE CUS_ID= ".$q." ;";
$result = mysqli_query($connection, $sql);
$fetch = mysqli_fetch_assoc($result);



echo '<div class="container">
 <div class="row">
    <div class="col-12">
        <div class="table-responsive">
    <table class="table table-striped">';


  echo      " <tr>
               <th> Firstname :</th>
              <td>".$fetch['Cus_Firstname']."</td>

            </tr>";
echo "<tr>
            <th> Lastname :
            <td>".$fetch['Cus_Lastname']."</td>
            </th>";

echo "<tr>
            <th> Lastname :
            <td>".$fetch['Cus_Email']."</td>
            </th>";
echo "<tr>
            <th> Lastname :
            <td>".$fetch['Cus_Gender']."</td>
            </th>";

echo    "<tr>
     <th> Phone Number :</th>
              <td>+234".$fetch['Cus_PhoneNo']. "</td>

            </tr>";


 echo "  </table>
    </div>
  </div>
 </div>

 </div>
</div>";



} elseif( $q == "web"){
$sql1 = "SELECT * FROM AdminTable where B_Name='web'; ";
$result1 = mysqli_query($connection, $sql1);

echo '<div class="container" data-toggle="tooltip" title="Hello! welcome to our Web Development Area, where you select an Administrator to help build our future project from you">
        <div class="row">';

echo        '
<h3 class="text-center text-primary" style="margin-left: 15%"> Web Development  </h3>
        <div class="col-12">
               <div class="table-responsive">
                    <table class="table table-striped"> ';

 if( $fetch1 = mysqli_num_rows($result1) > 0 ){

   while($fetch1 = mysqli_fetch_assoc($result1) ):

   $users = $fetch1['Admin_ID'];
        echo " <tr>
                    <th> Name </th>
                        <td class='text-right'>".$fetch1['Admin_Firstname']."   ". "<span > <a href ='customerToAdmin.php?w=$users' class= 'btn btn-primary text-right'>Choose</a> </span>"."
                        </td>
                    </th>";

   endwhile;
}



echo "                 </table>
                     </div>
                 </div>
             </div>
           </div>";
}elseif( $q == "graphics" ){

$sql2 = "SELECT * FROM AdminTable WHERE B_Name = 'graphics'; ";
$result2 = mysqli_query($connection, $sql2);

echo '<div class="container" data-toggle="tooltip" title="Hello! welcome to our Graphics Area, where you select an Administrator to help create your Graphic art.">
        <div class="row">';
echo         ' <h3 class="text-center text-primary" style="margin-left: 15%"> Graphics </h3>
        <div class="col-12">
               <div class="table-responsive">
                    <table class="table table-striped"> ';

 if( $fetch2 = mysqli_num_rows($result2) > 0 ){
   while($fetch2 = mysqli_fetch_assoc($result2) ):
   $users = $fetch2['Admin_ID'];
        echo " <tr>
                    <th> Name </th>
                        <td class='text-right'>".$fetch2['Admin_Firstname']."   ". "<span > <a href = 'customerToAdmin.php?w=$users' class= 'btn btn-primary '>Choose</a> </span>"."
                        </td>
                    </th>";
   endwhile;
}



               echo "  </table>
                     </div>
                 </div>
             </div>
           </div>";


}




?>


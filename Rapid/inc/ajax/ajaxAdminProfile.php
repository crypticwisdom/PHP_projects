<?php
session_start();
    $adminID = $_SESSION['Admin_ID'];

    $connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
        $sql = "select * from AdminTable where Admin_ID='$adminID' ;";
            $query = mysqli_query($connection, $sql);
                $fetch = mysqli_fetch_assoc($query);
                if($fetch['Admin_ID'] == $adminID){
                echo '<div class="row">
                        <div class="col-12">
                              <div class="table-responsive">
                                  <table class="table table-striped">';

              echo '<tr>
               <th> Firstname: </th><td>'.$fetch['Admin_Firstname'].'</td> </tr>';

            echo "<tr>
            <th> Lastname :</th>
            <td>".$fetch['Admin_Lastname']."</td>";

                echo "<tr>
            <th> Gender :</th>
            <td>".$fetch['Admin_Gender']."</td>";

            echo "<tr>
            <th> Email :</th>
            <td>".$fetch['Admin_Email']."</td>";

            echo "<tr>
            <th> Address :</th>
            <td>".$fetch['Admin_Address']."</td>";

            echo "<tr>
            <th> Business Type :</th>
            <td>".$fetch['B_Name']."</td>";

              echo '</div>
                        </div>
                            </div>
                                </table>';

                mysqli_close($connection);
                }else{
                header('location:../logout.php');
                mysqli_close($connection);
                exit();
                }



?>
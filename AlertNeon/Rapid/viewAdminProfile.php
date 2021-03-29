

<?php include "inc/header1.php";?>

<?php

session_start();
// print_r($_SESSION);
//for picture uploads from the admin.
$admin = isset( $_SESSION['AdminID'] ) ?  $_SESSION['AdminID'] :  header('location:logout.php') ;
$connection = mysqli_connect('localhost', 'root', '', 'AlertNeon');
    $sql = "select * from AdminJobs where Admin_ID='$admin';";
    $query = mysqli_query($connection, $sql);
    echo '<section id="portfolio" class="section-bg">
              <div class="container">

                <header class="section-header">
                  <h3 class="section-title">Our Portfolio</h3>
                </header>

                <div class="row">
                  <div class="col-lg-12">
                    <ul id="portfolio-flters">
                      <li data-filter="*" class="filter-active">All</li>


                    </ul>
                  </div>
                </div>

                <div class="row portfolio-container">

             ';



   while($fetch=mysqli_fetch_array($query)){
   echo'
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="data:image/png;base64,'.base64_encode($fetch['Project']).'" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4><a href="#">Project 1</a></h4>
            <p>App</p>
            <div>
 <a href="img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
 <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </div>
          </div>
        </div>
      </div>


   ';
   }
    echo    ' </div>
        </div>
   </section>';
   
 // echo $admin;
//i could have passed a parameter to get a specific page for the message.

echo '<a href="message.php?q=messages" class="btn btn-success">Start Business Conversation</a>';

?>
<?php include "inc/footer.php";?>


?>


<?php  
session_start();
include 'inc/header1.php' ;
include "classes/db.php";
include "classes/processor.php";
$db_class = new Processor('localhost', 'root', '', 'AlertNeon');
$cusid= $_SESSION['CUS_ID'];



if(isset($_REQUEST['w'])){
  if($_REQUEST['w'] == 'welcome'){
    
                echo '<div class="container text-center-sm wow bounceInDown">
                <h4 class="float-right text-danger">Today is: '.date("d/m/y").'</h4>
                <h4 class="text-success">
                <p style="font-size:80%">Welcome</p>
                </h4>
                </div>';

    if( isset($_POST['upload']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $file = $_FILES['file']; 
        $db_class->upload_picture($file);
        

      }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete']) ){

        
          $db_class->truncate_picture($_SESSION['picname']);

      }

       $select = $db_class->select("CustomerProfileChecker", "where CUS_ID = $cusid ");
           $picture_status = $db_class->fetch($select, 'Checker');
             $check_gender = $db_class->select("CustomerTable", "where CUS_ID = $cusid ");
                $gender = $db_class->fetch($check_gender, 'Cus_Gender');
                   if(  $picture_status == 0 ){
                    echo $db_class->__get('msg5');
                    if( $gender == "male" ):
                      
                     echo '

                     <section id="portfolio" class="section-bg">
                      <div class="container">
                        <header class="section-header">
                          <h3 class="section-title">Picture</h3>
                        </header>
                      <div class="row">

                  <div class="col-lg-4 col-md-3">
                    
                  </div>


                  <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">

                    <div class="portfolio-wrap">
                      <img src="classes/pictures/users/male.png" class="img-fluid" alt="" width="350px">
                      <div class="portfolio-info">
                        <h4><a href="#">Web 3</a></h4>
                        <p>Web</p>
                        <div>
                          <a href="classes/pictures/users/male.png" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-4 col-md-3">

                  </div>




               </div>

              </div>
            </section>

          ';
        endif;

        if( $gender == "female" ){

          echo '

     <section id="portfolio" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Picture</h3>
        </header>
<div class="row">

          <div class="col-lg-4 col-md-3">
            
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">

            <div class="portfolio-wrap">
              <img src="classes/pictures/users/female.png" class="img-fluid" alt="" width="350px">
              <div class="portfolio-info">
                <h4><a href="#">Web 3</a></h4>
                <p>Web</p>
                <div>
                  <a href="classes/pictures/users/female.png" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-3">

          </div>
       </div>
      </div>
    </section>
    ';

        }
            }elseif($picture_status == 1){

              $name = $db_class->select("CustomerProfilePicture", "where CUS_ID = '$cusid' ");
              $picname = $db_class->fetch($name, 'PictureName');
              $_SESSION['picname'] = $picname;
              echo $db_class->__get('msg1').$db_class->__get('msg2').$db_class->__get('msg3').$db_class->__get('msg4');
                
              echo '

            <section id="portfolio" class="section-bg">
                      <div class="container">
                        <header class="section-header">
                          <h3 class="section-title">Picture</h3>
                        </header>
                      <div class="row">

                  <div class="col-lg-4 col-md-3">
                    
                  </div>


                  <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">

                    <div class="portfolio-wrap">
                      <img src="classes/pictures/'.$_SESSION['picname'].'" class="img-fluid" alt="" width="350px">
                      <div class="portfolio-info">
                        <h4><a href="#">Web 3</a></h4>
                        <p>Web</p>
                        <div>
                          <a href="classes/pictures/'.$_SESSION['picname'].'" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                          <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-4 col-md-3">

                  </div>




               </div>

              </div>
            </section>

          ';
            }else{
              echo "Can't connect this user";
            }
               

     if(!$cusid){
     header('location:cus_login.php');
  }

}else{
 header("Location: cus_login.php");
 die();
}

}else{
 header("Location: cus_login.php");
 die();
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="inc/ajax/ajaxProfile.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="text-center ">

     <form action="cus_profile.php?w=welcome" method="post" enctype="multipart/form-data">
          <div class="row">
              <div class="col-lg-6 col-md-6">
                  <input type="file"  name="file" >
                 
               </div>

               <div class="col-lg-3 col-md-3">
                <input type="submit" name="upload" value="Upload" class="form-control bg-success text-light">
               </div>

                <div class="col-lg-3 col-md-3">
                <input type="submit" name="delete" value="Remove Picture" class="form-control bg-danger text-light">
               </div>

           </div>
      </form>


<div class="row">
<div class="col-lg-6 cl-md-6">

    <button class=" form-control text-light bg-info" value="<?php echo $cusid; ?>" onclick="fetch(this.value)"><i class="fa fa-user"></i> Your Profile </button>

</div>

  <div class="col-lg-6 col-md-6">

        <select onchange="fetch(this.value)" class="form-control bg-success">
            <option value="">--See workers--</option>

            <option value="graphics" class="bg-light"> Graphics </option>
             <option value="web" class="bg-light"> Web Development </option>

        </select>

</div>
</div>
<div class="wow bounceInDown" data-wow-delay="1.3s">
    <div id="return" class="text-secondary">

    </div>
</div>

</div>

</body>
</html>




<?php include 'inc/footer1.php' ;?>
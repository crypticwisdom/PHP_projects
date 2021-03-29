<?php 
    include "inc/header.php";
    include "../inc/ConnectionClass.php";
    $db_class = new DbOperation();
    include "../inc/Validation.php";


session_start();
$movie_name_success=$movie_genre_success=$movie_released_date_success=$movie_discription_success="";
$movie_name_err=$movie_genre_err=$movie_released_date_err=$movie_discription_err="";
$total_movie_time_err=$total_movie_time= $total_movie_time_success="";
$day=$day_err=$day_success="";
$show_time=$show_time_err=$show_time_success="";
$venue=$venue_err=$venue_success="";
// print_r($_SESSION);
/**
 *
 * Handler for the ajax update page.
 * Note: Ajax handlers are supposed to be handled on the main page, so as to recieve error messages
 * and the rest(or see more imformations about the ajax data that you are handling).
 * 
 * Reason : The reason is because the handler language in use is a serve side language that must first go to the server 
 * and then return with some information thereby causing us to loose the ajax page by clicking the submit button
 * it refreshes the page(and takes us back to it's parent page) to avoid this you can use a client side language like
 * javascript to make validations or handle Data
 * 
 */
if(isset($_GET['update']) and $_SERVER['REQUEST_METHOD'] == "GET"){
        
/**
 * 
 * Since the GET method cannot be used to upload files
 * I have excluded the files values that were coming from the ~ajax_update~ for page.
 * So a message will be set for admins, if their case is to upload both image and clips
 *  
 */
$movie_name = $movie_genre = $movie_discription=$movie_released_date="";

    $movie_id = intval($_GET['movie_id']);
    $sign_up->checks_get('movie_name') == FALSE ? $movie_name_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Did you mean to Update Movie Name to 'Empty space'?</a></p><br>": $movie_name = $sign_up->checks_get('movie_name');$movie_name_success="<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Movie Name has been updated to <b>{$movie_name}</b></a></p>";
    $sign_up->checks_get('movie_genre') == FALSE ? $movie_genre_err =  "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Did you mean to Update Movie Genre to 'Empty space'?</a></p><br>":$movie_genre = $sign_up->checks_get('movie_genre');$movie_genre_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Movie Genre has been updated to <b>{$movie_genre}</b></a></p>" ;
    $sign_up->checks_get('movie_released_date') == FALSE ? $movie_released_date_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Did you mean to Update Movie Release Date to 'Empty space'?</a></p><br>": $movie_released_date = $sign_up->checks_get('movie_released_date'); $movie_released_date_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Movie Release Date has been updated to <b>{$movie_released_date}</b></a></p>";
    $sign_up->checks_get('movie_discription') == FALSE ? $movie_discription_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Did you mean to Update Movie Description to 'Empty space'?</a></p><br>" : $movie_discription = $sign_up->checks_get('movie_discription');  $movie_discription_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Movie Description has been updated to <b>{$movie_discription}</b></a></p>";
    $sign_up->checks_get('total_movie_time') == FALSE ? $total_movie_time_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Enter Total Movie Time</a></p><br>" : $total_movie_time = $sign_up->checks_get('total_movie_time');  $total_movie_time_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Total Movie Time is <b>{$total_movie_time}</b></a></p>";
    $sign_up->checks_get('day') == FALSE ? $day_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Enter Day</a></p><br>" : $day = $sign_up->checks_get('day');  $day_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Day is <b>{$day}</b></a></p>";
    $sign_up->checks_get('show_time') == FALSE ? $show_time_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Enter Movie Show-Time </a></p><br>" : $show_time = $sign_up->checks_get('show_time');  $show_time_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Movie Show-Time is <b>{$show_time}</b></a></p>";
    $sign_up->checks_get('venue') == FALSE ? $venue_err = "<p class='alert alert-danger'><a href='#' class='text-dark'><i class='fa fa-warning text-danger'> </i> Enter Venue</a></p><br>" : $venue = $sign_up->checks_get('venue');  $venue_success = "<p class='alert alert-success'><a href='#' class='text-dark' data-dismiss='alert'>Venue is <b>{$venue}</b></a></p>";
    
    
    //insert into database

    $db_class->update("movie_records", "movie_name='$movie_name', movie_genre='$movie_genre', movie_released_date='$movie_released_date', total_movie_time='$total_movie_time', movie_discription='$movie_discription' where movie_id={$movie_id}");
//movie_days='$day',show_time, venue
    
//insert into movie_record_extension table
    $db_class->insert("movie_record_extension", "(days, time, location, movie_id) values('$day', '$show_time', '$venue', '$movie_id')");


}
// end of ajax update_handler


?>

<div class="container">
<b><p class="alert alert-warning text-center"><i class="text-warning fa fa-warning"></i> You will have to Delete and Re-insert this record if you want to update image or clip</p></b>
    <div class="row">
    <?php echo $movie_name_err.$movie_genre_err.$show_time_err.$venue_err.$day_err.$total_movie_time_err.$movie_released_date_err.$movie_discription_err ;?>
    <?php echo $movie_name_success.$day_success.$show_time_success.$venue_success.$total_movie_time_success.$movie_genre_success.$movie_released_date_success.$movie_discription_success;?>

    <div class="container form-control bg-dark text-center text-light">Movie</div>
        <div class="col-md-8 col-lg-8">
            <div class="form">
                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET">
                <p class="form-control bg-primary text-light text-center">Update Movie Records</p>
                <div class="table" id="update">
                    <table class="table-striped table-hover table-bordered table-responsive">
                        <tr class="bg-secondary text-light text-center">
                            <th></th>
                            <th>Movie Name</th>
                            <th>Genre</th>
                            <th>Date Released</th>
                            <th>Image Name</th>
                            <th>Image</th>
                        </tr>
                        <?php 
                        

                        $db_records = $db_class->select("* from movie_records order by movie_id desc");
                        // run(val, file="", land="", error="")
                        while($record = mysqli_fetch_array($db_records)){
                           echo "
                                <tr >
                                    <td><input type='checkbox' onclick=\"run(this.value, 'ajax_update.php?p=', 'update', 'error')\" name='check{$record["movie_id"]}' value='{$record["movie_id"]}' class='form-control-static'></td>
                                    <td class='text-center'><pre>{$record['movie_name']}</pre></td>
                                    <td><pre>{$record['movie_genre']}</pre></td>
                                    <td><pre>{$record['movie_released_date']}</pre></td>
                                    <td><pre>{$record['movie_image_name']}</pre></td>
                                    <td><a href='../../img/movie_images/{$record['movie_image_name']}'><img alt='Image' class='img-thumbnail' src='../../img/movie_images/{$record['movie_image_name']}'></a></td>
                                    
                                </tr>
                           ";
                        }
                        
                        ?>  
                    </table>
                </div> 
               <div class="row">
                   <div class="col-md-5 col-lg-5">
                        
                    </div>

                    <div class="col-md-2 col-lg-2">
                        <!-- empty space created between delete and update button -->
                    </div>

                    <!-- <div class="col-md-5 col-lg-5">
                        <div class="form-group">
                            <input type="submit" name="update" value="Update" class="btn btn-warning text-light form-control">
                        </div>
                    </div> -->
                </div>
                </form>
            </div>
        </div>



        <div class="col-md-4 col-md-4">
            
                
                <a href="controls.php"><p class="form-control bg-success text-light text-center">Insert Records</p></a>
                <a href="delete_control.php"><p class="form-control bg-danger text-light text-center">Delete Records</p></a>
                <a href="update_control.php"><p class="form-control bg-faded text-danger text-center">Go back</p></a>
                
                
                <!-- loop all movies in the movie table with a (also display movie name)check box to select a record to delete
                        and also create a link that leads to another page to delete other records like(user records)
                        or basically just make the system simple, delete only movie records. -->
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Movie name">
                    </div>-->

        </div>
    </div>
</div>
<script type="text/javascript" src="../inc/ajax.js">

</script>
<?php include"inc/footer.php"?>
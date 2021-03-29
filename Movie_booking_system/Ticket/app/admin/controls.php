<?php 
    include "inc/header.php";
    include "../inc/ConnectionClass.php";
    include "../inc/Validation.php";
    include "inc/movie_record_handler.php";

session_start();
// print_r($_SESSION);

?>

<div class="container">

<?php 
    echo $success_msg.$fill_all_filed.$movie_err_msg;
?>


<div class="row">
    
    <div class="container form-control bg-dark text-center text-light">Movie</div>
        <div class="col-md-8 col-lg-8">
            <div class="form">
                <form enctype = "multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <p class="form-control bg-primary text-light text-center">Insert Movie Records</p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Movie name" name="movie_name">
                        <?php echo $movie_name_err;?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Movie Genre" name="movie_genre">
                        <?php echo $movie_genre_err;?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Movie name" name="movie_released_date">
                        <?php echo $movie_released_date_err;?>
                    </div>
                    
                    <div class="form-group">
                        <p class="display-5">Movie Image:</p>
                        <input type="file"  name="movie_image_name" class="form-control text-success">
                        <p><?php echo $large_image_msg.$file_error_msg.$invalid_image_extension.$empty_image_field_msg;?></p>
                    </div>

                    <div class="form-group">
                    <p class="display-5">Video Clip:</p>
                        <input type="file"  name="movie_clip_name" class="form-control text-success">
                        <p><?php echo $large_clip_msg.$clip_error_msg.$invalid_clip_extension.$empty_clip_field_msg;?></p>
                    </div>
                    
                    <div class='form-group'>
                        <p style='font-weight:bold;  color:black'>Movie Total Show Time</p>
                        <input type='text' placeholder='Total movie time in mins. e.g 120mins.' name='total_movie_time' class='form-control'>
                        <p><?php echo $total_movie_time_err; ?></p>                
                    </div>

                    <div class="form-group">
                        <textarea name="movie_discription" onfocus="movie_discription_msg()" minlength="30" maxlength="1000" placeholder="Enter Movie Description" cols="30" rows="4" class="form-control"></textarea>
                        <p id='movie_discription'><?php echo $movie_discription_err;?></p>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="movie_insert" value="Insert" class="btn btn-success form-control text-light">
                    </div>

                </form>
            </div>
        </div>



        <div class="col-md-4 col-md-4">
            
                
                <a href="delete_control.php"><p class="form-control bg-danger text-light text-center">Delete Records</p></a>
                <a href="update_control.php"><p class="form-control bg-warning text-light text-center">Update Records</p></a>


                <!-- loop all movies in the movie table with a (also display movie name)check box to select a record to delete
                        and also create a link that leads to another page to delete other records like(user records)
                        or basically just make the system simple, delete only movie records. -->
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Movie name">
                    </div>-->

        </div>
    </div>
</div>
<script>
    function movie_discription_msg(){
        
        document.getElementById('movie_discription').innerHTML = "<p class='text-light bg-success text-center'>A short Description is needed.</p>";
    }
</script>
<?php include"inc/footer.php"?>
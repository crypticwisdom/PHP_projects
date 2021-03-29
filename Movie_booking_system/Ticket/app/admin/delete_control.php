<?php 
    include "inc/header.php";
    include "../inc/ConnectionClass.php";
    $db_class = new DbOperation();
    include "../inc/Validation.php";
    include "inc/movie_record_handler.php";


session_start();
// print_r($_SESSION);

?>

<div class="container">
    <?php echo $delete_success.$delete_err;?>
    <div class="row">
    <div class="container form-control bg-dark text-center text-light">Movie</div>
        <div class="col-md-8 col-lg-8">
            <div class="form">
                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="GET">
                <p class="form-control bg-primary text-light text-center">Delete Movie Records</p>
                <div class="table">
                    <table class="table-striped table-hover table-bordered table-responsive">
                        <tr class="bg-secondary text-light text-center">
                            <th></th>
                            <th>Movie Name</th>
                            <th> Genre</th>
                            <th>Date Released</th>
                            <th>Image Name</th>
                            <th>Image</th>
                        </tr>
                        <?php 
                        

                        $db_records = $db_class->select("* from movie_records order by movie_id desc");
                        while($record = mysqli_fetch_array($db_records)){
                           echo "
                                <tr >
                                    <td><input type='checkbox' name='check{$record["movie_id"]}' value='{$record["movie_id"]}' class='form-control-static'></td>
                                    <td class='text-center'><pre>{$record['movie_name']}</pre></td>
                                    <td><pre>{$record['movie_genre']}</pre></td>
                                    <td><pre>{$record['movie_released_date']}</pre></td>
                                    <td><pre>{$record['movie_image_name']}</td>
                                    <td><a href='../../img/movie_images/{$record['movie_image_name']}'><img alt='Image' class='img-thumbnail' src='../../img/movie_images/{$record['movie_image_name']}'></a><td>
                                    
                                </tr>
                           ";
                        }
                        
                        ?>  
                    </table>
                </div> 
               <div class="row">
                   <div class="col-md-5 col-lg-5">
                        <div class="form-group">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger text-light form-control">
                        </div>
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

<?php include"inc/footer.php"?>
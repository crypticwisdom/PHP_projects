<?php 

    include "../inc/ConnectionClass.php";
    $db_class = new DbOperation();
    include "../inc/Validation.php";
    include "inc/movie_record_handler.php";


    if(isset($_GET['p']) and intval($_GET['p'])){
        
      $record = $db_class->select("* from movie_records where movie_id = {$_GET['p']} ");
      $venue_list = $db_class->select("* from venue");

        while($data = mysqli_fetch_array($record) ) {
            echo "
                <div class='form'>
                    <form action='update_control.php' method='GET' enctype='multipart/form-data'>
                        <div class='row'>
                            
                            <div class='col-md-6 col-lg-6 form-group'>
                                <p style='font-weight:bold; color:black'>Movie Name</p>
                                <input type='text' name='movie_name' value='{$data['movie_name']}' class='form-control'>
                            </div>

                            <div class='col-md-6 col-lg-6 form-group'>
                                <p style='font-weight:bold; color:black'>Movie Genre</p>
                                <input type='text' name='movie_genre' value='{$data['movie_genre']}' class='form-control'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-md-6 col-lg-6 form-group'>
                                <p style='font-weight:bold;  color:black'>Movie Release Date</p>
                                <input type='date' name='movie_released_date' value='{$data['movie_released_date']}' class='form-control'>
                            </div>

                            <div class='col-md-6 col-lg-6 form-group'>
                                <p style='font-weight:bold; color:black'>Movie Total Show Time</p>
                                <input type='text' placeholder='Total movie time in mins. e.g 120mins.' name='total_movie_time' value='{$data['total_movie_time']}' class='form-control'>
                            </div>
                        </div>

                        <div class='form-group'>
                            <p style='font-weight:bold;  color:black'>Movie Description</p>
                            <textarea name='movie_discription'  maxlength='1000' placeholder='Enter Movie Description' cols='30' rows='4' class='form-control'>{$data['movie_discription']}
                            </textarea>
                            <p id='movie_discription'></p>
                        </div>
                        
                        <p class='text-center text-dark '><b>Set date and venue</b></p>
                        <div class='row'>
                        
                            <div class='col-md-5 col-lg-5 form-group'>
                            <input type='date' name='day' class='form-control'>

                            </div>

                            <div class='col-md-2 col-lg-2 form-group'> </div>

                            <div class='col-md-5 col-lg-5 form-group'>
                                <input type='time' name='show_time'  class='form-control'>
                            </div>

                        </div>

                    
                        <div class='form-group'>
                            <select name='venue' class='form-control text-center'>
                            <option class='text-center' value=''>--SELECT VENUE--</option>
                            ";

                        while($venue_row = mysqli_fetch_array($venue_list)):
                            echo "
                               <option class='bg-primary text-light' value=\"{$venue_row['venue_name']}\"> {$venue_row['venue_name']} </option>
                            ";
                        endwhile;

                        echo "
                            
                            </select>
                        </div>

                       
                    


                    <div class='row'>
                        <div class='class='col-md-6 col-lg-6 form-group'>
                            <input type='submit'  class='btn btn-warning text-light' value='Update' name='update'>
                        </div>

                        <div class='col-md-3 col-lg-3 form-group'>

                        </div>

                        <div class='col-md-3 col-lg-3 form-group'>
                            <input type='text' name='movie_id' value='{$data['movie_id']}' class='btn btn-faded' readonly>
                        </div>
                    </div>
                    </form>
                </div>

            ";
        }

       
        
    }




?>


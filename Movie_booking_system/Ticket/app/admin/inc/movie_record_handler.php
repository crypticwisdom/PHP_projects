<?php 

        $movie_db_object = new DbOperation();

        $large_image_msg=$file_error_msg=$invalid_image_extension=$empty_image_field_msg=$image_real_name=$clip_not_moved="";
        $movie_name_err=$movie_name="";
        $movie_genre=$movie_genre_err="";
        $total_movie_time=$total_movie_time_err="";

        $movie_released_date=$movie_released_date_err="";

        $movie_discription=$movie_discription_err=$success_msg="";

        $movie_err_msg=$fill_all_filed="";

        $large_clip_msg=$clip_error_msg=$invalid_clip_extension=$empty_clip_field_msg=$clip_real_name=$clip_not_moved="";

        //variables for delete page 
        $delete_success=$delete_err="";

        if(isset($_POST['movie_insert']) and $_SERVER['REQUEST_METHOD'] == "POST"){
                // var_dump($_POST);
/**
 * checks method is used only on input character field or value field(text or radio, or check boxes)
 * it checks if a field is empty, and returns false if empty.
 * 
 * file_check_name method is used for only file field
 * it checks if the file field is empty and then return False
 * 
 * store method is usd to upload files to a destination, that would be passed as its second parameter.
 * it returns true if image has no errors, appropriate size and supported extension.
 * it requires positional argument like , location, size, array_of_allowed_extension
 * return "This is a very Large file", "File error", "Invalid file extension", "file not moved"
 * 
 */

                //movie name field
                $sign_up->checks('movie_name') == FALSE ? $movie_name_err = "<p class='text-center bg-danger text-light wow flipInX'>This field is empty</p>" : $movie_name = $sign_up->checks('movie_name');
                
                //movie_genre
                
                $sign_up->checks('movie_genre') == FALSE ? $movie_genre_err = "<p class='text-center bg-danger text-light wow flipInX'>This field is empty</p>" : $movie_genre = $sign_up->checks('movie_genre');

                // movie release date field
                $sign_up->checks('movie_released_date') == FALSE ? $movie_released_date_err = "<p class='text-center bg-danger text-light wow flipInX'>This field is empty</p>" : $movie_released_date = $sign_up->checks('movie_released_date');

                //movie image field
                $movie_image_name  = $sign_up->file_check_name('movie_image_name');


                if($movie_image_name  != FALSE){
                        
                        $array_of_allowed_image_extensions = array('png', 'jpeg', 'jpg');

                        $process_and_upload_image = $sign_up->store($movie_image_name , '../../img/movie_images', 3000000, $array_of_allowed_image_extensions);
                        
                        if($process_and_upload_image == "This is a very Large file"){
                                
                                $large_image_msg = "<p class='text-center bg-danger text-light wow flipInX'>This is a very Large file</p>";
                        }elseif($process_and_upload_image == "File error"){
                                
                                $file_error_msg = "<p class='text-center bg-danger text-light wow flipInX'>There was an error uploading this file</p>";
                                
                        }elseif($process_and_upload_image == "Invalid file extension"){
                                
                                $invalid_image_extension = "<p class='text-center bg-danger text-light wow flipInX'>Invalid file extension, takes only jpeg, jpg or png</p>";
                                
                        }elseif($process_and_upload_image == "file not moved"){
                        
                                $image_not_moved = "<p class='text-center bg-danger text-light wow flipInX'>File was not moved</p>";
                        }else{
                                $image_real_name = $process_and_upload_image;        
                        }

                }else{
                        $empty_image_field_msg = "<p class='text-center bg-danger text-light wow flipInX'>Required file Field</p>";

                }

                // movie clip field
                $movie_clip_name = $sign_up->file_check_name('movie_clip_name');

                if($movie_clip_name  != FALSE){
                        $array_of_allowed_clip_extensions = array('mp4', 'gif');

                        $process_and_upload_clip = $sign_up->store($movie_clip_name , '../../img/videos', 10000000, $array_of_allowed_clip_extensions);
                        if($process_and_upload_clip == "This is a very Large file"){
                                
                                $large_clip_msg = "<p class='text-center bg-danger text-light wow flipInX'>This is a very Large file</p>";
                        }elseif($process_and_upload_clip == "File error"){
                                
                                $clip_error_msg = "<p class='text-center bg-danger text-light wow flipInX'>There was an error uploading this file</p>";
                        }elseif($process_and_upload_clip == "Invalid file extension"){
                                
                                $invalid_clip_extension = "<p class='text-center bg-danger text-light wow flipInX'>Invalid file extension, takes only mp4 or gif</p>";
                        }elseif($process_and_upload_clip == "file not moved"){
                                
                                $clip_not_moved = "<p class='text-center bg-danger text-light wow flipInX'>File was not moved</p>";

                        }else{
                                $clip_real_name = $process_and_upload_clip;
                                
                        }
                        
      

                }else{
                        $empty_clip_field_msg = "<p class='text-center bg-danger text-light wow flipInX'>Required file Field</p>";
                }
                //movie total time  
                $sign_up->checks('total_movie_time') == FALSE ? $total_movie_time_err = "<p class='text-center bg-danger text-light wow flipInX'>This Field is empty</p>" : $total_movie_time = $sign_up->checks('total_movie_time');

                //description field
                $sign_up->checks('movie_discription') == FALSE ? $movie_discription_err = "<p class='text-center bg-danger text-light wow flipInX'>Needs Discription</p>" : $movie_discription = $sign_up->checks('movie_discription');
                
                //insert records 
                if($movie_name != "" and $movie_genre != "" and $movie_released_date != "" and $image_real_name != "" and $clip_real_name != "" and $movie_discription != ""){

                        if ($movie_db_object->insert('movie_records', "(movie_name, movie_genre, movie_released_date, movie_image_name, movie_clip_name, total_movie_time, movie_discription) values('$movie_name', '$movie_genre', '$movie_released_date', '$image_real_name', '$clip_real_name', '$total_movie_time', '$movie_discription')")){
                                $success_msg = "<p class='alert alert-success text-center wow slideInDown'><a href='#' class='text-success' data-dismiss='alert'>Inserted Records</a></p>";
                                $movie_db_object->kill_db();
                        }else{
                                $movie_err_msg = "<p class='alert alert-danger text-center wow slideInDown'><a href='#' class='text-danger' data-dismiss='alert'>Couldn\'t Insert Records</a></p>";
                        }
                }else{
                        $fill_all_filed = "<p class='alert alert-danger text-center wow slideInDown'><a href='#' class='text-danger' data-dismiss='alert'>Make sure all fields are properly filled</a></p>";
                }


                // also create a function to check if thei current moviee is already present.

        }elseif(isset($_GET['delete']) and $_SERVER['REQUEST_METHOD'] == "GET"){
                //for delete action
                //pop or delete the last key which is the submit button key
                array_pop($_GET);
                //save the new modified array
                $new_array = $_GET;
                
                //foreach key and values in the modified array delete records relating to the valuess
                foreach($new_array as $key => $value){
                        if($movie_db_object->delete("movie_records where movie_id={$value}")){
                                $delete_success = "<div class='container text-center alert alert-success wow slideInDown'><a href='#' data-dismiss='alert'>Deleted Movie Records</a></div>";
                                
                        }else{
                                $delete_err = "<div class='container text-center alert alert-danger wow slideInDown'><a href='#' data-dismiss='alert'>Couldn't Delete Records</a></div>";
                        }
                }
              
        }
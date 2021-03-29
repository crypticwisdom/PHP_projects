<?php

//headers
        session_start();
        include "./visitor_header.php";
        include "./ConnectionClass.php";
        $db_class = new DbOperation();
        include "./Validation.php";
        
?>
<?php 
//handler for book now
 
?>
<?php

//body


    //variables starts here
        $movie_id="";
    //variable ends here
    if(isset($_GET['movie']) and $_SERVER['REQUEST_METHOD'] == 'GET'){

        $movie_id = intval($_GET['movie']);
        $_SESSION['movie_id'] = $movie_id;
        $movie_records = $db_class->select("* from movie_records where movie_id = {$movie_id}");
        $venue_list = $db_class->select("* from venue");
        if($records = mysqli_fetch_array($movie_records)){
            print_r($_SESSION);

            echo "
                <div class='container'>
                    <div class='row jumbotron'>
    
                        <div class='col-6'>
                            <img class='w-75 img-thumbnail' src='../../img/movie_images/{$records['movie_image_name']}'>
                        </div>
    
                        <div class='col-6 '>
                            <p class='text-dark'><b>GENRE:</b> <br>{$records['movie_genre']}</p>
                            <p class='text-dark' style='text-overflow:ellipsis; overflow:hidden;'><b>DISCRIPTION:</b> <br>{$records['movie_discription']}</p>
                            <p class='text-dark'><b>Release Date:</b><br> {$records['movie_released_date']} </p>
                            <p class='text-dark'><b>NB: You'll need to select a cinema in order to select a preffered date or time.</b></p>
                            <div class='form'>

                                <form action='./book_handler.php' method='POST'>
                                    <p style='font-weight:bold' class='text-center'>SELECT VENUE</p>
                                    <select class='form-control' name='venue' onchange=\"run(this.value,'ajax_book.php?p=', 'book_page', 'error')\">
                                    <option class='text-dark'>-- SELECT VENUE --</option>
                                    ";
                                    while($venue_item = mysqli_fetch_array($venue_list)):
                                            echo "
                                                <option value='{$venue_item['venue_name']}.$movie_id'>{$venue_item['venue_name']}</option>
                                            ";
                                    endwhile;

                                 echo "
                                    </select><br>
                                        <div id='book_page'>
                                            <div class='form-group'>
                                                <select class='form-control' name='days' disabled>
                                                <option value=''>-- SELECT DAY --</option>
                                                </select>
                                            </div>

                                            <div class='form-group'>
                                                
                                                <select class='form-control'  name='time' disabled>
                                                    <option value=''>-- SELECT TIME --</option>
                                                </select>
<br>
                                               
                                            </div>

                                            <div class='row'>
                                                <div class='col-6  form-group'>
                                                <p class='text-center' style='font-weight:bold'> SEAT NUMBER </p>
                                                <select class='form-control' name='seat_number' disabled>
                                                   
                                                        <option>-- SELECT SEAT --</option>
                                                        
                                                </select>
                                            </div>
                            
                                            <div class='col-6'>
                                                <p class='text-center' style='font-weight:bold'> NUMBER OF TICKET </p>
                                                <input type='number' name='number_of_ticket' class='form-control' placeholder='Enter Number Of Ticket' disabled>
                                                    
                                            </div>
                            
                                        </div>
                                        <p class='text-center' style='font-weight:bold'> SELECT TICKET TYPE  </p>
                            
                                        <div class='row'>
                                                <div class='col-6 radio'>
                                                    <label> Child: <input type='radio' name='ticket_type' value='child' disabled></label>
                                                </div>
                                                
                                                <div class='col-6 radio'>
                                                    <label> Adult: <input type='radio' name='ticket_type' value='adult' disabled></label>
                                                </div>
                                        </div>
                            
                                        
                                        <div class='form-group'>
                                            <input type='submit' value='BOOK NOW' name='book_now' class='btn btn-danger form-control' disabled>
                                        </div>
                            

                                        </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <script type='text/javascript' src='ajax.js'> 
                </script>
            
            ";
        }else{
            header('location:../../index.php');
            die();
        }
      
        

    }


?>


<?php
//footers
 include "./visitor_footer.php";
 ?>

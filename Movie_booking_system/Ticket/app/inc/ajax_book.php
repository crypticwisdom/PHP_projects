<?php 


if(isset($_GET['p'])){

    include "./ConnectionClass.php";
    $db_class = new DbOperation();
    include "./Validation.php";

    $raw_venue = $_GET['p'];
    $exploded = explode('.', $raw_venue);
    $venue = $exploded[0];
    $movie_id = $exploded[1];
 
    $get_day = $db_class->select("* from movie_record_extension where location='$venue' and movie_id='$movie_id' ");
    
if($get_day){
    echo "
    <br>
    <div class='form-group'>
    <p class='text-center' style='font-weight:bold'> SELECT DAY </p>
        <select class='form-control' name='days'>
        
        ";
       
            while($day_rec = mysqli_fetch_array($get_day)):
                echo "
                    <option value='{$day_rec['days']}'>{$day_rec['days']}</option>
                ";
            endwhile;
    echo "
        </select>
    </div>
    
    ";

    echo "
    
    <div class='form-group'>
    <p class='text-center' style='font-weight:bold'> SELECT TIME </p>
        <select class='form-control' name='time'>
        
        ";
        $get_time = $db_class->select("* from movie_record_extension where location='$venue' and movie_id='$movie_id' ");
            while($time_rec = mysqli_fetch_array($get_time)):
                echo "
                    <option value='".date('g:iA', strtotime($time_rec['time']))."' active>".date('g:iA', strtotime($time_rec['time']))."</option>
                ";
            endwhile;
    echo "
        </select>
    </div>
    ";

    echo "
        <div class='row'>
                <div class='col-6  form-group'>
                <p class='text-center' style='font-weight:bold'> SEAT NUMBER </p>
                    <select class='form-control' name='seat_number'>
                        
                        ";
                        $seat_number = 1;
                        while( $seat_number <= 100){
                            echo "<option>{$seat_number}</option>";
                            $seat_number++;
                        }
                        
                        
                        echo "
                    </select>
                    <br>
                    <p class='pull-left text-dark' style='font-weight:bold'><i class='fa fa-ticket'> Total Number of Ticket </i> <span id='number_of_ticket'> 1 </span> </p>
                </div>

                <div class='col-6'>
                    <p class='text-center' style='font-weight:bold'> NUMBER OF TICKET </p>
                    <input type='number' name='number_of_ticket' min='1' max='10' class='form-control' placeholder='Enter Number Of Ticket'>
                    <br>
                    <p class='text-left text-dark' style='font-weight:bold'><i class='fa fa-money'> Price/Ticket </i></p>
                </div>

            </div>
            <p class='text-center' style='font-weight:bold'> SELECT TICKET TYPE  </p>

            <div class='row'>
                    <div class='col-6 radio'>
                        <label> Child: <input type='radio' name='ticket_type' value='child'></label>
                    </div>
                    
                    <div class='col-6 radio'>
                        <label> Adult: <input type='radio' name='ticket_type' value='adult'></label>
                    </div>
            </div>

            
            <div class='form-group'>
                <input type='submit' value='BOOK NOW' name='book_now' class='btn btn-danger form-control'>
            </div>


    ";
    
        }else{
            header();
            die();
        }
}else{
    header();
    die();
}


?>
<?php

        if(isset($_REQUEST['q']) ){
          $q = $_REQUEST['q'];
            if( $q == 'web' ){
                  echo "<div class='text-center text-success'>Input your Web Price Business Price</div>";
            }elseif( $q == 'graphics' ){
                echo "<div class='text-center text-success'>Input your Graphics Business Price</div>";
            }
        }else{
            echo "can't get parameter";
        }

die();

?>
<?php

class Validation{
        private $file_name, $file_size, $file_error, $file_tmp_name;
        private $file_extension, $new_name, $image_location;
        
        private function sanitize($input){
            
            if(htmlspecialchars($input) and stripslashes($input) and trim($input)){
                return $input;
            }
        }

        public function validate_str($name, $error_msg){
            if(!empty($name) or $name != NULL){
                $res = $this->sanitize($name);
                return $res;
            }else{
                return $error_msg;
            }
        }
        
        public function checks($var1){
            /**
         * this checks if any POST method key or data is empty, if empty it return FALSE
         * else it returns the string in sanitized format of the data using the private sanitze method of this class
         *  
         */
            return $_POST[$var1] != "" ? $this->sanitize($_POST[$var1]): FALSE;   
        }

        public function checks_get($var1){
            /**
         * this checks if any GET method key or data is empty, if empty it return FALSE
         * else it returns the string in sanitized format of the data using the private sanitze method of this class
         * 
         * 
         */
            return $_GET[$var1] != "" ? $this->sanitize($_GET[$var1]): FALSE;   
        }

        public function file_check_name($data){
            /**
             * this checks if the key or data of the FILES GLOBAL VARIABLE is empty or not
             * it returns FALSE if empty, it returns the file array if not empty.
             */
            return $_FILES[$data] != "" ? $_FILES[$data]: FALSE;   

        }

        private function image_and_video_checks($image, $size_limit, $array_of_allowed_extensions){

            //this system only checks for errors and size, it returns the file name.
                
                    // might be a private function
            
            /** 1. split object to get name
             *  2. from name, explode name to get extension
             *  3. if extension is present in array, then check size, errors
             *  4. return name of the file.
             */

            $this->file_name = $image['name'];
            $this->file_size = $image['size'];
            $this->file_error = $image['error'];
            $this->file_tmp_name = $image['tmp_name'];
            
            $split_array = explode('.', $this->file_name);
            $this->file_extension = strtolower(end($split_array));
            if(in_array($this->file_extension, $array_of_allowed_extensions)){
                if($this->file_error == 0){
                    //if file_size is less than 10MB return size
                    return $this->file_size < $size_limit ? $image : "large file error";

                    }else{
                        return "file error";
                    }

                }else{
                    return "extension error";
                }
            }

        public function store($array, $location, $size_limit, $array_of_allowed_extensions){
            // create a public function to upload processed file 
            /**
             * This method checks if the parameter sent inside it, is an array, if TRUE:
             * it takes the file name and temporal location.
             * creates a new name.
             */
            if(is_array($this->image_and_video_checks($array, $size_limit, $array_of_allowed_extensions))){
                $this->new_name = 'File_'.uniqid('', true).random_int(0.1234567, 100).".".$this->file_extension;
                // echo $new_name;
                $_SESSION['image_name'] = $this->new_name;
                $this->image_location = "{$location}/{$this->new_name}";
                
                return move_uploaded_file($this->file_tmp_name, $this->image_location) ? $this->new_name : "file not moved" ;

            }elseif($this->image_and_video_checks($array, $size_limit, $array_of_allowed_extensions) == 'large file error'){
                return "This is a very Large file";
            }elseif ($this->image_and_video_checks($array, $size_limit, $array_of_allowed_extensions) == "file error") {
                return "File error";
            }elseif($this->image_and_video_checks($array, $size_limit, $array_of_allowed_extensions) == "extension error"){
                return "Invalid file extension";
            }

        }

    }

$sign_up = new Validation();
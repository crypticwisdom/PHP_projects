<?php 


class Processor extends DB_class
{
	public $newname, $msg1, $msg2, $msg3, $msg4, $msg5;
	
		public function upload_picture($file){
 		$filename = $file['name'];
 		$filesize = $file['size'];
 		$filerror = $file['error'];
 		$filetmp_name = $file['tmp_name'];

 			$extension = $this->extension($filename);
 			
 			$haystack = array('png', 'jpg', 'jpeg');
 				if( $this->check_extension($extension, $haystack)){
 					if($this->check_error_and_size($filerror, $filesize) == true){

 						//move file
 						if( $this->move_file($extension, $filetmp_name)){

 						 $this->msg1= "<p class='text-center h5 wow slideInLeft text-success'>Successfuly loaded your profile picture</p>";
 						 return true;
 						}

 					}
 				}else{
 					$this->msg2 = "<p class='text-center h5 wow slideInLeft text-danger'>You haven't selected a picture</p>";
 					return false;
 				}

 	}

 	//get extenxion

 	private function extension($filename){
 		$explode = explode('.', $filename);
 		return strtolower(end($explode));

 	}

 	//check for extension inside the array

 	private function check_extension($extension, $array){

 		if( in_array($extension, $array) ){
 			return true;
 		}else{
 			return false;
 		}
 	}

 	// check for error and size

 	private function check_error_and_size($filerror, $filesize){
 		if( $filerror  == false ){
 			if( $filesize < 2000000 ){
 				return true;
 			}else{
 				$this->msg3 = "<p class='text-center h5 text-danger wow slideInLeft'>The size of the File you tried to upload was too Big</p>s";
 				return false;
 			}
 		}else{
 			$this->msg4 = "Error from Images";
 				return false;
 		}
 	}

 	//move picture to folder

 	private function move_file($extension, $filetmp_name){
	  $this->newname = uniqid('IMG_', true).rand(1, 1000000).".".$extension;
	  $location = "classes/pictures/".$this->newname;
	  	if( move_uploaded_file($filetmp_name, $location) ){
	  		
	  		$id = $_SESSION['CUS_ID'];
	  		$this->update("CustomerProfilePicture", "PictureName = '$this->newname' where CUS_ID = '$id' ");
	  		$this->update("CustomerProfileChecker", "Checker = 1 where CUS_ID = '$id' ");
	  		return true;
	  	}

 		
 	}

 	// delete profile picture

 	public function truncate_picture($picturename){
 		$id = $_SESSION['CUS_ID'];
 		$location = 'classes/pictures/';
 		$mainlocation = "{$location}{$picturename}";

 		if( isset($picturename) && file_exists($mainlocation) ){
 			if( unlink($mainlocation) ){
 				if($this->update_to("CustomerProfileChecker", "Checker = 0 where CUS_ID = $id ")){
 					
 					$this->msg5 = "<p class='text-center h5 text-danger wow slideInLeft'>Profile Picture has been deleted</p>";
 				return true;

				}
 				
 			}
 		}
 	}

 	// update method
 	public function update_to($tablename, $query){
 		$sql = "update $tablename set $query";
 		return mysqli_query($this->connect, $sql);
 	}

		 //magic method get
	public function __get($property){
		if(property_exists($this, $property)){
		return $this->$property;
		}
		     }

}
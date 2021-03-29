<?php 


$member_error_all=$member_firstname=$member_lastname=$member_email=$member_username=$member_phone_number=$member_age=$member_password1=$member_password2="";
$password_not_match=$sucess = "";

  //if this function returns True(or an empty array) value it simply means:
        //the user enter data into all the fields
    //else it returns an array of list of fields that the user:
        //didn't or forgot to enter.

if(isset($_POST['member_sign_up'])){
    //signup handler for member 
    
    $member_firstname = strtolower($sign_up->validate_str($_POST['member_firstname'], 'This firstname field is required'));

    $member_lastname = strtolower($sign_up->validate_str($_POST['member_lastname'], 'This lastname field is required'));
    
    $member_email = strtolower($sign_up->validate_str($_POST['member_email'], 'This email field is required'));
    
    $member_username = strtolower($sign_up->validate_str($_POST['member_username'], 'This username field is required'));
    
    $member_phone_number = strtolower($sign_up->validate_str($_POST['member_phone_number'], 'This phone_number field is required'));
    
    $member_age = strtolower($sign_up->validate_str($_POST['member_age'], 'This age field is required'));
    
    $member_password1 = strtolower($sign_up->validate_str($_POST['member_password1'], 'This password field is required'));
    
    $member_password2 = strtolower($sign_up->validate_str($_POST['member_password2'], 'This password field is required'));

if (!empty($_POST['member_firstname'])
    and !empty($_POST['member_lastname']) 
    and !empty($_POST['member_email']) 
    and !empty($_POST['member_username']) 
    and !empty($_POST['member_phone_number']) 
    and !empty($_POST['member_age']) 
    and !empty($_POST['member_password1']) 
    and !empty($_POST['member_password2'])) {
        if($member_password2 == $member_password1){
            $member_hashed_password = password_hash($member_password1, PASSWORD_DEFAULT);
    
        if($db_op->insert('user', "(first_name, last_name, email, user_name, phone_number, age, password) 
        Values('$member_firstname', '$member_lastname', '$member_email', '$member_username', '$member_phone_number', '$member_age',
        '$member_hashed_password')")){
            $sucess = "Successfuly signed up as a Member, Login.";
        }else{
            header('location:form.php');
            die();
        }
        
        }else{
            $password_not_match = "Password doeos not match, carefully try again.";
        }

    }else{
        $member_error_all = "Please Properly Fill each field";
    }
}elseif(isset($_POST['admin_sign_up'])){
    //signup handler for administrator
    
    $admin_firstname = strtolower($sign_up->validate_str($_POST['admin_firstname'], 'This firstname field is required'));

    $admin_lastname = strtolower($sign_up->validate_str($_POST['admin_lastname'], 'This lastname field is required'));
    
    $admin_email = strtolower($sign_up->validate_str($_POST['admin_email'], 'This email field is required'));
    
    $admin_username = strtolower($sign_up->validate_str($_POST['admin_username'], 'This username field is required'));
    
    $admin_phone_number = strtolower($sign_up->validate_str($_POST['admin_phone_number'], 'This number field is required'));
    
    $admin_password1 = strtolower($sign_up->validate_str($_POST['admin_password1'], 'This password field is required'));
    
    $admin_password2 = strtolower($sign_up->validate_str($_POST['admin_password2'], 'This confirm-password field is required'));
    
    $office_code = strtolower($sign_up->validate_str($_POST['office_code'], 'This office-code field is required'));

    //pass just one msg to the view
    //check if field var. is containing 'required' if yes, the send message else return False(process to database)

    $fields = array(

        'fname'=>$admin_firstname,
        'lname'=>$admin_lastname,
        'email'=>$admin_email, 
        'uname'=>$admin_username,
        'number'=>$admin_phone_number,
        'pass1'=>$admin_password1,
        'pass2'=>$admin_password2,
        'code'=>$office_code
    );
    function check($name){
        $errors = array();
         foreach ($name as $key => $value){
             $split_field = explode(' ', $value);
             if(end($split_field) == 'required'){
                 $error_msg = $split_field[1].' '."field is empty!";
                 $errors[$key] = $error_msg;
             }
         }
         return empty($errors) ? true : $errors;
     }

    $error_or_true_value = check($fields);

 if(is_array($error_or_true_value) == true){

    foreach ($error_or_true_value as $key => $value) {
        echo '
        <div class="container text-center text-danger wow bounceInUp">
            <ul>
                <li style="font-size:180%">'.$value.'</li>
            </ul>
        </div>
        ';
    }
    
 }else{

    if( $admin_password2 == $admin_password1){
        $admin_hashed_password = password_hash($admin_password1, PASSWORD_DEFAULT);

        if($db_op->insert('admin', "(first_name, last_name, email, user_name, phone_number, password, office_code) 
        Values('$admin_firstname', '$admin_lastname', '$admin_email', '$admin_username', '$admin_phone_number',
        '$admin_hashed_password', '$office_code')")){
            $sucess = "Successfuly signed up as an Administrator, Login.";
        }else{
            header('location:form.php');
            die();
        }

        
    }else{
        $admin_password_not_match = "Admin. Password does not match, carefully try again.";
    }
    
}
  }

?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // Asign variables // 
    
    $user = $_POST['username'];
    $email = $_POST['email'];     
    $cellphone = $_POST['cellphone'];
    $message = $_POST['message'];
    
    //  creating array of errors // 
    
    $formErrors = array();
    
      if(strlen($user) < 3 ){
          
          $formErrors [] = ' user must be larger than 3 chars';
      }
    
    
}

?>
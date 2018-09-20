<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    // Asign variables // 
    
    // Filter Input Values 
    
    $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);     
    $cellphone = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
    $userError = '';
    $msgError = '';
    
    //  creating array of errors // 
    
    $formErrors = array();
    
      if(strlen($user) < 3 ){
          
          $formErrors [] = ' User must be larger than <strong>3</strong> chars';
      }    
    
      if(strlen($message) < 10){
          
          $formErrors [] = ' Messages must be larger than <strong>10</strong> chars';
      }    
    
    // Send the email //
    
        if (empty($formErrors)){
            
            $reciver = ''; // write your recived  email 
            
            $header  = 'from:'. $email . '(\r\n)';
            
            mail($reciver,'form',$message,$header);
                
            $user = '';
            $email = '';
            $cellphone = '';
            $message = '';
            
            $done = '<div class= "alert alert-success" style = "text-align: center;font-size: 20px"> Success Sent </div>';
        }
}

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact-form</title>      
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">      
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,700" rel="stylesheet">
      
 </head>

    <body>
    
    <div class="container">
            <h2 class="text-center">Contact me</h2>
        <!-- Start form -->
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST'>
            <?php
            if(! empty($formErrors)){ ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>

                <?php
                
                    foreach($formErrors as $errors){
                        
                        echo $errors .'<br/>';
                    } 
                ?>
            </div>
             <?php } ?> 
            
                <?php if(isset($done)){ echo $done; } ?>
            
                <div class="form-group">
                    <input class="form-control user-name" name="username" type="text" placeholder="write your name" value="<?php if (isset($user)){
                                                    echo $user ;
                    } ?>">
                    <i class="fa fa-user fa-fw"></i>
                    <span class="astrisk">*</span>   
                    <div class="alert alert-danger custom-alert user-alert">
                        'You Must Write your <strong>User Name</strong>'
                    </div>
                </div>    
            
                <div class="form-group">
                    <input class="form-control email" name="email" type="email" placeholder="write your email" value="<?php if (isset($email)){
                                                    echo $email ;
                    } ?>">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="astrisk">*</span>   
                    <div class="alert alert-danger custom-alert email-alert ">
                        'You Must Write your <strong>email</strong>'
                    </div>
                    
                </div>
            
                <div class="form-group">    
                    <input class="form-control" name="cellphone" type="text" placeholder="your cell phone" value="<?php if (isset($cellphone)){
                                                    echo $cellphone ;
                    } ?>"/>
                    <i class="fas fa-phone fa-fw"></i>
                </div>    
                <textarea class="form-control" name="message" type="text" placeholder="type your message"></textarea>
                <input class="btn btn-success" type="submit" value="send-message">
                <i class="fas fa-send fa-fw"></i>
        </form>
            <!-- End form -->

     </div>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/clients.js"></script>
        
    </body>
</html>
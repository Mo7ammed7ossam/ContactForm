<?php 
    // Check if user comming from a Request

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {   
        // Assaign Variables
        $user = filter_var($_POST['UserName'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['Phone'], FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['Message'], FILTER_SANITIZE_STRING);
        
        // Creating Array of Errors
        $formErrors = array();
        if (strlen($user) <= 3)
        {
            $formErrors[] = 'UserName must be equal or Larger than <strong>3</strong> characters';
        }
        if (strlen($msg) <= 10)
        {
            $formErrors[] = 'msg can\'t be less than <strong>10</strong> characters';
        }

        // $headers = 'From' . $mail . '\r\n';
        // $mymail = 'wikohossam35@gmail.com';
        // $subject = 'Contact form';
        // // if no errors send the email [mail(to,subject,message,headers,parameters)]
        // if(empty($formErrors)) {
        //     mail($mymail, $subject, $msg, $headers);

        //     $user = '';
        //     $mail = '';
        //     $cell = '';
        //     $msg = '';

        //     $success = '<div class="alert alert-success> we have recieve your mail </div>';
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--  two meta for responsive and device width  -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contanct Form</title>
        <!-- Bootstrap & FontAwesome links -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container py-5"> 
            <h1 class="text-center ">Contact US</h1>  
            <!-- start Form -->
            <form class="content-form py-3" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <!-- form Errors -->
            <?php
                    if(!empty($formErrors)) 
                    { 
                ?>
                <div class="alert alert-danger alert-dismissible w-50 mx-auto mt-4 mb-0" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php 
                        foreach($formErrors as $formError)
                        {
                            echo $formError . '<br>';
                        }
                    ?>
                </div>
                <?php 
                    }
                ?>
                <!-- <?php //if(isset($success)) {echo $success;} ?>     -->
                <div class="form-group w-50 m-auto pb-3 ">
                    <input 
                        class="username form-control"
                        name="UserName" 
                        type="text" 
                        value="<?php if(isset($user)) { echo $user ; } ?>"
                        placeholder="enter your name">
                    <i class="fa fa-user fa-fw"></i>
                    <span class="astrics">*</span>
                    <div class="alert alert-danger custom-alert" role="alert">
                        UserName must be equal or Larger than <strong>3</strong> characters
                    </div>
                </div> 
                
                <div class="form-group w-50 m-auto pb-3">
                    <input 
                        class="email form-control "   
                        name="Email"
                        type="email" 
                        placeholder="enter valid email">
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="astrics">*</span>
                    <div class="alert alert-danger custom-alert" role="alert">
                        email can't be <strong>empty</strong>
                    </div>
                </div> 
                
                <div class="form-group w-50 m-auto pb-3">
                    <input 
                        class="form-control "   
                        name="Phone"
                        type="number"
                        placeholder="enter phone">
                    <i class="fa fa-phone fa-fw"></i>
                </div>

                <div class="form-group w-50 m-auto pb-3">
                    <textarea 
                        class="message form-control "
                        name="Message"                        
                        value="<?php if(isset($msg)) { echo $msg ; } ?>"
                        placeholder="enter your message"></textarea>
                    <div class="alert alert-danger custom-alert" role="alert">
                        msg can\'t be less than <strong>10</strong> characters
                    </div>
                </div>

                <div class="form-group w-50 m-auto text-center sendmsg ">
                    <input 
                        type="submit" 
                        class="btn btn-primary px-5 py-2"
                        value="Send Message">
                    <i class="fa fa-send fa-fw "></i>
                </div>
                
            </form>
            <!-- End Form -->
        </div>

        <!-- java script links -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
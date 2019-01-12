<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/contactStyling.css" rel="stylesheet">
    <link href="css/flexboxgrid.css" rel="stylesheet">
</head>

<body>
    <?php include "include_files/header.php"; ?>
    <style>
        <?php include "css/headerStyling.css"; ?>
    </style>
    
    <div id="header-photo">
       
    </div>
    
    <h2 class="contact-us-label">Contact Us</h2>
    <hr>

    <div class="row">
        <div class="col-lg-4 contactform">
            <?php 
                //gets user input
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $comment = $_POST["comment"];
                
                //error messages
                $missingFirstName = '<p class="error"><strong>*Please enter your first name!</strong></p>';  
                $missingLastName = '<p class="error"><strong>*Please enter your last name!</strong></p>';
                $missingEmail = '<p class="error"><strong>*Please enter your email address!</strong></p>';
                $invalidEmail = '<p class="error"><strong>*Please enter a valid email address!</strong></p>';
                $missingComment = '<p class="error"><strong>*Please enter a comment!</strong></p>';
                
                //if the user has submitted the form
                if($_POST["submit"]) {
                    
                    //check for errors (this only checks to see if the field is empty or not. does not check or validate content)
                    if(!$fname) {
                        $errors .= $missingFirstName;
                    } else {
                        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
                    }
                    
                     if(!$lname) {
                        $errors .= $missingLastName;
                    } else {
                        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
                    }
                    
                    if(!$email) {
                        $errors .= $missingEmail;
                    } else {
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors .= $invalidEmail;
                        }    
                    }
                    
                    if(!$comment) {
                        $errors .= $missingComment;
                    } else {
                        $comment = filter_var($comment, FILTER_SANITIZE_STRING);
                    }
                    
                        //if there are any errors
                    if ($errors) {
                        //print error message
                        $resultMessage = '<div class="alert">' . $errors . '</div>';
                    } else {
                        $to = "xjunkemailx69@gmail.com";
                        $subject = "Contact";
                        $message = 
                            "<p>Name: $fname $lname</p>";
                            "<p>Email: $email</p>";
                            "<p>Message:</p>";
                            "<p><strong>$comment</strong></p>";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
                        $headers .= "From: abc@123.com" . "\r\n";
                        if (mail($to, $subject, $message, $headers)) {
                            $resultMessage = '<div class="alert alert-success">
                            Thank you for your message! We will get back to you as soon as possible.
                            </div>';
                        }
                        else {
                            $resultMessage = '<div class="alert alert-warning">
                            Unable to send email. Please try again later.
                            </div>';
                        }
                        
                    }
                            
                    echo $resultMessage;
                }
                ?>

            <form method="post" action="<?php htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
                <label for="fname">First Name: </label>
                <input type="text" name="fname" id="fname" placeholder="First Name" class="spacing" value="<?php echo $_POST["fname"];?>">

                <br />

                <label for="lname">Last Name: </label>
                <input type="text" name="lname" id="lname" placeholder="Last Name" class="spacing" value="<?php echo $_POST["lname"];?>">

                <br />

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Email" class="spacing" value="<?php echo $_POST["email"];?>">

                <br />

                <label for="comment">Message (optional): </label>
                <textarea name="comment" id="comment" rows="7" cols="35" class="spacing">

                        <?php echo $_POST["comment"];?>
                        </textarea>

                <br />
                <div id="btn-div">
                    <input type="submit" name="submit" id="submitBtn">
                </div>
            </form>
        </div>
    </div>
    
    <p>***Click <a href="mailto:sitecreator2018@gmail.com" target="_top">here</a> to contact.</p>
    
    <?php include "include_files/footer.php"; ?>
    <style>
        <?php include "css/footerStyling.css";
        ?>
    </style>
</body>

</html>

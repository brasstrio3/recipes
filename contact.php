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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        .contactform {
            border: 1px solid purple;
            margin-top: 50px;
            border-radius: 15px;
        }

    </style>
</head>

<body>
  

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 contactform">
                <h1>Contact Us</h1>

                <?php 
                //gets user input
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $email = $_POST["email"];
                $comment = $_POST["comment"];
                
                //error messages
                $missingFirstName = '<p><strong>Please enter your first name!</strong></p>';  
                $missingLastName = '<p><strong>Please enter your last name!</strong></p>';
                $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
                $invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
                $missingComment = '<p><strong>Please enter a comment!</strong></p>';
                
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

                <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="fname">First Name: </label>
                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" value="<?php echo $_POST["fname"];?>">
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name: </label>
                        <input type="text" name="lname" id="lname" placeholder="Last  Name" class="form-control" value="<?php echo $_POST["lname"];?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_POST["email"];?>">
                    </div>

                    <div class="form-group">
                        <label for="comment">Message (optional): </label>
                        <textarea name="comment" id="comment" rows="5" class="form-control">

                        <?php echo $_POST["comment"];?>
                        </textarea>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
                </form>
            </div>
        </div>
    </div>
    
    <br  />
    <br  />
    <a href="index.php" style="color: black; font-size: 25px;">Back to Homepage</a>
    
    <?php include "include_files/footer.php"; ?>
    <style>
        <?php include "css/footerStyling.css"; ?>
    </style>
</body>

</html>

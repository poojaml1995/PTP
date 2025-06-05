<?php
session_start();
if(isset($_SESSION['user_id']))
{
    header('Location:index.php');
}
include './includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=500">
    <title>Forget Password - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/CMTILogo.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/login.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script src="./assets/bootsrap-5.0.0/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- start design here -->
    <main>

        <!-- Modal -->
            <div class="modal fade" id="ALertModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ALertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ALertModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <h5 id="AlertHeader" class="text-primary text-center my-3"></h5>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" id="ProceedButton">OK</a>
                        </div>
                    </div>
                </div>
            </div>


        <div class="">
            <div class="">
                <br><br>
                <div class="wrapper">
                    <form class="form-right" method="POST" onsubmit="return validateForm()">
                        <div class="text-center mb-3">
                            <!-- <img src="./assets/images/logo.png" alt="" srcset=""> -->
                            <img src="./assets/images/CMTILogo.png" alt="" srcset="" width="10%" height="10%">

                        </div>
                        <h2 class="text-uppercase text-center">Forgot Password</h2>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="input-field" name="email" id="email"
                                    onclick="clearvalidateemail()" onkeypress="clearvalidateemail()">
                                <span class="text-danger" id="validateemail"></span>
                            </div>
                            <div class="form-field">
                                <a href="./login.php" class="register float-start text-center">Go Back</a>
                                <button type="submit" name="submit" class="register float-end">Submit</button>
                            </div>
                    </form>
                    <?php

                        ini_set("display_errors", 0); 
                        date_default_timezone_set('Asia/Kolkata'); 
                        // ini_set('error_reporting', E_ALL);
                        ini_set('log_errors', 1);
                        ini_set('error_log', 'error_log.txt');
                        ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                        try {
                        if(isset($_POST['submit']))
                        {
                            
                            function generateRandomString($length = 10) {
                                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $charactersLength = strlen($characters);
                                $randomString = '';
                                for ($i = 0; $i < $length; $i++) {
                                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                                }
                                return $randomString;
                            }

                            // $email=mysqli_real_escape_string($con,$_POST['email']);
                            $email = $_POST['email'];
                            
                            $sql="SELECT * FROM user WHERE email_id = '$email' ";
                            $query=mysqli_query($con,$sql) or die(mysqli_error($con));

                            if(mysqli_num_rows($query))
                            {
                                $fetch=mysqli_fetch_array($query);
                                $userid=$fetch['user_id'];

                                $password=generateRandomString();
                                $passwordmd5=md5($password);

                                $loginsql="CALL UpdatePassword('$userid','$passwordmd5')";

                                // echo $loginsql;

                                $con->query($loginsql) or die(mysqli_error($con));

                                require_once './assets/phpmailer/class.phpmailer.php';
                                require './assets/phpmailer/class.smtp.php';
                                $mail = new PHPMailer(true);
		                        $Message = 'Hi ' . ',<br> As per your request password has been reset your password, your password has been reset. <br>Your user login details are <br>Email: ' . $email . ' <br> password: ' . $password . '<br><br><br> Regards, <br>PTP Team, CMTI';
                                $mail->isSMTP();
                                $mail->isHTML(true);
                                $mail->SMTPDebug  = 0;
                                $mail->Mailer = "smtp";
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure = "tls";
                                $mail->Host = "smtp.gmail.com";
                                $mail->Port = 587;
                                $mail->AddAddress($email);
                                $mail->Username = "sample@gmail.com";
                                $mail->Password = "sample";  
                                $mail->SetFrom('sample@outlook.com','CMTI PTP');
                                $mail->AddReplyTo("sample.com","CMTI PTP");
                                $mail->Body    = $Message;
                                $mail->AltBody    = $Message;
                                $mail->Subject = "CMTI PTP - User details";
                                $mail->Body = "<br><b> Hi $name,</b><br> You have successfully registered for Proficiency Testing.<br>Your Email ID is <b>$email</b> and Password is <b>$password</b>";
                
                                if($mail->Send())
                                {
                                    ?>
                                    <script>
                                        document.getElementById("AlertHeader").innerHTML = "Password has been reset and sent to your email ID";
                                        document.getElementById("AlertHeader").classList.add("text-success");
                                        $("#ProceedButton").attr("href", "./login.php");
                                        $(document).ready(function(){
                                        $('#ALertModal').modal('show');
                                        });
                                    </script>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <script>
                                            document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                            document.getElementById("AlertHeader").classList.add("text-danger");
                                            $("#ProceedButton").attr("href", "./forgot-password.php");
                                            $(document).ready(function(){
                                            $('#ALertModal').modal('show');
                                            });   
                                        </script>
                                        <?php
                                        }
                                    
                                }
                                }
                              
                            }
        
                        catch (Exception $e) {
                        // Catch any exceptions thrown
                        $errorMessage = "Caught exception: " . $e->getMessage();                        
                        error_log($errorMessage . PHP_EOL, 3, "error_log.txt");
                    }
                                ?>

                </div>
            </div>
        </div>
    </main>
    <!-- end design here -->

    <!-- bootstrap 4.3.1 js -->
    <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="./assets/js/forgot-password.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>

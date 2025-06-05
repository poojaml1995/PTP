<?php
    session_start();
    if(isset($_SESSION['user_id']))
    {
        header('Location:index.php');
    }
    include './includes/connection.php';
    // include './includes/error-log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/CMTILogo.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/registration.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script> -->
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

                <div class="wrapper">
                    <div class="form-left"></div>
                    <form class="form-right" method="POST" onsubmit="return validateForm()">
                        <div class="text-center mb-3">
                            <img src="./assets/images/CMTILogo.png" alt="" srcset="" width="30%" height="40%">
                            <!-- <img src="./assets/images/logo.png" alt="" srcset=""> -->
                        </div>
                        <h2 class="text-uppercase text-center">Registration form</h2>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="input-field" name="name" id="name" onclick="clearvalidatename()"
                                onkeypress="clearvalidatename()">
                            <span class="text-danger" id="validatename"></span>
                        </div>
                        <div class="mb-3">
                            <label>Mobile Phone Number</label>
                            <input type="number" class="input-field" name="contact_no" id="contactnumber"
                                onclick="clearvalidatecontactnumber()" onkeypress="clearvalidatecontactnumber()">
                            <span class="text-danger" id="validatecontactnumber"></span>
                        </div>
                        <div class="mb-3">
                            <label>Email id</label>
                            <input type="email" class="input-field" name="email_id" id="email"
                                onclick="clearvalidateemail()" onkeypress="clearvalidateemail()">
                            <span class="text-danger" id="validateemail">
                            <?php if (isset($emailError)) echo $emailError; ?></span>
                        </div>                        
                        <div class="mb-3">
                            <label>Lab name </label>
                            <input type="text" class="input-field" name="lab_name" id="labname"
                                onclick="clearvalidatelabname()" onkeypress="clearvalidatelabname()">
                            <span class="text-danger" id="validatelabname"></span>                        
                        </div>
                        <div class="mb-3">
                            <label>Accreditation ID(if applicable) </label>
                            <input type="text" class="input-field" name="accreditation_id">
                        </div>
                        <div class="mb-3">
                            <label>GST No(if applicable) </label>
                            <input type="text" class="input-field" name="GST_number">
                        </div>
                        <div class="mb-3">
                            <span>Already have an account? <a href="./login.php">Login here</a></span>
                        </div>
                        <div class="form-field float-end">
                            <!-- <input type="submit" value="Register" class="register" name="register"> -->
                            <button type="submit" name="submit" class="register">Register</button>
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
    if (isset($_POST['submit'])) {
        $con->begin_transaction();

        $email = mysqli_real_escape_string($con, $_POST['email_id']);
        $emailCheckQuery = "SELECT * FROM user WHERE email_id = '$email'";
        $result = $con->query($emailCheckQuery);

        if ($result->num_rows > 0) {
            ?>
            <script>
                document.getElementById("AlertHeader").innerHTML = "Your Email-ID is already Registered";
                document.getElementById("AlertHeader").classList.add("text-danger");
                $("#ProceedButton").attr("href", "./registration.php");
                $(document).ready(function(){
                    $('#ALertModal').modal('show');
                });
            </script>
            <?php
        } else {
            // Use old logic for user count
            $call = mysqli_prepare($con, 'CALL GetUserCount(@count)');
            mysqli_stmt_execute($call);

            $select = mysqli_query($con, 'SELECT @count');
            $result = mysqli_fetch_assoc($select);
            $count = $result['@count'];

            $count = (int)$count + 1;
            $UserID = "USR" . date("d") . date("m") . date("y") . $count;

            $name = mysqli_real_escape_string($con, $_POST['name']);
            $contactnumber = mysqli_real_escape_string($con, $_POST['contact_no']);
            $labname = mysqli_real_escape_string($con, $_POST['lab_name']);
            $accreditationid = mysqli_real_escape_string($con, $_POST['accreditation_id']);
            $GSTnumber = mysqli_real_escape_string($con, $_POST['GST_number']);
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#%$|';
            $password = substr(str_shuffle($permitted_chars), 0, 10);
            $passwordmd5 = md5($password);

            $usersql = "CALL InsertUser('$UserID', '$name', '$email', '$contactnumber', '$labname', '$accreditationid', '$GSTnumber')";
            $loginsql = "CALL InsertLogin('$UserID', '$email', '$passwordmd5')";

            $result1 = $con->query($usersql);
            $result2 = $con->query($loginsql);

            if ($result1 && $result2) {
                try {
                    require_once './assets/phpmailer/class.phpmailer.php';
                    require './assets/phpmailer/class.smtp.php';

                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "sample@gmail.com";
                    $mail->Password = "sample";
                    $mail->SMTPSecure = "tls";
                    $mail->Port = 587;
                    $mail->setFrom("sample@gmail.com", "CMTI PTP");
                    $mail->AddAddress($email);
                    $mail->isHTML(true);
                    $mail->AddReplyTo("sample@gmail.com", "CMTI PTP");
                    $mail->Subject = "CMTI PTP - User details";
                    $mail->Body = "<br><b> Hi $name,</b><br> You have successfully registered for Proficiency Testing.<br>Your Email ID is <b>$email</b> and Password is <b>$password</b>";

                    if (!$mail->Send()) {
                        ?>
                        <script>
                            document.getElementById("AlertHeader").innerHTML = "Something went wrong while sending the email.";
                            document.getElementById("AlertHeader").classList.add("text-danger");
                            $("#ProceedButton").attr("href", "./registration.php");
                            $(document).ready(function(){
                                $('#ALertModal').modal('show');
                            });
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            document.getElementById("AlertHeader").innerHTML = "Registered Successfully";
                            document.getElementById("AlertHeader").classList.add("text-success");
                            $("#ProceedButton").attr("href", "./login.php");
                            $(document).ready(function(){
                                $('#ALertModal').modal('show');
                            });
                        </script>
                        <?php
                    }
                } catch (Exception $e) {
                    error_log("PHPMailer Exception: " . $e->getMessage());
                }
            } else {
                ?>
                <script>
                    document.getElementById("AlertHeader").innerHTML = "Error while inserting user data. Please try again.";
                    document.getElementById("AlertHeader").classList.add("text-danger");
                    $("#ProceedButton").attr("href", "./registration.php");
                    $(document).ready(function(){
                        $('#ALertModal').modal('show');
                    });
                </script>
                <?php
            }
        }

        $con->commit();
    }
} catch (Exception $e) {
    $con->rollback();
    error_log("Caught exception: " . $e->getMessage());
    ?>
    <script>
        document.getElementById("AlertHeader").innerHTML = "An unexpected error occurred. Please try again.";
        document.getElementById("AlertHeader").classList.add("text-danger");
        $("#ProceedButton").attr("href", "./registration.php");
        $(document).ready(function(){
            $('#ALertModal').modal('show');
        });
    </script>
    <?php
}
?>
    



                    </div>
            </div>        
    </main>
    <!-- end design here -->

    <!-- bootstrap 4.3.1 js -->
    <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="./assets/js/registration.js"></script>

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

<?php
session_start();
if(!(isset($_SESSION['user_id'])))
{
    header('Location:../login.php');
}
include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMTI - Central Manufacturing Technology Institute</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="./assets/bootsrap-5.0.0/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- start design here -->

    <body id="body-pd">
        <?php include('./includes/navbar.php') ?>
        <?php include('./includes/sidebar.php') ?>

        <!--Container Main start-->

        <!-- Modal -->
        <div class="modal fade" id="PasswordUpdateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="PasswordUpdateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PasswordUpdateModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <h5 id="PasswordUpdateAlertHeader" class="text-primary text-center my-3"></h5>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-primary" id="PasswordUpdateButton">OK</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl px-4 mt-4 mb-5">
            <!-- Account page navigation-->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>
            <div class="row mt-5">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 shadow h-100">
                        <div class="heading card-header">Password Update</div>
                        <div class="card-body text-center">
                            <div class="text-left mt-4">
                                <form method="post" onsubmit="return validatePasswordForm()">
                                    <div class="mb-3 text-left">
                                        <label class="small mb-1" for="currentpassword">Current Password</label>
                                        <input class="form-control" id="currentpassword" name="currentpassword" type="password" placeholder="Enter your current password" onclick="clearvalidatecurrentpassword()" onkeypress="clearvalidatecurrentpassword()">
                                        <span class="text-danger" id="validatecurrentpassword"></span>
                                    </div>
                                    <div class="mb-3 text-left">
                                        <label class="small mb-1" for="newpassword">New Password</label>
                                        <input class="form-control" id="newpassword" name="newpassword" type="password" placeholder="Enter your new password" onclick="clearvalidatenewpassword()" onkeypress="clearvalidatenewpassword()">
                                        <span class="text-danger" id="validatenewpassword"></span>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                        <label class="form-check-label" for="showPassword">Show Password</label>
                                    </div>
                                    <button class="submit btn btn-outline-light" name="password-submit" type="submit">Update Password</button>
                                </form>
                                <?php

                                if (isset($_POST['password-submit'])) {

                                    $tempuserid=$_SESSION['user_id'];
                                    $call = mysqli_prepare($con, 'CALL GetUserPassword(?,@password)');
                                    mysqli_stmt_bind_param($call, 's', $tempuserid);
                                    mysqli_stmt_execute($call);

                                    $select = mysqli_query($con, 'SELECT @password AS password');
                                    $result = mysqli_fetch_assoc($select);
                                    $storedpassword = $result['password'];
                                                                        
                                    $currentpassword = mysqli_real_escape_string($con, $_POST['currentpassword']);
                                    $currentpasswordmd5 = md5($currentpassword);
                                    $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
                                    $newpasswordmd5 = md5($newpassword);
                                    
                                    if ($storedpassword !== $currentpasswordmd5) {
                                        ?>
                                    <script>
                                            document.getElementById("PasswordUpdateAlertHeader").innerHTML = "Current password and existing password do not match!";
                                            document.getElementById("PasswordUpdateAlertHeader").classList.add('text-danger');
                                            $("#PasswordUpdateButton").attr("href", "./profile.php");
                                            $(document).ready(function(){
                                            $("#PasswordUpdateModal").modal('show');
                                        });
                                    </script> 
                                       <?php
                                    } else if ($currentpasswordmd5 === $newpasswordmd5) {
                                        ?>
                                    <script>
                                            document.getElementById("PasswordUpdateAlertHeader").innerHTML = "Current password and new password are the same!";
                                            document.getElementById("PasswordUpdateAlertHeader").classList.add('text-danger');
                                            $("#PasswordUpdateButton").attr("href", "./profile.php");
                                            $(document).ready(function(){
                                            $("#PasswordUpdateModal").modal('show');
                                            });
                                    </script>
                                       <?php
                                    } else {
                                        $loginsql = "CALL UpdatePassword('$tempuserid','$newpasswordmd5')";
                                        $insert = mysqli_query($con, $loginsql);
                                      
                                        $userid=$_SESSION['user_id'];
                                        $sql="SELECT * from user where user_id= '$userid' LIMIT 1";
                                        $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                        if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                
                                        $name = $row['name'];
                                        $EmailID = $row['email_id']; 


                                        if ($insert) {
                                            // Send email
                                            require_once '../assets/phpmailer/class.phpmailer.php';
                                            require '../assets/phpmailer/class.smtp.php';
                                            $mail = new PHPMailer(true);

                                                $Email_Message = '<br><b> Hi ' . $name . ',</b><br> Your Profile has beeen updated. <br> Please Let us know if u have not made these changes. <br> Login instructions: <br> Your Email ID is: ' . $EmailID . ' and Password is ' . $newpassword . '<br><br><br> Regards, <br>PTP Team, CMTI';
                                                $mail->IsSMTP();
                                                $mail->isHTML(true);
                                                $mail->SMTPDebug = 0;
                                                $mail->Mailer = "smtp";
                                                $mail->SMTPAuth = true;
                                                $mail->SMTPSecure = "tls";
                                                $mail->Host = "smtp.office365.com";
                                                $mail->Port = '587';
                                                $mail->AddAddress($EmailID);
                                                $mail->Username = "donotreplyproficiencytesting@outlook.com";
                                                $mail->Password = "replycmtiptp@2023";
                                                $mail->SetFrom('donotreplyproficiencytesting@outlook.com', 'CMTI PTP');
                                                $mail->AddReplyTo("donotreplyproficiencytesting@outlook.com", "CMTI PTP");
                                                $mail->Body = $Email_Message;
                                                $mail->Subject = "CMTI PTP - Password Update";

                                                if (!$mail->Send()) {                                              
                                                    ?>
                                                <script>
                                                    document.getElementById("PasswordUpdateAlertHeader").innerHTML = "Unable to Update profile, please check password and try again";
                                                    document.getElementById("PasswordUpdateAlertHeader").classList.add('text-danger');
                                                    $("#PasswordUpdateButton").attr("href", "./profile.php");
                                                    $(document).ready(function(){
                                                        $("#PasswordUpdateModal").modal('show');
                                                    });
                                                </script>
                                                    <?php
                                            } else {
                                                ?>
                                                <script>
                                                    document.getElementById("PasswordUpdateAlertHeader").innerHTML = "Profile Updated successfully. Kindly login again.";
                                                    document.getElementById("PasswordUpdateAlertHeader").classList.add('text-success');
                                                    $("#PasswordUpdateButton").attr("href", "./includes/update-logout.php");
                                                    $(document).ready(function(){
                                                    $("#PasswordUpdateModal").modal('show');
                                                    });
                                                </script>
                                                    <?php
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
                <!-- Modal -->
                <div class="modal fade" id="ProfileUpdateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ProfileUpdateModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ProfileUpdateModalLabel"></h5>
                            </div>
                            <div class="modal-body">
                                <h5 id="ProfileUpdateAlertHeader" class="text-primary text-center my-3"></h5>
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-primary" id="ProfileUpdateButton">OK</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Account details card-->
                    <div class="card mb-4 shadow h-100">
                        <div class="heading card-header">Account Details</div>
                        <div class="card-body">
                            <form method="POST" onsubmit="return validateForm()">
                                <?php
                                    $userid=$_SESSION['user_id'];
                                    $sql="CALL GetUserFromUserID('$userid')";
                                    $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($query)){
                                        while($row=mysqli_fetch_array($query)){
                                ?>
                                  <div class="mb-3">
                                    <label class="small mb-1" for="userid">User ID</label>
                                    <input class="form-control" id="userid" name="user_id" type="text"
                                        value="<?php echo $row['user_id']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                        placeholder="Enter your name" value="<?php echo $row['name']; ?>"
                                        onclick="clearvalidatename()" onkeypress="clearvalidatename()" readonly>
                                    <span class="text-danger" id="validatename"></span>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="emailid">Email ID</label>
                                        <input class="form-control" id="emailid" name="email_id" type="email"
                                            placeholder="Enter your email id" value="<?php echo $row['email_id']; ?>"
                                            onclick="clearvalidateemailid()" onkeypress="clearvalidateemailid()" readonly>
                                        <span class="text-danger" id="validateemailid"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="contact_no">Contact Number</label>
                                        <input class="form-control" id="contactnumber" name="contact_no" type="text"
                                            placeholder="Enter your contact number"
                                            value="<?php echo $row['contact_no']; ?>"
                                            onclick="clearvalidatecontactnumber()"
                                            onkeypress="clearvalidatecontactnumber()">
                                        <span class="text-danger" id="validatecontactnumber"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="lab_name">Lab Name</label>
                                    <input class="form-control" id="labname" name="lab_name" type="text"
                                        placeholder="Enter your lab name" value="<?php echo $row['lab_name']; ?>"
                                        onclick="clearvalidatelabname()" onkeypress="clearvalidatelabname()">
                                    <span class="text-danger" id="validatelabname"></span>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="accreditation_id">Accreditation ID</label>
                                        <input class="form-control" id="accreditationid" name="accreditation_id" type="text"
                                            placeholder="Enter your accreditation id" value="<?php echo $row['accreditation_id']; ?>"
                                            onclick="clearvalidateaccreditationid()" onkeypress="clearvalidateaccreditationid()">
                                        <span class="text-danger" id="validateaccreditationid"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="GST_number">GST Number</label>
                                        <input class="form-control" id="gstnumber" name="GST_number" type="text"
                                            placeholder="Enter your gst number"
                                            value="<?php echo $row['GST_number']; ?>"
                                            onclick="clearvalidategstnumber()"
                                            onkeypress="clearvalidategstnumber()">
                                        <span class="text-danger" id="validategstnumber"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="shippingaddress">Shipping Address</label>
                                    <textarea name="shipping_address" id="shippingaddress" name="shipping_address"
                                        class="form-control" placeholder="Enter your shipping address"
                                        onclick="clearvalidateshippingaddress()"
                                        onkeypress="clearvalidateshippingaddress()"><?php echo $row['shipping_address']; ?></textarea>
                                    <span class="text-danger" id="validateshippingaddress"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="billingaddress">Billing Address</label>
                                    <textarea name="billing_address" id="billingaddress" name="billing_address"
                                        class="form-control" placeholder="Enter your billing address"
                                        onclick="clearvalidatebillingaddress()"
                                        onkeypress="clearvalidatebillingaddress()"><?php echo $row['billing_address']; ?></textarea>
                                    <span class="text-danger" id="validatebillingaddress"></span>
                                </div>
                                <?php
                                        }
                                    }
                                    // $con -> close();
                                ?>
                                <!-- Save changes button-->
                                <button class="submit btn btn-outline-light" name="submit" type="submit">Update
                                    Profile</button>
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
                                    $con=mysqli_connect("localhost","root","root","ptp");

                                    $con->begin_transaction();
                                    
                                    $userid=mysqli_real_escape_string($con,$_POST['user_id']);
                                    $name=mysqli_real_escape_string($con,$_POST['name']);
                                    $email=mysqli_real_escape_string($con,$_POST['email_id']);
                                    $contactnumber=mysqli_real_escape_string($con,$_POST['contact_no']);
                                    $shippingaddress=mysqli_real_escape_string($con,$_POST['shipping_address']);
                                    $billingaddress=mysqli_real_escape_string($con,$_POST['billing_address']);
                                    $labname=mysqli_real_escape_string($con,$_POST['lab_name']);
                                    $accreditationid=mysqli_real_escape_string($con,$_POST['accreditation_id']);
                                    $gstnumber=mysqli_real_escape_string($con,$_POST['GST_number']);                                    

                                        $usersql="CALL UpdateUser('$userid','$name','$email','$contactnumber',
                                        '$shippingaddress','$billingaddress','$labname','$accreditationid','$gstnumber')";

                                        $loginsql="CALL UpdateLogin('$userid','$email')";

                                        $result1 = mysqli_query($con, $usersql) or die(mysqli_error($con));
                                        $result2 = mysqli_query($con, $loginsql) or die(mysqli_error($con));
            
                                        if($result1 && $result2)                      
                                         {
            
                                        ?>
                                        <script>
                                            document.getElementById("ProfileUpdateAlertHeader").innerHTML = "Profile Updated successful";
                                            document.getElementById("ProfileUpdateAlertHeader").classList.add("text-success");
                                            $("#ProfileUpdateButton").attr("href", "./profile.php");
                                            $(document).ready(function(){
                                            $('#ProfileUpdateModal').modal('show');
                                            });
                                        </script>  
                                           <?php
                                        } else {
                                            ?>                                        

                                        <script>
                                            document.getElementById("ProfileUpdateAlertHeader").innerHTML = "Something went wrong";
                                            document.getElementById("ProfileUpdateAlertHeader").classList.add("text-danger");
                                            $("#ProfileUpdateButton").attr("href", "./profile.php");
                                            $(document).ready(function(){
                                            $('#ProfileUpdateModal').modal('show');
                                            });
                                        </script>  
                                       <?php
                                             }

                                        }

                                    }
                                    catch (Exception $e) 
                                    {
                                        // Catch any exceptions thrown
                                        $errorMessage = "Caught exception: " . $e->getMessage();                        
                                        error_log($errorMessage . PHP_EOL, 3, "error_log.txt");
                                    }                            
                                    ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--Container Main end-->
        <!-- end design here -->
        <?php include('./includes/footer.php') ?>

        <!-- bootstrap 4.3.1 js -->
        <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

        <!-- bootstrap 5.1.3 js -->
        <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

        <!-- custom js -->
        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="./assets/js/profile.js"></script>

    </body>

</html>
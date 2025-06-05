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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMTI - Central Manufacturing Technology Institute</title>
    <link rel="icon" href="./assets/images/CMTILogo.png" type="image/png" sizes="30x30">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- bootstrap 4.3.1 css -->
    <!-- <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css"> -->

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/login.css">

    <script>
        function ShowModal() {
            $('#ALertModal').modal('show');
        }
        function CloseModal() {
            $('#ALertModal').modal('hide');
        }
    </script>
</head>

<body>

    <!-- start design here -->
    <main>

        <!-- Modal -->
        <div class="modal fade" id="ALertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="ALertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ALertModalLabel"> </h5>
                    </div>
                    <div class="modal-body">
                        <h5 id="AlertHeader" class="text-primary text-center my-3"></h5>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-primary" id="ProceedButton">Proceed</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="">
                <br><br>
                <div class="wrapper">
                    <div class="form-left"></div>
                    <form class="form-right" method="POST" onsubmit="return validateForm()">
                        <div class="text-center mb-3">
                            <img src="./assets/images/CMTILogo.png" alt="" srcset="" width="30%" height="40%">
                        </div>
                        <h2 class="text-uppercase text-center">Login form</h2>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label>Your Email</label>
                                <input type="email" class="input-field" name="email" id="email"
                                    onclick="clearvalidateemail()" onkeypress="clearvalidateemail()">
                                <span class="text-danger" id="validateemail"></span>
                            </div>
                            <div class="mb-3">
                                <label>Your Password</label>
                                <input type="password" class="input-field" name="password" id="password"
                                    onclick="clearvalidatepassword()" onkeypress="clearvalidatepassword()">
                                <span class="text-danger" id="validatepassword"></span>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="showPassword"
                                    onclick="togglePassword()">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                            <div class="mb-3">
                                <span><a href="./forgot-password.php">Forgot your password?</a></span>
                            </div>
                            <div class="mb-3">
                                <span>Don't have an account? <a href="./registration.php">Register here</a></span>
                            </div>
                            <div class="form-field float-end">
                                <button type="submit" name="submit" class="register">Login</button>
                            </div>
                    </form>

                        <?php
                        
                        ini_set("display_errors", 0); 
                        date_default_timezone_set('Asia/Kolkata'); 
                        ini_set('error_reporting', E_ALL);
                        ini_set('log_errors', 1);
                        ini_set('error_log', 'error_log.txt');
                        
                        try {
                        if(isset($_POST['submit']))
                        {
                            $email=mysqli_real_escape_string($con,$_POST['email']);
                            $password=mysqli_real_escape_string($con,$_POST['password']);
                            $password = md5($password);

                            $sql="CALL GetUserLogin('$email','$password')";
                            $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                            if(mysqli_num_rows($query))
                            {
                                $fetch=mysqli_fetch_array($query);
                                $_SESSION['user_id']=$fetch['user_id'];
                                $_SESSION['email_id']=$fetch['email_id'];

                                if((isset($_SESSION['temp_product_id']))){
                                    ?>
                                        <script>
                                            document.getElementById("AlertHeader").innerHTML = "Logged in Successfully";
                                            document.getElementById("AlertHeader").classList.add("text-success");
                                            $("#ProceedButton").attr("href", "./user/view_product.php?view_product_id=<?php echo $_SESSION['temp_product_id'] ?>");
                                            $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                            });
                                        </script>
                                    <?php
                                    unset($_SESSION['temp_product_id']);
                                }
                                else{
                                    ?>
                                        <script>
                                            document.getElementById("AlertHeader").innerHTML = "Logged in Successfully";
                                            document.getElementById("AlertHeader").classList.add("text-success");
                                            $("#ProceedButton").attr("href", "./user/index.php");
                                            $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                            });
                                        </script>
                                    <?php
                                }                                
                            }
                            else
                            {
                                ?>
                                    <script>
                                        document.getElementById("AlertHeader").innerHTML = "Invalid login attempt";
                                            document.getElementById("AlertHeader").classList.add("text-danger");
                                        $("#ProceedButton").attr("href", "./login.php");
                                        $(document).ready(function(){
                                            $('#ALertModal').modal('show');
                                        });
                                    </script>
                                <?php
                            }
                        }
                    } catch (Exception $e) {
                        // Catch any exceptions thrown
                        $errorMessage = "Caught exception: " . $e->getMessage();                        
                        // error_log($errorMessage . PHP_EOL, 3, "error_log.txt");
                        log_error($errorMessage . PHP_EOL, 3, "error_log.txt");

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
    <script src="./assets/js/login.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script> -->

    
</body>

</html>
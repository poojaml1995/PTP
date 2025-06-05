<?php
session_start();
if(isset($_SESSION['admin_id']))
{
    header('Location:home.php');
}
include '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home - Proficiency Testing Services</title>
<link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

<link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

<link rel="stylesheet" href="./assets/css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- <script src="./assets/js/sample1.js"></script>
<script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
<script src="./js/sweetalert/sweetalert2.all.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="./assets/css/style.css">

</head>
<!-- start design here -->

<body id="body-pd">

    <!--Container Main start-->
    <div class="container-fluid">

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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
        </div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="">
                <div class="row justify-content-center mt-5">

                    <div class="col-xl-8 mb-5">
                        <div class="card mb-3 mt-3 p-3 shadow h-100">
                            <h3 class="fw-bold mt-5 mb-5 text-center">Sign in your account</h3>

                            <div class="card-body">
                                <form method="POST" onsubmit="return validateForm()">
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control"
                                            onclick="clearusernamevalidation()"
                                            onkeypress="clearusernamevalidation()" />
                                        <span class="text-danger" id="validateusername"></span>
                                    </div>
                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            onclick="clearpasswordvalidation()"
                                            onkeypress="clearpasswordvalidation()" />
                                        <span class="text-danger" id="validatepassword"></span>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" name="submit" class="submit btn btn-primary btn-block mb-4">
                                        Sign up
                                    </button>

                                </form>
                                <?php
                                    if(isset($_POST['submit']))
                                    {
                                        $username=mysqli_real_escape_string($con,$_POST['username']);
                                        $password=mysqli_real_escape_string($con,$_POST['password']);

                                        $sql="CALL GetAdminLogin('$username','$password')";
                                        $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                        if(mysqli_num_rows($query))
                                        {
                                            $fetch=mysqli_fetch_array($query);
                                            $_SESSION['admin_id']=$fetch['admin_id'];
                                            $_SESSION['admin_email']=$fetch['admin_email'];
                                            ?>

                                        <script>
                                            document.getElementById("AlertHeader").innerHTML = "Admin Logged in Successfully";
                                            document.getElementById("AlertHeader").classList.add("text-success");
                                            $("#ProceedButton").attr("href", "./home.php");
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
                                            document.getElementById("AlertHeader").innerHTML = "Invalid login attempt";
                                            document.getElementById("AlertHeader").classList.add("text-danger");
                                            $("#ProceedButton").attr("href", "./index.php");
                                            $(document).ready(function(){
                                            $('#ALertModal').modal('show');
                                            });
                                       </script>      
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content Row -->
    </div>
    <!--Container Main end-->
    <!-- end design here -->

    <!-- bootstrap 4.3.1 js -->
    <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="./assets/js/sidebar1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./assets/js/index.js"></script>
    <script>
    // Find the first element with the specified class
    var element = document.querySelector(".active");
    if (element) {
        var element = document.getElementById(element.id);
        element.classList.remove("active");

        var profileelement = document.getElementById("dashboard-link");
        profileelement.classList.add("active");
    }
    </script>

</body>

</html>
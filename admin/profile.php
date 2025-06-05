<?php
session_start();
if(!(isset($_SESSION['admin_id'])))
{
    header('Location:index.php');
}
include '../includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=650" />
    <title>Profile - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- bootstrap 4.3.1 css -->
    <!-- <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css"> -->

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <!-- <link rel="stylesheet" href="./assets/css/style1.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>


</head>

<body>


    <!-- Sidebar -->
    <?php include('./includes/sidebar.php'); ?>
    <!-- Sidebar -->

    <!-- Navbar -->
    <?php include('./includes/navbar.php'); ?>
    <!-- Navbar -->

    <!--Main layout-->
    <main style="margin-top: 58px">

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
                        <a type="button" class="btn btn-primary" id="ProceedButton">Updated</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="p-5 mb-4 p-sm-1 m-3">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="row m-6 mb-">
                            <div class="mt-4 form mx-auto shadow col-lg-10 col-sm-12 top-border p-5 w-100">

                                <h4 class="card-title text-center mb-4">Profile</h4>

                                <form onsubmit="return validateform()" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="Name" class="mt-3">
                                            <h6>Name</h6>
                                        </label>
                                        <input type="text" class="form-control text-black" id="Name" name="admin_username" placeholder="Enter Your Name...." onkeypress="clearvalidatename()" onclick="clearvalidatename()">
                                        <span id="validatename" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="Email" class="mt-3">
                                            <h6>Email Address</h6>
                                        </label>
                                        <input type="email" class="form-control text-black" id="Email" name="admin_email" placeholder="sample@gmail.com" onkeypress="clearvalidateemail()" onclick="clearvalidateemail()">
                                        <span id="validateemail" class="text-danger"></span>
                                    </div>


                                    <div class="form-group password-input-group">
                                        <label for="admin_password" class="mt-3">
                                            <h6>Password</h6>
                                        </label>
                                        <input type="password" class="form-control text-black" id="admin_password" name="admin_password" placeholder="Enter Your Password...." onkeypress="clearvalidateadmin_password()" onclick="clearvalidateadmin_password()">
                                        <span id="validateadmin_password" class="text-danger"></span>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                        <label class="form-check-label" for="showPassword">Show Password</label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit"
                                            class="btn mb-2 mt-3 py-2 px-5 success-button">Submit</button>
                                    </div>
                                </form>

                                <?php
                                try 
                                {                                    
                                    if (isset($_POST['submit'])) 
                                    {
                                        $name = mysqli_real_escape_string($con, $_POST['admin_username']);
                                        $email = mysqli_real_escape_string($con, $_POST['admin_email']);
                                        $admin_password	 = mysqli_real_escape_string($con, $_POST['admin_password']);

                                        $sql = "INSERT INTO admin(admin_username, admin_email, admin_password) VALUES ('$name', '$email', '$admin_password')";
                                        // echo $insert;

                                        $insert = mysqli_query($con, $sql);
                                        echo $insert;

                                        if ($insert) 
                                        {
                                            ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Profile updated Successfully";
                                                    document.getElementById("AlertHeader").classList.add("text-success");
                                                    $("#ProceedButton").attr("href", "./profile.php");
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
                                                    $("#ProceedButton").attr("href", "./profile.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                            <?php
                                        }
                                    }
                                } 
                                catch (Exception $e) {
                                    // Handle the exception, log it, or perform any necessary actions.
                                    echo 'Error: ' . $e->getMessage();
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--Main layout-->



    <!-- end design here -->

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="./assets/js/sample.js"></script>
    <script src="./assets/js/profile.js"></script>

    <script>
    // Find the first element with the specified class
    var element = document.querySelector(".active");
    if (element) {
        var element = document.getElementById(element.id);
        element.classList.remove("active");

        var profileelement = document.getElementById("profile-link");
        profileelement.classList.add("active");
    }
    </script>

</body>

</html>
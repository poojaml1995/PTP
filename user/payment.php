<?php
session_start();
if(!(isset($_SESSION['user_id'])))
{
    header('Location:index.php');
}
include '../includes/connection.php';

    $ORDER_ID=rand(10000,99999999);
	$USER_ID=$_SESSION['user_id'];
	$TRACK_ID=$_SESSION['TrackingID'];
    $TOTAL_AMOUNT=$_SESSION['TotalAmount'];
	// $TXN_AMOUNT=$_SESSION['TotalAmount'];
    $INVOICE=$_SESSION['invoice_number'];
    $error='<div class="alert alert-primary" role="alert">
    This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
  </div>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">
    
    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">
    <script src="./assets/bootsrap-5.0.0/js/bootstrap.bundle.min.js"></script>


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
</head>

<body>
    <!-- start design here -->

    <body id="body-pd">
        <?php include('./includes/navbar.php') ?>
        <?php include('./includes/sidebar.php') ?>

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


        <!--Container Main start-->
        <div class="container-fluid mt-5">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-5">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row justify-content-center mt-5">
                    <div class="col-xl-6 mb-5">
                        <div class="mb-3 mt-3 p-3 shadow">
                            <h4 class="heading font-weight-bold text-center mt-3">Payment</h4>
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-12 mb-5">
                                        <form method="POST" onsubmit="return validate()">

                                            <div class="card border-primary rounded-0">
                                                <div class="card-header p-0">
                                                    <div class="bg-success text-white text-center py-2">
                                                        <p class="m-2">Please Check Your Details</p>
                                                    </div>
                                                </div>
                                                <div class="card-body p-3 text-center">
                                                    <!--Body-->
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-user text-danger"></i></div>
                                                            </div>
                                                            <p class="m-2">Customer ID :
                                                                <strong><?php echo $USER_ID; ?></strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-file text-success"></i></div>
                                                            </div>
                                                            <p class="m-2">Track ID :
                                                                <strong><?php echo $TRACK_ID; ?></strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-rupee-sign text-danger"></i></div>
                                                            </div>
                                                            <p class="m-2">AMOUNT :
                                                                <strong>&#8377;<?php echo number_format($TOTAL_AMOUNT) ?></strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-envelope text-success"></i></div>
                                                            </div>
                                                            <input type="email" class="form-control" id="nombre"
                                                                name="Email" placeholder="sample@example.com" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-envelope text-success"></i></div>
                                                            </div>
                                                            <input type="text" class="form-control" id="number"
                                                                name="Phone" onkeypress="clearcontactnovalidation()"
                                                                placeholder="Enter mobile number" required>
                                                        </div>
                                                        <span class="text-danger" id="validatenumber"></span>
                                                    </div>
                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-success btn-lg"
                                                            name="submit_p" value="Payment Made">

                                                        <input type="submit" class="btn btn-danger btn-lg"
                                                            name="submit_np" value="Payment Not Made">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                            if(isset($_POST['submit_p'])){
                                            $ID = $_SESSION['TrackingID'];                                            

                                            $query = ("SELECT * from checkout where TrackingID = '$ID'");
                                            // echo $query;                                            
                                            $result = mysqli_query($con, $query);

                                            if($result)
                                            {
                                                
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $id = $_SESSION['TrackingID'];
                                                
                                            $sql = mysqli_query($con,"UPDATE checkout SET Payment=1 WHERE TrackingID = '$id'") or die(mysqli_error($con));
                                            ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Payment Done";
                                                    document.getElementById("AlertHeader").classList.add("text-success");
                                                    $("#ProceedButton").attr("href", "./index.php");
                                                    $(document).ready(function(){
                                                    $('#ALertModal').modal('show');
                                                    });
                                                </script>                        
                                            <?php
                                        }
                                    }
                                    }
                                            ?>
                                            <?php
                                            if(isset($_POST['submit_np'])){
                                            $ID = $_SESSION['TrackingID'];
                                            $query = ("SELECT * from checkout where TrackingID='$ID'");
                                            // echo $query;                                            
                                            $result = mysqli_query($con, $query);

                                            if($result)
                                            {
                                                
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $id = $_SESSION['TrackingID'];
                                                
                                            $sql = mysqli_query($con,"UPDATE checkout SET Payment = 0 WHERE TrackingID = '$id'") or die(mysqli_error($con));
                                            ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Payment Not Done";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./index.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                        <?php
                                        }
                                    }
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php include('./includes/footer.php') ?>

            <!-- bootstrap 4.3.1 js -->
            <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

            <!-- bootstrap 5.1.3 js -->
            <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

            <!-- custom js -->
            <script src="./assets/js/main.js"></script>
            <script src="./assets/js/checkout.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
            </script>

            <script>
            // Find the first element with the specified class
            var element = document.querySelector(".active");
            if (element) {
                var element = document.getElementById(element.id);
                element.classList.remove("active");

                var profileelement = document.getElementById("form-link");
                profileelement.classList.add("active");
            }
            </script>
    </body>

</html>
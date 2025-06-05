<?php
// session_start();
include '../includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=650" />
    <title>Edit product - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css"> -->

    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- <script src="./assets/js/sample1.js"></script>
    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

</head>

<body>

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
                        <a type="button" class="btn btn-primary" id="ProceedButton">Delete</a>
                    </div>
                </div>
            </div>
        </div>



<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE id = '$id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {

            ?>
                <script>
                    document.getElementById("AlertHeader").innerHTML = "Product details deleted successfully";
                    document.getElementById("AlertHeader").classList.add("text-success");
                    $("#ProceedButton").attr("href", "./editproductdetails.php");
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
                    $("#ProceedButton").attr("href", "./editproductdetails.php");
                    $(document).ready(function(){
                    $('#ALertModal').modal('show');
                    });
                </script>
            <?php
                                                
    }
       }  
        ?>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>
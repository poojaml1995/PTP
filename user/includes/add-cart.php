<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('Location:../index.php');
}
include '../../includes/connection.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>PTP</title>

    <!-- sweetalert -->
    <script src="../js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="../js/sweetalert/sweetalert2.all.min.js"></script>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>

</head>

<body>

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


    <?php
        if(isset($_GET['product_id']))
        {
            $product_id=$_GET['product_id'];
            // $ID=$_SESSION['user_id'];
            $user_id=$_SESSION['user_id'];
            
            $query = mysqli_query($con, "SELECT * from cart where user_id='$user_id' and product_id='$product_id'");

            if(mysqli_num_rows($query) > 0){
                $oldquantity = 0;
                while($row=mysqli_fetch_array($query)){
                    $oldquantity = $row['quantity'];
                }
                $newquantity = $oldquantity + 1;
                $sql="UPDATE cart set quantity='$newquantity' where user_id='$user_id' and product_id='$product_id'";
                $insert=mysqli_query($con,$sql);
                if($insert)
                {
                ?>
                <script>
                    document.getElementById("AlertHeader").innerHTML = "Item added to cart";
                    document.getElementById("AlertHeader").classList.add("text-success");
                    $("#ProceedButton").attr("href", "../cart.php");
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
                    $("#ProceedButton").attr("href", "../view_product.php");
                    $(document).ready(function(){
                    $('#ALertModal').modal('show');
                    });
                </script>      
                <?php
                }
            }
            else{
                $sql="INSERT into cart (user_id,product_id,quantity)
                values('$user_id','$product_id',1)";
                $insert=mysqli_query($con,$sql);
                if($insert)
                {
                ?>
                <script>
                    document.getElementById("AlertHeader").innerHTML = "Item added to cart";
                    document.getElementById("AlertHeader").classList.add("text-success");
                    $("#ProceedButton").attr("href", "../cart.php");
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
                    $("#ProceedButton").attr("href", "../view_product.php");
                    $(document).ready(function(){
                    $('#ALertModal').modal('show');
                    });
                </script>      
                <?php
                }
            }            
        }
        ?>

</body>

</html>
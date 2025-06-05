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
    <meta name="viewport" content="width=650" />
    <title>Home - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
</head>

<body>
    <?php include('./includes/sidebar.php'); ?>
    <?php include('./includes/navbar.php'); ?>

    <main style="margin-top: 58px">
        <div class="pt-4 mt-3">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card top-border shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center" style="color:#2ecc71;">

                                    <div class="col-9">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Total Users
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-black">
                                            <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from user")); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card top-border shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center" style="color:#e74c3c;">
                                    <div class="col-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                        </svg>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Total Services
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-black">
                                            <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from products")); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card top-border shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center" style="color:#42C0FB;">
                                    <div class="col-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Total Orders
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-black">
                                            <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from checkout")); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card top-border shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row align-items-center" style="color:#f1c40f;">
                                    <div class="col-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                            <path
                                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                        </svg>
                                    </div>
                                    <div class="col-9">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                                            Total Feedbacks
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-black">
                                            <?php echo mysqli_num_rows(mysqli_query($con,"SELECT * from feedback")); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table mt-5 p-3 mx-2 shadow top-border">
                    <div class="p-5">
                        <h4 class="text-left mb-3">Recent Orders</h4>
                        <div class="">
                            <table id="example" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th scope="col">PT Round / Scheme no</th>
                                        <th scope="col">Lab Name</th>
                                        <th scope="col">Lab Code</th>
                                        <th scope="col">PT Item</th>                                        
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        // $query=mysqli_query($con,"SELECT upload_details.LaboratoryName,upload_details.LaboratoryCode,products.pt_item,cart.quantity,
                                        // order_details.product_id,checkout.TotalAmount
                                        // FROM upload_details,products, order_details, checkout, cart where upload_details.product_id = products.product_id 
                                        // AND order_details.invoice_number = checkout.invoice_number
                                        // AND order_details.user_id = cart.user_id
                                        // AND checkout.invoice_number = order_details.invoice_number") or die(mysqli_error($con));

                                        $query=mysqli_query($con,"SELECT DISTINCT U.LaboratoryName, U.LaboratoryCode, P.pt_item, P.product_id, P.amount, T.quantity
                                        FROM order_details O
                                JOIN products P on P.product_id=O.product_id 
                                JOIN upload_details U on U.product_id = P.product_id AND U.user_id = O.user_id 
                                LEFT JOIN tempcart T on T.user_id=O.user_id and T.product_id=O.product_id
                                JOIN checkout C on C.user_id=O.user_id and C.invoice_number=O.invoice_number")or die(mysqli_error($con));

                                        if(mysqli_num_rows($query)){
                                            $i=1;
                                            while($row=mysqli_fetch_array($query)){

                                        ?>
                                    <tr>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['LaboratoryName']; ?></td>
                                        <td><?php echo $row['LaboratoryCode']; ?></td>
                                        <td><?php echo $row['pt_item']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td>₹ <?php echo $row['amount']; ?></td>
                                        <?php
                                    }
                                    ?>
                                    </tr>
                                    <?php
                                   
                                    ?>
                                    <?php
                                    $i++;
  
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <script src="./assets/js/sample.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

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
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
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=750">
    <title>View Invoice - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- CSS for datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <!-- CSS for datatables -->

    <!-- Jquery for datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Jquery for datatables -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <body id="body-pd">
        <?php include('../includes/connection.php'); ?>

        <div class="align-items-center justify-content-between my-5">
            <div class="mt-5 mb-4">
                <br>
                <div class="p-5 shadow bg-white mt-5">
                    <h1 class="h3 mb-5 text-center text-primary">Invoice Details</h1>
                    <p class="text-center">Order with Order ID <span id="OrderID" class="text-primary fw-bold"></span> was placed on <span id="OrderDate" class="text-primary fw-bold"></span>.</p>
                    <div class="row">
                    <div class="row">
                        <div class="col-6">
                            <h5>Product</h5>
                        </div>
                        <div class="col-6 text-right">
                            <h5>Total</h5>
                        </div>
                    </div>
                    <div class="mx-2 mb-2" style="border-top: 1px solid black"></div>
                    <?php  
                            $InvoiceNumber=$_GET['invoice_number'];
                            $query = mysqli_query($con, "SELECT O.product_id, P.product_name, P.amount, 
                            c.SubTotal, c.CGST, c.SGST, c.TotalAmount, u.billing_address, c.DateTime, 
                            (SELECT quantity FROM `cart` WHERE 'product_id' = O.product_id) quantity FROM 
                            order_details O, products P, checkout C, user U
                            WHERE o.product_id=p.product_id and O.invoice_number=C.invoice_number 
                            and c.user_id=u.user_id and O.invoice_number='$InvoiceNumber';")
                        or die(mysqli_error($con));

                        if(mysqli_num_rows($query)){
                            while($row=mysqli_fetch_array($query)){
                                ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php echo $row['product_name']; ?>    <?php echo $row['quantity']; ?></p>
                                        </div>
                                        <div class="col-6 text-right">
                                            <p>₹<?php echo $row['amount']; ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="" style="display: none">
                                        <p id="TempOrderID"><?php echo $InvoiceNumber; ?></p>
                                        <p id="TempSubTotal"><?php echo $row['SubTotal']; ?></p>
                                        <p id="TempDateTime"><?php echo $row['DateTime']; ?></p>
                                        <p id="TempCGST"><?php echo $row['CGST']; ?></p>
                                        <p id="TempSGST"><?php echo $row['SGST']; ?></p>
                                        <p id="TempTotalAmount"><?php echo $row['TotalAmount']; ?></p>
                                        <p id="TempBillingAddress"><?php echo $row['billing_address']; ?></p>
                                    </div>
                                <?php
                            }}
                    ?>
                    <div class="mx-2 mb-2" style="border-top: 1px solid black"></div>
                    <div class="row">
                        <div class="col-6">
                            <p>SubTotal</p>
                            <p>CGST</p>
                            <p>SGST</p>
                            <p>Total Amount</p>
                        </div>
                        <div class="col-6 text-right">
                            <p>₹<span id="SubTotal"></span></p>
                            <p>₹<span id="CGST"></span></p>
                            <p>₹<span id="SGST"></span></p>
                            <p>₹<span id="TotalAmount"></span></p>
                        </div>
                    </div>
                    <div class="mx-2 mb-2" style="border-top: 1px solid black"></div>
                    <div class="row">
                    <div class="col-2">
                        <h6>Billing Address:</h6>
                    </div>
                    <div class="col-10">
                        <p id="BillingAddress"></p>
                    </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="window.print();">Print Invoice</button>
                        <button type="button" class="btn btn-primary" onclick="window.close();">Go Back</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>

        <script>
        $(document).ready(function() {
            document.getElementById("OrderID").innerHTML = document.getElementById("TempOrderID").innerHTML;
            document.getElementById("OrderDate").innerHTML = document.getElementById("TempDateTime").innerHTML;
            document.getElementById("SubTotal").innerHTML = document.getElementById("TempSubTotal").innerHTML;
            document.getElementById("CGST").innerHTML = document.getElementById("TempCGST").innerHTML;
            document.getElementById("SGST").innerHTML = document.getElementById("TempSGST").innerHTML;
            document.getElementById("TotalAmount").innerHTML = document.getElementById("TempTotalAmount").innerHTML;
            document.getElementById("BillingAddress").innerHTML = document.getElementById("TempBillingAddress").innerHTML;
        });
        </script>
        <!-- bootstrap 4.3.1 js -->
        <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

        <!-- bootstrap 5.1.3 js -->
        <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

        <!-- custom js -->
        <script src="./assets/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        // Find the first element with the specified class
        var element = document.querySelector(".active");
        if (element) {
            var element = document.getElementById(element.id);
            element.classList.remove("active");

            var profileelement = document.getElementById("table-link");
            profileelement.classList.add("active");
        }
        </script>

    </body>

</html>
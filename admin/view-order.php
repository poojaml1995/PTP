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
    <meta name="viewport" content="width=900" />
    <title>View Order - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- custom css -->
    <!-- <link rel="stylesheet" href="./assets/css/style1.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>
    <!-- <script src="./assets/js/sample1.js"></script> -->

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <!-- start design here -->

    <!-- Sidebar -->
    <?php include('./includes/sidebar.php'); ?>
    <!-- Sidebar -->

    <!-- Navbar -->
    <?php include('./includes/navbar.php'); ?>
    <!-- Navbar -->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="pt-4 p-5 m-3 m-sm-0 p-sm-2">
            <div class="">
                <div class="table shadow mt-5 p-3 top-border">
                <div class="table-responsive">
                    <div class="p-5">
                        <div class="col-md-12 head">
                            <div class="float-right">
                                <a href="exportorderdata.php" class="btn btn-success"><i class="bi bi-download"></i>
                                    Export</a>
                            </div>
                        </div>
                        <h4 class="text-left mb-3">View Order Details</h4>
                        <div class="">
                            <table id="example" class="table table-bordered mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">PT Round / Scheme No</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Lab name</th>
                                        <th scope="col">GST No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Invoice Number</th>
                                        <!-- <th scope="col">Invoice</th> -->
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $ID=$_SESSION['user_id'];
                                    // $query=mysqli_query($con,"SELECT DISTINCT O.invoice_number, P.product_id, P.product_name,
                                    // P.participation_criteria, P.product_details, T.quantity, C.TotalAmount, C.DateTime,
                                    // C.status, C.FirstName, C.LastName, C.GSTNumber, C.NameOfTheLaboratory, U.LaboratoryCode
                                    // FROM order_details O
                                    // LEFT JOIN products P on P.product_id=O.product_id
                                    // LEFT JOIN tempcart T on T.user_id=O.user_id and T.product_id=O.product_id
                                    // LEFT JOIN upload_details U on U.user_id=O.user_id and U.product_id=O.product_id
                                    // JOIN checkout C on C.user_id=O.user_id and C.invoice_number=O.invoice_number ORDER BY C.DateTime DESC") or die(mysqli_error($con));

                                    $query=mysqli_query($con,"SELECT DISTINCT O.invoice_number, P.product_id, P.product_name,
                                    P.participation_criteria, P.product_details, T.quantity, C.TotalAmount, C.DateTime,
                                    C.status, C.FirstName, C.LastName, C.GSTNumber, C.NameOfTheLaboratory
                                    FROM order_details O
                                    LEFT JOIN products P on P.product_id=O.product_id
                                    LEFT JOIN tempcart T on T.user_id=O.user_id and T.product_id=O.product_id
                                    JOIN checkout C on C.user_id=O.user_id and C.invoice_number=O.invoice_number ORDER BY C.DateTime DESC") or die(mysqli_error($con));


                                        if(mysqli_num_rows($query)){
                                            $i=1;
                                            while($row=mysqli_fetch_array($query)){
                                    ?>
                                                        
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['NameOfTheLaboratory']; ?></td>
                                        <td><?php echo $row['GSTNumber']; ?></td>
                                        <td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
                                        <td>₹ <?php echo $row['TotalAmount']; ?></td>
                                        <td><?php echo $row['invoice_number']; ?></td>
                                        <!-- <td>
                                            <div class="btn-group" role="group">                                            
                                                <?php
                                                    if($row['status'] == "ORDERED"){
                                                    ?>
                                                        <a href="downloads.php?FileLocation=<?php echo $row['FileLocation']; ?>" target="_blank" class="btn-primary">
                                                        <a href='../user/view-invoice.php?invoice_number=<?php echo $row['invoice_number']; ?>' target="_blank" class='btn btn-primary btn-sm me-1 rounded-end'>View Invoice</a>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </td> -->
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['DateTime']; ?></td>
                                    </tr>
                                    <?php
                                            $i++;
                                            }
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                        <th>Column 3</th>
                                        <th>Column 4</th>
                                        <th>Column 5</th>
                                        <th>Column 6</th>
                                        <th>Column 7</th>
                                        <th>Column 8</th>
                                        <th>Column 9</th>                                        
                                    </tr>
                                </tfoot>
                            </table>
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

        var profileelement = document.getElementById("tables-link");
        profileelement.classList.add("active");
    }
    </script>

</body>

</html>
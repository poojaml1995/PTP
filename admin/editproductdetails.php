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
    <title>Edit ProductDetails - Proficiency Testing Services</title>
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
            <div class="table-responsive">
                <div class="table shadow mt-5 p-3 top-border">
                    <div class="p-5">
                        <div class="col-md-12 head">
                            <div class="float-right">
                                <a href="exportproductdetails.php" class="btn btn-success"><i
                                        class="bi bi-download"></i>
                                    Export</a>
                            </div>
                        </div>
                        <h4 class="text-left mb-3">View Product</h4>
                        <div class="">
                            <table id="example" class="table table-bordered mb-5">
                                <thead>
                                    <tr>

                                        <th>Sl.No</th>
                                        <th>PT Round/ Scheme No</th>
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>PT Item</th>
                                        <th>Parameter</th>
                                        <th>Participation Criteria</th>
                                        <th>Note</th>
                                        <th>Registration</th>
                                        <th>Images</th>
                                        <th>PDF File</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

$query=mysqli_query($con,"SELECT * from products") or die(mysqli_error($con));
if(mysqli_num_rows($query)){
    $i=1;
    while($row=mysqli_fetch_array($query)){
?>
                                    <tr>
                                        <td><?php echo $id=$row['id']; ?></td>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo   $row['product_name']; ?></td>
                                        <td>₹<?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['pt_item']; ?></td>
                                        <td><?php echo   $row['parameter']; ?></td>
                                        <td><?php echo $row['participation_criteria']; ?></td>
                                        <td><?php echo $row['note']; ?></td>
                                        <td><?php echo   $row['registration']; ?></td>

                                        <td><img src="<?php echo $row["image_loc"]; ?>" alt="card_image"
                                                class="card_image" height="80" width="80">
                                        </td>                                        
                                        
                                        <td>
                                        <a href="<?php echo $row["product_details"]; ?>" class="red-pdf-icon" target="_blank">                                        
                                        <i class="bi bi-file-pdf-fill fa-2x" style="color: red;"></i></a>
                                        </td>                                        
                                                                           
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="edit-product.php?id=<?php echo $id; ?>"
                                                    class='btn btn-primary btn-sm me-1 rounded-end'>Edit</a>
                                                <a href='delete-product.php?id=<?php echo $id; ?>'
                                                    class='btn btn-danger btn-sm ms-1 rounded-start'>Delete</a>
                                            </div>
                                        </td>

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
                                        <th>Column 10</th>
                                        <th>Column 11</th>

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

        var profileelement = document.getElementById("product-link");
        profileelement.classList.add("active");
    }
    </script>

</body>

</html>
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
    <title>CMTI - Central Manufacturing Technology Institute</title>
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

    <!-- start design here -->

    <body id="body-pd">
        <?php include('./includes/navbar.php'); ?>
        <?php include('./includes/sidebar.php'); ?>
        <?php include('./includes/connection.php'); ?>

        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <div class="container-xxl flex-grow-1 container-p-y mt-5 mb-4">
                <div class="card-header p-5 shadow h-100 bg-white">
                    <h1 class="heading h3 mb-5">View Order Details</h1>
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">PT scheme No.</th>
                                <!-- <th scope="col">PT date</th> -->
                                <th scope="col">PT name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total price</th>
                                <th scope="col">PT protocol</th>
                                <!-- <th scope="col">image_loc</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query = mysqli_query($con,"SELECT order_details.*, checkout.*, cart.*
                            FROM order_details, checkout, cart
                            WHERE order_details.invoice_number = checkout.invoice_number
                            AND order_details.user_id = cart.user_id") or die(mysqli_error($con)); 

                            
                             if(mysqli_num_rows($query)){
                                $i=1;
                                while($row=mysqli_fetch_array($query)){

                            ?>
                            <tr class="bg-light">
                                <td><?php echo $row['TrackingID']; ?></td>
                                <td><?php echo $row['SpecificRequirements']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td>₹ <?php echo $row['SubTotal']; ?></td>
                                <td><?php echo $row['MeasurementForPTItem']; ?></td>

                                <?php
}
?>
                                </td>

                            </tr>
                            <?php
    
    // echo $pdf_file;
    
    ?>
                            <?php
    $i++;
  
}
    ?>
                        </tbody>
                    </table>
                </div>
            </div>


            </script>
            <!-- bootstrap 4.3.1 js -->
            <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

            <!-- bootstrap 5.1.3 js -->
            <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>

            </table>
        </div>

        </div>
        </div>

        <?php include('./includes/footer.php') ?>

        <script>
        $(document).ready(function() {
            $('#example').DataTable();
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
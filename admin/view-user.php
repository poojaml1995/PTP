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
    <title>View User - Proficiency Testing Services</title>
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
        <div class="pt-4 mt-3">
            <!-- Export link -->

            <div class="container-fluid">
                <div class="table-responsive">
                    <div class="table mt-5 p-3 mx-2 shadow top-border">
                        <div class="p-5">
                            <div class="col-md-12 head">
                                <div class="float-right">
                                    <a href="exportuserdata.php" class="btn btn-success"><i class="bi bi-download"></i>
                                        Export</a>
                                </div>
                            </div>
                            <h4 class="text-left mb-3">View Users</h4>
                            <div class="">
                                <table id="example" class="table table-bordered">
                                    <thead class="">
                                        <tr>
                                            <th>Id</th>
                                            <th>PT Round / Scheme no</th>
                                            <th>Lab Name</th>
                                            <th>Lab Code</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>GST Number</th>
                                            <th>Accreditation Laboratory</th>
                                            <th>DateTime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $query=mysqli_query($con,"SELECT * FROM checkout C 
                                        // LEFT JOIN upload_details U on U.user_id=C.user_id") or die(mysqli_error($con));
                                        $query=mysqli_query($con,"SELECT DISTINCT u.product_id, u.LaboratoryName, u.LaboratoryCode, 
                                        c.FirstName, c.LastName, c.Phone, c.Email, c.StreetAddress1, c.GSTNumber,c.AccreditationLaboratory, c.DateTime FROM order_details o
                                        LEFT JOIN upload_details u ON u.user_id = o.user_id AND u.product_id = o.product_id
                                        LEFT JOIN checkout c ON c.user_id = o.user_id AND c.invoice_number = o.invoice_number order by c.DateTime DESC") or die(mysqli_error($con));
                                        if(mysqli_num_rows($query)){
                                            $i=1;
                                            while($row=mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['product_id']; ?></td>
                                            <td><?php echo $row['LaboratoryName']; ?></td>
                                            <td><?php echo $row['LaboratoryCode']; ?></td>
                                            <td><?php echo $row['FirstName'].' '.$row['LastName']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td><?php echo $row['StreetAddress1']; ?></td>
                                            <td><?php echo $row['GSTNumber']; ?></td>
                                            <td><?php echo $row['AccreditationLaboratory']; ?></td>
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
                                            <th>Column 10</th>
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

        var profileelement = document.getElementById("user-link");
        profileelement.classList.add("active");
    }
    </script>
</body>

</html>
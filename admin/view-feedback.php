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
    <title>View Feedback - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">
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
    <?php include('./includes/sidebar.php'); ?>

    <?php include('./includes/navbar.php'); ?>

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="pt-4 p-5 m-3 m-sm-0 p-sm-2">
            <div class="">
                <div class="overflow-auto">

                    <div class="table shadow mt-5 p-3 top-border">
                        <div class="p-5">
                            <div class="col-md-12 head">
                                <div class="float-right">
                                    <a href="exportfeedback.php" class="btn btn-success"><i class="bi bi-download"></i>
                                        Export</a>
                                </div>
                            </div>
                            <h4 class="text-left mb-3">View Feedback</h4>
                            <div class="">
                                <table id="example" class="table table-bordered mb-5">
                                    <thead>
                                    <tr>
                                            <th>Feedback ID</th>
                                            <th>User ID</th>
                                            <th>PT Scheme Round / Number</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>PT Scheme Name / Description</th>
                                            <th>PT items</th>
                                            <th>Clarity in Protocol</th>
                                            <th>Confidentiality</th>
                                            <th>Clarity of PTRound</th>
                                            <th>Schedule in General</th>
                                            <th>Support on Queries</th>
                                            <th>Commercial term</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($con, "SELECT * FROM feedback ORDER BY DateTime DESC") or die(mysqli_error($con));
                                        if (mysqli_num_rows($query)) {
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                                <tr>
                                                <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['user_id']; ?></td>
                                                    <td><?php echo $row['product_id']; ?></td>
                                                    <td><?php echo $row['CustomerName']; ?></td>
                                                    <td><?php echo $row['Address']; ?></td>
                                                    <td><?php echo $row['PTSchemeNameDescription']; ?></td>
                                                    <td><?php echo $row['PTitems']; ?></td>
                                                    <td><?php echo $row['ClarityinProtocol']; ?></td>
                                                    <td><?php echo $row['Confidentiality']; ?></td>
                                                    <td><?php echo $row['ClarityofPTRound']; ?></td>
                                                    <td><?php echo $row['ScheduleInGeneral']; ?></td>
                                                    <td><?php echo $row['SupportOnQueries']; ?></td>
                                                    <td><?php echo $row['Commercialterm']; ?></td>
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
                                            <th>Column 11</th>
                                            <th>Column 12</th>
                                            <th>Column 13</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>    <!--Main layout-->


    <!-- end design here -->

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

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

        var profileelement = document.getElementById("feedback-link");
        profileelement.classList.add("active");
    }
    </script>

</body>

</html>
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
    <title>View Upload Form - Proficiency Testing Services</title>
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

    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <!-- start design here -->

    <?php include('./includes/sidebar.php'); ?>

    <!-- Navbar -->
    <?php include('./includes/navbar.php'); ?>
    <!-- Navbar -->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="pt-4 p-5 m-3 m-sm-0 p-sm-2">
            <div class="">
                <div class="overflow-auto">
                    <div class="table shadow mt-5 p-3 top-border">
                        <div class="p-5">
                            <h4 class="text-left mb-3">View Upload Form Details</h4>
                            <div class="">
                                <table id="example" class="table table-bordered mb-5">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                            <th>User ID</th>
                                            <th>LaboratoryName</th>
                                            <th>LaboratoryCode</th>
                                            <th>PDF File</th>
                                            <th>Form Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query=mysqli_query($con,"SELECT * from upload_details") or die(mysqli_error($con));
                                            if(mysqli_num_rows($query)){
                                            $i=1;
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['LaboratoryName']; ?></td>
                                            <td><?php echo $row['LaboratoryCode']; ?></td>
                                            <td>
                                                <a href="downloads.php?FileLocation=<?php echo $row['FileLocation']; ?>" target="_blank" class="btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                                        <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                                            <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                    </svg></i>
                                                </a>
                                            </td>
                                            <td><?php echo $row['FormUploadedType']; ?></td>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

        var profileelement = document.getElementById("upload-link");
        profileelement.classList.add("active");
    }
    </script>

</body>
</html>
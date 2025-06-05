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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</head>

<body>

    <!-- start design here -->

    <body id="body-pd">
        <?php include('./includes/navbar.php') ?>
        <?php include('./includes/sidebar.php') ?>

        <!-- Content Row -->
        <div class="container mt-5">
            <div class="heading h3 mx-5">
                <h3 class="mt-5">Product Details</h3>
            </div>
            <div class="container overflow-hidden d-flex p-0 mb-1">
                <?php
                $query=mysqli_query($con,"SELECT * from products") or die(mysqli_error($con));
                    if(mysqli_num_rows($query)){
                        $i=1;
                    while($row=mysqli_fetch_array($query)){
                ?>
                <div class="card mt-1">
                    <div class="card_header">
                        <img src="<?php echo $row["image_loc"];?>" alt="card_image" class="card_image" width="800">
                        <!-- <img class="card_image" width="800"
                            src="<?php echo str_replace("../","./",$row['image_loc']); ?>" alt="First slide"> -->
                    </div>
                    <div class="card_body">
                        <h5 class="card-title ptno mb-0"><strong>PT Round / Scheme No :
                            </strong><?php echo $row['product_id']; ?></h5>
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <!-- <p>PT Item - Analog Hydraulic Pressure Indicating Device.</p> -->
                        <a href="./view_product.php?view_product_id=<?php echo $row['product_id']; ?>"
                            class="btn btn-primary mb-3 w-50">View Products</a>
                    </div>
                </div>
                <?php
                $i++;
                }
            }
        ?>
            </div>
        </div>



        <?php include('./includes/footer.php') ?>

        <!--Container Main end-->
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
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
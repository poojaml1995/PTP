<?php
session_start();
if(!(isset($_SESSION['user_id'])))
{
    if(isset($_GET['view_product_id']))
    {
        $_SESSION['temp_product_id']=$_GET['view_product_id'];
    }
    header('Location:index.php');
}
include '../includes/connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product - Proficiency Testing Services</title>
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

    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</head>


<body id="body-pd">

    <?php include('./includes/navbar.php') ?>
    <?php include('./includes/sidebar.php') ?>

    <div class="container p-4 mb-4">

        <!-- Product Details -->
        <div class="row mt-2">
            <h1 class="heading h3 mx-4 mt-5">Product Details</h1>
        </div>

        <?php
            $ID = $_GET['view_product_id'];
            $query = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$ID'") or die(mysqli_error($con));
            if (mysqli_num_rows($query)) {
            while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 product_image">
                <img class="img-fluid rounded" src="<?php echo $row['image_loc']; ?>" alt="Product Image">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['product_name']; ?></h4>
                    <h4 class="amount"> ₹ <?php echo $row['amount']; ?></h4>
                    <p class="card-text mb-0">PT Round/ Scheme No - <?php echo $row['product_id']; ?></p>
                    <p class="card-text mb-0">PT Item - <?php echo $row['pt_item']; ?></p>
                    <p class="card-text mb-0">Parameter - <?php echo $row['parameter']; ?></p>
                    <p class="card-text mb-0">Participation Criteria - <?php echo $row['participation_criteria']; ?></p>
                    <p class="card-text mb-0"><strong>Note: <?php echo nl2br($row['note']); ?></strong></p>
                    <p class="card-text mb-0">Registration: <?php echo $row['registration']; ?></p>
                    <div class="cart-action">
                        <a href="./includes/add-favourites.php?product_id=<?php echo $row['product_id']; ?>"
                            class="btn btn-primary btnAddAction my-3">Add to Favourites</a>
                        <a href="./includes/add-cart.php?product_id=<?php echo $row['product_id']; ?>"
                            class="btn btn-primary btnAddAction my-3">Add to Cart</a>
                    </div>

                </div>
            </div>
            <?php
    }
}
?>

            <!-- Related products -->

            <div class="row mt-5">
           <h1 class="heading h3 mx-4">Related Products</h1>
        </div>

        <div class="row">
          <?php
                $ID = $_GET['view_product_id'];
                $query = mysqli_query($con, "SELECT * FROM products WHERE product_id != '$ID'") or die(mysqli_error($con));
                $counter = 0;

                while ($row = mysqli_fetch_array($query)) {
                $counter++;
                if ($counter <= 3) { 
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card">
                    <img src="<?php echo $row["image_loc"]; ?>" class="card-img-top related_image" alt="card_image">
                    <div class="card-body">
                        <h6 class="card-title related_image_title mb-3">
                            <a href="./view_product.php?view_product_id=<?php echo $row['product_id']; ?>" class="card-link">
                                <?php echo $row['product_name']; ?>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            <?php
               } elseif ($counter == 4) {
            ?>
    
            <div class="col-lg-3 col-md-3 col-sm-6 mb-4 d-flex justify-content-center">
                <div class="card" style="background-color: rgba(128, 128, 128, 0.10);">
                    <div class="card-body align-items-center d-flex">
                        <a href="./product.php" class="btn"><strong>See More <i class="fas fa-arrow-circle-right"></i></strong></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
          <?php
        }
            }
            ?>
</div>


        <!-- Footer Start -->
        <?php include('./includes/footer.php') ?>

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

            var profileelement = document.getElementById("form-link");
            profileelement.classList.add("active");
        }
        </script>
</body>

</html>
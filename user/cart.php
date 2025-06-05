<?php
session_start();
if(!(isset($_SESSION['user_id'])))
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">
    <script src="./assets/bootsrap-5.0.0/js/bootstrap.bundle.min.js"></script>

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
    <link rel="stylesheet" href="./assets/css/product.css">

</head>

<body id="body-pd">
    <?php include('./includes/navbar.php') ?>

    <?php include('./includes/sidebar.php') ?>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Content Start -->
        <div class="content">

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="heading h3 mt-5 mb-0 mx-2">Cart Details</h1>
                        <!-- <h4 class="mb-0">Cart Details</h4> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start text-center align-middle table-hover mb-0">
                            <thead>
                                <tr class="text-black">
                                    <th scope="col">PT Round / Scheme No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        $ID=$_SESSION['user_id'];
                                        $query=mysqli_query($con,"SELECT products.*, cart.*, user.* from 
                                        products, cart, user where
                                        cart.user_id=user.user_id and cart.product_id=products.product_id and
                                        user.user_id='$ID'") or die(mysqli_error($con));
                                        if(mysqli_num_rows($query)){
                                            $i=1;                                              
                                            while($row=mysqli_fetch_array($query)){                                                                               
                                    ?>

                                <tr>
                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><img src="<?php echo $row['image_loc']; ?>" width="120"></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo "₹". $row['amount']; ?><input type="hidden" class="iamount"
                                            value="<?php echo $row['amount']; ?>"></td>
                                    <td><input class="iquantity" onchange="subTotal()" type="text"
                                            value="<?php echo $row['quantity']; ?>" min="1" max="100" size="3" readonly>
                                    </td>
                                    </td>
                                    <td class="itotal"></td>
                                    <td>
                                        <a href="./includes/remove-cart.php?cart_id=<?php echo $row['cart_id']; ?>"
                                            class="btn btn-primary">Remove from Cart</a>
                                    </td>
                                </tr>
                                <?php
                                            $i++;
                                            }
                                            
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3"><i class='fa fa-shopping-cart'></i>
                                        <a href="./product.php" class="btn btn-success mb-5 ">Continue
                                            Shopping</a>
                                    </td>
                                    <td colspan="1"><b>Sub total</b></td>
                                    <td id="gtotal"></td>
                                    <td>
                                        <a onclick="ProceedToCheckout()" class="btn btn-primary text-white">Proceed to
                                            Checkout</a>
                                    </td>
                                </tr>


                    </div>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



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
    var gt = 0;
    var iamount = document.getElementsByClassName('iamount');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal() {
        gt = 0;
        for (i = 0; i < iamount.length; i++) {
            itotal[i].innerText = (iamount[i].value) * (iquantity[i].value);
            gt = gt + (iamount[i].value) * (iquantity[i].value);
        }
        gtotal.innerText = gt;
    }
    subTotal();

    function ProceedToCheckout() {
        var GrandTotal = document.getElementById('gtotal').innerText;
        window.location.href = "./checkout.php?GrandTotal=" + GrandTotal;
    }
    </script>

</body>

</html>
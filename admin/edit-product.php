<?php
session_start();
if (!(isset($_SESSION['admin_id']))) {
    header('Location:index.php');
}
include '../includes/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $existing_data = $result->fetch_assoc();
        $product_name_value = $existing_data['product_name'];
        $amount_value = $existing_data['amount'];
        $product_id_value = $existing_data['product_id'];
        $pt_item_value = $existing_data['pt_item'];
        $parameter_value = $existing_data['parameter'];
        $participation_criteria_value = $existing_data['participation_criteria'];
        $note_value = $existing_data['note'];
        $registration_value = $existing_data['registration'];
        $quantity_value = $existing_data['quantity'];
        $imagetarget_file = $existing_data['image_loc'];
        $pdffiletarget_file = $existing_data['product_details'];

    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "Product ID not provided!";
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=650" />
    <title>Edit product - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css"> -->

    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- <script src="./assets/js/sample1.js"></script>
    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script> -->

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

    <!-- main layout -->
    <main style="margin-top: 58px">

        <!-- Modal -->
        <div class="modal fade" id="ALertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="ALertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ALertModalLabel"> </h5>
                    </div>
                    <div class="modal-body">
                        <h5 id="AlertHeader" class="text-primary text-center my-3"></h5>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-primary" id="ProceedButton">Updated</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5 p-5 p-sm-4 m-3">
            <div class="">
                <div class="container justify-content-center">
                    <div class="row">
                        <div class="row m-1">
                            <div class="mt-4 form shadow col-lg-10 col-sm-12 top-border">
                                <h4 class="text-center mt-4">EDIT FORM</h4>
                                <form class="p-4 ms-5" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="product_name" class="col-sm-3 col-form-label">Product
                                                    Name</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="product_name"
                                                        name="product_name"
                                                        value="<?php echo $product_name_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="amount"
                                                        name="amount"
                                                        value="<?php echo $amount_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="product_id" class="col-sm-3 col-form-label">PT Round/ Scheme No</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="product_id"
                                                        name="product_id"
                                                        value="<?php echo $product_id_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="pt_item" class="col-sm-3 col-form-label">PT Item</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="pt_item"
                                                        name="pt_item"
                                                        value="<?php echo $pt_item_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="parameter" class="col-sm-3 col-form-label">Parameter</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="parameter"
                                                        name="parameter"
                                                        value="<?php echo $parameter_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="participation_criteria" class="col-sm-3 col-form-label">Participation Criteria</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="participation_criteria"
                                                        name="participation_criteria"
                                                        value="<?php echo $participation_criteria_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="for_range" class="col-sm-3 col-form-label">For Range</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="for_range"
                                                        name="for_range" placeholder="Please enter amount..."
                                                        value="<?php echo $for_range_value; ?>">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="note" class="col-sm-3 col-form-label">Note
                                                   </label>
                                                <div class="col-sm-9 col-md-6">
                                                    <textarea type="text" class="form-control text-black"
                                                        id="note" name="note"
                                                        rows="5"><?php echo $note_value; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="registration" class="col-sm-3 col-form-label">Registration</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="registration"
                                                        name="registration"
                                                        value="<?php echo $registration_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="quantity" class="col-sm-3 col-form-label">Quantity
                                                </label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="number" class="form-control text-black" name="quantity"
                                                        id="quantity" value="<?php echo $quantity_value; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Existing Image -->
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label for="current_image" class="col-sm-3 col-form-label">Current Image</label>
                                        <div class="col-sm-9 col-md-6">
                                            <?php
                                            // Ensure that $existing_data is properly populated
                                            if (!empty($existing_data['image_loc'])) {
                                                echo '<img src="' . $existing_data['image_loc'] . '" alt="Current Image" style="width: 35%;">';
                                            } else {
                                                echo 'No image available';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload Image Field -->
                                <div class="row">
                                    <div class="mb-3">
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3 col-form-label">Upload Product Image</label>
                                            <div class="col-sm-9 col-md-6">
                                                <input type="file" class="form-control text-black" id="image" name="image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                <!-- Existing PDF File -->
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label for="current_pdf" class="col-sm-3 col-form-label">Current PDF</label>
                                        <div class="col-sm-9 col-md-6">
                                            <?php
                                            // Check if a PDF file exists
                                            if (!empty($existing_data['product_details'])) {
                                                echo '<a href="' . $existing_data['product_details'] . '" target="_blank">View PDF</a>';
                                            } else {
                                                echo 'No PDF available';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Upload PDF File -->
                                <div class="row">
                                        <div class="mb-3">
                                            <div class="form-group row">
                                                <label for="PDFFile" class="col-sm-3 col-form-label">Upload Product Details</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="file" class="form-control text-black" id="pdffile" name="pdffile" accept="pdf/*"
                                                    value="<?php echo $pdffiletarget_file; ?>">
                                                </div>
                                            </div>
                                        </div>


                                    <button type="submit" name="update" class="btn success-button px-5 py-2 mt-2">Update</button>
                                </form>

                                <?php
                            include '../includes/connection.php';

                         if (isset($_POST['update'])) 
                         {
                            $product_name = $_POST['product_name'];
                            $amount = $_POST['amount'];
                            $product_id = $_POST['product_id'];
                            $pt_item = $_POST['pt_item'];
                            $parameter = $_POST['parameter'];
                            $participation_criteria = $_POST['participation_criteria'];
                            $note = $_POST['note'];
                            $registration = $_POST['registration'];
                            $quantity = $_POST['quantity'];
                            $image_loc_update = "";
                            $product_details_update = "";


                            if (!empty($_FILES["image"]["name"]))
                            {
                              $imagetarget_dir = "../productimages/";
                              $imagetarget_file = $imagetarget_dir . basename($_FILES["image"]["name"]);

                              if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagetarget_file))
                              { 
                                $image_loc_update = ", image_loc = '$imagetarget_file'";
                              } else {
                                  echo "Sorry, there was an error uploading your image file.";
                            exit();
                                     }
                            }

                            if (!empty($_FILES["pdffile"]["name"]))
                            {
                              $pdffiletarget_dir = "../productdetails/";
                              $pdffiletarget_file = $pdffiletarget_dir . basename($_FILES["pdffile"]["name"]);

                              if (move_uploaded_file($_FILES["pdffile"]["tmp_name"], $pdffiletarget_file))
                               {
                                 $product_details_update = ", product_details = '$pdffiletarget_file'";
                               } else {
                                    echo "Sorry, there was an error uploading your PDF file.";
                            exit();
                                      }
                            }

                            $update_query = "UPDATE products SET product_name = '$product_name', amount = '$amount', product_id = '$product_id', 
                            pt_item = '$pt_item', parameter = '$parameter', participation_criteria = '$participation_criteria', 
                            note = '$note', registration = '$registration', quantity = '$quantity'
                            $image_loc_update $product_details_update WHERE id = '$id'";

                          if (mysqli_query($con, $update_query)) {
                            ?>
                                <script>
                                    document.getElementById("AlertHeader").innerHTML = "Product details updated successfully!";
                                    document.getElementById("AlertHeader").classList.add("text-success");
                                    $("#ProceedButton").attr("href", "./editproductdetails.php");
                                    $(document).ready(function(){
                                    $('#ALertModal').modal('show');
                                    });
                                </script>
                            <?php
                        //   exit();
                         } else {
                           ?>
                                <script>
                                    document.getElementById("AlertHeader").innerHTML = "Error updating product details";
                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                    $("#ProceedButton").attr("href", "./edit-product.php");
                                    $(document).ready(function(){
                                    $('#ALertModal').modal('show');
                                    });  
                                </script>                 
                            <?php
                            //  exit();
                                 }
                        }
                            ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>

</html>
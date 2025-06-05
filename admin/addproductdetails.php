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
    <title>Add Product Details - Proficiency Testing Services</title>
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
    <?php include('./includes/sidebar.php'); ?>

    <?php include('./includes/navbar.php'); ?>

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
                        <a type="button" class="btn btn-primary" id="ProceedButton">Proceed</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 p-5 p-sm-1 m-3">
            <div class="">
                <div class="row m-1">
                    <div class="mt-4 form shadow col-lg-10 col-sm-12 top-border">
                        <h4 class="text-center mt-4">FORM</h4>
                        <form onsubmit="return validateform()" class="p-4 ms-5" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="">
                                    <div class="form-group row mb-3">
                                        <label for="product_id" class="col-sm-3 col-form-label">PT Round / Scheme No<span class="text-danger">*</span></label>
                                        <div class="col-sm-9 col-md-6">
                                            <input type="text" class="form-control text-black" id="product_id" name="product_id" placeholder="Please Enter PT Round/Scheme Number..." onkeypress="clearvalidateproduct_id()" onclick="clearvalidateproduct_id()" />
                                            <span id="validateproduct_id" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group row mb-3">
                                            <label for="product_name" class="col-sm-3 col-form-label">Product Name<span class="text-danger">*</span></label>
                                            <div class="col-sm-9 col-md-6">
                                                <input type="text" class="form-control text-black" id="product_name" name="product_name" placeholder="Please Enter Product Name..." onkeypress="clearvalidateproduct_name()" onclick="clearvalidateproduct_name()" />
                                                <span id="validateproduct_name" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group row mb-3">
                                                <label for="amount" class="col-sm-3 col-form-label">Amount<span class="text-danger">*</span></label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="amount" name="amount" placeholder="Please Enter Amount..." onkeypress="clearvalidateamount()" onclick="clearvalidateamount()" /> 
                                                    <span id="validateamount" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="form-group row mb-3">
                                                <label for="pt_item" class="col-sm-3 col-form-label">PT Item</label>
                                                <div class="col-sm-9 col-md-6">
                                                    <input type="text" class="form-control text-black" id="pt_item" name="pt_item" placeholder="Please Enter PT Item..." onkeypress="clearvalidatept_item()" onclick="clearvalidatept_item()" />
                                                    <span id="validatept_item" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-group row mb-3">
                                                    <label for="parameter" class="col-sm-3 col-form-label">Parameter</label>
                                                    <div class="col-sm-9 col-md-6">
                                                        <input type="text" class="form-control text-black" id="parameter" name="parameter" placeholder="Please Enter Parameter..." onkeypress="clearvalidateparameter()" onclick="clearvalidateparameter()" />
                                                        <span id="validateparameter" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="form-group row mb-3">
                                                        <label for="participation_criteria" class="col-sm-3 col-form-label">Participation Criteria</label>
                                                        <div class="col-sm-9 col-md-6">
                                                            <input type="text" class="form-control text-black" id="participation_criteria" name="participation_criteria" placeholder="Please Enter Participation Criteria..." onkeypress="clearvalidateparticipation_criteria()" onclick="clearvalidateparticipation_criteria()" />
                                                            <span id="validateparticipation_criteria" class="text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <div class="form-group row mb-3">
                                                            <label for="note" class="col-sm-3 col-form-label">Note<span class="text-danger">*</span></label>
                                                            <div class="col-sm-9 col-md-6">
                                                                <textarea class="form-control text-black" id="note" name="note" placeholder="Please Enter Note..." rows="3" onkeypress="clearvalidatenote()" onclick="clearvalidatenote()"></textarea>
                                                                <span id="validatenote" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="form-group row mb-3">
                                                            <label for="registration" class="col-sm-3 col-form-label">Registration</label>
                                                            <div class="col-sm-9 col-md-6">
                                                                <input type="text" class="form-control text-black" id="registration" name="registration" placeholder="Please Enter Registration Status..." onkeypress="clearvalidateregistration()" onclick="clearvalidateregistration()" /> 
                                                                <span id="validateregistration" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group row mb-3">
                                                                <label for="quantity" class="col-sm-3 col-form-label">Quantity<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9 col-md-6">
                                                                    <input type="number" class="form-control text-black" name="quantity" id="quantity" value="1" autocomplete="off" onchange="clearvalidatequantity()" onclick="clearvalidatequantity()" />
                                                                    <span id="validatequantity" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group row mb-3">
                                                                <label for="image" class="col-sm-3 col-form-label">Upload Product Image<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9 col-md-6">
                                                                    <input type="file" class="form-control text-black" id="image" name="image" accept="image/*" onchange="clearvalidateimage()" onclick="clearvalidateimage()" />
                                                                    <span id="validateimage" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="form-group row mb-3">
                                                                <label for="image" class="col-sm-3 col-form-label">Upload Product Details<span class="text-danger">*</span></label>
                                                                <div class="col-sm-9 col-md-6">
                                                                    <input type="file" class="form-control text-black" id="pdffile" name="pdffile" accept="pdf/*" onchange="clearvalidationfile()" onclick="clearvalidationfile()" />
                                                                    <span id="validatefile" class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="reset"
                                                            class="btn btn-secondary px-5 py-2 mt-2">Reset</button>
                                                        <button type="submit" name="submit"
                                                            class="btn success-button px-5 py-2 mt-2">Submit</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php                                    
                            if(isset($_POST['submit']))
                            {                            
                                $imagetarget_dir = "../productimages/";
                                $pdffiletarget_dir = "../productdetails/";
                                $imagetarget_file = $imagetarget_dir . basename($_FILES["image"]["name"]);    
                                $pdffiletarget_file = $pdffiletarget_dir . basename($_FILES["pdffile"]["name"]);                                      
                                $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
                                $amount = mysqli_real_escape_string($con, $_POST['amount']);
                                $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                $pt_item = mysqli_real_escape_string($con, $_POST['pt_item']);
                                $parameter = mysqli_real_escape_string($con, $_POST['parameter']);
                                $participation_criteria = mysqli_real_escape_string($con, $_POST['participation_criteria']);
                                $note = mysqli_real_escape_string($con, $_POST['note']);
                                $registration = mysqli_real_escape_string($con, $_POST['registration']);
                                $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

                                $sql = "INSERT INTO products(product_id,product_name,amount,pt_item,parameter,participation_criteria,note,registration,quantity,image_loc,product_details)
                                        VALUES ('$product_id','$product_name','$amount','$pt_item','$parameter','$participation_criteria','$note','$registration','$quantity','$imagetarget_file','$pdffiletarget_file')";
                                $insert=mysqli_query($con,$sql);
                                
                                if(move_uploaded_file($_FILES["image"]["tmp_name"], $imagetarget_file) && move_uploaded_file($_FILES["pdffile"]["tmp_name"], $pdffiletarget_file) ) 
                                {
                                    if($insert)
                                    {
                                        ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Product Added Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./addproductdetails.php");
                                                $(document).ready(function(){
                                                    $('#ALertModal').modal('show');
                                                });
                                                //alert('Product Insert Successfully');
                                                //window.location = 'addproductdetails.php';
                                            </script>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                document.getElementById("AlertHeader").classList.add("text-danger");
                                                $("#ProceedButton").attr("href", "./index.php");
                                                $(document).ready(function(){
                                                    $('#ALertModal').modal('show');
                                                });
                                                //alert('Something went wrong!!');
                                                //window.location = './index.php';
                                            </script>
                                        <?php
                                    }
                                }
                            }
                        ?>                                        
                    </div>
                </div>
            </div>
    </main>

    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>
    <script src="./assets/js/sample.js"></script>
    <script src="./assets/js/addproductdetails.js"></script>

    <script>
        var element = document.querySelector(".active");
        if (element) {
            var element = document.getElementById(element.id);
            element.classList.remove("active");

            var profileelement = document.getElementById("forms-link");
            profileelement.classList.add("active");
        }
    </script>

</body>

</html>
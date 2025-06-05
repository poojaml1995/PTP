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
    <title>Upload Form - Proficiency Testing Services</title>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
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

<body>

    <!-- start design here -->

    <body id="body-pd">
        <?php include('./includes/navbar.php') ?>

        <?php include('./includes/sidebar.php') ?>

        <!-- Modal -->
            <div class="modal fade" id="ALertModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ALertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ALertModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            <h5 id="AlertHeader" class="text-primary text-center my-3"></h5>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-primary" id="ProceedButton">OK</a>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Content Row -->
        <div class="container-fluid my-0 mb-5">
            <div class="row row-cols-4">
                <h1 class="heading h3 mb-0 mt-5 mb-3">Upload Form</h1>
                <br>
                <div class="container">
                    <div class="row row-cols-4">

                        <!-- Form 1 -->
                        <div class="col-md-sm mb-3">
                            <div class="bg-light p-5">
                                <form onsubmit="return validateform1()" method="POST" enctype="multipart/form-data">
                                    <h3 class="text-center text-secondary mb-5">Measurement Results</h3>
                                    <div class="form-group">
                                        <label for="LaboratoryName" class="form-label font-weight-bold">Name of
                                            Laboratory <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryName1"
                                            name="LaboratoryName" placeholder="Enter your name"
                                            onkeypress="clearlaboratorynamevalidation1()"
                                            onclick="clearlaboratorynamevalidation1()" />
                                        <span class="text-danger" id="validatelaboratoryname1"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryPTSchemeNo" class="form-label font-weight-bold">PT Round /
                                            Scheme No
                                            <span class="text-danger">*</span></label>
                                        <select class="custom-select d-block w-100" id="LaboratoryPTSchemeNo1"
                                            name="product_id" onchange="clearlaboratoryptschemeno1()"
                                            onclick="clearlaboratoryptschemeno1()">
                                            <option value="Null">Choose...</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($con, "SELECT DISTINCT p.product_id FROM order_details od
                                                LEFT JOIN products p ON od.product_id = p.product_id
                                                WHERE od.user_id = '$user_id'") or die(mysqli_error($con));
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="validatelaboratoryptschemeno1" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryCode" class="form-label font-weight-bold">Lab code<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryCode1"
                                            name="LaboratoryCode" placeholder="Enter lab code"
                                            onkeypress="clearlaboratorycodevalidation1()"
                                            onclick="clearlaboratorycodevalidation1()" />
                                        <span class="text-danger" id="validatelaboratorycode1"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="drop_box">
                                            <label for="PDFFile" class="form-label font-weight-bold">File Upload Only
                                                PDF<span class="text-danger">*</span></label>
                                            <!-- <h6>Select File here</h6> -->
                                            <input type="file" class="form-control" id="PDFFile1" name="PDFFile"
                                                onkeypress="clearfilevalidation1()" onclick="clearfilevalidation1()" />
                                            <label for="img" class="text-success">Upload a measurement result
                                                file here</label>
                                            <span class="text-danger" id="validatefile1"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name="submit1" class="submit btn me-2">Submit</button>
                                    </div>
                                </form>

                                <?php        

                                    ini_set("display_errors", 0); 
                                    date_default_timezone_set('Asia/Kolkata'); 
                                    // ini_set('error_reporting', E_ALL);
                                    ini_set('log_errors', 1);
                                    ini_set('error_log', __DIR__ . '/../error_log.txt');
                                    ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                    try {

                                     if (isset($_POST['submit1'])) {
                                
                                        $laboratoryname = mysqli_real_escape_string($con, $_POST['LaboratoryName']);
                                        $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                        $laboratorycode = mysqli_real_escape_string($con, $_POST['LaboratoryCode']);
                                        
                                        $target_dir = "../assets/uploadedfiles/";
                                        $target_file = $target_dir . basename($_FILES["PDFFile"]["name"]);
                                        $uploadOk = 1;

                                        // Check if the uploaded file is a PDF
                                        function isPDFFile($filename) {
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                            return strtolower($ext) === 'pdf';
                                        }

                                        if (move_uploaded_file($_FILES["PDFFile"]["tmp_name"], $target_file)) {
                                            $filelocation =$target_file;
                                            $fileupload = true;
                                        } else {
                                            $filelocation = '';
                                            $fileupload = false;
                                        }

                                        if ($fileupload) {

                                            $user_id = $_SESSION['user_id']; 
                                            
                                            $sql = "INSERT INTO upload_details(user_id,LaboratoryName, product_id, LaboratoryCode, FileLocation,FormUploadedType)
                                            VALUES('$user_id','$laboratoryname', '$product_id', '$laboratorycode', '$filelocation','Measurement Results')";
                                            // echo $sql;
                                            
                                            $insert = mysqli_query($con, $sql);

                                            if ($insert) {
                                            ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./uploadforms.php");
                                                $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                                });
                                            </script>                        
                                            <?php
                                               } else {
                                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./uploadforms.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                                <?php
                                                }
                                                }
                                                } 
                                                
                                } catch (Exception $e) {
                                   // Catch any exceptions thrownC
                                  $errorMessage = "Caught exception: " . $e->getMessage();                        
                                 error_log($errorMessage . PHP_EOL, 3,  __DIR__ . '/../error_log.txt');
                                }
                             ?>
                            </div>
                        </div>

                        <!-- Form 2 -->
                        <div class="col-md-sm mb-3">
                            <div class="bg-light p-5">
                                <h3 class="text-center text-secondary mb-5">Receipt Form</h3>
                                <form onsubmit="return validateform2()" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="LaboratoryName" class="form-label font-weight-bold">Name of
                                            Laboratory <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryName2"
                                            name="LaboratoryName" placeholder="Enter your name"
                                            onkeypress="clearlaboratorynamevalidation2()"
                                            onclick="clearlaboratorynamevalidation2()" />
                                        <span class="text-danger" id="validatelaboratoryname2"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryPTSchemeNo" class="font-weight-bold">PT Round / Scheme No
                                            <span class="text-danger">*</span></label>
                                        <select class="custom-select d-block w-100" id="LaboratoryPTSchemeNo2"
                                            name="product_id" onchange="clearlaboratoryptschemeno2()"
                                            onclick="clearlaboratoryptschemeno2()">
                                            <option value="Null">Choose...</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($con, "SELECT DISTINCT p.product_id FROM order_details od
                                                LEFT JOIN products p ON od.product_id = p.product_id
                                                WHERE od.user_id = '$user_id'") or die(mysqli_error($con));
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="validatelaboratoryptschemeno2" class="text-danger"></span>
                                    </div>


                                    <div class="form-group">
                                        <label for="LaboratoryCode" class="form-label font-weight-bold">Lab code<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryCode2"
                                            name="LaboratoryCode" placeholder="Enter lab code"
                                            onkeypress="clearlaboratorycodevalidation2()"
                                            onclick="clearlaboratorycodevalidation2()" />
                                        <span class="text-danger" id="validatelaboratorycode2"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="drop_box">
                                            <label for="PDFFile" class="form-label font-weight-bold">File Upload Only
                                                PDF <span class="text-danger">*</span></label>
                                            <!-- <h6>Select File here</h6> -->
                                            <input type="file" class="form-control" id="PDFFile2" name="PDFFile"
                                                onkeypress="clearfilevalidation2()" onclick="clearfilevalidation2()" />
                                            <label for="img" class="text-success">Upload receipt
                                                file here</label>
                                            <span class="text-danger" id="validatefile2"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name="submit2" class="submit btn me-2">Submit</button>
                                    </div>
                                </form>

                                <?php

                                    ini_set("display_errors", 0); 
                                    date_default_timezone_set('Asia/Kolkata'); 
                                    // ini_set('error_reporting', E_ALL);
                                    ini_set('log_errors', 1);
                                    ini_set('error_log', __DIR__ . '/../error_log.txt');
                                    ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                    try {

                                if (isset($_POST['submit2'])) {
                                    $laboratoryname = mysqli_real_escape_string($con, $_POST['LaboratoryName']);
                                    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                    $laboratorycode = mysqli_real_escape_string($con, $_POST['LaboratoryCode']);
                                    
                                    $target_dir = "../assets/uploadedfiles/";
                                    $target_file = $target_dir . basename($_FILES["PDFFile"]["name"]);
                                    $uploadOk = 1;

                                    // Check if the uploaded file is a PDF
                                    function isPDFFile($filename) {
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        return strtolower($ext) === 'pdf';
                                    }

                                    if (move_uploaded_file($_FILES["PDFFile"]["tmp_name"], $target_file)) {
                                        $filelocation =$target_file;
                                        $fileupload = true;
                                    } else {
                                        $filelocation = '';
                                        $fileupload = false;
                                    }

                                    if ($fileupload) {
                                        $user_id = $_SESSION['user_id']; 
                                        $sql = "INSERT INTO upload_details(user_id,LaboratoryName, product_id, LaboratoryCode, FileLocation,FormUploadedType)
                                        VALUES('$user_id','$laboratoryname', '$product_id', '$laboratorycode', '$filelocation','Receipt Form')";
                                        echo $sql;
                                        
                                        $insert = mysqli_query($con, $sql);

                                        if ($insert) {
                                            ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./uploadforms.php");
                                                $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                                });
                                            </script>                        
                                            <?php
                                           } else {
                                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./uploadforms.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                                <?php
                                            }
                                            }
                                            }  
                                        } catch (Exception $e) {
                                            // Catch any exceptions thrown
                                           $errorMessage = "Caught exception: " . $e->getMessage();                        
                                           error_log($errorMessage . PHP_EOL, 3,  __DIR__ . '/../error_log.txt');
                                        }
          
                                            ?>
                            </div>
                        </div>

                        <!-- Form 3 -->
                        <div class="col-md-sm mb-3">
                            <div class="bg-light p-5">
                                <h3 class="text-center text-secondary mb-5">Dispatch Form</h3>
                                <form onsubmit="return validateform3()" method="POST" enctype="multipart/form-data">

                                    <!-- <div class="form-group">
                                    <h3><label for="FormName" class="text-center text-secondary mb-3" name="FormName">Dispatch Form</label></h3>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="LaboratoryName" class="form-label font-weight-bold">Name of
                                            Laboratory <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryName3"
                                            name="LaboratoryName" placeholder="Enter your name"
                                            onkeypress="clearlaboratorynamevalidation3()"
                                            onclick="clearlaboratorynamevalidation3()" />
                                        <span class="text-danger" id="validatelaboratoryname3"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryPTSchemeNo" class="font-weight-bold">PT Round / Scheme No
                                            <span class="text-danger">*</span></label>
                                        <select class="custom-select d-block w-100" id="LaboratoryPTSchemeNo3"
                                            name="product_id" onchange="clearlaboratoryptschemeno3()"
                                            onclick="clearlaboratoryptschemeno3()">
                                            <option value="Null">Choose...</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($con, "SELECT DISTINCT p.product_id FROM order_details od
                                                LEFT JOIN products p ON od.product_id = p.product_id
                                                WHERE od.user_id = '$user_id'") or die(mysqli_error($con));
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="validatelaboratoryptschemeno3" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryCode" class="form-label font-weight-bold">Lab code<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryCode3"
                                            name="LaboratoryCode" placeholder="Enter lab code"
                                            onkeypress="clearlaboratorycodevalidation3()"
                                            onclick="clearlaboratorycodevalidation3()" />
                                        <span class="text-danger" id="validatelaboratorycode3"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="drop_box">
                                            <label for="PDFFile" class="form-label font-weight-bold">File Upload Only
                                                PDF <span class="text-danger">*</span></label>
                                            <!-- <h6>Select File here</h6> -->
                                            <input type="file" class="form-control" id="PDFFile3" name="PDFFile"
                                                onkeypress="clearfilevalidation3()" onclick="clearfilevalidation3()" />
                                            <label for="img" class="text-success">Upload dispatch
                                                file here</label>
                                            <span class="text-danger" id="validatefile3"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name="submit3" class="submit btn me-2">Submit</button>
                                    </div>
                                </form>

                                <?php 

                                    ini_set("display_errors", 0); 
                                    date_default_timezone_set('Asia/Kolkata'); 
                                    // ini_set('error_reporting', E_ALL);
                                    ini_set('log_errors', 1);
                                    ini_set('error_log', __DIR__ . '/../error_log.txt');
                                    ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                    try {

                                if (isset($_POST['submit3'])) {
                                    $laboratoryname = mysqli_real_escape_string($con, $_POST['LaboratoryName']);
                                    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                    $laboratorycode = mysqli_real_escape_string($con, $_POST['LaboratoryCode']);
                                    
                                    $target_dir = "../assets/uploadedfiles/";
                                    $target_file = $target_dir . basename($_FILES["PDFFile"]["name"]);
                                    $uploadOk = 1;

                                    // Check if the uploaded file is a PDF
                                    function isPDFFile($filename) {
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        return strtolower($ext) === 'pdf';
                                    }

                                    if (move_uploaded_file($_FILES["PDFFile"]["tmp_name"], $target_file)) {
                                        $filelocation =$target_file;
                                        $fileupload = true;
                                    } else {
                                        $filelocation = '';
                                        $fileupload = false;
                                    }

                                    if ($fileupload) {
                                        $user_id = $_SESSION['user_id'];
                                        $sql = "INSERT INTO upload_details(user_id,LaboratoryName, product_id, LaboratoryCode, FileLocation,FormUploadedType)
                                        VALUES('$user_id','$laboratoryname', '$product_id', '$laboratorycode', '$filelocation','Dispatch Form')";
                                        echo $sql;
                                        
                                        $insert = mysqli_query($con, $sql);

                                        if ($insert) {
                                            ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./uploadforms.php");
                                                $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                                });
                                            </script>                        
                                             <?php
                                           } else {
                                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./uploadforms.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                                <?php
                                            }
                                            }
                                            }  
                                            
                                        } catch (Exception $e) {
                                            // Catch any exceptions thrown
                                           $errorMessage = "Caught exception: " . $e->getMessage();                        
                                           error_log($errorMessage . PHP_EOL, 3,  __DIR__ . '/../error_log.txt');
                                        }
         

                                            ?>
                            </div>
                        </div>

                        <!-- Form 4 -->
                        <div class="col-md-sm mb-3">
                            <div class="bg-form bg-light p-5">
                                <h3 class="text-center text-secondary mb-5">Uncertainty Sheet</h3>
                                <form onsubmit="return validateform4()" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="LaboratoryName" class="form-label font-weight-bold">Name of
                                            Laboratory <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryName4"
                                            name="LaboratoryName" placeholder="Enter your name"
                                            onkeypress="clearlaboratorynamevalidation4()"
                                            onclick="clearlaboratorynamevalidation4()" />
                                        <span class="text-danger" id="validatelaboratoryname4"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryPTSchemeNo" class="font-weight-bold">PT Round / Scheme No
                                            <span class="text-danger">*</span></label>
                                        <select class="custom-select d-block w-100" id="LaboratoryPTSchemeNo4"
                                            name="product_id" onchange="clearlaboratoryptschemeno4()"
                                            onclick="clearlaboratoryptschemeno4()">
                                            <option value="Null">Choose...</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($con, "SELECT DISTINCT p.product_id FROM order_details od
                                                LEFT JOIN products p ON od.product_id = p.product_id
                                                WHERE od.user_id = '$user_id'") or die(mysqli_error($con));
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="validatelaboratoryptschemeno4" class="text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryCode" class="form-label font-weight-bold">Lab code<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryCode4"
                                            name="LaboratoryCode" placeholder="Enter lab code"
                                            onkeypress="clearlaboratorycodevalidation4()"
                                            onclick="clearlaboratorycodevalidation4()" />
                                        <span class="text-danger" id="validatelaboratorycode4"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="drop_box">
                                            <label for="PDFFile" class="form-label font-weight-bold">File Upload Only
                                                PDF <span class="text-danger">*</span></label>
                                            <!-- <h6>Select File here</h6> -->
                                            <input type="file" class="form-control" id="PDFFile4" name="PDFFile"
                                                onkeypress="clearfilevalidation4()" onclick="clearfilevalidation4()" />
                                            <label for="img" class="text-success">Upload a uncertainty sheet
                                                file</label>
                                            <span class="text-danger" id="validatefile4"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name="submit4" class="submit btn me-2">Submit</button>
                                    </div>
                                </form>

                                <?php 
                                
                                ini_set("display_errors", 0); 
                                date_default_timezone_set('Asia/Kolkata'); 
                                // ini_set('error_reporting', E_ALL);
                                ini_set('log_errors', 1);
                                ini_set('error_log', __DIR__ . '/../error_log.txt');
                                ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                try {

                                if (isset($_POST['submit4'])) {
                                    $laboratoryname = mysqli_real_escape_string($con, $_POST['LaboratoryName']);
                                    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                    $laboratorycode = mysqli_real_escape_string($con, $_POST['LaboratoryCode']);
                                    
                                    $target_dir = "../assets/uploadedfiles/";
                                    $target_file = $target_dir . basename($_FILES["PDFFile"]["name"]);
                                    $uploadOk = 1;

                                    // Check if the uploaded file is a PDF
                                    function isPDFFile($filename) {
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        return strtolower($ext) === 'pdf';
                                    }

                                    if (move_uploaded_file($_FILES["PDFFile"]["tmp_name"], $target_file)) {
                                        $filelocation =$target_file;
                                        $fileupload = true;
                                    } else {
                                        $filelocation = '';
                                        $fileupload = false;
                                    }

                                    if ($fileupload) {
                                        $user_id = $_SESSION['user_id'];
                                        $sql = "INSERT INTO upload_details(user_id,LaboratoryName, product_id, LaboratoryCode, FileLocation,FormUploadedType)
                                        VALUES('$user_id','$laboratoryname', '$product_id', '$laboratorycode', '$filelocation','Uncertainty Sheet')";
                                        echo $sql;
                                        
                                        $insert = mysqli_query($con, $sql);

                                        if ($insert) {
                                           ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./uploadforms.php");
                                                $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                                });
                                            </script>                        
                                            <?php
                                           } else {
                                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./uploadforms.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                                <?php
                                            }
                                            }
                                            } 
                                            
                                        } catch (Exception $e) {
                                            // Catch any exceptions thrown
                                           $errorMessage = "Caught exception: " . $e->getMessage();                        
                                           error_log($errorMessage . PHP_EOL, 3,  __DIR__ . '/../error_log.txt');
                                        }         

                                            ?>
                            </div>
                        </div>

                        <!-- Form 5 -->
                        <div class="col-md-sm mb-3">
                            <div class="bg-form bg-light p-5">
                                <h3 class="text-center text-secondary mb-5">Calibration Certificate of PT Item</h3>
                                <form onsubmit="return validateform5()" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="LaboratoryName" class="form-label font-weight-bold">Name of
                                            Laboratory <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryName5"
                                            name="LaboratoryName" placeholder="Enter your name"
                                            onkeypress="clearlaboratorynamevalidation5()"
                                            onclick="clearlaboratorynamevalidation5()" />
                                        <span class="text-danger" id="validatelaboratoryname5"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="LaboratoryPTSchemeNo" class="font-weight-bold">PT Round / Scheme No
                                            <span class="text-danger">*</span></label>
                                        <select class="custom-select d-block w-100" id="LaboratoryPTSchemeNo5"
                                            name="product_id" onchange="clearlaboratoryptschemeno5()"
                                            onclick="clearlaboratoryptschemeno5()">
                                            <option value="Null">Choose...</option>
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($con, "SELECT DISTINCT p.product_id FROM order_details od
                                                LEFT JOIN products p ON od.product_id = p.product_id
                                                WHERE od.user_id = '$user_id'") or die(mysqli_error($con));
                                            
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="validatelaboratoryptschemeno5" class="text-danger"></span>
                                    </div>


                                    <div class="form-group">
                                        <label for="LaboratoryCode" class="form-label font-weight-bold">Lab code<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="LaboratoryCode5"
                                            name="LaboratoryCode" placeholder="Enter lab code"
                                            onkeypress="clearlaboratorycodevalidation5()"
                                            onclick="clearlaboratorycodevalidation5()" />
                                        <span class="text-danger" id="validatelaboratorycode5"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="drop_box">
                                            <label for="PDFFile" class="form-label font-weight-bold">File Upload Only
                                                PDF <span class="text-danger">*</span></label>
                                            <h6>Select File here</h6>
                                            <input type="file" class="form-control" id="PDFFile5" name="PDFFile"
                                                onkeypress="clearfilevalidation5()" onclick="clearfilevalidation5()" />
                                            <label for="img" class="text-success">Upload a calibration certificate of PT
                                                item file here</label>
                                            <span class="text-danger" id="validatefile5"></span>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" name="submit5" class="submit btn me-2">Submit</button>
                                    </div>
                                </form>

                                <?php        

                                ini_set("display_errors", 0); 
                                date_default_timezone_set('Asia/Kolkata'); 
                                // ini_set('error_reporting', E_ALL);
                                ini_set('log_errors', 1);
                                ini_set('error_log', __DIR__ . '/../error_log.txt');
                                ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                try {

                                if (isset($_POST['submit5'])) {
                                    $laboratoryname = mysqli_real_escape_string($con, $_POST['LaboratoryName']);
                                    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
                                    $laboratorycode = mysqli_real_escape_string($con, $_POST['LaboratoryCode']);
                                    
                                    $target_dir = "../assets/uploadedfiles/";
                                    $target_file = $target_dir . basename($_FILES["PDFFile"]["name"]);
                                    $uploadOk = 1;

                                    // Check if the uploaded file is a PDF
                                    function isPDFFile($filename) {
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        return strtolower($ext) === 'pdf';
                                    }

                                    if (move_uploaded_file($_FILES["PDFFile"]["tmp_name"], $target_file)) {
                                        $filelocation =$target_file;
                                        $fileupload = true;
                                    } else {
                                        $filelocation = '';
                                        $fileupload = false;
                                    }

                                    if ($fileupload) {
                                        $user_id = $_SESSION['user_id'];
                                        $sql = "INSERT INTO upload_details(user_id,LaboratoryName, product_id, LaboratoryCode, FileLocation,FormUploadedType)
                                        VALUES('$user_id','$laboratoryname', '$product_id', '$laboratorycode', '$filelocation','Calibration Certificate of PT Item')";
                                        echo $sql;
                                        
                                        $insert = mysqli_query($con, $sql);

                                        if ($insert) {
                                            ?>
                                            <script>
                                                document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                                document.getElementById("AlertHeader").classList.add("text-success");
                                                $("#ProceedButton").attr("href", "./uploadforms.php");
                                                $(document).ready(function(){
                                                $('#ALertModal').modal('show');
                                                });
                                            </script>                        
                                            <?php
                                           } else {
                                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./uploadforms.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                                <?php
                                            }
                                            }
                                            } 
                                        } catch (Exception $e) {
                                            // Catch any exceptions thrown
                                           $errorMessage = "Caught exception: " . $e->getMessage();                        
                                           error_log($errorMessage . PHP_EOL, 3,  __DIR__ . '/../error_log.txt');
                                        }
           
                                            ?>
                            </div>
                        </div>
                        <!-- Content Row -->
                    </div>
                </div>
            </div>
        </div>



        <?php include('./includes/footer.php') ?>

        <!--Container Main end-->
        <!-- end design here -->
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

            var profileelement = document.getElementById("uploadforms-link");
            profileelement.classList.add("active");
        }
        </script>
        <script src="./assets/js/uploadform.js"></script>

    </body>

</html>
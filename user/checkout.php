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
    <title>Checkout - Proficiency Testing Services</title>
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
                        <a type="button" class="btn btn-primary" id="ProceedButton">Ok</a>
                    </div>
                </div>
            </div>
        </div>

        <!--Container Main start-->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row justify-content-left mt-5">
                    <div class="col-xl-6 mb-5">
                        <div class="mb-3 mt-3 p-3 shadow">
                            <h4 class="heading font-weight-bold mt-3 mx-3">Billing Details</h4>
                            <div class="card-body">
                                <form onsubmit="return validateform()" method="POST" enctype="multipart/form-data">
                                    <?php
                                    $userid=$_SESSION['user_id'];
                                    $sql="SELECT * from user where user_id= '$userid' LIMIT 1";
                                    $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($query)){
                                        while($row=mysqli_fetch_array($query)){
                                ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="FirstName" class="font-weight-bold">First
                                                    name</label><span style="color:red">*</span>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName"
                                                    placeholder="Enter first name..."
                                                    value="<?php echo $row['name']; ?>"
                                                    onkeypress="clearvalidatefirstname()"
                                                    onclick="clearvalidatefirstname()">
                                                <span id="validatefirstname" class="text-danger"></span>

                                            </div>
                                            <div class="mb-3">
                                                <label for="lastname" class="font-weight-bold">Last name</label>
                                                <input type="text" class="form-control" id="LastName" name="LastName"
                                                    placeholder="Enter last name..." value="">

                                            </div>

                                            <div class="mb-3">
                                                <label for="nameofthelaboratory" class="font-weight-bold">Name of the Laboratory
                                                </label><span style="color:red">*</span>
                                                <input type="text" class="form-control" id="NameOfTheLaboratory"
                                                    name="NameOfTheLaboratory" value="<?php echo $row['lab_name']; ?>"
                                                    placeholder="Enter name of the laboratory"
                                                    onkeypress="clearvalidatenameofthelaboratory()"
                                                    onclick="clearvalidatenameofthelaboratory()">
                                                <span id="validatenameofthelaboratory" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="country" class="font-weight-bold">Country / Region
                                                    <span class="text-danger">*</span></label>
                                                <select class="custom-select d-block w-100" id="Country" name="Country"
                                                    onchange="clearvalidatecountry()" onclick="clearvalidatecountry()">
                                                    <option value="Null">Choose...</option>

                                                    <option value="United States">United States</option>
                                                    <option value="India">India</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="China">China</option>
                                                    <option value="Singapore">Singapore</option>
                                                </select>
                                                <span id="validatecountry" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="streetaddress2" class="font-weight-bold">Street Address
                                                </label><span style="color:red">*</span>
                                                <input type="text" class="form-control" id="StreetAddress2"
                                                    name="StreetAddress2" value="" placeholder="Enter street address..."
                                                    onkeypress="clearvalidatestreetaddress2()"
                                                    onclick="clearvalidatestreetaddress2()">
                                                <span id="validatestreetaddress2" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="streetaddress1" class="font-weight-bold">Shipping
                                                    Address</label><span style="color:red">*</span>
                                                <input type="text" class="form-control" id="StreetAddress1"
                                                    name="StreetAddress1"
                                                    value="<?php echo $row['shipping_address']; ?>"
                                                    placeholder="Enter street address1..."
                                                    onkeypress="clearvalidatestreetaddress1()"
                                                    onclick="clearvalidatestreetaddress1()">
                                                <span id="validatestreetaddress1" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="town" class="font-weight-bold">Town / City
                                                </label><span style="color:red">*</span>
                                                <input type="text" class="form-control" id="Town" name="Town"
                                                    placeholder="Enter town / city" onkeypress="clearvalidatetown()"
                                                    onclick="clearvalidatetown()">
                                                <span id="validatetown" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="state" class="font-weight-bold">State</label>
                                                <span style="color:red">*</span>
                                                <select class="custom-select d-block w-100" id="State" name="State"
                                                    onchange="clearvalidatestate()" onclick="clearvalidatestate()">
                                                    <option value="Null">Choose...</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Tamilnadu">Tamilnadu</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Maharastra">Maharastra</option>
                                                </select>
                                                <span id="validatestate" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="postcode" class="font-weight-bold">Postcode / ZIP</label>
                                                <span style="color:red">*</span>
                                                 <input type="text" class="form-control" id="Postcode" name="Postcode"
                                                    placeholder="Enter postcode / ZIP"
                                                    onkeypress="clearvalidatepostcode()"
                                                    onclick="clearvalidatepostcode()">
                                                <span id="validatepostcode" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="font-weight-bold">Phone
                                                </label><span style="color:red">*</span>
                                                <input type="phone" class="form-control" id="Phone" name="Phone"
                                                    value="<?php echo $row['contact_no']; ?>"
                                                    placeholder="Enter phone number" onkeypress="clearvalidatephone()"
                                                    onclick="clearvalidatephone()">
                                                <span id="validatephone" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Email" class="font-weight-bold">Email
                                                    address</label><span style="color:red">*</span>
                                                <input type="email" class="form-control" id="Email" name="Email"
                                                    value="<?php echo $row['email_id']; ?>"
                                                    placeholder="sample@example.com" onkeypress="clearvalidateemail()"
                                                    onclick="clearvalidateemail()">
                                                <span id="validateemail" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="MeasurementForPTItem" class="font-weight-bold">Method of the
                                                    Measurement for PT Item and Equipment used by Participant laboratory
                                                </label><span style="color:red">*</span>
                                                <textarea class="form-control" id="MeasurementForPTItem"
                                                    name="MeasurementForPTItem" rows="2"
                                                    onkeypress="clearvalidatemeasurementforptitem()"
                                                    onclick="clearvalidatemeasurementforptitem()"></textarea>
                                                <span id="validatemeasurementforptitem" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="CMCParameter" class="font-weight-bold">Participant
                                                    Laboratory CMC for the parameter / Measured under the PT Round</label>
                                                 <span style="color:red">*</span>
                                                <textarea class="form-control" id="CMCParameter" name="CMCParameter"
                                                    rows="2" onkeypress="clearvalidatecmcparameter()"
                                                    onclick="clearvalidatecmcparameter()"></textarea>
                                                <span id="validatecmcparameter" class="text-danger"></span>
                                                <!-- <input type="text" class="form-control" id="ptitem" placeholder=""> -->
                                            </div>

                                            <div class="mb-3">
                                                <label for="StandardMeasurements" class="font-weight-bold">Standard used for Measurements</label>
                                                <span style="color:red">*</span>
                                                <textarea class="form-control" id="StandardMeasurements"
                                                    name="StandardMeasurements" rows="2"
                                                    onkeypress="clearvalidatestandardmeasurements()"
                                                    onclick="clearvalidatestandardmeasurements()"></textarea>
                                                <span id="validatestandardmeasurements" class="text-danger"></span>
                                                <!-- <input type="text" class="form-control" id="ptitem" placeholder=""> -->
                                            </div>

                                            <div class="mb-3">
                                                <label for="SpecificRequirements" class="font-weight-bold">Any Specific
                                                    Requirements Packaging of PT items</label>
                                                <span style="color:red">*</span>
                                                <input type="text" class="form-control" id="SpecificRequirements"
                                                    name="SpecificRequirements"
                                                    onkeypress="clearvalidatespecificrequirements()"
                                                    onclick="clearvalidatespecificrequirements()">
                                                <span id="validatespecificrequirements" class="text-danger"></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="DisplayFinalPTReport" class="font-weight-bold">Do you wish to display
                                                    your laboratory name in Final PT report? (Confidentiality Waive off)</label>
                                                    <span style="color:red">*</span>
                                                <select class="custom-select d-block w-100" id="DisplayFinalPTReport"
                                                    name="DisplayFinalPTReport"
                                                    onchange="clearvalidatedisplayfinalptreport()"
                                                    onclick="clearvalidatedisplayfinalptreport()">
                                                    <option value="Null">Choose...</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <span id="validatedisplayfinalptreport" class="text-danger"></span>
                                            </div>


                                            <div class="mb-3">
                                                <label for="GSTNumber" class="font-weight-bold">GST Number of Laboratory</label>
                                                    <span style="color:red">*</span>
                                                <input type="text" class="form-control" id="GSTNumber" name="GSTNumber"
                                                value="<?php echo $row['GST_number']; ?>"
                                                    placeholder="" onkeypress="clearvalidategstnumber()"
                                                    onclick="clearvalidategstnumber()">
                                                <span id="validategstnumber" class="text-danger"></span>
                                                <div class="invalid-feedback">
                                                    Valid GST Number of Laboratory.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="AccreditationLaboratory"
                                                    class="font-weight-bold">Accreditation No. of Laboratory</label>
                                                <span style="color:red">*</span>
                                                <input type="text" class="form-control" id="AccreditationLaboratory"
                                                    name="AccreditationLaboratory" value="<?php echo $row['accreditation_id']; ?>"
                                                     placeholder=""
                                                    onkeypress="clearvalidateaccreditationlaboratory()"
                                                    onclick="clearvalidateaccreditationlaboratory()">
                                                <span id="validateaccreditationlaboratory" class="text-danger"></span>
                                                <div class="invalid-feedback">
                                                    Valid accreditation No. of Laboratory.
                                                </div>
                                            </div>

                                            <hr class="mb-4">

                                            <!-- <hr class="mb-4"> -->

                                            <div class="mb-3">
                                                <label for="OrderNotes" class="font-weight-bold">Order Notes(Optional)</label>                                                    
                                                <span style="color:red">*</span>
                                                <textarea class="form-control" id="OrderNotes" name="OrderNotes"
                                                    rows="2"
                                                    placeholder="Note about your oder, eg: special notes for delivery."
                                                    onkeypress="clearvalidateordernotes()"
                                                    onclick="clearvalidateordernotes()"></textarea>
                                                <span id="validateordernotes" class="text-danger"></span>
                                            </div>

                                            <div class="form-check mb-5 small">
                                                <input class="form-check-input" type="checkbox" value="Yes" id="accept"
                                                    onkeypress="clearvalidateacceptcheckbox()"
                                                    onclick="clearvalidateacceptcheckbox()">
                                                <label for="accept">
                                                    I have read and agree to the website <a href="#">terms and
                                                        conditions</a>
                                                </label><br>
                                                <span id="validateacceptcheckbox" class="text-danger"></span>
                                            </div>

                                            <input type="text" style="display:none" name="SubTotal" id="SubTotal" />
                                            <input type="text" style="display:none" name="CGST" id="CGST" />
                                            <input type="text" style="display:none" name="SGST" id="SGST" />
                                            <input type="text" style="display:none" name="TotalAmount"
                                                id="TotalAmount" />
                                            <input type="text" style="display:none" name="product_id" id="product_id" />

                                            <?php
                                        }
                                    }
                                    // $con -> close();
                                ?>

                                            <button class="submit btn btn-lg btn-block mb-4" name="submit" id="submit"
                                                type="submit">Continue to checkout</button>

                                        </div>
                                    </div>
                                </form>

                                <!-- checkout insertion -->

                                <?php

                                    ini_set("display_errors", 0); 
                                    date_default_timezone_set('Asia/Kolkata'); 
                                    // ini_set('error_reporting', E_ALL);
                                    ini_set('log_errors', 1);
                                    ini_set('error_log', __DIR__ . '/../error_log.txt');
                                    ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);

                                    try {

                                    if(isset($_POST['submit']))
                                    {    
                                        $firstname=mysqli_real_escape_string($con,$_POST['FirstName']);
                                        $lastname=mysqli_real_escape_string($con,$_POST['LastName']);
                                        $nameofthelaboratory=mysqli_real_escape_string($con,$_POST['NameOfTheLaboratory']);
                                        $country=mysqli_real_escape_string($con,$_POST['Country']);
                                        $streetaddress1=mysqli_real_escape_string($con,$_POST['StreetAddress1']);
                                        $streetaddress2=mysqli_real_escape_string($con,$_POST['StreetAddress2']);
                                        $town=mysqli_real_escape_string($con,$_POST['Town']);
                                        $state=mysqli_real_escape_string($con,$_POST['State']);
                                        $postcode=mysqli_real_escape_string($con,$_POST['Postcode']);
                                        $phone=mysqli_real_escape_string($con,$_POST['Phone']);
                                        $email=mysqli_real_escape_string($con,$_POST['Email']);
                                        $measurementforptitem=mysqli_real_escape_string($con,$_POST['MeasurementForPTItem']);
                                        $cmcparameter=mysqli_real_escape_string($con,$_POST['CMCParameter']);
                                        $standardmeasurements=mysqli_real_escape_string($con,$_POST['StandardMeasurements']);
                                        $specificrequirements=mysqli_real_escape_string($con,$_POST['SpecificRequirements']);
                                        $displayfinalptreport=mysqli_real_escape_string($con,$_POST['DisplayFinalPTReport']);
                                        $gstnumber=mysqli_real_escape_string($con,$_POST['GSTNumber']);
                                        $accreditationlaboratory=mysqli_real_escape_string($con,$_POST['AccreditationLaboratory']);
                                        $ordernotes=mysqli_real_escape_string($con,$_POST['OrderNotes']);
                                        $CGST=mysqli_real_escape_string($con,$_POST['CGST']);                                            
                                        $SGST=mysqli_real_escape_string($con,$_POST['SGST']);
                                        $subtotal=mysqli_real_escape_string($con,$_POST['SubTotal']);
                                        $totalamount=mysqli_real_escape_string($con,$_POST['TotalAmount']);
                                        $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
                                        
                                        $tracking_id ="PTP".rand(1111,9999).substr($phone,2); 
                                        function generateRandomString($length = 10) {
                                            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                            $charactersLength = strlen($characters);
                                            $randomString = '';
                                            for ($i = 0; $i < $length; $i++) {
                                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                                            }
                                            return $randomString;
                                        }
                                    
                                        $invoice=generateRandomString(); 
                                        
                                        $user_id = $_SESSION['user_id'];
                                                                                                
                                        $sql="INSERT INTO checkout(user_id,invoice_number,TrackingID,FirstName,LastName,NameOfTheLaboratory,Country,StreetAddress1,StreetAddress2,Town,State,Postcode,Phone,Email,MeasurementForPTItem,CMCParameter,StandardMeasurements,SpecificRequirements,DisplayFinalPTReport,GSTNumber,AccreditationLaboratory,OrderNotes,CGST,SGST,SubTotal,TotalAmount,status)
                                        VALUES('$user_id','$invoice','$tracking_id','$firstname','$lastname','$nameofthelaboratory','$country','$streetaddress1','$streetaddress2','$town','$state', '$postcode','$phone','$email','$measurementforptitem','$cmcparameter','$standardmeasurements','$specificrequirements','$displayfinalptreport','$gstnumber','$accreditationlaboratory','$ordernotes','$CGST','$SGST','$subtotal','$totalamount','ORDERED')";
                                        
                                        $_SESSION['TrackingID']=$tracking_id;
                                        $_SESSION['SubTotal']=$subtotal;
                                        $_SESSION['TotalAmount']=$totalamount;
                                        $_SESSION['invoice_number']=$invoice;

                                        $insert=mysqli_query($con,$sql); 
                                        
                                        $TempID=$_SESSION['user_id'];

                                        $Tempquery=mysqli_query($con,"SELECT products.*, cart.*, user.* from 
                                        products, cart, user where
                                        cart.user_id=user.user_id and cart.product_id=products.product_id and
                                        user.user_id='$TempID'") or die(mysqli_error($con));    
                                        
                                        if(mysqli_num_rows($Tempquery)){
                                            while($row=mysqli_fetch_array($Tempquery)){
                                                $temp_product_id = $row['product_id'];
                                                $Tempsql="INSERT INTO order_details(user_id,invoice_number,product_id)
                                                VALUES('$TempID','$invoice','$temp_product_id')";
                                                $Tempinsert = mysqli_query($con,$Tempsql);  
                                            }
                                        }
                                        if($insert && $Tempinsert){
                                        ?>
                                        <script>
                                            document.getElementById("AlertHeader").innerHTML = "Form Uploaded Successfully";
                                            document.getElementById("AlertHeader").classList.add("text-success");
                                            $("#ProceedButton").attr("href", "./payment.php");
                                            $(document).ready(function(){
                                            $('#ALertModal').modal('show');
                                            });
                                           </script>                        
                                        <?php
                                        }
                                        else
                                        {
                                ?>
                                                <script>
                                                    document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                                                    document.getElementById("AlertHeader").classList.add("text-danger");
                                                    $("#ProceedButton").attr("href", "./checkout.php");
                                                    $(document).ready(function(){
                                                        $('#ALertModal').modal('show');
                                                    });
                                                </script>      
                                <?php
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
                    </div>

                    <div class="col-xl-6 mb-5">
                        <div class="mb-3 mt-3 p-3 shadow">
                            <h4 class="heading font-weight-bold mt-3 mx-3">Order Details</h4>
                            <div class="card-body">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="text-black">
                                            <th scope="col">Product Image</th>
                                            <th></th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Amount</th>
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
                                        $i=1;
                                        $sub_total=0;

                                            if(mysqli_num_rows($query)){
                                            while($row=mysqli_fetch_array($query)){
                                            $sub_total = $GrandTotal = $_GET['GrandTotal']; 
                                            ?>

                                        <tr>
                                            <td><img src="<?php echo $row['image_loc']; ?>" height="100"></td>
                                            <td></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td> ₹ <?php echo $row['amount']; ?> * <?php echo $row['quantity']; ?></td>
                                        </tr>

                                        <?php
                                            $i++;
                                            }
                                        }

                                        $total_amount = 0;                                        

                                        $ApplicableGST = 18;

                                        $GST = ($sub_total * $ApplicableGST) / 100;                                        
                                        $CGST = ($sub_total * ($ApplicableGST/2)) / 100;
                                        $SGST = ($sub_total * ($ApplicableGST/2)) / 100;
                                        $total_amount = $sub_total + $CGST + $SGST;
                                        ?>
                                        </tr>

                                        <tr>
                                            <td class="font-weight-bold">Subtotal</td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold" style="text-align:right;">
                                                ₹<?php echo $sub_total ?>.00</td>
                                            <input type="text" style="display:none" id="TempSubTotal"
                                                value="<?php echo $sub_total ?>" />
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">CGST</td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold" style="text-align:right;">
                                                ₹<?php echo $CGST ?>.00</td>
                                            <input type="text" style="display:none" id="TempCGST"
                                                value="<?php echo $CGST ?>" />
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">SGST</td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold" style="text-align:right;">
                                                ₹<?php echo $SGST ?>.00</td>
                                            <input type="text" style="display:none" id="TempSGST"
                                                value="<?php echo $SGST ?>" />
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Total (Rs)</td>
                                            <td></td>
                                            <td></td>
                                            <td class="font-weight-bold" style="text-align:right;">
                                                ₹<?php echo $total_amount ?>.00</td>
                                            <input type="text" style="display:none" id="TempTotalAmount"
                                                value="<?php echo $total_amount ?>" />
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php     
                                $i++;                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <?php include('./includes/footer.php') ?>

        <!-- bootstrap 4.3.1 js -->
        <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

        <!-- bootstrap 5.1.3 js -->
        <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

        <!-- custom js -->
        <script src="./assets/js/main.js"></script>
        <script src="./assets/js/checkout.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        document.getElementById("SubTotal").value = document.getElementById("TempSubTotal").value;
        document.getElementById("CGST").value = document.getElementById("TempCGST").value;
        document.getElementById("SGST").value = document.getElementById("TempSGST").value;
        document.getElementById("TotalAmount").value = document.getElementById("TempTotalAmount").value;
        document.getElementById("product_id").value = document.getElementById("Tempproductid").value;

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
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
    <title>Feedback - Proficiency Testing Services</title>
    <link rel="icon" href="./assets/images/cmti.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
<!-- n -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

</head>

<!-- start design here -->
<body id="body-pd">
    <?php include('./includes/navbar.php') ?>
    <?php include('./includes/sidebar.php') ?>

    <main>
        <!-- Page Heading -->
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
        
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl-12 mb-5">
                    <div class="card mb-1 mt-3 p-3 shadow h-100">
                        <h1 class="heading h3 mx-2 mt-3 mb-4">Feedback Form</h1>
                        <div class="col-12">
                            <form onsubmit="return validateform()" method="POST" enctype="multipart/form-data">
                                <?php
                                    $userid=$_SESSION['user_id'];
                                    $sql="SELECT * from user where user_id= '$userid' LIMIT 1";
                                    $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($query)){
                                        while($row=mysqli_fetch_array($query)){
                                ?>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="CustomerName" class="form-label">Customer/Participant Name:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="CustomerName"
                                                id="CustomerName" placeholder="Customer/Participant Name...."
                                                value="<?php echo $row['name']; ?>"
                                                onkeypress="clearvalidatecustomername()"
                                                onclick="clearvalidatecustomername()" />
                                            <span id="validatecustomername" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Address" class="form-label">Address:</label>
                                            <span class="text-danger">*</span>
                                            <input type="text" class="form-control" name="Address" id="Address"
                                                placeholder="Address...." onkeypress="clearvalidateaddress()"
                                                onclick="clearvalidateaddress()" />
                                            <span id="validateaddress" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="FeedbackPTSchemeNo" class="font-weight-bold">PT Round / Scheme
                                                No
                                                <span class="text-danger">*</span></label>
                                            <select class="custom-select d-block w-100" id="FeedbackPTSchemeNo"
                                                name="product_id" onchange="clearvalidatefeedbackptschemeno()"
                                                onclick="clearvalidatefeedbackptschemeno()">
                                                <option value="Null">Choose...</option>
                                                <?php
                                             $query = mysqli_query($con, "SELECT * FROM products") or die(mysqli_error($con));
                                             while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $row['product_id']; ?>">
                                                    <?php echo $row['product_id']; ?></option>
                                                <?php
                                            }
                                           ?>
                                            </select>
                                            <span id="validatefeedbackptschemeno" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="PTSchemeNameDescription" class="form-label">PT Scheme name /
                                                Description:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="PTSchemeNameDescription"
                                                id="PTSchemeNameDescription" placeholder="Name/Description...."
                                                onkeypress="clearvalidateptschemenamedescription()"
                                                onclick="clearvalidateptschemenamedescription()" />
                                            <span id="validateptschemenamedescription" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="PTitems" class="form-label">Handling of PT items (If
                                                any)</label>
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="PTitems" id="PTitems1"
                                                        onkeypress="clearRadioValidation('PTitems')"
                                                        onclick="clearRadioValidation('PTitems')" />
                                                    <label class="form-check-label" for="PTitems1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="PTitems" id="PTitems2"
                                                        onkeypress="clearRadioValidation('PTitems')"
                                                        onclick="clearRadioValidation('PTitems')" />
                                                    <label class="form-check-label" for="PTitems2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="PTitems" id="PTitems3"
                                                        onkeypress="clearRadioValidation('PTitems')"
                                                        onclick="clearRadioValidation('PTitems')" />
                                                    <label class="form-check-label" for="PTitems3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="PTitems" id="PTitems4"
                                                        onkeypress="clearRadioValidation('PTitems')"
                                                        onclick="clearRadioValidation('PTitems')" />
                                                    <label class="form-check-label" for="PTitems4">1</label>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validateptitems" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ClarityinProtocol" class="form-label">Clarity in Technical
                                                Protocol</label>

                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="ClarityinProtocol" id="ClarityinProtocol1"
                                                        onkeypress="clearRadioValidation('ClarityinProtocol')"
                                                        onclick="clearRadioValidation('ClarityinProtocol')" />
                                                    <label class="form-check-label" for="ClarityinProtocol1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="ClarityinProtocol" id="ClarityinProtocol2"
                                                        onkeypress="clearRadioValidation('ClarityinProtocol')"
                                                        onclick="clearRadioValidation('ClarityinProtocol')" />
                                                    <label class="form-check-label" for="ClarityinProtocol2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="ClarityinProtocol"
                                                        id="ClarityinProtocol3"
                                                        onkeypress="clearRadioValidation('ClarityinProtocol')"
                                                        onclick="clearRadioValidation('ClarityinProtocol')" />
                                                    <label class="form-check-label" for="ClarityinProtocol3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="ClarityinProtocol" id="ClarityinProtocol4"
                                                        onkeypress="clearRadioValidation('ClarityinProtocol')"
                                                        onclick="clearRadioValidation('ClarityinProtocol')" />
                                                    <label class="form-check-label" for="ClarityinProtocol4">1</label>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validateclarityinprotocol" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Confidentiality" class="form-label">Confidentiality of your
                                                information</label>

                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="Confidentiality" id="Confidentiality1"
                                                        onkeypress="clearRadioValidation('Confidentiality')"
                                                        onclick="clearRadioValidation('Confidentiality')" />
                                                    <label class="form-check-label" for="Confidentiality1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="Confidentiality" id="Confidentiality2"
                                                        onkeypress="clearRadioValidation('Confidentiality')"
                                                        onclick="clearRadioValidation('Confidentiality')" />
                                                    <label class="form-check-label" for="Confidentiality2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="Confidentiality"
                                                        id="Confidentiality3"
                                                        onkeypress="clearRadioValidation('Confidentiality')"
                                                        onclick="clearRadioValidation('Confidentiality')" />
                                                    <label class="form-check-label" for="Confidentiality3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="Confidentiality" id="Confidentiality4"
                                                        onkeypress="clearRadioValidation('Confidentiality')"
                                                        onclick="clearRadioValidation('Confidentiality')" />
                                                    <label class="form-check-label" for="Confidentiality4">1</label>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validateconfidentiality" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ClarityofPTRound" class="form-label">Clarity in announcement of
                                                PT round</label>

                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="ClarityofPTRound" id="ClarityofPTRound1"
                                                        onkeypress="clearRadioValidation('ClarityofPTRound')"
                                                        onclick="clearRadioValidation('ClarityofPTRound')" />
                                                    <label class="form-check-label" for="ClarityofPTRound1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="ClarityofPTRound" id="ClarityofPTRound2"
                                                        onkeypress="clearRadioValidation('ClarityofPTRound')"
                                                        onclick="clearRadioValidation('ClarityofPTRound')" />
                                                    <label class="form-check-label" for="ClarityofPTRound2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="ClarityofPTRound"
                                                        id="ClarityofPTRound3"
                                                        onkeypress="clearRadioValidation('ClarityofPTRound')"
                                                        onclick="clearRadioValidation('ClarityofPTRound')" />
                                                    <label class="form-check-label" for="ClarityofPTRound3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="ClarityofPTRound" id="ClarityofPTRound4"
                                                        onkeypress="clearRadioValidation('ClarityofPTRound')"
                                                        onclick="clearRadioValidation('ClarityofPTRound')" />
                                                    <label class="form-check-label" for="ClarityofPTRound4">1</label>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validateclarityofptround" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="ScheduleInGeneral" class="form-label">Adherence to Schedule in
                                                general</label>

                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="ScheduleInGeneral" id="ScheduleInGeneral1"
                                                        onkeypress="clearRadioValidation('ScheduleInGeneral')"
                                                        onclick="clearRadioValidation('ScheduleInGeneral')" />
                                                    <label class="form-check-label" for="ScheduleInGeneral1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="ScheduleInGeneral" id="ScheduleInGeneral2"
                                                        onkeypress="clearRadioValidation('ScheduleInGeneral')"
                                                        onclick="clearRadioValidation('ScheduleInGeneral')" />
                                                    <label class="form-check-label" for="ScheduleInGeneral2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="ScheduleInGeneral"
                                                        id="ScheduleInGeneral3"
                                                        onkeypress="clearRadioValidation('ScheduleInGeneral')"
                                                        onclick="clearRadioValidation('ScheduleInGeneral')" />
                                                    <label class="form-check-label" for="ScheduleInGeneral3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="ScheduleInGeneral" id="ScheduleInGeneral4"
                                                        onkeypress="clearRadioValidation('ScheduleInGeneral')"
                                                        onclick="clearRadioValidation('ScheduleInGeneral')" />
                                                    <label class="form-check-label" for="ScheduleInGeneral4">1</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validatescheduleingeneral" class="text-danger"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="SupportOnQueries" class="form-label">Support on your
                                                queries</label>

                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="SupportOnQueries" id="SupportOnQueries1"
                                                        onkeypress="clearRadioValidation('SupportOnQueries')"
                                                        onclick="clearRadioValidation('SupportOnQueries')" />
                                                    <label class="form-check-label" for="SupportOnQueries1">4</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="SupportOnQueries" id="SupportOnQueries2"
                                                        onkeypress="clearRadioValidation('SupportOnQueries')"
                                                        onclick="clearRadioValidation('SupportOnQueries')" />
                                                    <label class="form-check-label" for="SupportOnQueries2">3</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="SupportOnQueries"
                                                        id="SupportOnQueries3"
                                                        onkeypress="clearRadioValidation('SupportOnQueries')"
                                                        onclick="clearRadioValidation('SupportOnQueries')" />
                                                    <label class="form-check-label" for="SupportOnQueries3">2</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="SupportOnQueries" id="SupportOnQueries4"
                                                        onkeypress="clearRadioValidation('SupportOnQueries')"
                                                        onclick="clearRadioValidation('SupportOnQueries')" />
                                                    <label class="form-check-label" for="SupportOnQueries4">1</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validatesupportonqueries" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Commercialterm" class="form-label">Charges & Commercial
                                                Term</label>
                                            <div class="col">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Excellent"
                                                        name="Commercialterm" id="Commercialterm1"
                                                        onkeypress="clearRadioValidation('Commercialterm')"
                                                        onclick="clearRadioValidation('Commercialterm')" />
                                                    <label class="form-check-label" for="Commercialterm1">4</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Very Satisfactory"
                                                        name="Commercialterm" id="Commercialterm2"
                                                        onkeypress="clearRadioValidation('Commercialterm')"
                                                        onclick="clearRadioValidation('Commercialterm')" />
                                                    <label class="form-check-label" for="Commercialterm2">3</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        value="Satisfactory" name="Commercialterm"
                                                        id="Commercialterm3"
                                                        onkeypress="clearRadioValidation('Commercialterm')"
                                                        onclick="clearRadioValidation('Commercialterm')" />
                                                    <label class="form-check-label" for="Commercialterm3">2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" value="Dissatisfactory"
                                                        name="Commercialterm" id="Commercialterm4"
                                                        onkeypress="clearRadioValidation('Commercialterm')"
                                                        onclick="clearRadioValidation('Commercialterm')" />
                                                    <label class="form-check-label" for="Commercialterm4">1</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <p class="small">4-Excellent, 3-Very Satisfactory, 2-Satisfactory,
                                                    1-Dissatisfactory</p>
                                                <span id="validatecommercialterm" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }
                                    }
                                    ?>

                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-primary mb-4" type="submit"
                                                name="submit">Submit</button>
                                        </div>
                                    </div>
                            </form>
        <?php
                            
        if(isset($_POST['submit']))
        {
            $customername=mysqli_real_escape_string($con,$_POST['CustomerName']);
            $address=mysqli_real_escape_string($con,$_POST['Address']);
            $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
            $ptschemenamedescription=mysqli_real_escape_string($con,$_POST['PTSchemeNameDescription']);
            $ptitems=mysqli_real_escape_string($con,$_POST['PTitems']);
            $clarityinprotocol=mysqli_real_escape_string($con,$_POST['ClarityinProtocol']);
            $confidentiality=mysqli_real_escape_string($con,$_POST['Confidentiality']);
            $clarityofptround=mysqli_real_escape_string($con,$_POST['ClarityofPTRound']);
            $scheduleingeneral=mysqli_real_escape_string($con,$_POST['ScheduleInGeneral']);
            $supportonqueries=mysqli_real_escape_string($con,$_POST['SupportOnQueries']);
            $commercialterm=mysqli_real_escape_string($con,$_POST['Commercialterm']);

            $ID=$_SESSION['user_id'];
            $email=$_SESSION['email_id'];
            $email1 = "cmtiproficiencytesting@gmail.com";

            $sql = "INSERT INTO feedback(user_id,CustomerName, Address, product_id, PTSchemeNameDescription, PTitems, ClarityinProtocol, Confidentiality, ClarityofPTRound, ScheduleInGeneral, SupportOnQueries, Commercialterm)
            VALUES ('$ID','$customername', '$address', '$product_id', '$ptschemenamedescription', '$ptitems', '$clarityinprotocol', '$confidentiality', '$clarityofptround', '$scheduleingeneral', '$supportonqueries', '$commercialterm')";
            
            $con->query($sql) or die(mysqli_error($con));

            if(mysqli_query($con, $sql))
            {
                require_once '../assets/phpmailer/class.phpmailer.php';
                require '../assets/phpmailer/class.smtp.php';
                $mail = new PHPMailer(true);
                    
                $fullname= $customername;
                $EmailID = $email;                                
                $Email_Message = '<br><b> Hi '.$fullname.',</b><br> You have successfully submitted the feedback on CMTI Proficiency Testing Website.<br/><br/><br/> Regards, <br/>PTP Team, CMTI';                          
                $Email_Message1 = '<br><b> Hi ,</b><br><br> Kindly find the submitted feedback details from <b> '.$fullname.' and EmailId is '.$EmailID.'.</b> ';

            try {    
                $mail->IsSMTP();
                $mail->isHTML(true);
                $mail->SMTPDebug  = 0;
                $mail->Mailer = "smtp";
                $mail->SMTPAuth   = true;
                $mail->SMTPSecure = "tls";
                $mail->Host = "smtp.office365.com";
                $mail->Port = '587';
                $mail->AddAddress($EmailID);
                $mail->Username   ="donotreplyproficiencytesting@outlook.com";
                $mail->Password   ="replycmtiptp@2023";
                $mail->SetFrom('donotreplyproficiencytesting@outlook.com','CMTI PTP');
                $mail->AddReplyTo("cmti@cmti.res.in","CMTI PTP");
                $mail->Body    = $Email_Message;
                $mail->Subject = "CMTI PTP - User details";		              
    
                //------Admin Mail------//

                $ptpmail = new PHPMailer(true);
                $ptpmail->ClearAllRecipients();
                $ptpmail->ClearAttachments();
                $ptpmail->ClearAddresses();
                $ptpmail->ClearCCs();
                $ptpmail->ClearBCCs();
                $ptpmail->IsSMTP(); 
                $ptpmail->isHTML(true);
                $ptpmail->SMTPDebug  = 0;
                $ptpmail->Mailer = "smtp";
                $ptpmail->SMTPAuth   = true;                  
                $ptpmail->SMTPSecure = "tls";                 
                $ptpmail->Host       = "smtp.office365.com";      
                $ptpmail->Port        = '587';             
                $ptpmail->AddAddress($email1 );
                $ptpmail->Username   ="donotreplyproficiencytesting@outlook.com";
                $ptpmail->Password   ="replycmtiptp@2023";
                $ptpmail->SetFrom('donotreplyproficiencytesting@outlook.com','CMTI Drishti');
                $ptpmail->AddReplyTo("cmti@cmti.res.in","CMTI Drishti");
                $ptpmail->Body    = $Email_Message1;
                $ptpmail->Subject = "CMTI PTP - Feedback details";		              

                                                
                if(($ptpmail->Send()) && (!$mail->Send()) )
                {
                    ?>
                    <script>
                        document.getElementById("AlertHeader").innerHTML = "Something went wrong";
                        document.getElementById("AlertHeader").classList.add("text-danger");
                        $("#ProceedButton").attr("href", "./feedback.php");
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
                        document.getElementById("AlertHeader").innerHTML = "Feedback updated Successfully";
                        document.getElementById("AlertHeader").classList.add("text-success");
                        $("#ProceedButton").attr("href", "./feedback.php");
                        $(document).ready(function(){
                        $('#ALertModal').modal('show');
                        });
                    </script>
                <?php
                    }
                        }

                            catch(Exception $e)
                            {
                                $errorMessage = "Caught exception: " . $e->getMessage();                        
                                error_log($errorMessage . PHP_EOL, 3, "error_log.txt");
                            ?>
                            
                            <?php
                            }
                        }
                    }
                            
                            ?>

             </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- </div> -->
    </main>


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
    <script src="./assets/js/feedback.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
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
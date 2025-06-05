<?php
session_start();
include './includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Proficiency Testing Services</title>

    <!-- cmti logo on title -->
    <link rel="icon" href="./assets/images/CMTILogo.png" type="image/png" sizes="30x30">

    <!-- bootstrap 4.3.1 css -->
    <link rel="stylesheet" href="./assets/bootstrap-4.3.1/css/bootstrap.css">

    <!-- bootstrap 5.1.3 css -->
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3/css/bootstrap.css">

    <link rel="stylesheet" href="./assets/bootsrap-5.0.0/css/bootstrap.min.css">
    <script src="./assets/bootsrap-5.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- bootstrap 5.0.2 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/productstyle.css">

    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- font awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- jqeury scripts -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.min.js"></script>    
</head>

<body>

    <!-- start design here -->
    <?php include('./includes/header.php'); ?>
    <!-- <a id="back-to-top-button" href="#hero" style="text-decoration: none;"></a> -->
    <section id="hero">
        <div id="particles-js" class="overflow-hidden">
            <header>
                <div class="mt-5">
                    <div class="mt-5 text-center">
                        <h1 class="h1 p-1">CMTI PT Provider</h1>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <p class="text-white p-1">CMTI-PT provider is a part of CMTI, established with the aim
                                    to build up and maintain mutual confidence in the technical competence by offering
                                    proficiency testing services to the ISO/IEC 17025:2017 accredited calibration
                                    laboratories.
                                    We provide dependable and high-quality proficiency testing that adheres to the
                                    guidelines of the International Standard ISO/IEC 17043:2023. Our assessment of
                                    participants performance is conducted in accordance with the International Standard
                                    ISO 13528:2015, which employs statistical methods for interlaboratory comparison in
                                    proficiency testing.
                                </p>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </section>

    <section id="about" data-aos="fade-up" data-aos-delay="200">
        <div class="row g-0 p-5 position-relative">
            <h1 class="display-h4 text-dark ms-5 p-3 text-center"></h1>
            <div class="col-md-6 col-sm-12 text-center p-md-2">
                <a class="wplightbox" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="lightboxContainer">
                        <img src="./assets/images/side_image.jpg" alt="" class="w-100 h-100">
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-12 px-md-5 text-dark mt-md-3 mt-sm-4 px-sm-5 justify"
                style="vertical-align : middle;">
                <h5>ABOUT PROFICIENCY TESTING SERVICES</h5>
                <p><strong>Proficiency testing means evaluation of participant performance against pre-established criteria by
                    means of interlaboratory comparisons.</strong></p>
                <p><strong>Proficiency Testing is one of the important Quality Assurance tools to determine the technical
                    competence of the Testing and Calibration laboratories. It supplements laboratories own quality
                    control procedures by providing additional external audit. Good and comparable results build
                    confidence of staff and provide independent and objective evidence to the measurement capability and
                    quality assurance of the laboratory.</strong></p>
                <!-- <a href="#" class="btn">Know more</a> -->
            </div>
        </div>
    </section>

    <!-- about ends -->

    <!-- services starts -->

    <section id="services">
        <div class="">
            <div class="row mt-5 py-4">
                <div class="row text-center">
                    <h2 class="pt-3">Mechanical calibration - Quantitative PT schemes</h2>
                    <p class="pt-3 px-5">
                        This PT program is Quantitative & sequential PT scheme
                    </p>
                    <div class="row mt-2 mb-2">
                        <div class="col-12">
                            <a href="#"><button type="button"
                                    class="btn px-4 calibration-button">Calibration
                                    PT</button></a>
                            <button type="button" class="btn px-4 calibration-button">NABL Certificate and PT
                                scope</button>
                            <button type="button" class="btn px-4 calibration-button">PT Calender</button>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2 col-md-0 col-sm-0"></div>
                        <div class="col-lg-8 col-md-12 col-sm-12 row text-center ml-md-3 ml-4">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-3">
                                <div class="h-auto">
                                    <div class="pt-4 col-12">
                                        <h5><a class="">Calibration of Reference Masters</a></h5>
                                        <div class="row">
                                            <p class="card-text main-text text-center pt-3">Calibration of gauges
                                                includes setting Ring Gauges, Dial Gauges, Plug gauge, etc. and
                                                instruments include Verniers, Micrometers, Electronic Levels, etc.</p>
                                            <p class="card-text alternate-text text-center">Calibration of Reference
                                                Masters includes the calibration of Grade 'K' Gauge Blocks, Glass
                                                Hemisphere, Flick Standard, Master Cylinder, Optical Flat, Step Gauge,
                                                Roughness Masters, Master Sphere etc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-0 col-sm-0"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-xl">
        <div class="row text-center">
            <div class="col-md-12">
                <h2>Browse Products</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div id="multiCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#multiCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#multiCarousel" data-slide-to="1"></li>
                        <!-- <li data-target="#multiCarousel" data-slide-to="2"></li> -->
                        <!-- <li data-target="#multiCarousel" data-slide-to="3"></li> -->
                    </ol>

                    <div class="carousel-inner">
                        <?php
                    $query = mysqli_query($con, "SELECT * FROM products") or die(mysqli_error($con));
                    $num_rows = mysqli_num_rows($query);

                    if ($num_rows > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                            if ($i % 4 == 1) {
                                $active = ($i == 1) ? 'active' : '';
                                echo '<div class="carousel-item ' . $active . '"><div class="row">';
                            }
                    ?>
                        <div class="col-sm-3">
                            <div class="card d-flex flex-column align-items-center">
                                <img src="<?php echo str_replace("../", "./", $row['image_loc']); ?>" alt="card_image"
                                    class="card-img-top" style="width: 140px; object-fit: cover;">
                                <div class="card_body text-center">
                                    <h5 class="card-title mb-0" style="font-size: 14px;">
                                        <strong><?php echo $row['product_id']; ?></strong>
                                    </h5>
                                    <a href="./user/view_product.php?view_product_id=<?php echo $row['product_id']; ?>"
                                        class="link-dark">
                                        <h5 class="card-title" style="font-size: 14px;">
                                            <?php echo $row['product_name']; ?></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            if ($i % 4 == 0 || $i == $num_rows) {
                                echo '</div></div>';
                            }
                            $i++;
                        }
                    } else {
                        echo '<div class="carousel-item active"><div class="row"><div class="col text-center"><p>No products found</p></div></div></div>';
                    }
                    ?>
                    </div>
                    <a class="carousel-control-prev" href="#multiCarousel" role="button" data-slide="prev">
                        <span class="custom-carousel-icon">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    </a>
                    <a class="carousel-control-next" href="#multiCarousel" role="button" data-slide="next">
                        <span class="custom-carousel-icon">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- services ends -->

    <!-- contact starts -->

        <!-- Modal -->
    <section id="contact">
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
    

        <div class="container mt-5">
        <div class="cont-head mb-4">
            <h2 class="pt-3 text-center mb-3">CONTACT</h2>
        </div>
        <div class="cont-map my-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.0482297389535!2d77.53319981525104!3d13.03260071706196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae142984e5cddb%3A0x9ecd3a5ee583fb59!2sCentral%20Manufacturing%20Technology%20Institute!5e0!3m2!1sen!2sin!4v1678770048611!5m2!1sen!2sin"
                class="" width="100%" height="250px" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="cont-form mt-5 ">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-4 ">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="cont-address d-flex m-2">
                                <div class="cont-info">
                                    <h5 class="h5">Location:</h5>
                                    <p>Tumkur Rd, Near Peenya Metro Station, <br> Yeswanthpur,
                                        Bengaluru,<br> Karnataka 560022</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="cont-address d-flex m-2">
                                <div class="cont-info">
                                    <h5 class="h5">Email address:</h5>
                                    <p>cmti@cmti.res.in</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="cont-address d-flex m-2">
                                <div class="cont-info">
                                    <h5 class="h5">Phone:</h5>
                                    <p>08023370573</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <form onsubmit="return validateform()" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="UserName" class="form-label">Name
                                        <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="UserName" id="UserName"
                                        placeholder="Name" onkeypress="clearvalidateusername()"
                                        onclick="clearvalidateusername()" />
                                    <span id="validateusername" class="text-danger"></span>
                                </div>
                            </div>


                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="Email">Email address</label>
                                    <input type="email" class="form-control" name="Email" id="Email"
                                        placeholder="sample@example.com" onkeypress="clearvalidateemail()"
                                        onclick="clearvalidateemail()">
                                    <span id="validateemail" class="text-danger"></span>
                                </div>
                                
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="Subject">Subject</label>
                                    <input type="text" class="form-control" id="Subject" name="Subject"
                                        placeholder="Subject" onkeypress="clearvalidatesubject()"
                                        onclick="clearvalidatesubject()">
                                    <span id="validatesubject" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="Message">Message</label>
                                    <textarea class="form-control" placeholder="Leave a message here" id="Message"
                                        name="Message" onkeypress="clearvalidatemessage()"
                                        onclick="clearvalidatemessage()"></textarea>
                                    <span id="validatemessage" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-4 col-md-4"></div>
                            <div class="col-12 col-md-4">
                                <button class="btn success-button mb-5" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- insertion part -->
               
                        <?php
                        ini_set("display_errors", 0); 
                        date_default_timezone_set('Asia/Kolkata'); 
                        // ini_set('error_reporting', E_ALL);
                        ini_set('log_errors', 1);
                        ini_set('error_log', 'error_log.txt');
                        ini_set('error_reporting', E_WARNING | E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR);


                        try {
                            if(isset($_POST['submit'])) {
                                $username = mysqli_real_escape_string($con, $_POST['UserName']);
                                $email = mysqli_real_escape_string($con, $_POST['Email']);
                                $subject = mysqli_real_escape_string($con, $_POST['Subject']);
                                $message = mysqli_real_escape_string($con, $_POST['Message']);

                                // Construct the SQL query with all necessary fields
                                $sql = "INSERT INTO contact (UserName, Email, Subject, Message) VALUES ('$username', '$email', '$subject', '$message')";

                                $insert = mysqli_query($con, $sql);
                                if($insert) {
                                    ?>
                                    <script>
                                        document.getElementById("AlertHeader").innerHTML = "Inserted Successfully";
                                        document.getElementById("AlertHeader").classList.add("text-success");
                                        $("#ProceedButton").attr("href", "./index.php");
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
                                        $("#ProceedButton").attr("href", "./index.php");
                                        $(document).ready(function(){
                                        $('#ALertModal').modal('show');
                                        });
                                    </script>      
                                    <?php
                                }
                            }
                        } catch (Exception $e) {
                            // Catch any exceptions thrown
                            $errorMessage = "Caught exception: " . $e->getMessage();                        
                            error_log($errorMessage . PHP_EOL, 3, "error_log.txt");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact ends -->

    <script>
    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
    </script>
    <?php include('./includes/footer.php'); ?>
    <!-- end design here -->

    <!-- bootstrap 4.3.1 js -->
    <script src="./assets/bootstrap-4.3.1/js/bootstrap.js"></script>

    <!-- bootstrap 5.1.3 js -->
    <script src="./assets/bootstrap-5.1.3/js/bootstrap.js"></script>

    <!-- custom js -->
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/contact.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="./assets/js/particle.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>

    <script>
    AOS.init();
    </script>

    <script>
    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
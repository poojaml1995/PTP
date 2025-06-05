<?php 
// Load the database configuration file 
include '../includes/connection.php';
 
// Fetch records from database 
$query=mysqli_query($con,"SELECT * from feedback") or die(mysqli_error($con));
    
    if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "orders-data_" . date('d-m-Y') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Feedback ID', 'User ID', 'Customer Name', 'Address', 'PT Scheme Number','PT Scheme Name / Description','PT items','Clarity in Protocol','Confidentiality','Clarity of PTRound','Schedule in General','Support on Queries','Commercial term');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
    $lineData = array($row['FeedbackID'], $row['user_id'], $row['CustomerName'], $row['Address'], $row['product_id'], $row['PTSchemeNameDescription'], $row['PTitems'], $row['ClarityinProtocol'], $row['Confidentiality'], $row['ClarityofPTRound'], $row['ScheduleInGeneral'], $row['SupportOnQueries'], $row['Commercialterm']);
    fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
    }
    exit;

    ?>
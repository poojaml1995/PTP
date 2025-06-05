<?php 
// Load the database configuration file 
include '../includes/connection.php';
 
// Fetch records from database 
$query=mysqli_query($con,"SELECT * from products") or die(mysqli_error($con));
    
    if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "exportproductdetails_" . date('d-m-Y') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('PT Round/Scheme No', 'Product Name', 'Amount', 'PT Item', 'Parameter', 'Participation Criteria', 'Note', 'Regestration', 'Quantity');
    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
    $lineData = array($row['product_id'], $row['product_name'], $row['amount'], $row['pt_item'], $row['parameter'], $row['participation_criteria'], $row['note'], $row['registration'], $row['quantity']);
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
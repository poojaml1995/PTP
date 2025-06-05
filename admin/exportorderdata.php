<?php 
// Load the database configuration file 
include '../includes/connection.php';
 
// Fetch records from database 
$query = $con->query("SELECT DISTINCT O.invoice_number, P.product_id, P.product_name,
P.participation_criteria, P.product_details, T.quantity, C.TotalAmount, C.DateTime,
C.status, C.FirstName, C.LastName, C.GSTNumber, C.NameOfTheLaboratory, U.LaboratoryCode
FROM order_details O
LEFT JOIN products P on P.product_id=O.product_id
LEFT JOIN tempcart T on T.user_id=O.user_id and T.product_id=O.product_id
LEFT JOIN upload_details U on U.user_id=O.user_id and U.product_id=O.product_id
JOIN checkout C on C.user_id=O.user_id and C.invoice_number=O.invoice_number") or die($con->error);



    if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "orders-data_" . date('d-m-Y') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Product ID', 'Product', 'Lab name', 'Lab code', 'GST No', 'Name', 'Amount', 'Invoice Number', 'Status');
    fputcsv($f, $fields, $delimiter);
    // Output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == 'ORDERED') ? 'Active' : 'Inactive';
        $lineData = array($row['product_id'], $row['product_name'], $row['NameOfTheLaboratory'], $row['LaboratoryCode'], $row['GSTNumber'], $row['FirstName'] . ' ' . $row['LastName'], $row['TotalAmount'], $row['invoice_number'], $row['status']);
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
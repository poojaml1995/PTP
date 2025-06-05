<?php 
 
// Load the database configuration file 
// include_once 'dbConfig.php'; 
include '../includes/connection.php';
 
// Fetch records from database 
// $query = $db->query("SELECT * FROM user ORDER BY id ASC"); 
$query=mysqli_query($con,"SELECT DISTINCT u.product_id, u.LaboratoryName, u.LaboratoryCode, 
c.FirstName, c.LastName, c.StreetAddress1, c.Town, c.State, c.Phone, c.Email,
c.MeasurementForPTItem, c.CMCParameter, c.StandardMeasurements, c.SpecificRequirements,
c.DisplayFinalPTReport, c.GSTNumber, c.AccreditationLaboratory, c.status
FROM order_details o
LEFT JOIN upload_details u ON u.user_id = o.user_id AND u.product_id = o.product_id
LEFT JOIN checkout c ON c.user_id = o.user_id AND c.invoice_number = o.invoice_number") or die(mysqli_error($con));
// $query = $con->query("SELECT user.*,checkout.* from user, checkout where
//                                         user.user_id=checkout.CheckoutID ORDER BY id ASC");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "users-data_" . date('d-m-Y') . ".csv";
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 

$fields = array('PT Round / Scheme no', 'Lab Name', 'Lab Code', 'Name', 'Address', 'City','State',
'Contact', 'Email', 'Measurement For PT Item', 'CMC Parameter', 'Standard Measurements',
'Specific Requirements', 'Display Final PT Report', 'GST Number', 'Accreditation Laboratory');
fputcsv($f, $fields, $delimiter);

// Output each row of the data, format line as csv and write to file pointer
while($row = $query->fetch_assoc()){
$status = ($row['status'] == 1)?'Active':'Inactive';
$lineData = array($row['product_id'], $row['LaboratoryName'], $row['LaboratoryCode'],
$row['FirstName'].' '.$row['LastName'], $row['StreetAddress1'], $row['Town'], $row['State'],$row['Phone'],  
$row['Email'], $row['MeasurementForPTItem'], $row['CMCParameter'], $row['StandardMeasurements'],
$row['SpecificRequirements'], $row['DisplayFinalPTReport'], $row['GSTNumber'], $row['AccreditationLaboratory']);
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
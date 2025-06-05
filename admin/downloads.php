<?php
// Include your database connection code here
include '../includes/connection.php';

// Assuming you have an ID or some identifier for the specific file you want to retrieve
$FileLocation = $_GET['FileLocation']; // You should validate and sanitize this input

if (!isset($FileLocation) || empty($FileLocation)) {
    // Handle the case where file location is not provided
    echo "File location is missing.";
    exit;
}

// Check if the file exists
if (file_exists($FileLocation)) {
    // Set the appropriate content type for PDF
    header('Content-Type: application/pdf');

    // Optionally, you can set headers for file download
    // header('Content-Disposition: attachment; filename="file.pdf"'); // Uncomment this line to force download

    // Read the file and output its contents
    readfile($FileLocation);
} else {
    // File not found or some other error handling
    echo "File not found.";
}
?>
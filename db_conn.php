<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your phpMyAdmin password (if you have one)
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $onn->connect_error);
}
if(isset($_POST['submit'])){

    $client_name = $_POST['client_name'];
    $contact_info = $_POST['contact_info'];
    $received_date = $_POST['received_date'];
    $inventory_received = $_POST['inventory_received'];
    $report_issues = $_POST['report_issues'];
    $client_notes = $_POST['client_notes'];
    $assigned_technician = $_POST['assigned_technician'];
    $estimated_amount = $_POST['estimated_amount'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];
     // Handling file upload
     if ($_FILES['inventory_file']['name']) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["inventory_file"]["name"]);
        move_uploaded_file($_FILES["inventory_file"]["tmp_name"], $target_file);
    } else {
        $target_file = null;
    }

    // SQL query to insert data into the table
    $sql   = "INSERT INTO 'mydt'('client_name','contact_info','received_date','inventory_received','inventory_file','report_issues','client_notes','assigned_technician','estimated_amount','deadline','status')
            VALUES ('$client_name', '$contact_info', '$received_date', '$inventory_received', '$target_file', '$report_issues', '$client_notes', '$assigned_technician',  '$estimated_amount','$deadline','$status')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New job sheet record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>



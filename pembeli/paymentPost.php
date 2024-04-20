<?php
// Include your database connection and other necessary files
require_once "../koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

var_dump($id);
    // Process the uploaded file (bukti_bayar) if available
    if (isset($_FILES['bukti_bayar']) && $_FILES['bukti_bayar']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "uploads/"; // Set the directory where you want to save the uploaded files
        $targetFile = $targetDir . basename($_FILES['bukti_bayar']['name']);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Generate a unique file name to avoid conflicts
        $uniqueFileName = uniqid() . '.' . $fileType;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['bukti_bayar']['tmp_name'], $targetDir . $uniqueFileName)) {
            // File upload success, update the database with the file name
            // Modify the following SQL query based on your database structure
            $updateSql = "UPDATE transaksi SET approve = 1 ,bukti_bayar = '$uniqueFileName' WHERE id = '$id'";
            
            // Execute the update query
            // $conn is your database connection object
            if (mysqli_query($conn, $updateSql)) {
                echo "Payment data updated successfully!";
				header("Location: Transaction.php");
                exit();
            } else {
                echo "Error updating payment data: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        // File upload not 
    }
}
?>

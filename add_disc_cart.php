<?php 
include 'header.php';

$dateStamp = date('Y-m-d H:i:s');
$sql = "INSERT INTO shopping_cart (date_added, item_name, quantity, cost)
VALUES ('$dateStamp', 'Senior/Student Ticket', 1, 12.00)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /boxoffice/box_office.php"); 

?>
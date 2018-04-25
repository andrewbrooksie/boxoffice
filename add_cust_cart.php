<?php 
include 'header.php';
$dateStamp = date('Y-m-d H:i:s');
if ( isset( $_POST['amount'] ) && !empty( $_POST['amount'] ) ){
    // echo "YAY!";
    $amount = $_POST['amount'];
  } else {
    $amount = 0;
  }

$sql = "INSERT INTO shopping_cart (date_added, item_name, quantity, cost)
VALUES ('$dateStamp', 'Custom Charge', 1, '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /boxoffice/box_office.php"); 

?>
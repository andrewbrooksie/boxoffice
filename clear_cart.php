<?php include 'header.php';
      
$query = "TRUNCATE TABLE shopping_cart";
$result = $conn->query($query);

header("Location: /boxoffice/box_office.php"); 

?>    
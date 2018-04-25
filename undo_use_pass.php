<?php 
include 'header.php';
// echo $_GET['pass_id'];
// print_r($_GET);
$dateStamp = date('Y-m-d H:i:s');
$newBalance = $_GET['balance'] + 1;
$sql = "UPDATE season_passes
SET balance = '$newBalance'
WHERE id = '{$_GET['pass_id']}';";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: /boxoffice/box_office.php"); 

?>
<?php 
include 'header.php';
$session_id  = random_str(32);
session_start();
$_SESSION['cart_session'] = $session_id;
 $sql = "INSERT INTO session_archive
 SELECT s.*, '$session_id'
 FROM current_session s;";


 if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

 
 $conn->close();

 header("Location: /boxoffice/sales.php?closed=true");
 
 function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

?>


<?php include 'footer.php' ?>
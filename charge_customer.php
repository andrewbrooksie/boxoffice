<?php include 'header.php';   
    // include "box_office.php";
    session_start();
    $cartTotal = $_SESSION['cart_total'];
    $cartItemList = '';

    $quantity = $_SESSION['quantity'];

    foreach($_SESSION['cart_items'] as $cartItem){
        $cartItemList .= "{$cartItem['item_name']} x{$cartItem['quantity']} ";
    }

    $dateStamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO current_session (date_added, item_name, total)
    VALUES ('$dateStamp', '$cartItemList', '$cartTotal')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        
    $query = "TRUNCATE TABLE shopping_cart";
    $result = $conn->query($query);

    $conn->close();

    header("Location: /boxoffice/box_office.php?charge=successful?quantity=$quantity"); 
?>
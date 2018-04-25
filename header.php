<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "boxoffice_test";

$dateStamp = date('Y-m-d H:i:s');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$boxOfficeOpen = false;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Box Office</title>
  </head>
  <body>
    
<!-- NAV BAR START -->
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand" href="/boxoffice/index.php">Box Office v1.0</a>
      <form class="form-inline">
        <?php 
        if($boxOfficeOpen){
            echo '<a class="btn btn-danger my-2 my-sm-0" href="/boxoffice/close_box_office.php">Close Box Office</a>';        
        } else {
            echo '<a class="btn btn-primary my-2 my-sm-0" href="/boxoffice/box_office.php">Open Box Office</a>';        
        }?>
      </form>
    </nav>
<!-- NAV BAR END -->
    
<!--  NAV LINKS    -->
    <p></p>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="/boxoffice/sales.php">Current Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/boxoffice/session_history.php">Accounting</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="/boxoffice/sales.php">Reservation List</a>
      </li> -->
    </ul>
    <hr>
<!--  NAV LINKS    -->
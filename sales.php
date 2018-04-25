<?php include 'header.php' ?>    
<div class="container">
  <h2>Current Sales</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date/Time</th>
        <th>Items</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM current_session";
            $result = $conn->query($query);
            while($row = $result->fetch_array()){
                echo '<tr><td>'.$row['date_added'].'</td>'.'<td>'.$row['item_name'].'</td>'.'<td>'."$".$row['total'].".00".'</td></tr>';
            }   
        ?>
    </tbody>
  </table>
  <?php
      if ( isset( $_GET['closed'] ) && !empty( $_GET['closed'] ) ){
        $query = "TRUNCATE TABLE current_session";
        $result = $conn->query($query);
        $query = "TRUNCATE TABLE shopping_cart";
        $result = $conn->query($query);
        session_start();
        
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Box office has been closed and the sales data has been archived for accounting.<br>Session ID: '.$_SESSION['cart_session'].'<br><hr><a class="btn btn-primary" href="/boxoffice/box_office.php" role="button">Start new box office session</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
        }
        ?>
       </div>

<?php include 'footer.php' ?>

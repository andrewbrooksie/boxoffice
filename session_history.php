<?php include 'header.php' ?>    
<div class="container">
  <h2>Past Session Data</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date/Time</th>
        <th>Items</th>
        <th>Total</th>
        <th>Session ID</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $query = "SELECT * FROM session_archive";
            $result = $conn->query($query);
            while($row = $result->fetch_array()){
                echo '<tr><td>'.$row['date_added'].'</td>'.'<td>'.$row['item_name'].'</td>'.'<td>'."$".$row['total'].".00".'</td>'.'<td>'.$row['session_id'].'</td></tr>';
            }   
        ?>
    </tbody>
  </table>
       </div>

<?php include 'footer.php' ?>

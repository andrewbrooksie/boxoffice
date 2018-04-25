<?php
include 'header_box_office.php';
?>    
     <div class="container">
      <div class="alert alert-success" role="alert">
        Box office is open.
      </div> 
      
      <?php
      if ( isset( $_GET['charge'] ) && !empty( $_GET['charge'] ) ){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Customer successfully charged<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
        }
        ?>
      
      Total Sales:   
      <?php 
          $query = "SELECT * ,COUNT(*) FROM current_session GROUP BY item_name";
          $result = $conn->query($query);
          $totalSales = 0;
          while($row = $result->fetch_array()){
            $totalSales = $totalSales + $row['COUNT(*)'];
          }
          echo  '<span class="badge badge-success">'.$totalSales.'</span>';
        ?>   
       
      <!-- <button type="button" class="btn btn-warning btn-sm">Undo Last Sale</button>
      <form action="test.php" method="post" class="form-inline">
        <input type="submit" value="Test" class="btn btn-warning btn-sm">
      </form> -->
      <hr>    
      
      
      <div class="row">
      <div class="col-sm-4">
<!-- CART - START -->
<hr>
<h2>
        Cart:
      </h2>

      <hr>

      <ul class="list-group">
        <?php
          $query = "SELECT * ,COUNT(*)FROM shopping_cart GROUP BY item_name";
          $result = $conn->query($query);
          $cartItems = array();
          while($row = $result->fetch_array()){
            $cartItems[] = ['item_name' => $row['item_name'],'quantity' => $row['COUNT(*)']];
            echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.
              $row['item_name'].'<span class="badge badge-primary badge-pill">'.$row['COUNT(*)'].'</span></li>';
          }
          session_start();
          $_SESSION['cart_items'] = $cartItems;
        ?>
      </ul>
      
      <br>

      <h4>Total: 
        <?php 
          $query = "SELECT * ,COUNT(*) FROM shopping_cart GROUP BY item_name, cost";
          $result = $conn->query($query);
          $total = 0;
          $quantity = 0;          
          while($row = $result->fetch_array()){
            $total = $total + ($row['COUNT(*)'] * $row['cost']);
            $quantity = $quantity + $row['COUNT(*)'];
          }
          $_SESSION['cart_total'] = $total;
          $_SESSION['quantity'] = $quantity;
          echo '$'.$total.'.00 USD';
        ?>
      </h4>

      <form action="clear_cart.php" method="get">
        <?php
        if($total > 0 || count($cartItems) >0 ){
          echo '<input type="submit" value="Clear Cart" class="btn btn-danger btn-lg btn-block">';
        } else {
          echo '<input type="submit" value="Clear Cart" class="btn btn-danger btn-lg btn-block" disabled>';
        }
        ?>
      </form>
      <br>
      <form action="charge_customer.php" method="post">
        <?php
        if($total > 0 || count($cartItems) >0 ){
          echo '<input type="submit" value="Charge Customer" class="btn btn-success btn-lg btn-block">';
        } else {
          echo '<input type="submit" value="Charge Customer" class="btn btn-success btn-lg btn-block" disabled>';
        }
        ?>
      </form>
        <!-- <a class="btn btn-success btn-lg btn-block" href="intent:#Intent;action=com.squareup.pos.action.CHARGE;package=com.squareup;S.browser_fallback_url=https://boxofficephp.glitch.me/index.html;S.com.squareup.pos.WEB_CALLBACK_URI=https://boxofficephp.glitch.me/index.html;S.com.squareup.pos.CLIENT_ID=sq0idp-5GSYF0--M_CHi1rWJrR4-Q;S.com.squareup.pos.API_VERSION=v2.0;i.com.squareup.pos.TOTAL_AMOUNT=100;S.com.squareup.pos.CURRENCY_CODE=USD;S.com.squareup.pos.TENDER_TYPES=com.squareup.pos.TENDER_CARD,com.squareup.pos.TENDER_CARD_ON_FILE,com.squareup.pos.TENDER_CASH,com.squareup.pos.TENDER_OTHER;end">Charge Customer</a>              </form> -->

      <!-- CART - END -->

      </div>
        
  <div class="col-sm-8">
      <hr>

      <h2>
        Products:
      </h2>
      <hr>
        <form action="add_stnd_cart.php" method="post">
          <input type="submit" value="Standard Ticket" class="btn btn-primary btn-lg btn-block">
        </form>
        <br>
        <form action="add_disc_cart.php" method="post">
          <input type="submit" value="Senior/Student Ticket" class="btn btn-primary btn-lg btn-block">
        </form>
      <hr>
      <h2>
        Custom Amount:
      </h2>
      <hr> 
      <form method="post" action="add_cust_cart.php">
        <div class="form-row align-items-center">
            <label class="sr-only" for="inlineFormInputGroup">amount</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">$</div>
              </div>
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="USD" name="amount">
          </div>
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add To Cart"></a>
        </div>
      </form>
      <hr>
      
      <h2>
        Season Passes:
      </h2>
      <p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Balance</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
                $query = "SELECT * FROM season_passes";
                $result = $conn->query($query);
                while($row = $result->fetch_array()){
                    $passholder_id = $row['id'];
                    echo '<tr>'.'<td>'.$row['first_name'].'</td>'.'<td>'.$row['last_name'].'</td>'.'<td>'.$row['balance'].'</td>'.'<td>'.
                    '<form method="get" action="use_pass.php"> 
                    <input type="hidden" name="pass_id" value="'.$row['id'].'"></input>
                    <input type="hidden" name="balance" value="'.$row['balance'].'"></input>
                    <input type="submit" class="btn btn-success btn-sm btn-block" value="Use Pass"></input>
                  </form> '.'<form method="get" action="undo_use_pass.php"> 
                  <input type="hidden" name="pass_id" value="'.$row['id'].'"></input>
                  <input type="hidden" name="balance" value="'.$row['balance'].'"></input>
                  <input type="submit" class="btn btn-warning btn-sm btn-block" value="Undo"></input> </td>
                </form> '
                  .'</tr>';
                } 
              ?>
        </tbody>
      </table> 
      <hr>
        </div>
      
        </div>
    </div>
    
    
    <?php include 'footer.php' ?>

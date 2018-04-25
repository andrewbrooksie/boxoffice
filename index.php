<?php include 'header.php' ?>

      <?php
      if ( isset( $_GET['closed'] ) && !empty( $_GET['closed'] ) ){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Box office has been closed and the sales data has been archived for accounting.<br><br><a class="btn btn-primary" href="/boxoffice/box_office.php" role="button">Start new box office session</a><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>';
        }
        ?>
<?php include 'footer.php' ?>
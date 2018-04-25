
<?php include 'header.php' ?>    
                
<!-- BOX OFFICE FORM -->
    
     <div class="container">
       <h2>
          Enter starter cash amount:
        </h2>
        <hr>    
       <form>
          <div class="form-row align-items-center">

            <div class="col-auto">
              <label class="sr-only" for="inlineFormInputGroup">Username</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">$</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="USD">
              </div>
            </div>

            <div class="col-auto">
<!--        <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
            <a class="btn btn-primary mb-2" href="/boxoffice/box_office.php">Submit</a>
            </div>
          </div>
        </form>
    </div>
<!-- BOX OFFICE FORM -->

<?php include 'footer.php' ?>

<div class="page-content-wrapper">
    <div class="page-content">
      
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url('dashboard');?>">Dashboard</a>
          </li>
        </ul>

      </div>
      <h3 class="page-title">
      Dashboard <small>reports &amp; statistics</small>
      </h3>
      <!-- END PAGE HEADER-->


       <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Authorize Payment Integration
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                       <h3>Customer Information</h3>
  <?php 
  if(isset($result) && !empty($result)){
  ?>
    <p style="color: red"><?= $result['message']; ?></p>
  <?php
  }
   ?>

        <p>
            <form method="post" action="<?php echo base_url().'authorize/pushPayment';?>">
                
              <?php 
                if(!empty($item) && !empty($id)){
                  ?>
                    <input type="hidden" value="<?= $item; ?>" name="item">
                    <input type="hidden" value="<?= $id; ?>" name="id">
                  <?php
                }

               ?>

              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="Barry"  >
              </div>    
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="Prima"  >
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="St Regist Nusa Dua Bali"  >
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="Denpasar"  >
              </div>

              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="Bali"  >
              </div>

              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="Indonesia"  >
              </div>

              <div class="form-group">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter zip code" value="54322"  >
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="(022)456612"  >
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="batikkode@gmail.com">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>

              <h3>Credit Card Information</h3>  
              <div class="form-group">
                <label for="cnumber">Card Number</label>
                <input type="text" class="form-control" id="cnumber" name="cnumber" placeholder="Enter Card Number" value="4111111111111111"  >
              </div>
              <div class="form-group">
                <label for="cexpdate">Expiration Date</label>
                <input type="text" class="form-control" id="cexpdate" name="cexpdate" placeholder="Enter Expiration Date" value="1226"  >
              </div>
              <div class="form-group">
                <label for="cexpdate">Expiration Date</label>
                <input type="text" class="form-control" id="cexpdate" name="cexpdate" placeholder="Enter Expiration Date" value="1226"  >
              </div>
              <div class="form-group">
                <label for="ccode">Card Code</label>
                <input type="text" class="form-control" id="ccode" name="ccode" placeholder="Enter Card Code" value="123"  >
              </div>
              <div class="form-group">
                <label for="cdesc">Description</label>
                <input type="text" class="form-control" id="cdesc" name="cdesc" placeholder="Enter Description" value="Test payment gateway"  >
              </div>

  
              <?php 
                if(!empty($price)){
                  ?>
                  <input type="hidden" class="form-control" id="camount" name="camount" placeholder="Enter Amount" value="<?= intval($price); ?>"  >
        <?php }else{
?>
      <div class="form-group">
                <label for="camount">Amount</label>
                <input type="text" class="form-control" id="camount" name="camount" placeholder="Enter Amount" value="35.6"  >
              </div>


<?php
        } ?>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            

            </div></div>
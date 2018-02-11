<?php $this->load->view('partial/header');?>


<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Church Finance Gathering</li>
        </ol>

        <!-- Script to hide and show church income details -->
          <script type="text/javascript">
          function showChurchOffering(){
            var div = document.getElementById('churchIncome');
            if (div.style.display === none) {
              div.style.display
            }else{
              
            }
          }
          </script>
        <!-- end of script hidding and showing church income -->
        <div class="row">
         <div class="card mb-12" id="churchIncome" style="margin-bottom: 15px; display: none">
           <div class="card-header"> Church Details / Graph</div>
           <div class="card-body">
             <table id="classTable" class="table table-bordered">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td>CLN</td>
                  <td>Last Updated Date</td>
                  <td>Class Name</td>
                  <td># Tests</td>
                  <td>Test Coverage (Instruction)</td>
                  <td>Test Coverage (Complexity)</td>
                  <td>Complex Covered</td>
                  <td>Complex Total</td>
                  <td>Category</td>
                </tr>
              </tbody>
            </table>
           </div>
         </div>
        </div>
        <!-- End of row to hide and show income details -->
        <div class="row">
          <?php if ($this->session->userdata('offeringSaved')): ?>
              <div class="alert alert-success col-lg-12" style="margin: 2% 0% 0% 2%">
                <?php echo $this->session->userdata('offeringSaved');?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
          <?php endif;?>

          <?php if ($this->session->userdata('tithSaved')): ?>
              <div class="alert alert-success col-lg-6" style="margin: 2% 0% 0% 27%">
                <?php echo $this->session->userdata('tithSaved');?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
          <?php endif;?>

          <?php if ($this->session->userdata('freeDonations')): ?>
              <div class="alert alert-success col-lg-6" style="margin: 2% 0% 0% 27%">
                <?php echo $this->session->userdata('freeDonations');?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
          <?php endif;?>
          <br>

          <div class="bg-success card mb-3" style="margin-left: 3%; color: #fff">
              <div class="card-header">
                <i class="fa fa-user"></i>
                General Church Offerings
                <span></span>&nbsp;&nbsp;&nbsp;
                <button style="cursor: pointer" class="btn btn-default" onclick="showChurchOffering()">View Details</button>
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url('index.php/finance/saveOfferings');?>">
                  <div class="form-group">
                    <label class="control-label">Amount</label>
                    <input type="number" name="amount" placeholder="Example: 2000000" required="required" class="form-control col-lg-12" style="padding: 3% 0%">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Type of Offering</label>
                    <select class="form-control" name="offeringType" required="required" style="padding: 0% 0%">
                      <option selected="selected"></option>
                      <option value="Church Offering">Church Offering</option>
                      <option value="Communion Offering">Communion Offering</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-danger btn-block" value="Save Today's Offerings">
                  </div>
                  <h5>Last Sunday Offering <span class="fa fa-hand-o-right"></span></h5>
                  <h3>Rules for Submittion</h3>
                  <ul>
                    <li> Make sure the is <strong class="text-danger">no space</strong><br> between the figures. <strong>E.g 200 000</strong></li>
                    <li>Make Sure you dont add the currency <br>at the end of the figure. <strong>E.g 200 0000FCFA</strong></li>
                    <li></li>
                  </ul>
                </form>
              </div>
            </div>

            <!-- Adding Church Offerings section -->
            <div class="col-lg-5">
            <!-- Example Pie Chart Card -->
            <div class="bg-danger card mb-3" style="color: #fff">
              <div class="card-header">
                <i class="fa fa-user"></i>
                TITHS
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url('index.php/finance/tiths');?>">
                  <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="firstName" placeholder="enter first name as of registration" required="required" class="form-control col-lg-12">
                  </div>
                  <div class="form-group">
                    <label class="label-control">Last Name:</label>
                    <input type="text" name="lastName" placeholder="enter last name as of registration" required="required" class="form-control col-lg-12">
                  </div>
                  <div class="form-group">
                  <label class="label-control">Amount</label>
                  <input type="text" name="amount" placeholder="E.g 20000" required="required" class="form-control col-lg-12">

                </div>
                <div class="form-group">
                  <label class="control-label">Prayer Request</label>
                  <textarea name="prayerRequest" required="required" class="form-control" placeholder="Enter the prayer request for this tiths">
                  </textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="SAVE" class="btn btn-success btn-block">
                </div>
              </form>
              </div>
            </div>
          </div>
            <!-- End of Church Offerings Section -->

            <!-- Adding Tiths -->
            <div class="bg-info card mb-3" style="margin-left: 3%; color: #fff">
              <div class="card-header">
                <i class="fa fa-user"></i>
                Free Donation
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url('index.php/finance/freeDonations');?>">
                  <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input type="text" name="firstName" placeholder="enter first name as of registration" required="required" class="form-control col-lg-12">
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="lastName" placeholder="enter last name as of registration" required="required"  class="form-control col-lg-12">
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label">Amount</label>
                    <input type="text" name="amount" placeholder="E.g 20000" required="required"  class="form-control col-lg-12">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Item Donated</label>
                    <input type="text" name="donatedItem" placeholder="E.g 1 packet of maggi" required="required" class="form-control col-lg-12">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-block" value="Save Donation">
                  </div>
                </form>
              </div>
            </div>
            <!-- End of Tiths -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $('#classModal').modal('show')
</script>
<!-- =========== Modal to show church finance details ============== -->
<div id="classModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
              Class Info
            </h4>
      </div>
      <div class="modal-body">
        <table id="classTable" class="table table-bordered">
          <thead>
          </thead>
          <tbody>
            <tr>
              <td>CLN</td>
              <td>Last Updated Date</td>
              <td>Class Name</td>
              <td># Tests</td>
              <td>Test Coverage (Instruction)</td>
              <td>Test Coverage (Complexity)</td>
              <td>Complex Covered</td>
              <td>Complex Total</td>
              <td>Category</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- =========== End modal showing chuurch finace details ============== -->





<?php $this->load->view('partial/footer');?>
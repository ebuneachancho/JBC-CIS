  <?php $this->load->view('partial/pastor_header');?>



    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="row">
          <div class="col-xl-4 col-sm-6 mb-4" style="height: 160px;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i style="font-size: 30px; margin-left: -50%; border: 1px dotted #fff">CFA</i>
                </div>
                <div class="mr-5">
                  <h2>
                     <?php 
                      $this->db->select('SUM(offering_amount) as amount');
                      $query = $this->db->get('offerings');
                      $row = $query->row();
                      $totalOffering = $row->amount;
                      if (empty($totalOffering)) {
                        echo " 0 ";
                      }else{
                        echo $totalOffering;
                      }
                      
                    ?>
                  </h2> 
                  <h6>General Church Offerings</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/churchOfferingDetails');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Chart Details
                </span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4" style="height: 160px;">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i style="font-size: 30px; margin-left: -50%; border: 1px dotted #fff">CFA</i>
                </div>
                <div class="mr-5">
                  <h2>
                    <?php 
                      $this->db->select('SUM(amount) as amount');
                      $query = $this->db->get('tiths');
                      $row = $query->row();
                      $totalTiths = $row->amount;
                      if (empty($totalTiths)) {
                        echo " 0 ";
                      }else{
                        echo $totalTiths;
                      }
                      
                    ?>
                  </h2> 
                  <h6>Tiths Income</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/churchTithDetails');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Tiths Details / Progress Report</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-4" style="height: 160px;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i style="font-size: 30px; margin-left: -50%; border: 1px dotted #fff">CFA</i>
                </div>
                <div class="mr-5">
                  <h2>
                    <?php 
                      $this->db->select('SUM(amount) as amount');
                      $query = $this->db->get('personal_donations');
                      $row = $query->row();
                      $totalDonations = $row->amount;
                      if (empty($totalDonations)) {
                        echo " 0 ";
                      }else{
                        echo $totalDonations;
                      }
                      
                    ?>
                  </h2>
                  <h6>Free Donation</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/churchDonationDetails');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Persons</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <!-- <div class="col-xl-3 col-sm-6 mb-3" style="height: 160px;">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-usd"></i>
                </div>
                <div class="mr-5">
                  <h3>40.000.000</h3>
                  <h6>Church Income</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#churchIncomeModal">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> -->
        </div>
        </div>

        <!-- Area Chart Example -->

        <div class="row">

          <div class="col-lg-8">

            <!-- Example Bar Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Last Sunday Activity
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100" height="50"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>

            <!-- Card Columns Example Social Feed -->
           <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Lastest Families
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart" width="100" height="100%"></canvas>
                  </div>
                  <div class="col-sm-4 text-center my-auto">
                    
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- /Card Columns -->

          </div>

          <div class="col-lg-4">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Last Visitor
              </div>
              <div class="card-body">
                  <?php if (isset($recentVisitor)): ?>
                    <?php foreach ($recentVisitor as $visitor): ?>
                      <div style="float: left; margin-right: 4.3%; width: 29%;">
                        <a href="#"><img src="<?php echo base_url('resources/images/avatar.png');?>" width="100%" height="80px"></a>
                        <p class="text-center"><?php echo $visitor->first_name;?></p>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
              </div>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
            <!-- Example Notifications Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bell-o"></i>
                Latest Members
              </div>
              <div class="card-body">
                <?php if (isset($recentMember)): ?>
                    <?php foreach ($recentMember as $member): ?>
                      <div style="float: left; margin-right: 3%; width: 29%; height: 85px">
                        <?php if ($member->picture != null): ?>
                          <img src="<?php echo base_url();?><?php echo $member->picture;?>" class="img-rounded" style="float:left" width="100%" height="75px">
                        <?php endif ?>
                        <?php if ($member->picture == null): ?>
                          <img src="<?php echo base_url('resources/images/avatar.png');?>" width="100%" height="75px">
                        <?php endif ?>
                        <p class="text-center"><?php echo $member->first_name;?></p>
                      </div>
                    <?php endforeach ?>
                  <?php endif ?>
                
              </div>
              <a href="<?php echo base_url()?>index.php/dashboard/pg/viewAllMembers" class="list-group-item list-group-item-action">
                  <span class="fa fa-arrow-right"></span> View all Members...
                </a>
              <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
              </div>
            </div>
          </div>
        </div>

        <!-- Example Tables Card -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            CHURCH LEADERS
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                  </tr>
                  <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td>$137,500</td>
                  </tr>
                  <tr>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td>$327,900</td>
                  </tr>
                  <tr>
                    <td>Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td>$205,500</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->







<?php $this->load->view('partial/footer');?>
<?php $this->load->view('partial/header');?>



    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

         <!-- print out any validation errors -->
          <?php if ($this->session->userdata('leader_error')): ?>
             <div class="alert alert-danger col-lg-6" style="margin-top: 10px">
             <button class="close" data-target="alert" data-dismiss="alert">x</button>
             <?php echo $this->session->userdata('error')?>
            
            </div>
          <?php endif;?>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3" style="height: 160px;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <h2><?php echo $this->db->count_all_results('groups');?></h2> 
                  <h6>Groups</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">See all Group
                </span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" style="height: 160px;">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-users"></i>
                </div>
                <div class="mr-5">
                  <h2><?php echo $this->db->count_all_results('members');?></h2> 
                  <h6>Members</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">See all People</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" style="height: 160px;">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-fa-child"></i>
                </div>
                <div class="mr-5">
                  <h2>4</h2>
                  <h6>Families</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">See all Families Registered</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" style="height: 160px;">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i style="font-size: 30px; margin-left: -50%; border: 1px dotted #fff">CFA</i>
                </div>
                <div class="mr-5">
                  <h3>
                    <?php 
                        $this->db->select('SUM(offering_amount) as amount');
                        $query = $this->db->get('offerings');
                        $row = $query->row();
                        $totalOffering = $row->amount;
                     ?>

                     <?php 
                         $this->db->select('SUM(amount) as amount');
                         $query = $this->db->get('tiths');
                         $row = $query->row();
                         $totalTiths = $row->amount;
                     ?>

                     <?php 
                         $this->db->select('SUM(amount) as amount');
                         $query = $this->db->get('personal_donations');
                         $row = $query->row();
                         $totalDonations = $row->amount;
                     ?>
                     <?php 
                        // Printing total church incomr
                        $totalChurchIncome = $totalOffering + $totalTiths + $totalDonations;
                        echo $totalChurchIncome;
                      ?>
                  </h3>
                  <h6>Total Church Income</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#churchIncomeModal">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example -->

        <div class="row">

          <div class="col-lg-8">

            <!-- Example Bar Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Up Coming Events
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
                    <th>Sex</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Group</th>
                    <th class="bg-success white">Role</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Group</th>
                    <th class="bg-success white">Role</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php
                  $sql = 'SELECT * FROM members WHERE member_role != "Member"'; 
                    $result = $this->db->query($sql);
                    $leaders = $result->result();
                 ?>
                 <?php if ($leaders): ?>
                   <?php foreach ($leaders as $leader): ?>
                     <tr>
                    <td><?php echo $leader->first_name . " " . $leader->last_name?></td>
                    <td><?php echo $leader->sex; ?></td>
                    <td><?php echo $leader->mobile_number; ?></td>
                    <td><?php echo $leader->address; ?></td>
                    <td><?php echo $leader->member_group; ?></td>
                    <td class="bg-success white"><?php echo $leader->member_role; ?></td>
                    <td><a href="<?php echo base_url('index.php/leaders_dashboard/leader_credential_view/');?><?php echo $leader->id;?>/<?php echo $leader->member_group; ?>/<?php echo $leader->member_role; ?>" class="btn btn-danger">
                    Set Login Credential</a></td> 
                    <!-- Passing above the member_id, member_group, member role inother to create leader login-->
                    <!-- Function Name: leader_credential_view
                        Location: leaders_dashboard->leader_credential_view
                     -->
                  </tr>
                   <?php endforeach ?>
                 <?php endif ?>
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


<script type="text/javascript">
  $('#churchIncomeModal').modal('show')
</script>
<!-- ========= Modal to show church income details ======== -->
  <div id="churchIncomeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
        <h4 class="modal-title" id="classModalLabel">
              Church Income Details
            </h4>
      </div>
      <div class="modal-body">
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
      <div class="modal-footer">
        <p style="float: left; "><marquee>Showing the splited details of the detailed church income</marquee></p>
        <button type="button" class="btn btn-primary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<!-- ======= End of modal showing income details ======== -->





<?php $this->load->view('partial/footer');?>
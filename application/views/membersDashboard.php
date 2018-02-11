<?php $this->load->view('partial/header');?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Member Dashboard</li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="row">
          <div class="col-xl-4 col-sm-6 mb-4" style="height: 160px;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-users"></i>
                </div>
                <div class="mr-5">
                  <h2><?php echo $this->db->count_all_results('members');?></h2> 
                  <h6>Total Members</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/viewAllMembers');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Members
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
                  <i class="fa fa-users"></i>
                </div>
                <div class="mr-5">
                  <h2><?php echo $this->db->where('sex', 'Male')->count_all_results('members');?></h2> 
                  <h6>Total Men</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/churchTithDetails');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View All Men</span>
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
                  <i class="fa fa-users"></i>
                </div>
                <div class="mr-5">
                  <h2><?php echo $this->db->where('sex', 'Female')->count_all_results('members');?></h2>
                  <h6>Total Women</h6>
                </div>
              </div>
              <a href="<?php echo base_url('index.php/load/page_/churchDonationDetails');?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View All Women</span>
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
                  <i class="fa fa-fw fa-usd"></i>
                </div>
                <div class="mr-5">
                  <h3><?php echo $this->db->where('marital_status', 'Married')->count_all_results('members');?></h3>
                  <h6>Number of Married Members</h6>
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
        </div>

        <!-- Area Chart Example santos -->

        <div class="row">

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
                    <td><?php echo $leader->member_role; ?></td>
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







<?php $this->load->view('partial/footer');?>

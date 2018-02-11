<?php $this->load->view('partial/leaders_header');?>

k

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Dashboard</li>
          <h1><?php echo $this->session->userdata('groupName'); ?></h1>
        </ol>

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
                  <h6>Sunday School</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
                <span class="float-left">See all Sunday School Children</span>
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
                  <h2>400, 000FCFA</h2>
                  <h6>Total Money</h6>
                </div>
              </div>
              <a href="#" class="card-footer text-white clearfix small z-1">
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
            OTHER CHURCH LEADERS
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
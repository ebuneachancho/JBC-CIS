<!DOCTYPE html>
<html lang="en" ng-app="churchApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Church Application</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('resources/dashboard_resources/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('resources/dashboard_resources/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="<?php echo base_url('resources/dashboard_resources/vendor/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('resources/dashboard_resources/css/sb-admin.css');?>" rel="stylesheet">
    <!-- Style sheets for full calendar fullcalendar.io-->
    <link href="<?php echo base_url('resources/dashboard_resources/css/fullcalendar.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('resources/dashboard_resources/css/fullcalendar.print.css');?>" rel="stylesheet">
   <!-- including bootstrap date picker css cdn -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <!-- Font awesome -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Loading table export to export the tables to different file like excel -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/dashboard_resources/css/tableexport.min.js');?>">
    <!-- Loading jquery cdn library -->
    <script type="text/javascript" src="<?php echo base_url('resources/js/jquery-2.1.1.min.js');?>"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous"></script>-->
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" ng-controller="">
    <?php 
        $this->db->where('setting_name', 'church name');
        $query = $this->db->get('settings');
        $row = array();
        if ($query->num_rows() > 0) {
          $row = $query->result();
        }
    ?>
    <?php foreach ($row as $church_name): ?>
      <a class="navbar-brand" href="<?php echo base_url('index.php');?>"><?php echo $church_name->setting_value;?></a>
  <?php endforeach ?> <!-- end foreach to diisplay church name-->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('index.php');?>">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Dashboard</span>
            </a>
          </li>
          <!-- setting who can access the link menus. -->
          <?php if ($this->session->userdata('userRole') == 'Supper Admin' || $this->session->userdata('userRole') == 'pastor' || $this->session->userdata('userRole') == 'appointedDecon'): ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Visitors">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#collapseComponents">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">
                Visitors</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li><a href="<?php echo base_url('index.php/load/page_/registerVisitor');?>">Register a Visitor</a></li>
              <li><a href="<?php echo base_url('index.php/load/page_/viewAllVisitors');?>">View All Visitors</a></li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Send Email">
            <a class="nav-link" href="<?php echo base_url('index.php/load/page_/email');?>">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">
                Email</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Members">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMember" data-parent="#collapseMember">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">
                Members</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMember">
              <li><a href="<?php echo base_url('index.php/load/page_/membersDashboard');?>">Dashboard</a></li>
              <li><a href="<?php echo base_url('index.php/member');?>">Add New Member</a></li>
              <li><a href="<?php echo base_url('index.php/load/page_/viewAllMembers');?>">View All Persons</a></li>
              <li><a href="#">Add New Family</a></li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Church Groups">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-file"></i>
              <span class="nav-link-text">Groups</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages"> 
              <li><a href="<?php echo base_url('index.php/load/page_/listGroup');?>">List Groups</a></li>
              <li><a href="<?php echo base_url('index.php/load/page_/groupAssignmentHelper');?>">Group Assignment Helper</a></li>
            </ul>
          </li>
          <?php endif ?>
          <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sunday School">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-sitemap"></i>
              <span class="nav-link-text">Sunday School</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMulti">
              <li><a href="<?php //echo base_url('index.php/load/page_/sundaySchoolDashboard');?>">Dashboard</a></li>
            </ul>
          </li> -->
          
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sunday School">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-usd"></i>
              <span class="nav-link-text">Finances</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMulti">
              <?php if (($this->session->userdata('userRole') == 'churchSecretary')): ?>
              <li><a href="<?php echo base_url('index.php/load/page_/churchFinance');?>">Enter Church Offerings</a></li>
              <?php endif ?>
              <li><a href="<?php echo base_url('index.php/load/page_/churchFinance');?>">View Church Offering </a></li>
              
              
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Events">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEvent" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-sitemap"></i>
              <span class="nav-link-text">Events</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseEvent">
              <li><a href="<?php echo base_url('index.php/load/page_/showChurchEvents');?>">List Church Events</a></li>
              <li><a href="#">List Event Types</a></li>
              <li><a href="#">Check-in and Check-out</a></li>
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fundraiser">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseFundraiser" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-sitemap"></i>
              <span class="nav-link-text">Projects</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseFundraiser">
              <li><a href="<?php echo base_url('index.php/load/page_/viewAllProjects');?>">View All Projects</a></li>
              <!-- <li><a href="<?php //echo base_url('index.php/load/page_/createFundraiser');?>">Project Summary</a></li> -->
              <!-- <li><a href="#">Add Donors to Buyers List</a></li> -->
            </ul>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data / Report">
            <a class="nav-link" href="<?php echo base_url('index.php/load/page_/reports');?>">
              <i class="fa fa-fw fa-link"></i>
              <span class="nav-link-text">Data/Reports</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
            <a class="nav-link" href="<?php echo base_url('index.php/login/logout');?>">
              <i class="fa fa-fw fa-link"></i>
              <span class="nav-link-text">Logout</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-user-circle" style="font-size: 20px"></i>
              Administrator&nbsp;<span class="caret"></span></a> 
          </li>
          <li class="dropdown">
            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown"><span class="fa fa-fw fa fa-gears"></span>&nbsp;Settings<span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color: #212529;width: 200px;padding:10px 10px">
                <li><a href="" style="color: #fff"><span class="fa fa-hand-o-right"></span>&nbsp; Change Password</a></li>
                <?php if ($this->session->userdata('userRole') == 'Supper Admin'): ?>
                  <li><a href="<?php echo base_url('index.php/load/page_/systemSettings');?>" style="color: #fff"><span class="fa fa-hand-o-right"></span>&nbsp; Settings</a></li>
                <?php endif ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Logout</a>
          </li>
        </ul>
        <div ng-view></div>
      </div>
    </nav>
<script type="text/javascript">
  $('.datepicker').datepicker();
</script>

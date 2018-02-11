<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">System Settings</li>
        </ol>

    </div>
    <!-- /.container-fluid -->
    <?php if ($this->session->flashdata('roleSuccess')): ?>
        <div class="alert alert-success col-lg-6" style="margin: 2% 0% 0% 27%">
          <?php echo $this->session->flashdata('roleSuccess')?>
          <button class="close" data-target="alert" data-dismiss="alert">x</button>
        </div>
    <?php endif;?>

    <!-- showing error if church name is duplicated -->
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger col-lg-6" style="margin: 2% 0% 0% 27%">
          <?php echo $this->session->flashdata('error')?>
          <button class="close" data-target="alert" data-dismiss="alert">x</button>
        </div>
    <?php endif;?>

    <!-- Showing succes when new user is created -->
    <?php if ($this->session->flashdata('user_role_add_success')): ?>
        <div class="alert alert-success col-lg-6" style="margin: 2% 0% 0% 27%">
          <?php echo $this->session->flashdata('user_role_add_success')?>
          <button class="close" data-target="alert" data-dismiss="alert">x</button>
        </div>
    <?php endif;?>
     <!-- showing application name change success -->
    <?php if ($this->session->flashdata('save_church_name_success')): ?>
        <div class="alert alert-success col-lg-6" style="margin: 2% 0% 0% 27%">
          <?php echo $this->session->flashdata('save_church_name_success')?>
          <button class="close" data-target="alert" data-dismiss="alert">x</button>
        </div>
    <?php endif;?>
   <div style="margin: 5% 5%; width:800px;">
      <div class="lg-5 md-5 col-sm-12 xs-12 bhoechie-tab-container" style="width: 900px">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu" style="width: 200px">
              <div class="list-group" style="position: absolute; float: left; margin-right:50%">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="fa fa-plane"></h4><br/>Application Settings
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-users"></h4><br/>Member Roles
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-home"></h4><br/>Add Users
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-gear"></h4><br/>Add
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="fa fa-gear"></h4><br/>Settings
                </a>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab" style="width: 600px; float: right">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <center>
                      <h1 class="fa fa-location-arrow" style="font-size:8em;color:#55518a"></h1>
                       <form method="post" action="<?php echo base_url('index.php/system_settings/save_church_name');?>">
                        <div class="form-group">
                          <label class="label-control"><strong>Church Name:</strong></label>
                          <input type="text" class="form-control" placeholder="enter title of application" name="applicationName">
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-block" value="Save">
                        </div>
                      </form>
                    </center>

                    <!-- saving church logo -->
                    <center>
                      <h1 class="fa fa-linkedin" style="font-size:8em;color:#55518a"></h1>
                       <form method="post" action="<?php echo base_url('index.php/system_settings/save_church_logo');?>">
                        <div class="form-group">
                          <label class="label-control"><strong>Church Logo:</strong></label>
                          <input type="file" name="picture" required="required" class="form-control col-lg-12">
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary btn-block" value="Save">
                        </div>
                      </form>
                    </center>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <button class="btn btn-info" data-toggle="modal" data-target="#roles">Add Role</button>
                    <center>
                      <h4 class="fa fa-database" style="font-size:8em;color:#55518a"></h4><br><br>
                       <?php 
                          $query = $this->db->get('roles');
                          $roles = array();
                          if ($query->num_rows() > 0) {
                            $roles = $query->result();
                          }
                      ?>
                      <table class="table-bordered col-xs-12">
                        <thead>
                          <th><strong>Role</strong></th>
                          <th><strong>Edit</strong></th>
                          <th><strong>Delete</strong></th>
                        </thead>
                        <tbody>
                        <?php if (isset($roles)): ?>
                          <?php foreach ($roles as $role): ?>
                            <tr style="width: 40%">
                              <td><a href="#"><?php echo $role->role_name;?></a></td>
                              <td><a href="#" class="btn btn-primary"><span class="fa fa-pencil"></span></a></td>
                              <td><a href="#" class="btn btn-danger"><span class="fa fa-remove"></span></a></td>
                            </tr>
                          <?php endforeach ?>
                        <?php endif ?>
                        </tbody>
                      </table>
                    </center>
                </div>
    
                <!-- add users -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="fa fa-address-card" style="font-size:8em;color:#55518a"></h1>
                      <form method="post" action="<?php echo base_url('index.php/system_settings/add_user_role');?>">
                        <table class="table-bordered">
                        <div class="form-group">
                          <tr>
                            <td><label class="label-control"><strong>Username:</strong></label></td>
                            <td><input type="text" class="form-control" required="required" name="username" placeholder="please enter login username"></td>
                          </tr> 
                        </div>
                        <div class="form-group">
                        <tr>
                          <td><label class="label-control"><strong>Password:</strong></label></td>
                          <td><input type="text" class="form-control" required="required" name="password" placeholder="please enter login password"></td>
                        </tr>
                        </div>
                        <div class="form-group">
                          <tr>
                            <td><label class="label-control"><strong>Roles:</strong></label></td>
                            <td>
                              <select name="userRole" required="required" class="form-control">
                              <option selected="selected"></option>
                              <option value="pastor">Pastor</option>
                              <option value="appointedDecon">Appointed Decon</option>
                              <option value="churchSecretary">Church Secretary</option>
                              <option value="Supper Admin">Supper Admin</option>
                            </select>
                            </td>
                          </tr>
                        </div>
                        <div class="form-group">
                          <tr>
                            <td><label class="control-label"><strong>Full Name:</strong></label></td>
                            <td><input type="text" class="form-control" name="displayName" placeholder="please enter display name" required="required"></td>
                          </tr>
                        </div>

                        <div class="form-group">
                          <tr><td></td><td></td></tr>
                          <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary btn-block" value="Set Credentials"></td>
                          </tr>
                        </div>
                        </table>
                      </form>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="fa fa-gear" style="font-size:8em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Other Functionalities</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="fa fa-gear" style="font-size:8em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Settings</h2>
                      <h3 style="margin-top: 0;color:#55518a">Settings</h3>
                    </center>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- /.content-wrapper -->


<!-- ============ MODAL TO ADD ROLES ============= -->
<!-- Modal -->
<div id="roles" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Adding User Roles</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('index.php/system_settings/add_roles');?>">
          <div class="form-group col-xs-12">
            <label class="label-control">Role: </label>
            <input type="text" name="role" required="required" class="form-control" placeholder="enter role name">
          </div>
          <div class="form-group col-xs-12">
            <input type="submit" name="submit" value="Add Role" class="btn btn-success btn-block">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- ======== END OF MODAL TO ADD ROLES =========== -->



<?php $this->load->view('partial/footer');?>
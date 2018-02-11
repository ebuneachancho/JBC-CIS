<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Setting Leaders Login</li>
        </ol> 

        <?php 
          $query = $this->db->get('personal_donations');
          $row = array();
          if ($query->num_rows() > 0) {
            $row = $query->result();
          }

        ?>
        <!-- Getting leader's full name -->
        <?php 
           $leader_gotten_id = $member_id;
           $sql = "SELECT first_name, last_name FROM members WHERE id='".$member_id."'";
           $leader_query = $this->db->query($sql);
           if ($leader_query) {
             $leader_role = $leader_query->result();
           }

         ?>
          
         
         <?php if (isset($leader_credential_set_success)): ?>
          <div class="alert alert-success col-lg-6" style="margin-top: 10px">
                <?php echo $leader_credential_set_success;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
         <?php endif ?>
         <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <div class="card-header">
            <i class="fa fa-users"></i>
            Leaders Login Registration.
          </div>
          <div class="card-body">
              <form method="post" action="<?php echo base_url('index.php/leaders_dashboard/set_leaders_credentials');?>">
                  <?php foreach ($leader_role as $leader_name): ?>
                  <h3><strong>Setting Login Credentials for <i class="fa fa-arrow-right text-danger"><?php echo $leader_name->first_name . " ". $leader_name->last_name;?></i></strong></h3>
                   <?php endforeach ?>
                <div class="form-control">
                  <label class="control-label">Username:</label>
                  <input type="text" class="form-control" name="leader_username" placeholder="enter username of leader" required="required">
                </div>
                <div class="form-control">
                  <label class="control-label">Password:</label>
                  <input type="password" class="form-control" name="leader_password" placeholder="enter leader login password here" required="required">
                </div>
                <input type="hidden" class="form-control" name="leader_id" value="<?php echo $member_id;?>">
                <input type="hidden" name="leader_group" value="<?php echo $group_name?>">
                <input type="hidden" name="role_name" value="<?php echo stripcslashes($role_name)?>">
                <div class="form-control">
                  <button name="submit" class="btn btn-primary">Set Credentials</button>
                </div>
              </form>
          </div>
          <div class="card-footer small text-muted">
            Updated <?php echo date('D-M-Y');?>
          </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->



<?php $this->load->view('partial/footer');?>
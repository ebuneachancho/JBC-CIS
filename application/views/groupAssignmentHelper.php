<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Group Assignment Helper</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
      <div class="row col-lg-12" style="margin-top: 3%">
            <div class="col-lg-12">
            <div class="card mb-3">
             <?php if (isset($groupAssignSuccess)): ?>
                <div class="alert alert-success">
                  <?php echo $groupAssignSuccess;?>
                  <button class="close" data-dismiss="alert">x</button>
                </div>
             <?php endif ?>
             <?php if (isset($groupAssignFailed)): ?>
                <div class="alert alert-danger">
                  <?php echo $groupAssignFailed;?>
                  <button class="close" data-dismiss="alert">x</button>
                </div>
             <?php endif ?>
              <div class="card-header">
                <i class="fa fa-home"></i>
                Enter Group Information
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url("index.php/member/memberGroupAssignment");?>">
                  <div class="form-group">
                      <label class="control-label">Select name of group</label>
                      <?php 
                          $query = $this->db->get('groups');
                          $row = array();
                          if ($query->num_rows() > 0) {
                            $row = $query->result();
                          }
                      ?>
                      <select class="form-control col-lg-12" name="groupName" required="required">
                        <?php foreach ($row as $group): ?>
                          <option value="<?php echo $group->group_name;?>"><?php echo $group->group_name;?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Name of Member:</label>
                      <select class="form-control col-lg-12" required="required" name="memberName">
                        <!-- Put a small search inother to help filter the names easily -->
                       
                        <?php 
                          $query = $this->db->get('members');
                          $row = array();
                          if ($query->num_rows() > 0) {
                            $row = $query->result();
                          }
                      ?>
                        <?php foreach ($row as $member): ?>
                          <option value="<?php echo $member->id;?>"><?php echo $member->first_name . " " .$member->last_name ;?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="label-control">Assign Role:</label>
                      <select class="form-control col-lg-12" required="required" name="memberRole">
                        <?php 
                              $query = $this->db->get('roles');
                              $row = array();
                              if ($query->num_rows() > 0) {
                                $row = $query->result();
                              }
                            ?>
                            <option selected="selected"></option>
                            <?php if (isset($row)): ?>
                              <?php foreach ($row as $roles): ?>
                                <option value="<?php echo $roles->role_name;?>">
                                  <?php echo $roles->role_name;?>
                                </option>
                              <?php endforeach ?>
                            <?php endif ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-info col-lg-12" name="submit" value="Register Member">
                  </div>
                </form>
                  </div>
            </div>
          </div>
          </div> <!-- //create group section row -->
    </div>

</div>
<!-- /.content-wrapper -->







<?php $this->load->view('partial/footer');?>
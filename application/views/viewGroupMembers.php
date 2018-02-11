<?php $this->load->view('partial/header');?>


<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Viewing Group Members</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
        
    <!-- end of row creating new group -->
      <div class="row">
        <div class="clearleft" style="margin-left: 20px"></div>
          <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <div class="card-header">
            <i class="fa fa-users"></i>
            VIEWING REGISTERED MEMBERS OF <<<strong class="text-danger">
            <?php if (isset($groupName)): ?>
              <?php echo $groupName;?>
            <?php endif ?>
            </strong>>> <!-- Dont remove this angle brackets untill u know what you are doing-->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
             
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Sex</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th class="bg-info" style="color: #fff">Member Role</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Sex</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th class="bg-info" style="color: #fff">Member Role</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (isset($groupMembers)): ?>
                      <tr>
                      <td><?php echo $groupMembers->first_name;?></td>
                      <td><?php echo $groupMembers->last_name;?></td>
                      <td><?php echo $groupMembers->mobile_number;?></td>
                      <td><?php echo $groupMembers->sex;?></td>
                      <td><?php echo $groupMembers->father_name;?></td>
                      <td><?php echo $groupMembers->mother_name;?></td>
                      <td><span class="text-success"><strong><?php echo $groupMembers->member_role;?></strong></span></td>
                    </tr>
                 <?php endif ?>
                 <?php if(empty($groupMembers)){echo "<tr><td class='text-center text-danger' colspan='6'><strong>No visitor has been registered yet</strong></td></tr>";}?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
        

      </div>
    </div>
</div>
<!-- /.content-wrapper -->



<?php $this->load->view('partial/footer');?>
<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View All Members</li>
        </ol>
         <?php 
          $query = $this->db->get('members');
          $row = array();
          if ($query->num_rows() > 0) {
            $row = $query->result();
          }

        ?>
        <!-- Display success / failed update message -->
        <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <?php if (isset($memberUpdateSuccess)): ?>
              <div class="alert alert-success col-lg-12" style="margin-top: 10px">
                <?php echo $memberUpdateSuccess;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
          <?php endif ?>
        <!-- // Showing success / failed update message -->
        
      <!-- all registered visitors card -->
        <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <div class="card-header">
            <i class="fa fa-users"></i>
            VIEWING REGISTERED MEMBERS
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <form>
                   <div class="input-group col-xs-4">
                      <input type="text" class="form-control" placeholder="Search by name or denomination">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                          <i class="fa fa-search"></i>
                        </button>
                        </span>
                    </div><br><br>
                </form>

                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Sex</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
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
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (isset($row)): ?>
                   <?php foreach ($row as $member): ?>
                      <tr>
                      <td><?php echo $member->first_name;?></td>
                      <td><?php echo $member->last_name;?></td>
                      <td><?php echo $member->mobile_number;?></td>
                      <td><?php echo $member->sex;?></td>
                      <td><?php echo $member->father_name;?></td>
                      <td><?php echo $member->mother_name;?></td>
                      <td><a href="<?php echo base_url();?>index.php/member/edit_member/<?php echo $member->id;?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="<?php echo base_url();?>index.php/member/view/<?php echo $member->id;?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                      <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $member->id;?>" class="delete btn btn-danger"><i class="fa fa-close"></i></a></td>
                    </tr>
                   <?php endforeach ?>
                 <?php endif ?>
                 <?php if(empty($row)){echo "<tr><td class='text-center text-danger' colspan='6'><strong>No visitor has been registered yet</strong></td></tr>";}?> 
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

<!-- Code to delete data from the database when clicked on the table bellow -->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure you want to delete this record?')){
            e.preventDefault();
            return false;
        }
        <?php
            if (isset($_GET['id'])) {
                $delete = $_GET['id'];
                $sql = "DELETE from members where id='$delete'";
                $delete = $this->db->query($sql);
                if ($delete) {
                    redirect('load/page_/viewAllMembers');
                }else{
                    echo mysql_error();
                }
            }
        ?>
        return true;
    });
});
</script>


<!-- Modal box to edit members -->

<div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-horizontal">
          <!-- enter fields that contains the input fields of the form -->
          <div class="form-group col-xs-6">
            <label for="First Name">First Name:</label>
            <input type="text" name="firstName" value="Ebune" class="form-control" ng-model="firstName">
          </div>
          <div class="form-group col-xs-6">
            <label for="Last Name">Last Name:</label>
            <input type="text" name="lastName" value="Achancho" class="form-control" ng-model="lastName">
          </div>
          <div class="form-group col-xs-6">
            <label for="Phone Number">Phone Number:</label>
            <input type="text" name="phoneNumber"  value="653468306" class="form-control" ng-model="phoneNumber">
          </div>
          <div class="form-group col-xs-6">
            <label for="Sex">Sex:</label>
            <input type="text" name="sex" value="Male" class="form-control" ng-model="sex">
          </div>
          <div class="form-group col-xs-6">
            <label for="Fathers Name">Father's Name:</label>
            <input type="text" name="fatherName" value="Achanch Achancho" class="form-control" ng-model="fatherName">
          </div>
          <div class="form-group col-xs-6">
            <label for="Mothers Name">Mother's Name:</label>
            <input type="text" name="motherName" value="Achancho Mother" class="form-control" ng-model="motherName">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Update</a>
      </div>
    </div>
  </div>
</div>

<!-- End of modal box to edit a member -->

<?php $this->load->view('partial/footer');?>
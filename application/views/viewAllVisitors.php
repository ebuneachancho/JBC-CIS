<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View All Visitors</li>
        </ol>
        <?php 
          $query = $this->db->get('visitors');
          $row = array();
          if ($query->num_rows() > 0) {
            $row = $query->result();
          }

        ?>
        <!-- all registered visitors card -->
        <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <?php if (isset($update_success)): ?>
              <div class="alert alert-success" style="margin-top: 10px">
                <?php echo $update_success;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
            <?php endif ?>
          <div class="card-header">
            <i class="fa fa-users"></i>
            All Visitors Registered
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" ng-controller="allVisitors" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Observation</th>
                    <th>Denomination</th>
                    <th>Date Registered</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Observation</th>
                    <th>Denomination</th>
                    <th>Date Registered</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                 <?php if (isset($row)): ?>
                   <?php foreach ($row as $visitor): ?>
                      <tr>
                      <td><?php echo $visitor->first_name;?></td>
                      <td><?php echo $visitor->last_name;?></td>
                      <td><?php echo $visitor->denomination;?></td>
                      <td><?php echo $visitor->observation;?></td>
                      <td><?php echo $visitor->date_recorded;?></td>
                      <td><a href="<?php echo base_url();?>index.php/visitor/edit/<?php echo $visitor->id;?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="<?php echo base_url();?>index.php/visitor/view/<?php echo $visitor->id;?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                      <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $visitor->id;?>" class="delete btn btn-danger"><i class="fa fa-close"></i></a></td>
                    </tr>
                   <?php endforeach ?>
                 <?php endif ?>
                 <?php if(empty($row)){echo "<tr><td class='text-center text-danger' colspan='6'><strong>No visitor has been registered yet</strong></td></tr>";}?> 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at <?php echo date('Y-M-D h:m:s');?>
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
        if(!confirm('Are you sure you want to delete this visitor record?')){
            e.preventDefault();
            return false;
        }
        <?php
            if (isset($_GET['id'])) {
                $delete = $_GET['id'];
                $sql = "DELETE from members where id='$delete'";
                $delete = $this->db->query($sql);
                if ($delete) {
                    redirect('load/page_/viewAllVisitors');
                }else{
                    echo mysql_error();
                }
            }
        ?>
        return true;
    });
});
</script>

<?php $this->load->view('partial/footer');?>
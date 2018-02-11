<?php $this->load->view('partial/header');?>


<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View All Projects</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
    <!-- row to create a new group -->
      <div class="row col-xs-8 col-xs-offset-2">
        <button class="btn btn-success btn-block" data-target="#addGroup" data-toggle="modal">
        <i class="fa fa-plus"></i> &nbsp;
        CREATE NEW PROJECT
        </button>
        <br><br>
      </div>
        <?php if (isset($success)): ?>
          <div class="alert alert-success" style="margin-top: 5%">
          <?php echo $success;?>
           <button class="close" data-dismiss="alert">x</button>
          </div>
        <?php endif ?>
        <?php if (isset($update_success)): ?>
          <div class="alert alert-success" style="margin-top: 5%">
          <?php echo $update_success;?>
           <button class="close" data-dismiss="alert">x</button>
          </div>
        <?php endif ?>
       <?php if (isset($unableCreateGroup)): ?>
        <div class="alert alert-danger" style="margin-top: 5%">
          <?php echo $unableCreateGroup;?>
          <button class="close" data-dismiss="alert">x</button>
        </div>
       <?php endif ?>
        
    <!-- end of row creating new group -->
      <div class="row">
        <div class="clearleft" style="margin-left: 20px"></div>
        <?php 
             $query = $this->db->get('projects');
              $row = array();
              if ($query->num_rows() > 0) {
                $row = $query->result();
              }
        ?>
        <?php foreach ($row as $project): ?>
          <div style="display: inline-block; margin: 35px 0px 0px 15px; 
         padding:10px 20px 0px 20px; background-color: #eee" disabled="disabled">

          <h1 class="text-center text-success"><i class="fa fa-briefcase fa-2x"></i></h1>
          <h2><strong><?php echo $project->project_name;?></strong></h2>
          <h3><strong class="text-success">Amount: </strong><?php echo $project->amount;?></h3>
          <h5><strong>Project End Date: </strong><marquee style="width: 30%;" class="text-success"><?php echo $project->project_closing;?>
          <?php if (date('Y-m-d') == $project->project_closing): ?>
            <span class="text-danger">PROJECT ENDED (CLOSED)</span>
            <script>
            var element = document.getElementById('project');
            element.style.disabled='disabled';
            </script>
          <?php endif; ?>

          </marquee></h5>
          <a href="<?php echo base_url('')?><?php echo $project->id;?>" class="btn btn-success">
            View Details
          </a>
          <a href="<?php echo base_url('index.php/dashboard/edit_project/')?><?php echo $project->id;?>" class="btn btn-success">
            <span class="fa fa-pencil"></span>
          </a>
          <a href="<?php $_SERVER['PHP_SELF']?>?id=<?php echo $project->id;?>" class="deleteproject btn btn-danger">
            <span class="fa fa-close"></span>  
          </a>
        </div>
        <?php endforeach ?>

      </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- CREATE NEW PROJECT MODAL -->
<div class="modal fade" id="addGroup" tabindex="-1"role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Header -->
        <div class="modal-header">
          <h3 style="color: #d33;">CREATE NEW PROJECT</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
           <!-- Body -->
        <div class="modal-body">
        <form method="post" action="<?php echo base_url('index.php/dashboard/create_project');?>">
            <label for="Name"><strong>Project Name:</strong> </label>
              <input type="text" class="form-control col-xs-12" name="projectName"
                        placeholder="Enter name of project" required="required">
               <label for="Name"><strong>Type of Project:</strong> </label>
              <input type="text" class="form-control col-xs-12" name="projectType"
                        placeholder="Enter type of project" required="required">
               <label for="Name"><strong>Assign Project To:</strong> </label>
              <select class="form-control col-xs-12" required="required" name="projectAssigned">
                <?php 
                     $query = $this->db->get('groups');
                      $row = array();
                      if ($query->num_rows() > 0) {
                        $row = $query->result();
                      }
                ?>
                <option selected="selected"></option>
                <option value="church">Church</option>
                <?php foreach ($row as $group): ?>
                  <option value="<?php echo $group->group_name;?>"><?php echo $group->group_name;?></option>
                <?php endforeach ?>

              </select>

               <label for="Amount"><strong>Amount:</strong> </label>
              <input type="number" class="form-control col-xs-12" required="required" name="amount"
                        placeholder="E.g 50000FCFA">

               <label for="Expected Date"><strong>Project Close Date:</strong> </label>
              <input type="date" class="form-control col-xs-12" name="projectCloseDate" placeholder="format year-month-day. E.g 2017-01-23">

               <label for="Name"><strong>Project Note:</strong> </label>
              <textarea class="form-control col-xs-12" name="projectDescription" placeholder="enter note about the project">
                
              </textarea>

            <div class="form-group" style="margin-top: 10px">
            <button class="btn btn-primary btn-block" data-submit="modal">ADD PROJECT</button>
              <button type="reset" class="btn btn-danger btn-block" data-dismiss="modal">CANCEL</button>
          </div>
        </form>
        </div>  
          <!-- Footer -->
        <div class="modal-footer">
          
        </div>
      </div>
   </div>
 </div>
<!-- END OF CREATE NEW PROJECT MODAL -->

<!-- Code to delete data from the database when clicked on the table bellow -->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $(".deleteproject").click(function(e){
        if(!confirm('Are you sure you want to delete this Project Permanently?')){
            e.preventDefault();
            return false;
        }
        <?php
            if (isset($_GET['id'])) {
                $delete = $_GET['id'];
                $sql = "DELETE from projects where id='$delete'";
                $delete = $this->db->query($sql);
                if ($delete) {
                    redirect('load/page_/viewAllProjects');
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
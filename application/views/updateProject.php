<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Update Project</li>
        </ol>

    </div>
    <!-- /.container-fluid -->
      <!-- printing update success message -->
       <?php if (isset($success)): ?>
          <div class="alert alert-success" style="margin-top: 5%">
          <?php echo $success;?>
           <button class="close" data-dismiss="alert">x</button>
          </div>
        <?php endif ?>
        <!-- End printing update success message -->
          <div style="border: 1px solid #ccc; padding:3% 3%; width: 50%;margin-left: 23%; box-shadow: 5px 5px 9px 3px #ccc;">
            <form method="post" action="<?php echo base_url('index.php/dashboard/update_project');?>">
            <label for="Name"><strong>Project Name:</strong> </label>
              <input type="text" class="form-control col-xs-12" name="projectName" required="required" value="<?php echo $projectData->project_name;?>">
               <label for="Name"><strong>Type of Project:</strong> </label>
              <input type="text" class="form-control col-xs-12" name="projectType" required="required" value="<?php echo $projectData->project_type;?>">
               <label for="Name"><strong>Assign Project To:</strong> </label>
              <select class="form-control col-xs-12" required="required" name="projectAssigned">
                <?php 
                     $query = $this->db->get('groups');
                      $row = array();
                      if ($query->num_rows() > 0) {
                        $row = $query->result();
                      }
                ?>
                <option selected="selected"><?php echo $projectData->project_assigned_to;?></option>
                <option value="church">Church</option>
                <?php foreach ($row as $group): ?>
                  <option value="<?php echo $group->group_name;?>"><?php echo $group->group_name;?></option>
                <?php endforeach ?>

              </select>

               <label for="Amount"><strong>Amount:</strong> </label>
              <input type="number" class="form-control col-xs-12" required="required" name="amount" value="<?php echo $projectData->amount;?>">

               <label for="Expected Date"><strong>Project Close Date:</strong> </label>
              <input type="date" class="form-control col-xs-12" value="<?php echo $projectData->project_closing;?>" name="projectCloseDate">

               <label for="Name"><strong>Project Note:</strong> </label>
              <textarea class="form-control col-xs-12" name="projectDescription">
                <?php echo $projectData->project_description;?>
              </textarea>
              <input type="hidden" value="<?php echo $projectData->id;?>" name="project_id">
            <div class="form-group" style="margin-top: 10px">
            <button class="btn btn-primary btn-block">UPDATE PROJECT</button>
              <button type="reset" class="btn btn-danger btn-block">CANCEL</button>
          </div>
        </form>
          </div>
</div>
<!-- /.content-wrapper -->




<?php $this->load->view('partial/footer');?>
<?php $this->load->view('partial/header');?>


<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">List Group</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
    <!-- row to create a new group -->
      <div class="row col-xs-8 col-xs-offset-2">
        <button class="btn btn-success btn-block" data-target="#addGroup" data-toggle="modal">
        <i class="fa fa-plus"></i> &nbsp;
        CREATE / ADD GROUP
        </button>
        <br><br>
      </div>
        <?php if (isset($groupCreated)): ?>
          <div class="alert alert-success" style="margin-top: 5%">
          <?php echo $groupCreated;?>
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
             $query = $this->db->get('groups');
              $row = array();
              if ($query->num_rows() > 0) {
                $row = $query->result();
              }
        ?>
        <?php foreach ($row as $group): ?>
          <div style="display: inline-block; margin: 35px 0px 0px 15px; 
         padding:10px 20px 0px 20px; background-color: #eee">

          <h1 class="text-center text-success"><i class="fa fa-users fa-2x"></i></h1>
          <h2><strong><?php echo $group->group_name;?></strong>
          <button type="button" class="btn btn-success" data-target="#addEditGroup"
                    data-toggle="modal"  ng-click="">
            <span class="fa fa-pencil"></span>
          </button>
          <button type="button" class="btn btn-danger" data-target="#addEditGroup"
                    data-toggle="modal"  ng-click="">
            <span class="fa fa-close"></span>  
          </button>
          </h2><br>
          <a href="<?php echo base_url('index.php/member/viewGroupMembers/');?><?php echo $group->group_name;?>" class="btn btn-info">View Members</a>
        </div>
        <?php endforeach ?>

      </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- CREATE NEW GROUP MODAL -->
<div class="modal fade" id="addGroup" tabindex="-1"role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Header -->
        <div class="modal-header">
          <h3 style="color: #d33;">CREATE NEW GROUP</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
           <!-- Body -->
        <div class="modal-body">
        <form method="post" action="<?php echo base_url('index.php/dashboard/group');?>">
            <label for="Name">Enter Name of Group: </label>
              <input type="text" class="form-control col-xs-12" name="groupName"
                        placeholder="Enter name of group">
            <div class="form-group" style="margin-top: 10px">
            <button class="btn btn-primary btn-block" data-submit="modal">SAVE GROUP</button>
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
<!-- END OF CREATE NEW GROUP MODAL -->

<!-- EDIT GROUP INFORMATION MODAL WINDOW -->
<div class="modal fade" id="addEditGroup" tabindex="-1"role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Header -->
        <div class="modal-header">
            <h3 style="text-align: center; color: #d33;">EDIT GROUP INFORMATION</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
                                            
        <div class="modal-body">     
          <label for="Name">Name: </label>
              <input type="text" class="form-control" value="Men's Group" name="name_school"
                        placeholder="Enter name of school" ng-model="">
        </div>                            
        <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" data-dismiss="modal">
                           Update
             </button>
          </div>
        </div>
      </div>
   </div>
 </div>
<!-- END EDIT GROUP INFORMATION -->

<?php $this->load->view('partial/footer');?>
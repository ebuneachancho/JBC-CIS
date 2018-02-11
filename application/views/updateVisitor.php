
<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Update Visitors</li>
        </ol>


       <div class="row col-xs-12" ng-controller="visitorCtrl" style="margin:3% 9%; 0% 0%;">
          <h2 class="text-primary" style="margin-left: 35%">Register a Visitor</h2>
          <!-- <h4 class="text-success text-center">{{successRegister}}</h4>
          <h4 class="text-danger text-center">{{registerFailed}}</h4> -->
          <div style="border: 1px solid #ccc; padding:3% 5%; box-shadow: 5px 5px 9px 3px #ccc;">
            <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/visitor/update_visitor/')?><?php echo $visitorData->id?>">
            <?php if (isset($visitorUpdateSuccess)): ?>
              <div class="alert alert-success" style="margin-top: 10px">
                <?php echo $visitorUpdateSuccess;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
              <script>
                setTimeout(loadMainUrl, 5000);
                function loadMainUrl(){
                  window.location.href = <?php echo base_url('index.php/load/page_/registerVisitor');?>
                }
              </script>
            <?php endif ?>
             <?php if (isset($visitorUpdateFailed)): ?>
              <div class="alert alert-danger" style="margin-top: 10px">
                <?php echo $visitorUpdateFailed;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
            <?php endif ?>
              <div class="form-group col-lg-12" style="float: left; margin-top: 4%">
                <label class="control-label">First Name</label>
                <input type="text" 
                        name="firstName" 
                        class="form-control"
                        value="<?php echo $visitorData->first_name?>" 
                        ng-model="visitors.firstName">
              </div>
              <div class="form-group col-lg-12" style="float: left;">
                <label class="control-label">Last Name</label>
                <input type="text" 
                      name="lastName" 
                      class="form-control"
                      value="<?php echo $visitorData->last_name?>"
                      ng-model="visitors.lastName">
              </div>
              <div class="form-group col-lg-12" style="float: left;">
                <label class="control-label">Denomination</label>
                <input type="text" 
                        name="denomination" 
                        class="form-control"
                        value="<?php echo $visitorData->denomination?>" 
                        ng-model="visitors.denomination">
              </div>
              <div class="form-group col-lg-12" style="float: left;">
                <label class="control-label">Observation</label>
                <input type="text" 
                      name="observation" 
                      class="form-control"
                      value="<?php echo $visitorData->observation?>"
                      ng-model="visitors.observation">
              </div>
              <input type="hidden" name="id" value="<?php echo $visitorData->id?>">
              <div class="form-group col-lg-12" style="margin-left: 120px">
                <input type="submit" name="submit" class="btn btn-info" value="Update Visitor Record" style="padding:1.6% 5%; margin-left: 12%;">
              </div>
            </form>
          </div>
       </div> 
    </div>
    <!-- /.container-fluid -->
     
</div>
<!-- /.content-wrapper -->




<?php $this->load->view('partial/footer');?>
<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create Group</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
      <div class="row col-lg-12" style="margin-top: 3%">
            <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-home"></i>
                Enter Group Information
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Name of Group</label>
                  <input type="date" name="groupName" class="form-control col-lg-12">
                </div>
                <div class="form-group">
                  <label class="label-control">Date of Baptism:</label>
                  <input type="date" name="baptismDate" class="form-control col-lg-12">
                </div>
                <div class="form-group">
                  <label class="label-control">Denomination:</label>
                  <input type="text" name="denomination" class="form-control col-lg-12">
                </div>
              <div class="form-group">
                <label class="control-label">Name of Pastor</label>
                <input type="text" name="pastorName" class="form-control col-lg-12">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-info col-lg-12" name="submit" value="Register Member">
              </div>
              </div>
            </div>
          </div>
          </div> <!-- //create group section row -->
    </div>
</div>
<!-- /.content-wrapper -->



<?php $this->load->view('partial/footer');?>
<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Updating New Member</li>
        </ol>


       <div class="row">
          <!-- print out any validation errors -->
          <?php if ($this->session->flashdata('error')): ?>
            <p class="text-danger bg-danger"><?php echo $this->session->flashdata('error')?></p>
          <?php endif;?>

          <form class="form-inline my-2 my-lg-0 mr-lg-2 col-lg-12" method="post" 
              action="<?php echo base_url('index.php/member/update_member');?>"  
              enctype="multipart/form-data">

          <div class="col-lg-6">
          <?php if (isset($memberUpdateSuccess)): ?>
              <div class="alert alert-success col-lg-12" style="margin-top: 10px">
                <?php echo $memberUpdateSuccess;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
              <script>
                setTimeout(loadMainUrl, 5000);
                function loadMainUrl(){
                  window.location.href = <?php echo base_url('index.php/load/page_/registerVisitor');?>
                }
              </script>
            <?php endif ?>
             <?php if (isset($memberUpdateFailed)): ?>
              <div class="alert alert-danger col-lg-12" style="margin-top: 10px">
                <?php echo $memberUpdateFailed;?>
                <button class="close" data-target="alert" data-dismiss="alert">x</button>
              </div>
            <?php endif ?>
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-user"></i>
                Personal Information
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">First Name</label>
                  <input type="text" name="firstName" required="required" class="form-control col-lg-12" value="<?php echo $memberData->first_name?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Phone Number</label>
                  <input type="text" name="phoneNumber" required="required"  class="form-control col-lg-12" value="<?php echo $memberData->mobile_number?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label">ID Number</label>
                  <input type="text" name="idNumber" required="required"  class="form-control col-lg-12" value="<?php echo $memberData->id_number?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <input type="text" name="address" required="required" class="form-control col-lg-12" value="<?php echo $memberData->address?>">
                </div>
                
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-user"></i>
                Personal Information
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Last Name</label>
                  <input type="text" name="lastName" required="required" class="form-control col-lg-12" value="<?php echo $memberData->last_name?>">
                </div>
                <div class="form-group">
                  <label class="label-control">Birth Date:</label>
                  <input type="date" name="birthDate" required="required" class="form-control col-lg-12" value="<?php echo $memberData->date_of_birth?>">
                </div>
                <div class="form-group">
                <label class="label-control">Gender / Sex</label>
                <select name="gender" required="required" class="form-control col-lg-12">
                  <option selected="selected"> <?php echo $memberData->sex?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Upload Picture</label>
                <input type="file" name="picture" required="required" class="form-control col-lg-12" value="<?php echo $memberData->picture?>">
              </div>
              </div>
            </div>
          </div>

          <div class="row col-lg-12" style="margin-top: 3%">
            <div class="col-lg-6">
            <!-- Example Pie Chart Card -->
            <div class="card card-primary mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Marital Status
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Marital Status</label>
                  <select name="maritalStatus" required="required" class="form-control col-lg-12">
                    <optgroup>
                      <option selected="selected"> <?php echo $memberData->marital_status?></option>
                      <option value="Married">Married</option>
                      <option value="Single">Single</option>
                      <option value="Bachelor">Bachelor</option>
                    </optgroup>
                  </select>
                </div>
                <div class="form-group">
                  <label class="label-control">Social:</label>
                  <input type="text" name="social" value="<?php echo $memberData->social?>" required="required" class="form-control col-lg-12">
                </div>
                <div class="form-group">
                <label class="label-control">Status</label>
                <select required="required" name="status" class="form-control col-lg-12">
                  <option selected="selected"> <?php echo $memberData->social?></option>
                  <option value="Man">Man</option>
                  <option value="Woman">Woman</option>
                  <option value="Youth">Youth</option>
                  <option value="Child">Child</option>
                </select>
              </div>
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Parent Information
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Father's Name</label>
                  <input type="text" required="required" name="fatherName" class="form-control col-lg-12" value="<?php echo $memberData->father_name?>">
                </div>
                <div class="form-group">
                  <label class="label-control">Mother's Name:</label>
                  <input type="text" name="motherName" required="required" class="form-control col-lg-12" value="<?php echo $memberData->mother_name?>">
                </div>
                <div class="form-group">
                  <label class="label-control">Phone Number:</label>
                  <input type="text" name="familyPhoneNumber" class="form-control col-lg-12" value="<?php echo $memberData->parent_number?>">
                </div>
              <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="parentAddress" required="required" class="form-control col-lg-12" value="<?php echo $memberData->parent_address?>">
              </div>
              </div>
            </div>
          </div>
          </div>

          <!-- Church information section -->
          <div class="row col-lg-12" style="margin-top: 3%">
            <div class="col-lg-12">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-home"></i>
                Church  Information
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="control-label">Baptised</label>
                  <select class="form-control col-lg-12" required="required" name="isBaptised">
                    <option selected="selected"> <?php echo $memberData->is_baptised?></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="label-control">Date of Baptism:</label>
                  <input type="date" name="baptismDate" class="form-control col-lg-12" value="<?php echo $memberData->baptism_date?>">
                </div>
                <div class="form-group">
                  <label class="label-control">Denomination:</label>
                  <input type="text" name="denomination" required="required" class="form-control col-lg-12" value="<?php echo $memberData->denomination?>">
                </div>
              <div class="form-group">
                <label class="control-label">Name of Pastor</label>
                <input type="text" name="pastorName" required="required" class="form-control col-lg-12" value="<?php echo $memberData->pastor_name?>">
              </div>
              <input type="hidden" name="id" value="<?php echo $memberData->id?>">
              </div>
            </div>
          </div>
          </div> <!-- //chuch info row -->

          <div class="row col-lg-12" style="margin-top: 3%">
             <div class="col-lg-12">
            <!-- Example Pie Chart Card -->
            <div class="card mb-3">
              <div class="card-body">
                <input type="submit" class="btn btn-info col-lg-12" name="submit" value="Update Member">
              </div>
            </div>
          </div>
          </div>
        </form>
        </div><!-- //row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->


<?php $this->load->view('partial/footer');?>
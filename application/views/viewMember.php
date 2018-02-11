<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View Member</li>
        </ol>
        <div>
          <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Print" onclick="printData('printMemberInfo')" style="float: right; margin-right: 10%"><span class="fa fa-print"></span> 
           Print
          </button><br>
        </div>
      <div id="printMemberInfo" style="margin:5% 3% 10% 5%; padding: 3% 5%; box-shadow: 5px 5px 9px 3px #ccc;">
        <div class="row">
            <!-- adding letter head for the member view -->
           <!--  <div class="md-3" style="width: 100%; margin-buttom: 10%">
              <img src="<?php echo base_url()?>resources/images/hd-letterhead-850.png" width="100%" height="150px">
            </div> -->
            <!-- // adding letter head -->
          <div class="md-3" style="width: 30%; margin-top:50%">
            <div class="col-xs-3" style="margin-left: 10%">
              <?php if ($memberData->picture != null): ?>
                <img src="<?php echo base_url()?><?php echo $memberData->picture?>" width="200px">
              <?php endif ?>
           <?php if ($memberData->picture == null): ?>
             <img src="<?php echo base_url("resources/images/avatar.png")?>" width="200px">
           <?php endif ?>

          </div>
          </div>
          <div class="md-6" style="width: 60%">
           <div class="col-xs-3">
            <table class ="exportable_table">
              <tr>
                <td width="300px" style="padding: 2.5% 4%;"><strong>First Name: </strong><?php echo $memberData->first_name?></td>
                <td width="300px" style="padding-left: 10%;"><strong>Last Name: </strong><?php echo $memberData->last_name?></td>
              </tr>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;"><strong>Phone Number: </strong><?php echo $memberData->mobile_number?></td>
                <td width="300px" style="padding-left: 10%;"><strong>Date Of Birth: </strong><?php echo $memberData->date_of_birth?></td>
              </tr>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;"><strong>ID Number: </strong><?php echo $memberData->id_number?></td>
                <td width="300px" style="padding-left: 10%;"><strong>Sex: </strong><?php echo $memberData->sex?></td>
              </tr>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;"><strong>Address: </strong><?php echo $memberData->address?></td>
              </tr>
            </table><hr>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="md-3" style="width: 100%">
            <br><h3 class="text-center bg-default">Church Information</h3><hr><br>
            <table>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Are You Baptised: </strong><?php echo $memberData->is_baptised?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Date Of Baptism: </strong><?php echo $memberData->baptism_date?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Denomination: </strong><?php echo $memberData->denomination?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Name Of Pastor: </strong><?php echo $memberData->pastor_name?>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="md-3" style="width: 50%">
            <br><h3 class="text-center bg-default">Marital Status</h3><hr><br>
            <table>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Marital Status: </strong><br><?php echo $memberData->marital_status?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Social: </strong><br><?php echo $memberData->social?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Status: </strong><br><?php echo $memberData->status?>
                </td>
              </tr>
            </table>
          </div>
          <div class="md-6" style="width: 50%">
            <br><h3 class="text-center bg-default">Parent Information</h3><hr><br>
            <table>
              <tr>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Father's Name: </strong><br><?php echo $memberData->father_name?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Mother's Name: </strong><br><?php echo $memberData->mother_name?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Parent Number: </strong><br><?php echo $memberData->parent_number?>
                </td>
                <td width="300px" style="padding: 2.5% 4%;">
                  <strong>Parent Address: </strong><br><?php echo $memberData->parent_number?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->




<?php $this->load->view('partial/footer');?>
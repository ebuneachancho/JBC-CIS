<?php $this->load->view('partial/header');?>


<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Send Email</li>
        </ol>

    </div>
    <!-- /.container-fluid -->

    <div class="container">
    <!-- row to create a new group -->
       <!-- Adding Church Offerings section -->
            <div class="col-lg-8" style="margin: 0% 15%">
            <!-- Example Pie Chart Card -->
            <div class="bg-info card mb-3" style="color: #fff">
              <div class="card-header">
                <i class="fa fa-user"></i>&nbsp;&nbsp;
                BROADCAST GROUP SMS
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo base_url('index.php/email/sendGroupMessage');?>">
                  <div class="form-group">
                    <label class="control-label">Group Name</label>
                     <?php 
                          $query = $this->db->get('groups');
                          $row = array();
                          if ($query->num_rows() > 0) {
                            $row = $query->result();
                          }
                      ?>
                      <select class="form-control col-lg-12" style="padding: 0px" name="groupName" required="required">
                        <?php foreach ($row as $group): ?>
                          <option value="<?php echo $group->group_name;?>"><?php echo $group->group_name;?></option>
                        <?php endforeach ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label class="label-control">Message:</label>
                    
                    <textarea name="message" cellspacing="0" required="required" class="form-control" >
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label class="label-control">Send Mail?
                    <input type="checkbox" style="float: left; margin: -15px 0px 0px 70px" class="form-control" name="sendMail">
                    </label>
                  </div>
                  
                <div class="form-group">
                  <input type="submit" value="Send Message" class="btn btn-danger btn-block">
                </div>
              </form>
              </div>
            </div>
          </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- END EDIT GROUP INFORMATION -->

<?php $this->load->view('partial/footer');?>
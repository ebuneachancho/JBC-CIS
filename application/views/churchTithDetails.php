<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Church Offering Details</li>
        </ol> 

        <?php 
          $query = $this->db->get('tiths');
          $row = array();
          if ($query->num_rows() > 0) {
            $row = $query->result();
          }

        ?>

         <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <div class="card-header">
            <i class="fa fa-users"></i>
            VIEWING CHURCH TITHS DETAILS.
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
               
                <thead>
                  <tr>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Amount (CFA)</th>
                    <th>Prayer Request </th>
                    <th>Date Recorded</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>
                    <!-- Displaying total amount below table -->
                      <?php 
                        $this->db->select('SUM(amount) as amount');
                        $query = $this->db->get('tiths');
                        $queryRow = $query->row();
                        $totalTiths = $queryRow->amount;
                        if (empty($totalTiths)) {
                          echo '<span class="text-danger">' . "0" . " CFA" . '</span>';
                        }else{
                          echo '<span class="text-success">' . $totalTiths . " CFA" . '</span>';
                        }
                        
                      ?>
                      <!-- End displaying total amount below table -->
                      </th>
                    <th>Prayer Request </th>
                    <th>Date Recorded</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (isset($row)): ?>
                   <?php foreach ($row as $tith): ?>
                      <tr>
                      <td><?php echo $tith->first_name;?></td>
                      <td><?php echo $tith->last_name;?> CFA</td>
                      <td><?php echo $tith->amount;?></td>
                      <td><?php echo $tith->prayer_request;?></td>
                      <td><?php echo $tith->date;?></td>
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



<?php $this->load->view('partial/footer');?>
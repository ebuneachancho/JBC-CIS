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
          $query = $this->db->get('offerings');
          $row = array();
          if ($query->num_rows() > 0) {
            $row = $query->result();
          }

        ?>

         <div class="card mb-3" style="margin:5% 0% 0% 2%">
          <div class="card-header">
            <i class="fa fa-users"></i>
            VIEWING CHURCH OFFERING DETAILS.
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
               
                <thead>
                  <tr>
                    <th>Source </th>
                    <th>Amount (CFA)</th>
                    <th>Date Recorded</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Source </th>
                    <th><!-- Displaying total amount below table -->
                      <?php 
                        $this->db->select('SUM(offering_amount) as amount');
                        $query = $this->db->get('offerings');
                        $queryRow = $query->row();
                        $sumOffering = $queryRow->amount;
                        if (empty($sumOffering)) {
                          echo " 0 ";
                        }else{
                          echo '<span class="text-success">' . $sumOffering . " CFA" . '</span>';
                        }
                        
                      ?>
                      <!-- End displaying total amount below table --></th>
                    <th>Date Recorded</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (isset($row)): ?>
                   <?php foreach ($row as $offerings): ?>
                      <tr>
                      <td><?php echo $offerings->offering_name;?></td>
                      <td><?php echo $offerings->offering_amount;?> CFA</td>
                      <td><?php echo $offerings->date_recorded;?></td>
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
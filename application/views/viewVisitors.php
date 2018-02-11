
<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Register Visitors</li>
        </ol>


         
          <div style="border: 1px solid #ccc; padding:3% 5%; box-shadow: 5px 5px 9px 3px #ccc;">
              <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Print" onclick="printData('printVisitorData')" style="float:right"><span class="fa fa-print"></span> Print</button>
            <div id="printVisitorData">
          <div class="col-xs-3" style="margin-left: 30%">
              <img src="<?php echo base_url('resources/images/avatar.png');?>" width="200px">
          </div><br>
          <div class="col-xs-8">
            <table class="table table-bordered" ng-controller="allVisitors" width="100%" cellspacing="0">
                <tbody>
                 <tr>
                   <td><strong>First Name: </strong><?php echo $visitorData->first_name?></td>
                   <td><strong>Last Name: </strong><?php echo $visitorData->last_name?></td>
                   
                 </tr>
                 <tr style="margin-left: 10%">
                   <td><strong>Denomination: </strong><?php echo $visitorData->denomination?></td>
                   <td><strong>Observation: </strong><?php echo $visitorData->observation?></td>
                   
                 </tr>
                 
                </tbody>
              </table>
          </div>
          </div><!-- // printable section-->
       </div> 
    </div>
    <!-- /.container-fluid -->
     
</div>
<!-- /.content-wrapper -->




<?php $this->load->view('partial/footer');?>
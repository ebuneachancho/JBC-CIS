<?php $this->load->view('partial/header');?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>



        <a href="<?php echo base_url('index.php/reports');?>" class="btn btn-success">Generate report</a>
    

     <div id="chart_container">
       <canvas id="mycanvas"></canvas>
     </div>
    </div>



    <!-- javascript section for the chart -->
    <script type="text/javascript">
    $(document).ready(function(){
      $.ajax({
        url: '<?php echo base_url()?>' + 'index.php/reports/getdata',
        method: 'GET',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(data){
          console.log(data);

          for (var datafield in data) {
            var chartdata = {
            labels: datafield,
            dataset: [{
              label: 'First Name',
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              data: datafield
            }]
          };
          }
          
          var ctx = $("#mycanvas");
          var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata
          });
        },
        error: function(data){
          console.log(data);
        }
      });
    });
    </script>


    <script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  $.ajax({
        url: '<?php echo base_url()?>' + 'index.php/reports/getdata',
        method: 'GET',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        success: function(data){
          console.log(data);

          for (var datafield in data) {
            var chartdata = {
            labels: datafield,
            dataset: [{
              label: 'First Name',
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              data: datafield
            }]
          };
          }
        }
      });
  var barChartData = {
    labels : ["January","February","March","April","May","June","July"],
    datasets : [
      {
        fillColor : "rgba(220,220,220,0.5)",
        strokeColor : "rgba(220,220,220,0.8)",
        highlightFill: "rgba(220,220,220,0.75)",
        highlightStroke: "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
    ]

  }
  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true
    });
  }

  </script>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->




<?php $this->load->view('partial/footer');?>
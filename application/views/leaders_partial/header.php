<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('resources/leaders-dashboard-resources/assets/css/bootstrap.css')?>css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('resources/leaders-dashboard-rosources/assets/css/font-awesome.css');?>" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url('resources/leaders-dashboard-resources/assets/js/morris/morris-0.4.3.min.css'); ?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('resources/leaders-dashboard-resources/assets/css/custom.css'); ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php 
        $this->db->where('setting_name', 'church name');
        $query = $this->db->get('settings');
        $row = array();
        if ($query->num_rows() > 0) {
          $row = $query->result();
        }
    ?>
   <?php foreach ($row as $church_name): ?>
      <!-- <a class="navbar-brand" href="<?php //echo base_url('index.php');?>"><?php //echo $church_name->setting_value;?></a> -->
  <?php endforeach ?> <!-- end foreach to diisplay church name-->
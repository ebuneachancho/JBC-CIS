<?php $this->load->view('partial/login_header');?>
<!-- banner -->
<div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
	<div class="w3_agileits_top_nav" style="background: #5F666D">
		<ul id="gn-menu" class="gn-menu-main">
		<!-- //nav_agile_w3l -->
            <li class="second logo admin"><h1><a href="main-page.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Jerusalem Baptist Church (JBC) </a></h1></li>		
			<li class="second">
					
			</li>
		</ul>
			<!-- //nav -->
			
		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		
		<!-- /inner_content-->
		<div class="inner_content">
			<!-- /inner_content_w3_agile_info-->
			<div class="inner_content_w3_agile_info">
				<div class="registration admin_agile">		
					<div class="signin-form profile admin">
						<h1 class="text-center"><span class="fa fa-home"></span></h1>
						<h2>Login </h2>
						<?php if(isset($loginFailed)){echo $loginFailed;}?>
						<div class="login-form">
						<form action="<?php echo base_url('index.php/login/authenticate');?>" method="post">
							<input type="text" name="username" placeholder="Enter username" required="">
							<input type="password" name="password" placeholder="Password" required="">
							<div class="tp">
								<input type="submit" value="LOGIN">
							</div>
															
						</form>
						</div>	
						<h6><a href="<?php echo base_url('index.php/modules')?>">Back To Modules</a><h6>				 
					</div>

				</div>
				<!-- //inner_content_w3_agile_info-->
			</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2017 CBC. All Rights Reserved | Design by  <a href="" target="_blank">Rawlings B</a> </p>
</div>	
<!--copy rights end here-->
<!-- js -->

    <script type="text/javascript" src="<?php echo base_url('resources/login_resource/js/jquery-2.1.4.min.js');?>"></script>
	<script src="<?php echo base_url('resources/login_resource/js/modernizr.custom.js');?>"></script>
		
	<script src="<?php echo base_url('resources/login_resource/js/classie.js');?>"></script>
	<script src="<?php echo base_url('resources/login_resource/js/gnmenu.js');?>"></script>
	
	
<script src="<?php echo base_url('resources/login_resource/js/jquery.nicescroll.js')?>"></script>
<script src="js/scripts.js"></script>

<script type="text/javascript" src="<?php echo base_url('resources/login_resource/js/bootstrap-3.1.1.min.js');?>"></script>


</body>
</html>
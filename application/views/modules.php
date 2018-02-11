<?php $this->load->view('partial/login_header');?>
<!-- banner -->

  <?php 
        $this->db->where('setting_name', 'church name');
        $query = $this->db->get('settings');
        $row = array();
        if ($query->num_rows() > 0) {
          $row = $query->result();
        }
	?>
	
<div class="wthree_agile_admin_info">
		  <!-- /w3_agileits_top_nav-->
		  <!-- /nav-->
	<div class="w3_agileits_top_nav" style="background: #5F666D">
		<ul id="gn-menu" class="gn-menu-main">
		<!-- //nav_agile_w3l -->
		<?php foreach($row as $churchname): ?>
            <li class="second logo admin"><h1><a href="main-page.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo $churchname->setting_value;?> </a></h1></li>		
			<li class="second">
			
			</li>
			<?php endforeach;?>	
		</ul>
			<!-- //nav -->
			
		</div>
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		
		<!-- /inner_content-->
		<div class="inner_content">
			<!-- /inner_content_w3_agile_info-->
			<?php if (isset($loginFailed)): ?>
				<div class="alert alert-danger">
					<p class="text-danger"> <?php echo $loginFailed; ?></p>
				</div>
			<?php endif ?>
			<div class="inner_content_w3_agile_info">
				<div class="registration admin_agile">
					<a href="<?php echo base_url('index.php/login');?>">		
						<div class="signin-form profile admin" style="display: inline-block; margin: 10px 0px 15px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; background-color: #eee">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2>Super Admin</h2>
							<h6><a href="<?php echo base_url('index.php/login')?>">Click to Login</a><h6>				 
						</div>
					</a>
					
					<a href="<?php echo base_url('index.php/login')?>">		
						<div class="signin-form profile admin" style="display: inline-block; margin: 10px 0px 20px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; border: 1px solid #5F666D; background-color: #5F666D">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2 style="color: #fff">Pastor</h2>	
							<h6><a href="<?php echo base_url('index.php/login')?>">Click to Login</a><h6>				 
						</div>
					</a>
					<a href="<?php echo base_url('index.php/login')?>">		
						<div class="signin-form profile admin" style="display: inline-block; margin: 10px 0px 20px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; background-color: #eee">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2>Appointed Decon</h2>	
							<h6><a href="<?php echo base_url('index.php/login')?>">Click to Login</a><h6>				 
						</div>
					</a>
					<a href="<?php echo base_url('index.php/login')?>">		
						<div class="signin-form profile" style="display: inline-block; margin: 10px 0px 20px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; background-color: #eee">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2>Church Secretary</h2>
							<h6><a href="<?php echo base_url('index.php/login')?>">Click to Login</a><h6>				 
						</div>
					</a>

					<a href="#" data-target="#leadersLogin" data-toggle="modal">		
						<div class="signin-form profile" style="display: inline-block; margin: 10px 0px 20px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; background-color: #eee">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2>Leaders</h2>	
							<h6><a href="#" data-target="#leadersLogin" data-toggle="modal">Click to Login</a><h6>				 
						</div>
					</a>


					<a href="#"  data-target="#addEditGroup" data-toggle="modal">		
						<div class="signin-form profile" style="display: inline-block; margin: 10px 0px 20px 15px; 
	         			padding:10px 15px 0px 15px; width: 350px; background-color: #eee">
							<h1 class="text-center"><i class="fa fa-users fa-2x"></i></h1>
							<h2>Members</h2>	
							<h6><a href="#" data-target="#addEditGroup" data-toggle="modal">Click to Login</a><h6>				 
						</div>
					</a>
				</div>
				<!-- //inner_content_w3_agile_info-->
				<!-- The modules above should be pulled from the database and showed in the modules -->
			</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2017 CBC. All Rights Reserved | Design by  <a href="" target="_blank">Rawlings B & Ebune</a> </p>
</div>	
<!--copy rights end here-->

<!-- EDIT GROUP INFORMATION MODAL WINDOW -->

 <!-- MODAL -->
        <div class="modal fade" id="addEditGroup" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
        	<div class="modal-dialog"style=" color: #fff">
        		<div class="modal-content"style="background: #3a3a3a">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-login-label">Login to our site</h3>
        				<p>Enter your username and password to log on:</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="<?php echo base_url() ?>" method="post" class="login-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-username">Username</label>
	                        	<input type="text" name="leader-username" style="padding: 10px 0px" placeholder="Username..." class="form-username form-control" id="form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-password">Password</label>
	                        	<input type="password" name="leader-password" style="padding: 10px 0px" placeholder="Password..." class="form-password form-control" id="form-password">
	                        </div>
	                        <button type="submit" class="btn btn-primary">Sign in!</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>

<!-- END EDIT GROUP INFORMATION -->

<!-- LEADERS LOGIN MODAL -->
        <div class="modal fade" id="leadersLogin" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
        	<div class="modal-dialog"style=" color: #fff">
        		<div class="modal-content"style="background: #3a3a3a">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-login-label">Leaders login</h3>
        				<p>Enter your username and password to log on:</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="<?php echo base_url('index.php/leaders_dashboard/leaders_login'); ?>" method="post" class="login-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-username">Username</label>
	                        	<input type="text" name="leader_username" style="padding: 10px 0px" placeholder="Username..." class="form-username form-control" id="form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-password">Password</label>
	                        	<input type="password" name="leader_password" style="padding: 10px 0px" placeholder="Password..." class="form-password form-control" id="form-password">
	                        </div>
	                        <button type="submit" class="btn btn-primary">Sign in!</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>

<!-- END LEADERS LOGIN MODAL -->

<!-- js -->

    <script type="text/javascript" src="<?php echo base_url('resources/login_resource/js/jquery-2.1.4.min.js');?>"></script>
	<script src="<?php echo base_url('resources/login_resource/js/modernizr.custom.js');?>"></script>
		
	<script src="<?php echo base_url('resources/login_resource/js/classie.js');?>"></script>
	
	
	<script src="<?php echo base_url('resources/login_resource/js/jquery.nicescroll.js')?>"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript" src="<?php echo base_url('resources/login_resource/js/bootstrap-3.1.1.min.js');?>"></script>


</body>
</html>
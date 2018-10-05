<style type ="text/css">
	#nav_bar .active {
    color:            #F8F8F8;
    background-color: #4f81bd;

</style>

<header id="header">
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: black">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">NITK Guesthouse</a>
	    </div>
	    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
	      	<ul class="nav navbar-nav ">
		        <li>
	        		<a <?php if($this->session->userdata('type') == 'HOD') {?> 
	        				href= "<?php echo base_url(); ?>hod " 
	        			<?php } else if($this->session->userdata('type') == 'Faculty Advisor') {?> 	
	        				href= "<?php echo base_url(); ?>faculty" 
	        			<?php } else if($this->session->userdata('type') == 'Guesthouse Manager') {?> 
	        				href= "<?php echo base_url(); ?>manager" 
	        			<?php } else {?>
	        				href = "#"
	        			<?php } ?> >Home
	        		</a>
		        </li>

		        <li>
		        	<a <?php if($this->session->userdata('type') == 'HOD' || $this->session->userdata('type') == 'Student' || $this->session->userdata('type') == 'Faculty Advisor') {?> 
		        			href="<?php echo base_url(); ?>home" 
		        		<?php } else if($this->session->userdata('type') == 'Guesthouse Manager') { ?> 		href="<?php echo base_url(); ?>availability_manager" 
		        		<?php } else { ?>
		        			href="<?php echo base_url();?>"
		        		<?php } ?>
		        		>
		        		Book
		        	</a>
		    	</li>
	        	<li><a href="#">Page 2</a></li>
	        	<li><a href="#">Page 3</a></li>
	      	</ul>
	      	<ul class="nav navbar-nav navbar-right">
	      
		        <?php if($this->session->userdata('username') == '') { ?>
		        	<li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
		        <?php } else { ?>
		        	<li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username'); ?></a></li>
		        <?php } ?>
		        
		        <?php if($this->session->userdata('userid') == '') { ?>
		        	<li><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon glyphicon-login"></span> Login </a></li>
		        <?php } else { ?>
		        	<li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon glyphicon-off"></span> Logout </a></li>
		        <?php } ?>	
	      	</ul>
	    </div>
	  </div>
	</nav>
</header>
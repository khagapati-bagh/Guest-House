<section id="content">
	<form action="<?php base_url();?>" method="post">
		<div class = "container">
			<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-2"></div>
				<div class="content col-md-4 col-sm-8 col-xs-8 login-box">
					<p align="center" style="color:#ff6d00 ;font-size:18px;font-weight:bold">Login using your IRIS ID.</p>
					<p align="center" style="color:red"><?php echo $this->session->flashdata('message'); ?></p>
				  	<div align="center" class="textbox">
				  		<i class="fa fa-user" aria-hidden="true"></i>
					    <input type="text" class="form-control "  id="id" placeholder="IRIS ID" name="id" required>
					</div>
					<div class="textbox">
						<i class="fa fa-lock" aria-hidden="true"></i>
					    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required>
					</div>
					<div align="center" class="ww">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</div>
					<a href="#" style="color:#ffea00;font-size:15px;font-weight:bold">Forgot Password</a>
				</div>
				<div class="col-md-4 col-sm-2 col-xs-2"></div>
			</div>
		</div>
	</form>
</section>
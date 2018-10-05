<section id="content">
	<form action="<?php base_url();?>" method="post">
		<div class="content ">
  			<p align="center" style="color:black;font-size:18px;font-weight:bold">Login using your IRIS ID.</p>
			<p align="center" style="color:red"><?php echo $this->session->flashdata('message'); ?></p>
		  	<div align="center">
			    <input type="text" class="form-control " id="id" placeholder="IRIS ID" name="id">
			</div>
			<div class="ww">
			    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
			</div>
			<div align="center" class="ww">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</div>
			<a href="#">Forgot Password</a>
		</div>
	</form>
</section>
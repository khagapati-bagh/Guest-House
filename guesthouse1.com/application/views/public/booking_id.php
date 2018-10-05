<section id="content" style="padding-top:150px;">
	<form action="<?php base_url();?>booking_id" method="post">
		<div class="content" >
  			<p align="center" style="color:black;font-size:20px;">Enter Booking ID.</p>
			<p align="center" style="color:red"><?php echo $this->session->flashdata('message'); ?></p>
		  	<div align="center" >
			    <input type="text" class="form-control " id="id" placeholder="Enter Booking ID" name="id" required>
			</div>
			<div align="center" class="ww">
				<!-- <button type="submit"  name="submit" class="btn btn-default">Login</button> -->
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</div>
		</div>
	</form>
</section>
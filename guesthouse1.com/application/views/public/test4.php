<section id="content">
	<div class="container">
		<div class="row Ravail" >
	  		<p class="welcome-NGH" align="center">Availability</p>
	    	<div class="col-md-2"></div>
	    	<div class="col-md-4 col-sm-6 col-xs-12 ">
	     		<div class="table-responsive">          
	        		<table class="table">
	          			<thead>
	            			<tr>
	              				<th colspan=3 align="center">AC Rooms</th>
	            			</tr>
	          			</thead>
	          			<tbody>
	            			<tr>
	              				<td style="padding-top:15px;font-weight:bold">Number of AC Rooms:</td>
	              				<td style="padding-top:15px;font-weight:bold"><?php echo $status1; ?></td>
	            			</tr>
	          			</tbody>
	        		</table>
	      		</div>
	    	</div>
	    	<div class="col-md-4 col-sm-6 col-xs-12 " >
	      		<div class="table-responsive">          
		      		<table class="table">
			        	<thead>
			          		<tr>
			            		<th colspan=3 align="center">Non-AC Rooms</th>
			          		</tr>
			        	</thead>
			        	<tbody>
			          		<tr>
			            		<td style="padding-top:15px;font-weight:bold">Number of Non-Ac Rooms:</td>
			            		<td style="padding-top:15px;font-weight:bold"><?php echo $status2; ?></td>
			          		</tr>
			        	</tbody>
		     		</table>
	      		</div>
	    	<div class="col-md-2"></div>
	  	</div>
	</div>
	<div class = "container">
	    <div class="row">
	    	<form name="form" action="<?php echo base_url();?>test4/<?php echo $chkin;?>/<?php echo $chkout; ?>" method="post">
	     		<div class="col-md-4"></div>
	      		<div class="col-md-2" style="padding-left: 57px">
					<button type="submit" class="btn btn-primary"  name = "action" value="submit" <?php if($status1 == 0 && $status2 == 0) { ?>disabled <?php }?>>Book Now</button>
	      		</div>
	      		<div class="col-md-2" style="padding-left: 57px">
	        		<button type="submit" class="btn btn-primary" name = "action" value="reject" style="width:87px" <?php if(count($info->result_array()) == 0) { ?>disabled <?php }?>>Reject</button>
	      		</div>
	      		<div class="col-md-4"></div>
	      	</form>
	    </div>
	</div><!-- container -->
</section>
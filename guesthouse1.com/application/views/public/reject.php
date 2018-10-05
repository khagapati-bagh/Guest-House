<section id ="content">
	<?php if(count($info->result_array()) == 0) { ?>
		<h4><center>No bookings in this date.</center></h4>
	<?php } else { ?> 
	<div class = "container">
		<form name="form" action="<?php echo base_url();?>reject/<?php echo $chkin; ?>/<?php echo $chkout; ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">          
			      		<table class="table">
				        	<thead>
				        	  	<tr>
				            		<th colspan=3><center>Name</center></th>
				            		<th colspan=3><center>AC Rooms</center></th>
				            		<th colspan=3><center>Non-AC Rooms</center></th>
				            		<th colspan=3><center>Check In Date</center></th>
				            		<th colspan=3><center>Check Out Date</center></th>
				            		<th colspan=3><center>Check In Status</center></th>
				            		<th colspan=3></th>
				          		</tr>
				        	</thead>
				        	<tbody>
				        		<?php foreach($info->result_array() as $row){?>
				          		<tr>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center><?php echo $row['first_name'];?> <?php echo $row['last_name']; ?></center>
				            			
				            		</td>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center><?php echo $row['number_of_ac_rooms']; ?></center>
				            			
				            		</td>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center><?php echo $row['number_of_non_ac_rooms']; ?></center>
				            			
				            		</td>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center><?php echo $row['check_in_date']; ?></center>
				            			
				            		</td>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center><?php echo $row['check_in_date']; ?></center>
				            			
				            		</td>
				            		<td colspan=3 style="padding-top:15px;font-weight:bold">
				            			<center>
					            			<?php if($row['status'] == 0) { ?>
					            				<span style="color:red" >False</span>
					            			<?php } else if ($row['status'] == 1) { ?>
					            				<span style="color:red" >True</span>
					            			<?php } ?>
				            			</center>
				            		</td>
				            		<td colspan=3 style="font-weight:bold"><center>
			        					<button type="submit" name="reject" value="<?php echo $row['booking_id'];?>">
			        						Reject
			        					</button>
			        				</center>
			        				</td>
				          		</tr>
				          		<?php } ?>
				        	</tbody>
		     			</table>	
					</div><!-- table-responsive -->
				</div> <!-- col-md-12 -->
			</div><!-- row -->
		</form>
	</div><!-- container -->
<?php } ?>
</section>
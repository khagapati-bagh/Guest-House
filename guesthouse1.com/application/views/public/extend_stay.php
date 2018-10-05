<section id="content">
	<form name="form" method="post" action="<?php echo base_url();?>extend_stay/<?php echo $application_number;?>"
	<div class="row" style="margin-top:30px">
     <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <div class="col-md-2 col-sm-6 col-xs-12"> 
      <label for="usr">AC Rooms:</label>
      	<?php foreach($ac_room->result_array() as $rooms) { ?>
        	<input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
      	<?php } ?>
    </div>
   
    <div class="col-md-2 col-sm-6 col-xs-12"> 
        <label for="usr">Non-AC Rooms:</label>
        <?php foreach($nac_room->result_array() as $rooms) { ?>
        	<input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
      	<?php } ?>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-12">
      <label for="sel1"></label>
      <div id="check" class="btn-group btn-group-justified" style="padding-top: 5px;">
        <input type="submit" name="submit" value="Apply for rooms" class="btn btn-primary" style="width:100%">
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <?php } ?>
	</form>
  </div>
</section>
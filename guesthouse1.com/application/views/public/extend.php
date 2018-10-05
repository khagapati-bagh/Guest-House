<section id="content">
<form name="form" method="post" action="<?php echo base_url();?>extend/<?php echo $application_number;?>"
  <h1><center>Check Room Availability</center></h1>
  <div class="row" style="margin-top:30px">
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <div class="col-md-2 col-sm-6 col-xs-12"> 
      <label for="usr">Check-in date:</label>
      <input type="text" class="form-control" id="chkin" name="chkin" placeholder="YYYY-MM-DD">
    </div>
   
    <div class="col-md-2 col-sm-6 col-xs-12"> 
          <label for="usr">Check-out Date:</label>
      <input type="text" class="form-control" id="chkout" name="chkout" placeholder="YYYY-MM-DD">
    </div>

    <!-- <div class="col-md-2 col-sm-3 col-xs-12"> 
      <label for="sel1">No. of rooms: </label>
      <input type="text" class="form-control" name="rooms" required>
    </div> -->

    <div class="col-md-2 col-sm-3 col-xs-12">
      <label for="sel1"></label>
      <div id="check" class="btn-group btn-group-justified" style="padding-top: 5px;">
        <input type="submit" name="check_availability" value="Check Availability" class="btn btn-primary" style="width:100%">
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
  </div>

  <div class="row" style="margin-top:30px">
    <?php if($ac == 0 && $nac == 0) {
        $this->session->flashdata('message');
      }
        else {
    ?>
      <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <div class="col-md-2 col-sm-6 col-xs-12"> 
      <label for="usr">AC Rooms:</label>
      <b><?php echo $ac;?></b>
    </div>
   
    <div class="col-md-2 col-sm-6 col-xs-12"> 
          <label for="usr">Non-AC Rooms:</label>
          <b><?php echo $nac;?></b>
    </div>
    <div class="col-md-2 col-sm-3 col-xs-12">
      <label for="sel1"></label>
      <div id="check" class="btn-group btn-group-justified" style="padding-top: 5px;">
        <input type="submit" name="apply_rooms" value="Apply for rooms" class="btn btn-primary" style="width:100%">
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
    <?php } ?>
  </div>
</form>
</section>
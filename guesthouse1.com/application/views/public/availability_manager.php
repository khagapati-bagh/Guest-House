<!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/css/bootstrap-datepicker.css"> -->

<section id="content">
	<form name="form1" method="post" action="<?php echo base_url(); ?>availability_manager">
	<h2 style = "padding-top: 50px"><center>Check Room Availability</center></h2>
    <div class="row" style="padding: 15px;">
      <div class="col-md-2"></div>
      <div  class="col-md-8 welcome-border"></div>
      <div class="col-md-2"></div>
    </div>
    
    <div class="row ">
      <div class="col-md-3 col-sm-6 col-xs-12"></div>
      <div class="col-md-2 col-sm-6 col-xs-12"> 
        <label for="chkin">Check-in date:</label>
        <input type="date" class="form-control" id="chkin" name="chkin" placeholder="YYYY-MM-DD" required>
      </div>
     
      <div class="col-md-2 col-sm-6 col-xs-12"> 
        <label for="chkout">Check-out Date:</label>
        <input type="date" class="form-control" id="chkout" name="chkout" placeholder="YYYY-MM-DD" required>
      </div>

      <!-- <div class="col-md-2 col-sm-3 col-xs-12"> 
        <label for="room_type">Room Type:</label><br>
        <select name="room_type" class="form-control">
        	<option value="AC">AC</option>
        	<option value="Non-AC">Non-AC</option>
        </select>
      </div> -->

      <div class="col-md-2 col-sm-3 col-xs-12">
        <label for="sel1"></label>
        <div id="check" class="btn-group btn-group-justified" style="padding-top: 5px;">
          <input type="submit" name="submit" value="Check Availability" class="btn btn-primary" style="width:100%">
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12"></div>
    </div><br>
    <p style = "color:red;margin-left:230px;">
      <?php echo $this->session->flashdata('message'); ?>
    </p>
</form>
</section>

<!-- <script src="<?php //echo base_url(); ?>assets/javascript/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        
        $('#chkin').datepicker({
            format: "yyyy-mm-dd"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $('#chkout').datepicker({
            format: "yyyy-mm-dd"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
    
    });
</script> -->
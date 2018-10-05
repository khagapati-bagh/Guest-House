<style type="text/css">
#content{
    position:relative;
    width:auto;
    min-height: 80.4vh;
    background-color: none;
    overflow-x:hidden;
}
</style>

<section id="content">
<form name="form1" method="post" action="<?php echo base_url(); ?>faculty_modal/<?php echo $detail['application_number']?>">
<div class="modal fade" id=myModal<?php echo $sub['application_number']; ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="margin-top:120px">
      <div class="modal-header">
        <div class ="container">
          <div class ="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
              <button type="submit" class="btn btn-default " value="Back" name="back">
                <i class="fa fa-backward"></i>  Back</button>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
              <h4>Guest's Details(Faculty Advisor's Page)</h4>
            </div>  
          </div>
        </div>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div id="wrapper" class="newspaper">
          <div ><b>Applicant :</b>
            <?php echo $detail['submitted_by']; ?>
          </div>
          <div>
            <b >Guest Name : </b> <?php echo $detail['first_name']; ?> <?php echo $detail['last_name']; ?>
          </div>
        </div>
        <div id="wrapper" class="newspaper">
          <div >
            <b>Nature of Visit :</b> <?php echo $detail['nature_of_visit']; ?>
            <?php if($detail['nature_of_visit']=='Official') { ?>
              <button class="btn btn-success btn-sm " onclick=" window.open('<?php echo base_url();?>uploads/documents/<?php echo $detail['document'];?>','_blank')" >Check</button>
            <?php } ?>
          </div>
          <div >
            <b>No. of Person : </b> <?php echo $detail['number_of_persons']; ?>
          </div>
        </div>

        <div id="wrapper" class="newspaper">
          <div>
            <b>No. of AC Room(s) : </b> <?php echo $detail['number_of_ac_rooms']; ?>
          </div>
          <div >
            <b>No. of Non-AC Room(s) : </b> <?php echo $detail['number_of_non_ac_rooms']; ?>
          </div>
        </div>
        
        <div id="wrapper" class="newspaper">
          <div>
            <b>Date from : </b> <?php echo $detail['check_in_date']; ?> 
          </div>
          <div>
            <b>Date To : </b> <?php echo $detail['check_out_date']; ?>
          </div>
        </div>       
      </div><!-- Modal body -->
      <!-- Modal footer -->

      <div class="modal-footer align">
        <p style = "color:red;"><?php echo $this->session->flashdata('message');?></p>
        <?php if($detail['faculty_status'] == 2 || $detail['faculty_status'] == 0) { ?>
          <div style="text-align:left">
            <b style="color:red">No. of AC rooms available:</b> <span ><?php echo $available_ac;?></span>
          </div>
          <div style="text-align:left">
            <b style="color:red">No. of Non-AC rooms available:</b> <span ><?php echo $available_nac;?></span>
          </div>
        <?php } ?>
        <br>
        <?php if($status == 0 && ($detail['faculty_status'] == 0 || $detail['faculty_status'] == 2) && $detail['check_in_date'] > date('Y-m-d')) { ?>
          <input type="submit" style="margin-left: 200px"  class="btn btn-default" value="Approve" name="approve">
        <?php } ?>
        <?php if($status != 1  && ($detail['faculty_status'] == 1 || $detail['faculty_status'] == 2) && $detail['check_in_date'] > date('Y-m-d') ) {?>
          <input type="submit" class="btn btn-default" value="Disapprove" name="disapprove">
        <?php } ?>
      </div><!-- Modal footer -->
    </div>
  </div>
</div>
</form>
</section>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
    $('#guesthouse1').hover(function(){
      var name = $(this).val();
      $.ajax({
        url:'<?php //echo base_url();?>room_status_ac_dean/1/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac1').text(response.count);
        },
      });

      $.ajax({
        url:'<?php //echo base_url();?>room_status_non_ac_dean/1/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#non_ac1').text(response.count);
        },
      });
    });

    $('#guesthouse2').hover(function(){
      var name = $(this).val();
      $.ajax({
        url:'<?php //echo base_url();?>room_status_ac_dean/2/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac2').text(response.count);
        },
      });

      $.ajax({
        url:'<?php //echo base_url();?>room_status_non_ac_dean/2/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#non_ac2').text(response.count);
        },
      });
    });

    $('#guesthouse3').hover(function(){
      var name = $(this).val();
      $.ajax({
        url:'<?php //echo base_url();?>room_status_ac_dean/3/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac3').text(response.count);
        },
      });

      $.ajax({
        url:'<?php //echo base_url();?>room_status_non_ac_dean/3/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#non_ac3').text(response.count);
        },
      });
    });

    $('#guesthouse4').hover(function(){
      var name = $(this).val();
      $.ajax({
        url:'<?php //echo base_url();?>room_status_ac_dean/4/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac4').text(response.count);
        },
      });

      $.ajax({
        url:'<?php //echo base_url();?>room_status_non_ac_dean/4/<?php //echo $detail['check_in_date']; ?>/<?php //echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#non_ac4').text(response.count);
        },
      });
    });
  });
</script> -->
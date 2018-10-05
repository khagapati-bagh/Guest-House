<section id="content">
<form name="form1" method="post" action="<?php echo base_url(); ?>test1/<?php echo $detail['application_number']?>">
<div class="modal fade" id="myModal<?php echo $sub['application_number']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title"><center>Guest's Details(Dean's Page)</center></h4>
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
        <div id="container1234">
          <ul>
          <?php if($detail['dean_status'] == 2 || $detail['dean_status'] == 0) { ?>
            <li>Guest house
              <ul>
                <li value="1" id="guesthouse1">C.V. Raman
                  <ul>
                    <li><label><input type="checkbox" name="guesthouse[]" value="1AC"> AC - <span id='ac1'></span></label></li>
                    <li><label><input type="checkbox" name="guesthouse[]" value="1Non-AC"> Non-AC - <span id='non_ac1'></span></label></li>
                  </ul>
                </li> 

                <li value="2" id="guesthouse2">Vikram Sarabhai
                  <ul >
                    <li><label><input type="checkbox" name="guesthouse[]" value="2AC"> AC - <span id='ac2'></span></label></li>
                    <li><label><input type="checkbox" name="guesthouse[]" value="2Non-AC"> Non-AC - <span id='non_ac2'></span></label></li>
                  </ul>
                </li>

                <li value="3" id="guesthouse3">J.C. Bose
                  <ul >
                    <li><label><input type="checkbox" name="guesthouse[]" value="3AC"> AC - <span id='ac3'></span></label></li>
                    <li><label><input type="checkbox" name="guesthouse[]" value="3Non-AC"> Non-AC - <span id='non_ac3'></span></label></li>
                  </ul>
                </li>

                <li value="4" id="guesthouse4">International Guest House
                  <ul >
                    <li><label><input type="checkbox" name="guesthouse[]" value="4AC"> AC - <span id='ac4'></span></label></li>
                    <li><label><input type="checkbox" name="guesthouse[]" value="4Non-AC"> Non-AC - <span id='non_ac4'></span></label></li>
                  </ul>
                </li>

              </ul>
            </li>
          <?php }?>
          </ul>
        </div>
        <br>
        <?php if(($guest_status == 0 && $detail['dean_status'] == 0 )|| $detail['dean_status'] == 2) { ?>
          <input type="submit" style="margin-left: 200px"  class="btn btn-default" value="Approve" name="approve">
        <?php } ?>
        <?php if(($guest_status != 1  && $detail['dean_status'] == 1) || $detail['dean_status'] == 2) {?>
          <input type="submit" class="btn btn-default" value="Disapprove" name="disapprove">
        <?php } ?>
      </div><!-- Modal footer -->
    </div>
  </div>
</div>
</form>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
    $('#guesthouse1').hover(function(){
      var name = $(this).val();
      $.ajax({
        url:'<?php echo base_url();?>room_status_ac_dean/1/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac1').text(response.count);
        },
      });

      $.ajax({
        url:'<?php echo base_url();?>room_status_non_ac_dean/1/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
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
        url:'<?php echo base_url();?>room_status_ac_dean/2/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac2').text(response.count);
        },
      });

      $.ajax({
        url:'<?php echo base_url();?>room_status_non_ac_dean/2/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
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
        url:'<?php echo base_url();?>room_status_ac_dean/3/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac3').text(response.count);
        },
      });

      $.ajax({
        url:'<?php echo base_url();?>room_status_non_ac_dean/3/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
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
        url:'<?php echo base_url();?>room_status_ac_dean/4/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#ac4').text(response.count);
        },
      });

      $.ajax({
        url:'<?php echo base_url();?>room_status_non_ac_dean/4/<?php echo $detail['check_in_date']; ?>/<?php echo $detail['check_out_date']; ?>',
        method: 'POST',
        dataType: 'json',
        data: {name: name},
        success: function(response){
          $('#non_ac4').text(response.count);
        },
      });
    });
  });
</script>
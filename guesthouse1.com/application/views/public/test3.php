<section id="content">
  <form name="form" method="post" action="<?php echo base_url(); ?>test3/<?php echo $info['application_number']; ?> " enctype="multipart/form-data">
  <!-- The Modal -->
  <div class="modal fade" id="myModal<?php echo $sub['application_number']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Guest's Details</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div id="wrapper" class="newspaper">
            <div ><b>Booking ID : </b><?php echo $booking_id;?>
            </div>
            <div>
              <b>Date From : </b> </b> <?php echo $info['check_in_date']; ?>
            </div>
          </div>
          <div id="wrapper" class="newspaper">
            <div ><b>Guest Name: </b><?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?>
            </div>
            <div >
              <b>Date To :</b> <?php echo $info['check_out_date']; ?>
            </div>
          </div>
          <div id="wrapper" class="newspaper">
            <div >
              <b><?php echo $info['id_card_type']; ?>:</b> <?php echo $info['id_card_number']; ?>
            </div>
            <div >
              <b>Date from : </b> <?php echo $info['check_in_date']; ?>
            </div>
          </div>
          <div class="newspaper">
            <div>
            <?php if($document['document'] == '') { ?>  
              <label>Upload Document
                <input type="file" id="document" name="document">
              </label>
            <?php } ?> 
            <?php if($document['document'] != '') { ?>  
                <div></div>
                <button class="btn btn-success btn-sm " onclick=" window.open('<?php echo base_url();?>uploads/documents/<?php echo $document['document'];?>','_blank')" >Check Document</button>
            <?php } ?>
            </div>
            <div>
              
              <b>No. of Person(s) : </b><?php echo $info['number_of_persons']; ?> 
            </div>
          </div>
          <div class="newspaper">
            <?php foreach($rooms as $rooms) { 
                echo "<b>Guesthouse Name : </b> ".$rooms['guesthouse_name']."<br>";
                echo "<b>Room Number: </b> ".$rooms['room_number']."<br>";
                echo "<b>Room Type: </b> ".$rooms['room_type']."<br>";
            } ?>
          </div>        
        </div><!-- Modal body -->
        <!-- Modal footer -->
        <div class="modal-footer">
           <?php if($document['check_in_date_time'] == '0000-00-00 00:00:00'){ ?>
          <button type="submit" class="btn btn-default" name="check_in" value="<?php echo $info['application_number']; ?>">Check In
            
          </button>
          <?php } ?>

          <?php if($document['check_in_date_time'] != '0000-00-00 00:00:00'){ ?>
          <button type="submit" class="btn btn-default" name="extend" value="<?php echo $info['application_number']; ?><?php echo $info['application_number']; ?>">Extend Stay 
            
          </button>
          <?php } ?>

          <?php if($document['check_out_date_time'] == '0000-00-00 00:00:00'){ ?>
          <button type="submit" class="btn btn-default" name="check_out" value="<?php echo $info['application_number']; ?>">Check Out 
            
          </button>
          <?php } ?>
        </div><!-- Modal footer -->
      </div>
    </div>
  </div>
</form>
</section>
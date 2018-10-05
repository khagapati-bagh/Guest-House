<section id="content">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
  <form name="form2" method="post" action="<?php echo base_url(); ?>test2/<?php echo $info['application_number'];?>">
    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Guest's Details</h4>
    </div>
    
    <!-- Modal body -->
    <div class="modal-body">
      <div id="wrapper" class="newspaper">
        <div ><b>Applicant :</b>
          <?php echo $info['submitted_by']; ?>
        </div>
        <div>
          <b >Guest Name : </b> <?php echo $info['first_name']; ?> <?php echo $info['last_name']; ?>
        </div>
      </div>
      <div id="wrapper" class="newspaper">
        <div ><b>Nature of Visit :</b> <?php echo $info['nature_of_visit']; ?>
        </div>
        <div >
          <b>No. of Person : </b> <?php echo $info['number_of_persons']; ?>
        </div>
      </div>
      <div id="wrapper" class="newspaper">
        <div>
          <b>No. of AC Room(s) : </b> <?php echo $info['number_of_ac_rooms']; ?>
        </div>
        <div >
          <b>No. of Non-AC Room(s) : </b> <?php echo $info['number_of_non_ac_rooms']; ?>
        </div>
      </div>
      <div id="wrapper" class="newspaper">
        <div>
          <b>Date from : </b> <?php echo $info['check_in_date']; ?> 
        </div>
        <div>
          <b>Date To : </b> <?php echo $info['check_out_date']; ?>
        </div>
      </div>

      <div style="color:red;">
        <?php echo $this->session->flashdata('message');?>
      </div>

      <?php foreach($booking_info->result_array() as $sub) { ?>
      <div class="row" style="padding-top: 5px;">
        <div class="col-lg-3 col-xs-4">
          <b>Guest House Name : </b> 
        </div>
        <div class="col-lg-3 col-xs-4">
          <?php echo $sub['guesthouse_name'];?>
        </div>
        <?php if($sub['status'] == 0) { ?>
        <div class="col-lg-2 col-xs-4">
          <div class="button-group">

            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
              <span class=" " name="button" value="<?php echo $sub['guesthouse_number'];?><?php echo $sub['room_type'];?>"><b><?php echo $sub['room_type'];?> Rooms</b></span> <span class="caret">
              </span>
            </button>
            <?php if($sub['guesthouse_number'] == 1) { ?>
            <ul class="dropdown-menu">
              
              <?php foreach($guesthouse1->result_array() as $rooms) { ?>

                <?php if($sub['room_type'] == $rooms['room_type']) { ?>

                  <li>
                    <a href="#" class="small" data-value="option1" tabIndex="-1">
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
                      
                      <input type="hidden" name="application_number" value="<?php echo $info['application_number'];?>">
                    </a>
                  </li>
                <?php }?>
              <?php }?>
              <?php } ?>
            </ul>

            <?php if($sub['guesthouse_number'] == 2) { ?>
            <ul class="dropdown-menu">
              
              <?php foreach($guesthouse2->result_array() as $rooms) { ?>

                <?php if($sub['room_type'] == $rooms['room_type']) { ?>

                  <li>
                    <a href="#" class="small" data-value="option1" tabIndex="-1">
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
                      
                      <input type="hidden" name="application_number" value="<?php echo $info['application_number'];?>">
                    </a>
                  </li>
                <?php }?>
              <?php }?>
              <?php } ?>
            </ul>

            <?php if($sub['guesthouse_number'] == 3) { ?>
            <ul class="dropdown-menu">
              
              <?php foreach($guesthouse3->result_array() as $rooms) { ?>

                <?php if($sub['room_type'] == $rooms['room_type']) { ?>

                  <li>
                    <a href="#" class="small" data-value="option1" tabIndex="-1">
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
                      
                      <input type="hidden" name="application_number" value="<?php echo $info['application_number'];?>">
                    </a>
                  </li>
                <?php }?>
              <?php }?>
              <?php } ?>
            </ul>

            <?php if($sub['guesthouse_number'] == 4) { ?>
            <ul class="dropdown-menu">
              
              <?php foreach($guesthouse4->result_array() as $rooms) { ?>

                <?php if($sub['room_type'] == $rooms['room_type']) { ?>

                  <li>
                    <a href="#" class="small" data-value="option1" tabIndex="-1">
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number'];?><?php echo $rooms['room_number'];?>"/>&nbsp;Room No.<?php echo $rooms['room_number'];?>
                      
                      <input type="hidden" name="application_number" value="<?php echo $info['application_number'];?>">
                    </a>
                  </li>
                <?php }?>
              <?php }?>
              <?php } ?>
            </ul>

          </div><!-- button group -->
        </div><!-- col-lg-2 col-xs-4 -->
        <?php } ?>
      </div> 
      <?php } ?>       
    </div><!-- Modal body -->
    <!-- Modal footer -->
    <div class="modal-footer align">
    <?php if($sub['status'] == 0) { ?>
      <input type="submit" class="btn btn-default" value='Submit' name='submit'>
      <input type = "hidden" name="room_count" value="<?php echo ($info['number_of_ac_rooms'] + $info['number_of_non_ac_rooms']) ?>">
      <!-- <button type="submit" class="btn btn-default" name="disapprove" value="<?php //echo $info['application_number']; ?>">Submit
        <i class="fa fa-thumbs-o-down" style="font-size:36px"></i>
      </button> -->
    <?php } ?>

    </div><!-- Modal footer -->
  </form>
  </div><!-- Modal content -->
</div><!-- Modal dialog -->
</section>
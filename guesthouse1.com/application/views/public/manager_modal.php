<style type="text/css">
  .whatever{
      background-color:#F39C12;
      display: inline-block;
      width: 37px;
      height: 30px;
      border-radius:5px;
      padding:5px 5px 15px 5px;
}

  #checkbox{
    color:#C0392B;
    position:absolute;
  }

  #checkboxes input[type=checkbox] {
    display:none;
  }

  #checkboxes input[type=checkbox]:checked +.whatever{
    background-color:#57F30E;
  }

  #checkboxes input[type=checkbox]:disabled +.whatever{
    background:#99A3A4;
    overflow: hidden;
  }

  .common{
    background-color:#283747;
    display: inline-block;
    width: 37px;
    height: 30px;
    border-radius:5px;
    padding:5px 5px 15px 5px;
  }
  input[type=checkbox]:checked + .common{
    background-color:#57F30E;
  }

  input[type=checkbox]:disabled + .common{
    background:#99A3A4;
    overflow: hidden;
  }

  #content{
    position:relative;
    min-height: 80.4vh;
    background-color: none;
    overflow-x:hidden;
  }
}


</style>

<section id="content">
<form name="form1" method="post" action="<?php echo base_url(); ?>manager_modal/<?php echo $detail['application_number']?>" enctype="multipart/form-data" class="form-inline">
<div class="modal fade" id=myModal<?php echo $sub['application_number'];?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="margin-top:80px;margin-left:40px;position:absolute;width:800px">
      <div class="modal-header">
        <div class ="container">
          <div class ="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
              <button type="submit" class="btn btn-default " value="Back" name="back">
                <i class="fa fa-backward"></i>  Back</button>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
              <h4>Guest's Details(Manager's Page)</h4>
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
          
        <?php if($confirm_status['status'] == 0 && $status != 2) { ?>
        <div id="wrapper" class="newspaper">
          <br>
          <b>Allot Rooms: </b>
        </div>
        
          <!-- GUESTHOUSE 1 -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal1">C.V. Raman</button>
          
          <div class="modal fade" id="myModal1">
            <div class="modal-dialog modal-lg" style="width:240px">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">C.V. Raman</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                  <div id="checkboxes">
                    
                    <b>Ground Floor</b><br>
                    <hr>
                    <?php foreach($gh1g->result_array() as $rooms){?>
                    
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    
                    <?php } ?>
                  
                    <hr>
                    <b>First Floor</b><br>
                    <hr>
                    <?php foreach($gh1f->result_array() as $rooms){?>
                    
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    
                    <?php } ?>
                  
                    <hr>
                    <b>Second Floor</b><br>
                    <hr>
                    <?php foreach($gh1s->result_array() as $rooms){?>
                    
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    
                    <?php } ?>
                         
                  </div>

                </div><!-- Modal body -->
                <!-- Modal footer -->
                <div class="modal-footer align">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: right">OK</button>
                </div><!-- Modal footer -->

              </div><!-- Modal content -->
            </div><!-- Modal dialog -->
          </div><!-- Modal -->

          <!-- GUESTHOUSE 2 -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal2">Vikram Sarabhai</button>
          
          <div class="modal fade" id="myModal2">
            <div class="modal-dialog modal-lg" style="width:440px">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Vikram Sarabhai</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                  <div id="checkboxes">

                    <b>Ground Floor</b><br>
                    <hr>
                    <?php foreach($gh2g->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?>/>
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>

                    <hr>
                    <b>First Floor</b><br>
                    <hr>
                    <?php foreach($gh2f->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?>/>
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>
                  
                  </div>
                </div><!-- Modal body -->
                <!-- Modal footer -->
                <div class="modal-footer align">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: right">OK</button>
                </div><!-- Modal footer -->
              </div><!-- Modal content -->
            </div><!-- Modal dialog -->
          </div><!-- Modal -->

          <!-- GUESTHOUSE 3 -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal3">J.C. Bose</button>
          
          <div class="modal fade" id="myModal3">
            <div class="modal-dialog modal-lg" style="width:305px">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">J.C. Bose</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                  <div id="checkboxes">

                    <b>Ground Floor</b><br>
                    <hr>
                    <?php foreach($gh3g->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>

                    <hr>
                    <b>First Floor</b><br>
                    <hr>
                    <?php foreach($gh3f->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>


                  </div>
                </div><!-- Modal body -->
                <!-- Modal footer -->
                <div class="modal-footer align">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: right">OK</button>
                </div><!-- Modal footer -->
              </div><!-- Modal content -->
            </div><!-- Modal dialog -->
          </div><!-- Modal -->

          <!-- GUESTHOUSE 4 -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal4">Homi J. Baba</button>
          
          <div class="modal fade" id="myModal4">
            <div class="modal-dialog modal-lg" style="width:165px">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Homi J. Baba</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                  <div id="checkboxes">

                    <b>Ground Floor</b><br>
                    <hr>
                    <?php foreach($gh4g->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>

                    <hr>
                    <b>First Floor</b><br>
                    <hr>
                    <?php foreach($gh4f->result_array() as $rooms){?>
                      <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                      <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                    <?php } ?>

                  </div>
                </div><!-- Modal body -->
                <!-- Modal footer -->
                <div class="modal-footer align">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: right">OK
                    </button>
                </div><!-- Modal footer -->
              </div><!-- Modal content -->
            </div><!-- Modal dialog -->
          </div><!-- Modal -->

          <!-- GUESTHOUSE 5 -->
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal5">International Guest House</button>
               
          <div class="modal fade" id="myModal5">
            <div class="modal-dialog modal-lg" style="width:565px">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">International Guest House</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->

                <div class="modal-body">
                  <div id="checkboxes">

                    <b><center>Ground Floor</center></b>
                    <hr>
                    <b>Single Bed</b>
                    <hr>
                      <?php foreach($gh5g->result_array() as $rooms) { ?>
                          <?php if($rooms['bed_type'] == 'Single') { ?>
                              <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                              <label <?php if($rooms['toilet'] != 'Common') { ?>class="whatever"<?php } else {?> class = "common" <?php } ?> for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"> 
                                <span id ="checkbox"><?php echo $rooms['room_number']?></span>
                              </label>

                          <?php } ?>
                      <?php } ?>

                    <hr>
                    <b><center>First Floor</center></b>
                    <hr>
                    <b>Single Bed</b>
                    <hr>
                        <?php foreach($gh5f->result_array() as $rooms) { ?>
                            <?php if($rooms['bed_type'] == 'Single') { ?>
                              <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                              <label <?php if($rooms['toilet'] != 'Common') { ?>class="whatever"<?php } else {?> class = "common" <?php } ?> for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>">
                                <span id ="checkbox"><?php echo $rooms['room_number']?></span>
                              </label>
                            <?php } ?>
                        <?php } ?>
                    <hr>
                    <b><center>Second Floor</center></b>
                    <hr>
                    <div id="wrapper" class="newspaper">
                      <div>
                        <b>Single Bed</b>
                      </div>
                      <div>
                        <b>Double Bed</b>
                      </div>
                    </div>
                    <hr>
                    <div id="wrapper" class="newspaper">
                      <div>
                        <?php foreach($gh5s->result_array() as $rooms) { ?>
                            <?php if($rooms['bed_type'] == 'Single') { ?>
                              <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                              <label <?php if($rooms['toilet'] != 'Common') { ?>class="whatever"<?php } else {?> class = "common" <?php } ?> for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>">
                                <span id ="checkbox"><?php echo $rooms['room_number']?></span>
                              </label>
                            <?php } ?>
                        <?php } ?>
                      </div>
                      <div>
                        <?php foreach($gh5s->result_array() as $rooms) { ?>
                            <?php if($rooms['bed_type'] == 'Double') {?>
                              <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                              <label <?php if($rooms['toilet'] != 'Common') { ?>class="whatever"<?php } else {?> class = "common" <?php } ?> for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>">
                                <span id ="checkbox"><?php echo $rooms['room_number']?></span>
                              </label>
                            <?php } ?>  
                        <?php } ?>
                      </div>
                    </div>  

                  </div> <!-- checkboxes -->
                </div><!-- Modal body -->
                <!-- Modal footer -->
                <div class="modal-footer align">
                  <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: right">OK
                  </button>
                </div><!-- Modal footer -->
              </div><!-- Modal content -->
            </div><!-- Modal dialog -->
          </div><!-- Modal -->

        <?php } ?> 

        <?php if($confirm_status['status'] != 0) { ?>
          <div id="wrapper" class="newspaper">
            <div>
              <b><u>Guesthouse Name</u></b>
            </div>
            <div>
              <b><u>Room Number</u></b>
            </div>
          </div>
          <?php foreach($assigned_rooms->result_array() as $rooms) { ?>
            <div id="wrapper" class="newspaper">
              <div>
                <?php echo $rooms['guesthouse_name']; ?> 
              </div>
              <div>
                </b> <?php echo $rooms['room_number']; ?>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

      </div><!-- Modal body -->
      <div class="newspaper" style="position:absolute">
          <div>
            <?php if($confirm_status['status'] == 1 && $booking_status['status'] == 0) { ?>  
              <label>Upload Document
                <input type="file" id="document" name="document">
              </label>
            <?php } ?> 
            <?php if($confirm_status['status'] == 1 && $booking_status['status'] == 1) { ?>  
                <button class="btn btn-success btn-sm" style="margin-left: 10px;margin-top: 5px" onclick=" window.open('<?php echo base_url();?>uploads/documents/<?php echo $document;?>','_blank')">Check Guest ID</button>
            <?php } ?>
          </div>
        </div>

      <!-- Modal footer -->
      <div class="modal-footer align">
        <p style = "color:red;"><?php echo $this->session->flashdata('message');?></p>
        <p style = "color:red;"><?php echo $this->session->flashdata('error');?></p>
        <br>

        <?php if($confirm_status['status'] == 0 && $status!= 2) { ?>
          <input type="submit" class="btn btn-default" value="Allot Rooms" name="action">
        <?php } else if($confirm_status['status'] == 1 && $booking_status['status'] == 1 && $booking_status['check_out_time'] == '00:00:00') { ?>
          <input type="submit" class="btn btn-default" value="Check Out" name="action">
        <?php } else if($confirm_status['status'] == 1 && $booking_status['status'] == 0) { ?>
          <input type="submit" class="btn btn-default" value="Check In" name="action">
          <input type="submit" class="btn btn-default" value="Cancel Booking" name="action">
        <?php } ?>

      </div><!-- Modal footer -->
    </div>
  </div>
</div>
</form>
</section>
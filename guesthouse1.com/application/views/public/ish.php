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
                    <div id="wrapper" class="newspaper">
                      <b>Ground Floor</b><br>
                      <hr>
                      <div>
                        <b>Single Bed</b><br>
                        <hr>
                        <?php foreach($gh5g->result_array() as $rooms) { ?>
                          <?php if($rooms['bed_type'] == 'Single') { ?>
                            <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                            <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?>
                      </div>
                      
                      <div>
                        <b>Double Bed</b><br>
                        <hr>
                          <?php else if($rooms['bed_type'] == 'Double') {?>
                            <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                            <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?>
                        <?php } ?>
                      </div>

                      <hr>
                      <b>First Floor</b><br>
                      <hr>

                      <div id="wrapper" class="newspaper">
                      
                      <div>
                        <b>Single Bed</b><br>
                        <hr>
                        <?php foreach($gh5f->result_array() as $rooms){?>
                          <?php if($rooms['bed_type'] == 'Single') { ?>
                            <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                            <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?>
                      </div>
                      
                      <div>
                        <b>Double Bed</b><br>
                        <hr>
                          <?php else if($rooms['bed_type'] == 'Double') {?>
                          <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                          <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?>
                        <?php } ?>
                      </div>

                      <hr>
                      <b>Second Floor</b><br>
                      <hr>

                      <div id="wrapper" class="newspaper">
                      
                      <div>
                        <b>Single Bed</b><br>
                        <hr>
                        <?php foreach($gh5s->result_array() as $rooms){?>
                          <?php if($rooms['bed_type'] == 'Single') { ?>
                            <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                            <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?>
                        <?php } ?>
                      </div>
                      
                      <div>
                        <b>Double Bed</b><br>
                        <hr>
                          <?php else if($rooms['bed_type'] == 'Double') {?>
                            <input type="checkbox" name="room[]" value="<?php echo $rooms['guesthouse_number']?><?php echo $rooms['room_number']?>" id="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>" <?php if($rooms['status'] == 1) { ?> disabled <?php } ?> />
                            <label class="whatever" for="<?php echo $rooms['room_number']?><?php echo $rooms['guesthouse_number']?>"><span id ="checkbox"><?php echo $rooms['room_number']?></span></label>
                          <?php } ?> 
                        <?php } ?>
                      </div>
                    
                    </div>
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

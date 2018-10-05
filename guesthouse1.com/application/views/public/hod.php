<style type = "text/css">
.active{
    background:red;
}
button.btn:active{
    background:red;
} 
</style>

<section id="content">  
<div class="container">
  <div class="row top">
    <form name = "form1" action="<?php echo base_url();?>hod" method="post">
    <div class="col-sm-3 col-md-2">
      <div class="col-md-2" id="my_styles"></div>
      
        <ul class="nav nav-pills nav-stacked ">
          <li>
            <input type = "submit" class="btn1" name="action" value="Pending" style="width:165px;display:none" id ="Pending" id=1>
            <label for="Pending" class="btn btn1 btn-primary" style="width:400px">Pending <?php if($pending_count != 0 ){ ?><span style="background-color: yellow;margin-left:25px;position:absolute;width:27px;border-radius:10px;color:red"><?php echo $pending_count; ?></span><?php } ?></label>
          </li>
          <li><input type = "submit" name="action" class="btn btn-primary" value="Approved" style="width:165px" id =2></li>
          <li><input type = "submit" name="action" class="btn btn-primary" value="Disapproved" style="width:165px" id=3></li>
          <li><input type = "submit" name="action" class="btn btn-primary" value="Book" style="width:165px" id=4></li>
        </ul>    
    </div>
    <div class="col-sm-9 col-md-8 col-sm-6">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#official" data-toggle="tab">
            <span class="glyphicon glyphicon-inbox"></span><b>Official  <!-- <i><?php echo $official_count; ?> --></b>
          </a>
        </li>
        <li>
          <a href="#non-official" data-toggle="tab">
            <span class="glyphicon glyphicon-user"></span><b>Non-Official</b>
          </a>
        </li>
        <div class="pull-right">
          <span class="text-muted"><b>1</b>–<b>50</b> of <b>277</b></span>
          <div class="btn-group btn-group-sm">
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </button>
            <button type="button" class="btn btn-default">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
          </div>
        </div>
      </ul>
      
      <div class="tab-content">
        <div class="tab-pane fade in active" id="official">
          <div class="list-group col-xs-12">
            <?php if(count($official->result_array()) == 0 && $page == 'pending'){ ?>
              <h4>No pending applications.</h4>
            <?php } else { ?>
              <?php foreach ($official->result_array() as $sub) { ?>
              <a href="#" class="list-group-item">
                <div >
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $sub['application_number']; ?>">
                  <span class="name" style="min-width: 120px;
                          display: inline-block;"><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?> </span> <span class="">This is big title</span>
                  <span class="text-muted" style="font-size: 11px;"></span> <span
                        class="badge">12:10 AM</span></button> 
                </div>
              </a>
              
              <!-- The Modal -->
              <div class="modal fade" id="myModal<?php echo $sub['application_number']; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Guest's Details(HOD's Page)</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div id="wrapper" class="newspaper">
                        <div ><b>Applicant :</b>
                          <?php echo $sub['submitted_by']; ?>
                        </div>
                        <div>
                          <b >Guest Name : </b> <?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?>
                        </div>
                      </div>
                      <div id="wrapper" class="newspaper">
                        <div ><b>Nature of Visit :</b>Official
                            <button class="btn btn-success btn-sm " onclick=" window.open('<?php echo base_url();?>uploads/documents/<?php echo $sub['document'];?>','_blank')" > Check</button>
                        </div>
                        <div >
                          <b>No. of Person : </b> <?php echo $sub['number_of_persons']; ?>
                        </div>
                      </div>
                      <div id="wrapper" class="newspaper">
                        <div >
                          <b>No. of AC Room(s) : </b> <?php echo $sub['number_of_ac_rooms']; ?>
                        </div>
                        <div >
                          <b>No. of Non-AC Room(s) : </b> <?php echo $sub['number_of_non_ac_rooms']; ?>
                        </div>
                      </div>
                      <div id="wrapper" class="newspaper">
                        <div>
                          <b>Date from : </b> <?php echo $sub['check_in_date']; ?> 
                        </div>
                        <div>
                          <b>Date To : </b> <?php echo $sub['check_out_date']; ?>
                        </div>
                      </div>        
                    </div><!-- Modal body -->
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <?php if($page == 'disapproved' || $page == 'pending' || $sub['check_in_date'] > date('Y-m-d') ){?> 
                      <button type="submit" class="btn btn-default" name="approve" value="<?php echo $sub['application_number']; ?>">Approve
                        <i class="fa fa-thumbs-o-up" style="font-size:36px"></i>
                      </button>
                      <?php } ;?>
                      <?php if(($page == 'approved' && $sub['faculty_status'] == 2) || $page == 'pending' || $sub['check_in_date'] > date('Y-m-d')){ ?>
                      <button type="submit" class="btn btn-default" name="disapprove" value="<?php echo $sub['application_number']; ?>">Disapprove 
                        <i class="fa fa-thumbs-o-down" style="font-size:36px"></i>
                      </button>

                      <?php } ;?>
                    </div><!-- Modal footer -->
                  </div><!-- Modal content -->
                </div><!-- Modal dialog -->
              </div><!-- Modal --> 
              <?php } ?>
            <?php } ?>
          </div><!-- List group -->
        </div><!-- tab-pane fade in active -->
        
        
        <div class="tab-pane fade in" id="non-official">

          <div class="list-group  col-xs-12">
            <?php if(count($non_official->result_array()) == 0 && $page == 'pending'){ ?>
              <h4>No pending applications.</h4>
            <?php } else { ?>  
              <?php foreach ($non_official->result_array() as $sub) { ?>
                <a href="#" class="list-group-item">
                  <div>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal<?php echo $sub['application_number']; ?>">
                    <span class="name" style="min-width: 120px;
                            display: inline-block;"><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?> </span> <span class="">This is big title</span>
                    <span class="text-muted" style="font-size: 11px;"></span> <span
                          class="badge">12:10 AM</span></button> 
                  </div>
                </a>

              <!-- The Modal -->
              <div class="modal fade" id="myModal<?php echo $sub['application_number']; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Applicant's Details</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div id="wrapper" class="newspaper">
                        <div ><b>Applicant :</b>
                          <?php echo $sub['submitted_by']; ?>, MCA 2020
                        </div>
                        <div>
                          <b >Guest Name : </b> <?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?>
                        </div>
                      </div>
                      <div id="wrapper" class="newspaper">
                        <div ><b>Nature of Visit :</b>Non-Official
                        </div>
                        <div >
                          <b>No. of Person : </b> <?php echo $sub['number_of_persons']; ?>
                        </div>
                      </div>
                      <div>
                        <div id="wrapper" class="newspaper">
                          <div ><b>No. of AC Room(s) : </b> <?php echo $sub['number_of_ac_rooms']; ?>
                          </div>
                          <div >
                            <b>No. of Non-AC Room(s) : </b> <?php echo $sub['number_of_non_ac_rooms']; ?>
                          </div>
                        </div>
                        <div class="newspaper">
                          <div>
                            <b>Date from : </b> <?php echo $sub['check_in_date']; ?> 
                          </div>
                          <div>
                            <b>Date To : </b> <?php echo $sub['check_out_date']; ?>
                          </div>
                        </div>        
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <?php if($page == 'disapproved' || $page == 'pending' || $sub['check_in_date'] > date('Y-m-d')){?>
                        <button type="submit" class="btn btn-default" name="approve" value="<?php echo $sub['application_number']; ?>">Approve
                          <i class="fa fa-thumbs-o-up" style="font-size:36px"></i>
                        </button>
                        <?php } ;?>
                        <?php if(($page == 'approved' && $sub['faculty_status'] == 2) || $page == 'pending' || $sub['check_in_date'] > date('Y-m-d')){?>
                        <button type="submit" class="btn btn-default" name="disapprove" value="<?php echo $sub['application_number']; ?>">Disapprove
                          <i class="fa fa-thumbs-o-down" style="font-size:36px"></i>
                        </button>
                        
                        <?php } ;?>
                      </div><!-- Modal footer -->
                    </div><!-- Modal body -->
                  </div><!-- Modal content -->
                </div><!-- Modal dialog -->
              </div><!-- Modal -->
              <?php } ?>
            <?php } ?>      
          </div><!-- List group -->
        </div><!-- tab-pane fade in -->
      <div><!-- tab content -->
    </div><!-- col-sm-9 col-md-8 col-sm-6 -->

  </form>
  </div><!-- row top -->
</div><!-- Container -->
</section>

<script>
jQuery("#my_styles .btn").click(function(){
        jQuery("#my_styles .btn").removeClass('active');
        jQuery(this).toggleClass('active'); 
});
</script>
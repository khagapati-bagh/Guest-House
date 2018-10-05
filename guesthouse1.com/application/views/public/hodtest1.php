<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css"> -->

<style type="text/css">
  body{
    color:black;
  }
  .x{
    width: auto;
  }
  @media(max-width: 440px)
  {
    .x{
      width: auto;
    }
  }
  #content{
    position:relative;
    min-height: 80.5vh;
    background-color: none;
}
</style>

<section id="content" style="margin-top: -1px;">  
<div class="container"  >
  <div class="row top">
    <form name = "form1" action="<?php echo base_url();?>hod" method="post">    
    <div class="col-md-2 col-sm-12">
      <ul class="nav nav-pills nav-stacked ">
        <li class="active">
          <button type = "submit" name="action" value="Pending" class="btn btn-primary" style="width:165px;display:none;" id="Pending">Pending</button>
          <label for="Pending" class="btn btn-primary x" style="width:400px;<?php if($button1 == 'red'){?> background:red<?php } ?>">Pending 
            <?php if($pending_count != 0 ){ ?>
              <span style="background-color: yellow;margin-left:25px;position:absolute;width:27px;border-radius:10px;color:red"><?php echo $pending_count; ?>
              </span>
            <?php } ?>
          </label>
        </li>
        <li class="active">
          <button type = "submit" name="action" value="Approved" class="btn btn-primary" style="width:165px;<?php if($button2 == 'red'){?> background:red<?php } ?>">Approved</button>
        </li>
        <li class="active">
          <button type = "submit" name="action" value="Disapproved" class="btn btn-primary"  style="width:165px;<?php if($button3 == 'red'){?> background:red<?php } ?>">Disapproved</button>
        </li>
      </ul>  
    </div>
    <div class="col-sm-12 col-md-10">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#official" data-toggle="tab">
            <span class="glyphicon glyphicon-inbox"></span><b>Official</b>
          </a>
        </li>
        <li>
          <a href="#non-official" data-toggle="tab">
            <span class="glyphicon glyphicon-user"></span><b>Non-Official</b>
          </a>
        </li>
      </ul>
<div class="tab-content col-sm-12">
  <div class="tab-pane fade in active" id="official" style="width:950px">
    <div class="list-group col-xs-12  col-sm-12">
      <?php if(count($official->result_array()) == 0){ ?>
        <h4>No applications.</h4>
      <?php } else { ?>
        <div class="row">
          <table id="table_id1" class="table table-condensed table-striped table-hover">
            <thead>
                <tr>
                  <th>Application Number</th>    
                  <th>Name</th>
                  <th>Check In Date</th>
                  <th>Check Out Date</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($official->result_array() as $sub) { ?>
                <tr>
                  <td><?php echo $sub['application_number'] ?></td>
                  <td><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?></td>
                  <td><?php echo $sub['check_in_date']; ?></td>
                  <td><?php echo $sub['check_out_date'] ?></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $sub['application_number']; ?>">
                      <span class="name" style="min-width: 120px;
                          display: inline-block;">Detail
                      </span>
                    </button>

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
                            <?php if(($sub['hod_status'] == 2 || $sub['hod_status'] == 0) && $sub['check_in_date'] > date('Y-m-d')){?> 
                            <button type="submit" class="btn btn-default" name="approve" value="<?php echo $sub['application_number']; ?>">Approve
                              <i class="fa fa-thumbs-o-up" style="font-size:36px"></i>
                            </button>
                            <?php } ;?>
                            <?php if(($sub['hod_status'] == 2 || $sub['hod_status'] == 1) &&  $sub['check_in_date'] > date('Y-m-d')){?>
                            <button type="submit" class="btn btn-default" name="disapprove" value="<?php echo $sub['application_number']; ?>">Disapprove 
                              <i class="fa fa-thumbs-o-down" style="font-size:36px"></i>
                            </button>

                            <?php } ;?>
                          </div><!-- Modal footer -->
                        </div><!-- Modal content -->
                      </div><!-- Modal dialog -->
                    </div><!-- Modal -->

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

           

        </div>
      <?php } ?>
    </div><!-- List group -->
  </div><!-- tab-pane fade in active -->

  <div class="tab-pane fade in" id="non-official" style="width:800px">
    <div class="list-group col-xs-12">
      <?php if(count($non_official->result_array()) == 0){ ?>
        <h4>No applications.</h4>
      <?php } else { ?>
        <div class="row">
          <table id="table_id2" class="table table-condensed table-striped table-hover">
            <thead>
                <tr>
                  <th>Application Number</th>      
                  <th>Name</th>
                  <th>Check In Date</th>
                  <th>Check Out Date</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($non_official->result_array() as $sub) { ?>
                <tr>
                  <td><?php echo $sub['application_number'] ?></td>
                  <td><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?></td>
                  <td><?php echo $sub['check_in_date']; ?></td>
                  <td><?php echo $sub['check_out_date'] ?></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  data-target="#myModal<?php echo $sub['application_number']; ?>">
                      <span class="name" style="min-width: 120px;
                            display: inline-block;">Detail
                      </span>
                    </button>

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
                              <?php if(($sub['hod_status'] == 2 || $sub['hod_status'] == 0) && $sub['check_in_date'] > date('Y-m-d')){?>
                              <button type="submit" class="btn btn-default" name="approve" value="<?php echo $sub['application_number']; ?>">Approve
                                <i class="fa fa-thumbs-o-up" style="font-size:36px"></i>
                              </button>
                              <?php } ;?>
                              <?php if(($sub['hod_status'] == 2 || $sub['hod_status'] == 1) &&  $sub['check_in_date'] > date('Y-m-d')){?>
                              <button type="submit" class="btn btn-default" name="disapprove" value="<?php echo $sub['application_number']; ?>">Disapprove
                                <i class="fa fa-thumbs-o-down" style="font-size:36px"></i>
                              </button>
                              
                              <?php } ;?>
                            </div><!-- Modal footer -->
                          </div><!-- Modal body -->
                        </div><!-- Modal content -->
                      </div><!-- Modal dialog -->
                    </div><!-- Modal -->

                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          

        </div>
      <?php } ?>
    </div><!-- List group -->
  </div><!-- tab-pane fade -->
</div><!-- tab content -->

 </div><!-- col-sm-9 col-md-8 col-sm-6 -->

  </form>
  </div><!-- row top -->
</div><!-- Container -->
</section>


<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<section id="content">  
<div class="container">
  <div class="row top">
    <form name = "form1" action="<?php echo base_url();?>manager" method="post">
    <div class="col-sm-3 col-md-2">
      <div class="col-md-2"></div>
      
        <ul class="nav nav-pills nav-stacked ">
          <li class="active">
            <input type = "submit" name="action" value="Pending" style="width:165px;display:none" id ="Pending">
            <label for="Pending" class="btn btn-primary" style="width:400px">Pending <?php if($pending_count != 0 ){ ?><span style="background-color: yellow;margin-left:25px;position:absolute;width:27px;border-radius:10px;color:red"><?php echo $pending_count; ?></span><?php } ?></label>
          </li>
          <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Approved" style="width:165px"></li>
          <!-- <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Disapproved" style="width:165px"></li> -->
          <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Book" style="width:165px"></li>
        </ul>    
    </div>
    <div class="col-sm-9 col-md-8 col-sm-6">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#official" data-toggle="tab">
            <span class="glyphicon glyphicon-inbox"></span><b>Official  <!-- <i><?php //echo $official_count; ?> --></i></b>
          </a>
        </li>
        <li>
          <a href="#non-official" data-toggle="tab">
            <span class="glyphicon glyphicon-user"></span><b>Non-Official</i></b>
          </a>
        </li>
        
      </ul>
      
      <div class="tab-content">
        <div class="tab-pane fade in active" id="official">
          <div class="list-group col-xs-12">
            <?php if(count($official->result_array()) == 0){ ?>
              <h4>No  applications.</h4>
            <?php } else { ?>
              <div class="row">
                <table id="table_id" class="table table-condensed table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Application Number</th>      
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Application Number</th>
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th></th>
                      </tr>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($official->result_array() as $sub) { ?>
                      <tr>
                        <td><?php echo $sub['application_number'] ?></td>
                        <td><?php echo $sub['booking_id'] ?></td>
                        <td><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?></td>
                        <td><?php echo $sub['check_in_date']; ?></td>
                        <td><?php echo $sub['check_out_date'] ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>manager_modal/<?php echo $sub['application_number'];?>">
                            <input type="button" class="btn btn-info btn-sm" value="<?php echo $sub['first_name'];?> <?php echo $sub['last_name']; ?>">
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

            <?php } ?>
          </div><!-- List group -->
        </div><!-- tab-pane fade in active -->
      
        <div class="tab-pane fade in" id="non-official">
          <div class="list-group  col-xs-12">
            <?php if(count($non_official->result_array()) == 0){ ?>
              <h4>No applications.</h4>
            <?php } else  { ?>

              <div class="row">
                <table id="table_id" class="table table-condensed table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Application Number</th>      
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Application Number</th>
                        <th>Booking Id</th>
                        <th>Name</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th></th>
                      </tr>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($non_official->result_array() as $sub) { ?>
                      <tr>
                        <td><?php echo $sub['application_number'] ?></td>
                        <td><?php echo $sub['booking_id'] ?></td>
                        <td><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?></td>
                        <td><?php echo $sub['check_in_date']; ?></td>
                        <td><?php echo $sub['check_out_date'] ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>manager_modal/<?php echo $sub['application_number'];?>">
                            <input type="button" class="btn btn-info btn-sm" value ="<?php echo $sub['first_name'];?> <?php echo $sub['last_name']; ?>">
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

            <?php } ?>     
          </div><!-- List group -->
        </div><!-- tab-pane fade in -->
      <div><!-- tab content -->

    </div><!-- col-sm-9 col-md-8 col-sm-6 -->
    </form>
  </div><!-- row top -->
</div><!-- Container -->
</section>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#example1').dataTable();
  } );
</script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#example2').dataTable();
  } );
</script>
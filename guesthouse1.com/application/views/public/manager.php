<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css"> -->

<section id="content">  
<div class="container">
  <div class="row top">
    <form name = "form1" action="<?php echo base_url();?>manager" method="post">
    <div class="col-md-2">     
      <ul class="nav nav-pills nav-stacked ">
        <li class="active">
          <input type = "submit" name="action" value="Pending" style="width:165px;display:none" id ="Pending">
          <label for="Pending" class="btn btn-primary" style="width:400px;<?php if($button1 == 'red'){?> background:red<?php } ?>">Pending 
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
          <button type = "submit" name="action" value="Checked In" class="btn btn-primary" style="width:165px;<?php if($button3 == 'red'){?> background:red<?php } ?>">Checked In</button>
        </li>
        <li class="active">
          <button type = "submit" name="action" value="Checked Out" class="btn btn-primary" style="width:165px;<?php if($button4 == 'red'){?> background:red<?php } ?>">Checked Out</button>
        </li>
        <li class="active">
          <button type = "submit" name="action" value="Cancelled" class="btn btn-primary" style="width:165px;<?php if($button5 == 'red'){?> background:red<?php } ?>">Cancelled</button>
        </li>
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
            <?php if(count($official->result_array()) == 0 && $page == 'pending'){ ?>
              <h4>No pending applications.</h4>
            <?php } else { ?>
              <?php foreach ($official->result_array() as $sub) { ?>
                <div>
                  <a href="<?php echo base_url(); ?>manager_modal/<?php echo $sub['application_number'];?>"  class="list-group-item">
                    <input type="button" class="btn btn-info btn-sm" value="<?php echo $sub['first_name'];?> <?php echo $sub['last_name']; ?>">
                  </a>
                </div>
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
                <div >
                  <a href="<?php echo base_url(); ?>manager_modal/<?php echo $sub['application_number'];?>" class="list-group-item">
                    <input type="button" class="btn btn-info btn-sm" value ="<?php echo $sub['first_name'];?> <?php echo $sub['last_name']; ?>">
                  </a>
                </div>
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

<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script> -->
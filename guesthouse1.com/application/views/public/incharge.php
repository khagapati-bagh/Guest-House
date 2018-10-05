<section id="content">  
<div class="container">
  <div class="row top">
    <form name = "form1" action="<?php echo base_url();?>faculty_incharge" method="post">
    <div class="col-sm-3 col-md-2">
      <div class="col-md-2"></div>
        <ul class="nav nav-pills nav-stacked ">
          <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Pending" style="width:165px"><!-- <i><?php echo $pending_count; ?></i> --></li>
          <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Alloted" style="width:165px"></li>
          <li class="active"><input type = "submit" name="action" class="btn btn-primary" value="Book" style="width:165px"></li>
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
            <?php foreach ($official->result_array() as $sub) { ?>
              <div >
                <a href="<?php echo base_url(); ?>test2/<?php echo $sub['application_number'];?>">
                  <span class="name" style="min-width: 120px;display: inline-block;"><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?> </span> 
                </a>
              </div>
            </a>
            <?php } ?>
          </div><!-- List group -->
        </div><!-- tab-pane fade in active -->
        
        <div class="tab-pane fade in" id="non-official">
          <div class="list-group  col-xs-12">
            <?php foreach ($non_official->result_array() as $sub) { ?>
              <div>
                <a href="<?php echo base_url(); ?>test2/<?php echo $sub['application_number'];?>">
                  <span class="name" style="min-width: 120px;display: inline-block;"><?php echo $sub['first_name']; ?> <?php echo $sub['last_name']; ?> </span>
                </a>
              </div>
            </a>
            <?php } ?>      
          </div><!-- List group -->
        </div><!-- tab-pane fade in -->
      <div><!-- tab content -->
    </div><!-- col-sm-9 col-md-8 col-sm-6 -->
  </form>
  </div><!-- row top -->
</div><!-- Container -->
</section>

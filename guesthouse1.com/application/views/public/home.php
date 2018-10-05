<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css">

<section id="content" style="margin-top: -1px;">  
<div class="container" style="color: #000015; background: #0025; border-radius: 30px;">
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
      <p class="welcome" style="color: #f3e5f5; font-family: Courier;">WELCOME TO</p>
      <p class="welcome-NGH" style="color: #f3e5f5; font-family: Courier;"> NITK Guest House </p>

      <p style="color: #000; font-size:15px;"><b>The Institute has five guest houses within the campus. The guest houses are located west side of the Administrative Building, near beach(Arabian Sea).<br> They were named as J.C. Bose, Vikram Sarabhai, International Student's Hostel, C. V. Raman and Homi J. Baba.<br> J.C. Bose Guest house furnished with A/C Suites with a telephone, TV and Internet connections in each room. VIPs, Institute guests and invited guests are accommodated here. The Vikram Sarabhai and Homi J. Baba Guest House has A/C, telephone and TV connections in each rooms.</b></p>
    </div>
  </div>
  <form name="form1" method="post" action="<?php echo base_url(); ?>home">
    <div class="row" style="padding: 15px;">
      <div class="col-md-2"></div>
      <div  class="col-md-8 welcome-border"></div>
      <div class="col-md-2"></div>
    </div>

    <!-- <p style="color:red"><?php echo $this->session->flashdata('message'); ?></p> -->

    <div class="row ">
      <div class="col-md-3 col-sm-6 col-xs-12"></div>
      <div class="col-md-2 col-sm-6 col-xs-12"> 
        <label for="usr">Check-in date:</label>
        <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="chkin" name="chkin" placeholder="YYYY-MM-DD" required>
      </div>
     
      <div class="col-md-2 col-sm-6 col-xs-12"> 
            <label for="usr">Check-out Date:</label>
        <input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" id="chkout" name="chkout" placeholder="YYYY-MM-DD" required>
      </div>

      <div class="col-md-2 col-sm-3 col-xs-12">
        <label for="sel1"></label>
        <div id="check" class="btn-group btn-group-justified" style="padding-top: 5px;">
          <input type="submit" name="submit" value="Check Availability" class="btn btn-primary" style="width:100%">
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12"></div>
    </div>
  </form>
<div class="row Ravail" style="color: #fff;">
  <?php if ($status1 == 0 && $status2 == 0){
    echo $this->session->flashdata('message');
  } else { ?>
  <p class="welcome-NGH" align="center" style=" color: #ffcdd2 ; "><b>Availability</b></p>
    
    <div class="col-md-4 col-sm-6 col-xs-12" style="color: #fff; font-size: 15px;">
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th colspan=3 align="center">AC Rooms</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td >Number of AC Rooms:</td>
              <td ><?php echo $status1; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 " style="color: #fff; font-size: 15px;" >
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th colspan=3 align="center">Non-AC Rooms</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <td >Number of Non-AC Rooms:</td>
              <td><?php echo $status2; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 " style="color: #fff; font-size: 15px;">
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th colspan=3 align="center">Pending Applications</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding-top:15px;font-weight:bold;color:#ffff00">Number of Pending Applications:</td>
              <td style="padding-top:15px;font-weight:bold"><?php echo $pending; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-2" style="padding-left: 57px">
          <a href="<?php echo base_url(); ?>application_form"><p class="btn btn-primary">Book Now</p></a>
      </div>
      <div class="col-md-5"></div>
      </div>
    </div>
  </div>

  <?php } ?>
</section>

<script src="<?php echo base_url(); ?>assets/javascript/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        
        $('#chkin').datepicker({
            format: "yyyy-mm-dd"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $('#chkout').datepicker({
            format: "yyyy-mm-dd"
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
    
    });
</script>
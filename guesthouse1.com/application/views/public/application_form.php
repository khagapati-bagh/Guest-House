<style type="text/css">
  body{
    background:none;
  }
  nav.nav1{
  position: relative;
  width: 100%;
  padding: 0 100px;
  background:black;
  box-sizing: border-box;
  font-size: 18px;
  font-family: Courier New;
}
</style>


<section id="content" style="margin-top: -1px;">
<div class="container1" style="margin-top: -1px;">
  <h1 align="center">Application for Booking Room/s</h1>
    <div >
      <h3><u>Sub: Request for Guest House Accommodation</u></h3>
        <p>Kindly arrange to reserve accommodation in our Institution Guest House as stated below</p>
    </div>

    <p style="color:red"><?php echo $this->session->flashdata('message');?></p>
    <p style="color:red"><?php echo $this->session->flashdata('error');?></p>

    <form action="<?php echo base_url(); ?>application_form" method="post" enctype="multipart/form-data" class="form-inline">
    <div class="row">
      <div class="col-md-3 col-xs-6 abcd">
        <b> Guest Name : </b>
      </div>
      
      <div class="col-md-1 col-sm-6 abcd">
        <label for="name">
         <select class="form-control" name="gender" value="<?php echo $this->session->flashdata('gender');?>"><b>
           <option value="Male">Mr</option>
            <option value="Female">Mrs</option>
            <option value="Female">Ms</option></b>
          </select>
        </label>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-3 col-sm-6 abcd">
        <input type="text" class="form-control" id="fname" value="<?php echo $this->session->flashdata('fname');?>" placeholder="First Name" name="fname" required>
      </div>
      <div class="col-md-1 "> </div>
      <div class="col-md-3 col-sm-6 abcd">
         <input type="text" class="form-control" id="lname" value="<?php echo $this->session->flashdata('lname');?>" placeholder="Last Name" name="lname" required>
      </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-xs-4 abcd">
          <b>ID Card :    </b>
        </div>
        <div class="col-md-2 col-xs-8 abcd col-sm-6">
          <label for="id" class="new">
              <select class="form-control" value="<?php echo $this->session->flashdata('id_type');?>" id="id_type" name="id_type" onchange="mywow(this.value);">
                  <option onclick="length()" value="Aadhar Card">Aadhar Card</option>
                  <option value="Voter Card">Voter Card</option>
                  <option value="Driving License">Driving Licence</option>
                  <option value="Passport">Passport</option>
                  <option value="Others">Others</option>
              </select>
          </label>
        </div>
        <div class="col-md-1 "> </div>
        <div class="col-md-2 col-xs-12 abcd ">
          <input type="text" class="form-control" value="<?php echo $this->session->flashdata('id_number');?>" id="id_number" name="id_number" placeholder="Enter ID Number" maxlength="12" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-12"><b>Address :</b></div>
        <div class="col-md-6 abcd col-sm-6">
          <textarea rows="1" cols="45" value="<?php echo $this->session->flashdata('address');?>" name="address" id="address"></textarea>
        </div>
        <div class="col-md-3 abcd col-sm-6">
          <input type="text" class="form-control" value="<?php echo $this->session->flashdata('dist');?>" id="dist" placeholder="Dist./City/Town" name="dist" >
        </div>
        </div>
        <div class="row abcd">
          <div class="col-md-3 abcd "></div>
            <div class="col-md-3 abcd col-sm-6" >
           
              <input type="text" class="form-control" value="<?php echo $this->session->flashdata('pincode');?>" id="pincode" placeholder="PIN" name="pincode" >
            </div>
            <div class="col-md-1 abcd"></div>
            <div class="col-md-3 abcd col-sm-6" >
              <input type="text" class="form-control" value="<?php echo $this->session->flashdata('state');?>" id="state" placeholder="State" name="state" >
              </div>
              <div class="col-md-1 abcd"></div>
              <div class="col-md-1 abcd col-sm-6">
              <input type="text" class="form-control" value="<?php echo $this->session->flashdata('country');?>" id="country" placeholder="Country" name="country" >
              </div>
        </div>

      <div class="row abcd">
        <div class="col-md-3 abcd col-sm-6">
          <b>Check-In Date :</b>
        </div>
        <div class="col-md-3 abcd col-sm-6">
            <input type="text" class="form-control" id="chkin1"readonly name="chkin1"  value="<?php echo $this->session->userdata('chkin'); ?>" >
          </div>
      </div>
      <div class="row abcd">
        <div class="col-md-3 abcd col-sm-6">
          <b>Check-Out Date :</b>
        </div>
        <div class="col-md-3 abcd col-sm-6">
            <input type="text" class="form-control" id="chkout1" readonly name="chkout1"  value="<?php echo $this->session->userdata('chkout'); ?>" >
          </div>
      </div>

      <div class="row abcd  ">
        <div class="col-md-4 abcd col-xs-5"><b>AC Room(s)</b>
          <label for="id">
            <input type="text" class="form-control" value="<?php echo $this->session->flashdata('room_ac');?>" id="room_ac" placeholder="0" name="room_ac" onkeypress="return isNumber(event)" style="width:130px">
          </label>
        </div>
        <div class="col-md-4 abcd col-xs-6"><b>Non-AC Room(s)</b>
          <label for="id">
            <input type="text" class="form-control" value="<?php echo $this->session->flashdata('room_non_ac');?>" id="room_non_ac" placeholder="0" name="room_non_ac" onkeypress="return isNumber(event)" style="width:130px">
          </label>
        </div>
        <div class="col-md-4 abcd col-xs-5"><b>Number of Persons</b>
          <label for="id">
            <input type="text" class="form-control" value="<?php echo $this->session->flashdata('persons');?>" id="persons" placeholder="0" name="persons" required onkeypress="return isNumber(event)" style="width:132px">
          </label>
        </div>
      </div>

       <div class="row abcd">
         <div class="col-md-5 col-sm-6 col-xs-12">
           <b>Relation of Guest with the applicant : </b>
         </div>
         <div class="col-sm-6 col-xs-12 col-md-6">
           <input type="text" class="form-control" value="<?php echo $this->session->flashdata('relation');?>" id="relation" placeholder="Relation" name="relation" >
         </div>
       </div>

       <div class="row abcd">
         <div class="col-md-4 col-sm-3">
          <b> Nature of visit : </b>
         </div>
         <div class="col-md-2 col-sm-3">
           <label><input type="radio" name="optradio" onclick="myFun()" value="Official">Official</label>
         </div>
         <div class="col-md-3 col-sm-3">
           <label><input type="radio" name="optradio" onclick="myFunction()" value="Non-official">Non-official</label>
         </div>
         <div class="col-md-2 col-sm-3">
           <label><input type="file" id="document" name="document" disabled=""></label>
         </div>
       </div>

       <div class="row abcd"> 
          <div class="col-md-5 col-sm-6" >
            <b>Contact No. of applicant : </b>
          </div>
          <div class="col-md-5 col-sm-6">
            <input type="text" class="form-control" value="<?php echo $this->session->flashdata('contact_number');?>" id="contact_number" placeholder="Number" maxlength="10" name="contact_number" >
          </div>
        </div>

        <div class="row abcd"> 
          <div class="col-md-5 col-sm-6">
            <b>Email ID of the applicant : </b>
          </div>
          <div class="col-md-5 col-sm-6">
          <!-- <i class="fa fa-envelope"></i> -->
            <input type="text" class="form-control" value="<?php echo $this->session->flashdata('email_id');?>" id="email_id" placeholder="email@example.com" name="email_id" >
          </div>
        </div>

        <div align="center">
      <input type="submit" value="Submit" name="submit" class="btn btn-primary">
      <input type="Reset"  class="btn btn-primary">
      </div>
    </form>
    
  </div>
</section>


<script>
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
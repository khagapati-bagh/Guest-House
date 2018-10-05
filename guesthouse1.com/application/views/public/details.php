<body background="<?php echo base_url();?>assets/images/paper.jpg" id="example1" style="">
<section id="content">
	<div class="top ">
		<h1 align="center">Details of The Applicant</h1>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-3 col-sm-6">
			<h3 align="center"><b>Guest House Name : </b></h3>
		</div>
		<div class="col-md-4 col-sm-6">
			<h3 align="center">International Guest House</h3>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row top abcd" >
		<div class="col-md-1"></div> 
		<div class="col-md-2 abcd col-sm-4 col-xs-12">
			<b>Booking ID : <?php echo $userdetail['booking_id'];?></b>
		</div>
		<div class="col-md-2 abcd col-sm-4 col-xs-6">
		  <b>Check-in Date :  <?php echo $userdetail['check_in_date'];?></b>
		</div>
		<div class="col-md-2 abcd col-sm-4 col-xs-6">
		  <b>Check-out Date : <?php echo $userdetail['check_out_date'];?></b>
		</div>       
		  <div class="col-md-1 abcd col-sm-4 col-xs-6">
		  <b>Room(s) : <?php echo $userdetail['number_of_rooms'];?></b>
		  </div>
		<div class="col-md-1 col-sm-4 col-xs-6 abcd">
			<b size="6">Type : <?php echo $userdetail['room_type'];?></b>
		</div>
	</div>
	<div class="row abcd">
		<div class="col-md-1 abcd"></div>
		<div class="col-md-2 abcd col-sm-4 col-xs-12">
			<b>Name :  <?php echo $userdetail['first_name'];?>&nbsp;<?php echo $userdetail['last_name'];?></b>
		</div>
		<div class="col-md-3 abcd col-sm-4">
			<b>Aadhar Card No.: <?php echo $userdetail['id_card_number'];?></b>
		</div>
		<div class=""></div>
	</div>

	<!-- <div class="row">
		 <div class="col-md-1"></div>
		
	</div>
	 -->
	<!-- <div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2"><b>Add Multiple Name Fields</b></div>
	</div> -->


	<!-- <div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 ">
		 <div class="controls"> 
            <form name="form" action="<?php //echo base_url();?>details/<?php //echo $userdetail['booking_id']; ?>" autocomplete="off" method="post">
                <div class="entry input-group">
                    <div class="col-md-3 abcd col-sm-4 col-xs-12 ">
                        <input class="form-control" name="fname[]" type="text" placeholder="First Name" />
                    </div>
                    <div class="col-md-3 abcd col-sm-4 col-xs-12">
                        <input class="form-control" name="lname[]" type="text" placeholder="Last Name" />
                    </div>
                    <div class="col-md-2 abcd col-sm-3 col-xs-9">
                        <input class="form-control" name="room_number[]" type="text" placeholder="Room No." style="padding-right: 10px;"/>
                    </div>
                    
                	<span class="input-group-btn col-md-1 col-sm-1 abcd col-xs-3">
                        <button class="btn btn-success btn-add" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
            
            <br>
             <small>Press <span class="glyphicon glyphicon-plus gs left"></span> to add another form field :)</small> -->
           <!--  </div>
	    </div>
	</div> --> 


	<div class="row  abcd">
	<div class="col-md-1 col-sm-2 "></div>
	<div class="abcd col-md-2 col-sm-4">
		<button type="button" class="  btn btn-success">Submit Check In Time</button>
	</div>
		<div class="abcd col-sm-4">
			<button type="button" class=" btn btn-success"> Submit Check Out Time</button>.
	</div>
		</div>
		

	<div align="center" class="top">
	      <button type="submit" name="submit"  class="btn btn-primary" style="padding-bottom:10px;">Submit</button>
	</div>
	</form>
	<p align="center" style="color:red"><?php echo $this->session->flashdata('message'); ?></p>
</section>
</body>
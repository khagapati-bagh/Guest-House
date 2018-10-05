<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/headerstyle.css">
<header id="header">
	<nav class="nav1">
			<a href="#" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo1.jpg" height="58px" align="left"></a>
			<a class="toggle"><i class="fa fa-bars"></i></a>
		<ul>
			<li>
        <a <?php if($this->session->userdata('type') == 'HOD') {?> 
              href= "<?php echo base_url(); ?>hod " 
            <?php } else if($this->session->userdata('type') == 'Faculty Advisor') {?>  
              href= "<?php echo base_url(); ?>faculty" 
            <?php } else if($this->session->userdata('type') == 'Guesthouse Manager') {?> 
              href= "<?php echo base_url(); ?>manager" 
            <?php } else {?>
              href = "<?php echo base_url();?>"
            <?php } ?>><i class="fa fa-home"></i> Home
        </a>
      </li>

			<li>
          <a <?php if($this->session->userdata('type') == 'HOD' || $this->session->userdata('type') == 'Student' || $this->session->userdata('type') == 'Faculty Advisor') {?> 
            href="<?php echo base_url(); ?>home" 
          <?php } else if($this->session->userdata('type') == 'Guesthouse Manager') { ?>   
            href="<?php echo base_url(); ?>availability_manager" 
          <?php } else { ?>
            href="<?php echo base_url();?>login"
          <?php } ?>
          >
          
          Book
        </a>
      </li>

			<li>
        <a href="#">About
        </a>
      </li>

			<li>
        <a href="#">Contact
        </a>
      </li>

        <?php if($this->session->userdata('userid') == '') { ?>
            <li><a href="<?php echo base_url(); ?>login"><span class="glyphicon glyphicon glyphicon-login"></span><i class="fa fa-sign-in"></i> Login </a></li>

        <?php } else { ?>
          <li><a href="<?php echo base_url(); ?>logout"><span class="glyphicon glyphicon glyphicon-off"></span> Logout </a></li>
          <?php } ?>

		</ul>
    
		<div style="clear: both"></div>
	</nav>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.toggle i').click(function(){
      $('ul').toggleClass('active')
    })
  })
</script>
<script>
  $(document).ready(function () {
    $('.nav1 ul li a').click(function() {
    $('.nav1 ul li a').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
    });
});
</script>
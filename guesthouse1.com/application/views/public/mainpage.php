<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $pagetitle;?></title>
		<meta name="viewport" content="width=device_width initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/new.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">

	</head>
	<body style="margin-left:0px; margin-right:0px;">
		<?php include 'header1.php'; ?>
		<?php $this->view($content); ?>
		<?php include 'footer.php'; ?> 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  	<script type="text/javascript">
		  $(document).ready( function () {
		    $('#table_id1').dataTable();
		  } );
		</script>
		<script type="text/javascript">
		  $(document).ready( function () {
		    $('#table_id2').dataTable();
		  } );
		</script>

		<script type="text/javascript">
		function mywow(s){
				
		    var y = document.getElementById("id_number");
		    if(s =="Aadhar Card")
		    {
		    	y.maxLength=12;
		    	document.getElementById("b").disabled = true;
		    }
		    else if(s == "Voter Card")
		    {
		    	y.maxLength=10;
		    	document.getElementById("b").disabled = true;
		    }
		    else if(s =="Driving License")
		    	{
		    		y.maxLength=5;
		    	document.getElementById("b").disabled = true;}
		    else
		    {
		    	y.maxLength=20;
		    	document.getElementById("b").disabled = false;
		    	
		    }
		}
		</script>

	    <script type="text/javascript">
			function myFunction() {
			    var x = document.getElementById("document");
			    x.disabled = true;
			}
			function myFun() {
			    var x = document.getElementById("document");
			    x.disabled = false;
			}
		</script>

		<script type="text/javascript">
		$(function()
		{
		    $(document).on('click', '.btn-add', function(e)
		    {
		        e.preventDefault();

		        var controlForm = $('.controls form:first'),
		            currentEntry = $(this).parents('.entry:first'),
		            newEntry = $(currentEntry.clone()).appendTo(controlForm);

		        newEntry.find('input').val('');
		        controlForm.find('.entry:not(:last) .btn-add')
		            .removeClass('btn-add').addClass('btn-remove')
		            .removeClass('btn-success').addClass('btn-danger')
		            .html('<span class="glyphicon glyphicon-minus"></span>');
		    }).on('click', '.btn-remove', function(e)
		    {
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});
		</script>

		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>

	</body>
</html>
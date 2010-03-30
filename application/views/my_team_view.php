<!DOCTYPE html>

<head>
<title>Attend-A-Tron &trade; - Because Spreadsheets Suck!</title>
<? $this->load->view('includes/inc_common'); ?>

</head>

<body>

	<div id="container">
	
		<? $this->load->view('includes/inc_header'); ?>
	
		<div id="main">
			
			<h1>My Team</h1>
	
			<div id="workspace">
				<h2>Add Employee</h2>
				<form action="<?=base_url();?>actions/grab_worker/" method="post">
					<label for="employee_email">Employee Email</label><input type="text" name="employee_email" value="" id="employee_email" />

				</form>
				<h2>My Current Employees</h2>
				
				

			</div><!-- end workspace -->
			
			<?php $this->load->view('includes/inc_nav'); ?>
			
		</div><!-- end main -->

	</div><!-- end container -->

</body>
</html>
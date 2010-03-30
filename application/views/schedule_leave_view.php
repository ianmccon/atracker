<!DOCTYPE html>

<head>
<title>Attend-A-Tron &trade; - Because Spreadsheets Suck!</title>
<? $this->load->view('includes/inc_common'); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$("#start_date").datepicker();
		$("#end_date").datepicker();
	});

</script>
</head>

<body>

	<div id="container">
	
		<? $this->load->view('includes/inc_header'); ?>
	
		<div id="main">
			
			<h1>Dashboard</h1>
			<div id="workspace">
				<h2>Submit Request</h2>
				<form action="<?=base_url();?>dashboard/schedule_leave/" id="request_form" name="date_request" method="post">
					<label for="start_date">Start Date:</label> <input type="text" name="start_date" value="<?=set_value('start_date');?>" id="start_date" /><br />
					<?=form_error('start_date');?><br />
					<label for="end_date">End Date:</label> <input type="text" name="end_date" value="<?=set_value('end_date');?>" id="end_date" /><br />
					<?=form_error('end_date');?><br />
					Occurence: <input type="checkbox" name="occurence" value="1" /><br />
					<?=form_error('request_type');?><br />
					<label>Type: </label>
					<select name="request_type">
						<option value="" selected>Please Select:</option>
						<?php 
							
							foreach($types['types'] as $row){
								$title = ucwords($row['title']);
								echo("<option value=\"$row[id]\">$title</option>\n");
							}

						?>
					</select><br />
					<input type="submit" name="submit" value="Submit Request" id="submit" />
				</form>

				<?php 

					if(@$msg['error']){
						echo('<div class="signup_err">'.$msg['error'].'</div>');
					} 

					if(@$msg['success']){
						echo('<div class="signup_success">'.$msg['success'].'</div>');
					}

				?>
				<p>
					<strong>Days Remaining:</strong> <?php echo($base['days_left'] ? $base['days_left'] : "None"); ?><br />
					Earned: <br />
					Purchased: <br />
					Used: 
				</p>
				<p>My Approver: <strong><?php echo($base['my_approver'] == true ? $base['my_approver'] : "No Current Approver"); ?></strong>

				<h2>Pending Requests</h2>
				
				<?php 
				if($base['pending_requests']){
					foreach($base['pending_requests'] as $row):?>
					<div id="pending_<?=$row->id; ?>" class="warning">
						<div class="request_selector">
							<input type="checkbox" name="request_selector[<?=$row->id; ?>]" value="true" id="request_selector_<?=$row->id; ?>" />
						</div>
						<div class="actions">
							<a href="<?=base_url();?>action/approve/<?=$row->id;?>" class="success">Approve</a> <a href="<?=base_url();?>action/decline/<?=$row->id;?>" class="error">Decline</a> <a href="<?=base_url();?>action/cancel/<?=$row->id;?>" class="cancel">Cancel</a>
						</div>
						<h2><?=$this->User->getusername($row->user_id);?></h2>
						<p>Has requested a <strong><?=$row->duration?> <?=$row->type?></strong> day for <strong><?=$row->date?></strong></p> 
						<strong>Status:</strong> <?=$row->status?>

					</div>

				<?php 
					endforeach; 
				}
				?>

			</div><!-- end workspace -->
			
			<?php $this->load->view('includes/inc_nav'); ?>
			
		</div><!-- end main -->

	</div><!-- end container -->

</body>
</html>
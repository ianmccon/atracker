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

				<h2>Approved Requests</h2>
				<?php
				if($base['approved_requests']){
					foreach($base['approved_requests'] as $row):?>
					<div id="approved_<?=$row->id; ?>" class="success">
						<div class="request_selector">
							<input type="checkbox" name="request_selector[<?=$row->id; ?>]" value="true" id="request_selector_<?=$row->id; ?>" />
						</div>
						<div class="actions">
							<a href="<?=base_url();?>action/decline/<?=$row->id;?>" class="error">Decline</a> <a href="<?=base_url();?>action/cancel/<?=$row->id;?>" class="cancel">Cancel</a>
						</div>
						<h2><?=$this->User->getusername($row->user_id);?></h2>
						<p>Has requested a <strong><?=$row->duration?> <?=$row->type?></strong> day for <strong><?=$row->date?></strong></p> 
						<strong>Status:</strong> <?=$row->status?>

					</div>

				<?php 
					endforeach; 
				}
				?>

				<h2>Declined Requests</h2>
				<?php
				if($base['declined_requests']){
					foreach($base['declined_requests'] as $row):?>
					<div id="pending_<?=$row->id; ?>" class="error">
						<div class="request_selector">
							<input type="checkbox" name="request_selector[<?=$row->id; ?>]" value="true" id="request_selector_<?=$row->id; ?>" />
						</div>
						<div class="actions">
							<a href="<?=base_url();?>action/approve/<?=$row->id;?>" class="success">Approve</a> <a href="<?=base_url();?>action/cancel/<?=$row->id;?>" class="cancel">Cancel</a>
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
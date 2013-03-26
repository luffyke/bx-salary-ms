<?php 
	$profile_row = $profile_result->first_row();
?>
<div class="home_view">
	<div class="profile_view">
		<div><b><?php echo $profile_row->last_name . $profile_row->first_name; ?></b></div>
		<div class="location_view">所在地 : <b><?php echo $profile_row->province . $profile_row->city; ?></b></div>
	</div>
	<div class="split_line"></div>
	<div class="work_view">
		<?php if ($work_result->num_rows() > 0) { ?>
		现就职于 :
		<div class="company_view">
		<?php foreach ($work_result->result() as $work_row) { ?>
			<div><b><?php echo $work_row->company_name; ?></b></div>
		<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>
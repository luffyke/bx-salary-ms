<?php 
	// profile details
	$first_name = $profile['first_name'];
	$last_name = $profile['last_name'];
	$gender = $profile['gender'];
	$birthdate = $profile['birthdate'];
	// get year, month and day
	$year = substr($birthdate, 0, 4);
	$month = substr($birthdate, 5, 2);
	$day = substr($birthdate, 8, 2);
	
	// calculate age
	$now = date_create('now');
	$birth = date_create($birthdate);
	if ($now < $birth) {
		$age = '你还没出生呢';
	} else {
		$interval = date_diff($now, $birth);
		$age = $interval->format('%y').'岁';
	}
	
	$province = $profile['province'];
	$city = $profile['city'];
	$county = $profile['county'];
	
	// user details
	$username = $user['username'];
	$email = $user['email'];
	$create_date = $user['create_date'];
?>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery.provinces_city_county.js'?>"></script>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery.date.js'?>"></script>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/profile.js'?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	var hidden_province = $('#hidden_province').val();
	var hidden_city = $('#hidden_city').val();
	var hidden_county = $('#hidden_county').val();
	$('#location').province_city_county(hidden_province, hidden_city, hidden_county);

	var hidden_year = $('#hidden_year').val();
	var hidden_month = $('#hidden_month').val();
	var hidden_day = $('#hidden_day').val();
	$('#birthdate').date(hidden_year, hidden_month, hidden_day);
	
});
</script>
<div class="profile">
	<input type="hidden" id="hidden_province" name="hidden_province" value="<?php echo $province;?>"/>
	<input type="hidden" id="hidden_city" name="hidden_city" value="<?php echo $city;?>"/>
	<input type="hidden" id="hidden_county" name="hidden_county" value="<?php echo $county;?>"/>
	<input type="hidden" id="hidden_year" name="hidden_year" value="<?php echo $year;?>"/>
	<input type="hidden" id="hidden_month" name="hidden_month" value="<?php echo $month;?>"/>
	<input type="hidden" id="hidden_day" name="hidden_day" value="<?php echo $day;?>"/>
	<div class="title">修改个人资料</div>
	<table>
		<tbody>
			<tr><th>注册:</th><td><? echo $create_date ?></td></tr>
			<tr><th>用户名:</th><td><? echo $username ?> (<?php echo $age;?>)</td></tr>
			<tr>
				<th>姓名:</th>
				<td>
					<input type="text" id="first_name" name="first_name" value="<? echo $first_name?>" />
					<input type="text" id="last_name" name="last_name" value="<? echo $last_name?>" />
				</td>
			</tr>
			<tr><th>邮箱:</th><td><input type="text" id="email" name="email" value="<? echo $email?>" /></td></tr>
			<tr>
				<th>性别:</th>
				<td>
					<select id="gender" name="gender">
						<option value="1" <?php if($gender == 1) echo 'selected'; ?> >男</option>
						<option value="2" <?php if($gender == 2) echo 'selected'; ?> >女</option>
					</select>
				</td>
			</tr>
			<tr><th>生日:</th><td id="birthdate"></td></tr>
			<tr><th>所在地:</th><td id="location"></td></tr>
			<tr>
				<th></th>
				<td>
					<a href="javascript:update_profile();" id="update_profile_link" class="button save">修改资料</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
function update_profile() {
	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var gender = $('#gender').val();
	var email = $('#email').val();
	var province = $('#province').val();
	var city = $('#city').val();
	var county = $('#county').val();
	
	// combine birthdate
	var birthdate = '';
	var year = $('#year').val();
	var month = $('#month').val();
	var day = $('#day').val();
	if (year != 0 && month != 0 && day != 0) {
		birthdate = year + '-' + month + '-' + day;
	}
	
	$('#update_profile_message').replaceWith('');
	$.post('/bx-salary-ms/profile/update_profile', {'first_name':first_name, 'last_name':last_name, 'gender':gender, 
		'email':email, 'birthdate':birthdate, 'province':province, 'city':city, 'county':county},
		function (result) {
			if (result != 1) {
				$('#update_profile_link').after('<span id="update_profile_message" class="error_message">修改失败</span>');
			} else {
				$('#update_profile_link').after('<span id="update_profile_message" class="message">修改成功</span>');
			}
		}
	);
}
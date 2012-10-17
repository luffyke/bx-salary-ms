function update_profile(){
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
	if(year != 0 && month != 0 && day != 0){
		birthdate = year + '-' + month + '-' + day;
	}
	
	$('#update_profile_message').replaceWith('');
	$.post('/bx-salary-ms/profile/update_profile',{'first_name':first_name, 'last_name':last_name, 'gender':gender, 'email':email, 'birthdate':birthdate, 
			'province':province, 'city':city, 'county':county},
			function(result){
				if(result != 1){
					$('#update_profile_link').after('<span id="update_profile_message" class="error_message">修改失败</span>');
				} else {
					$('#update_profile_link').after('<span id="update_profile_message" class="message">修改成功</span>');
				}
			});
}

function update_password(){
	if(valid_password()){
		var password = $('#new_password').val();

		$('#update_password_message').replaceWith('');
		$.post('/bx-salary-ms/user/change_password_action',{'password':password},
				function(result){
					if(result != 1){
						$('#update_password_link').after('<span id="update_password_message" class="error_message">修改失败</span>');
					} else {
						$('#old_password').val('');
						$('#new_password').val('');
						$('#re_password').val('');
						$('#update_password_link').after('<span id="update_password_message" class="message">修改成功</span>');
					}
				});
	}
}

function add_work(){
	
	$('#add_work_message').replaceWith('');
	
	var is_valid = true;
	
	//var company_name = $("#company_id option:selected").text();
	var company_id = $('#company_id').val();
	
	var is_current_checked = false;
	if($('#is_current').attr("checked") == "checked"){
		is_current_checked = true;
	}
	
	var staff_id = $('#staff_id').val();
	if(staff_id == "" || $.trim(staff_id) == ""){
		$('#staff_id_message').text('员工号码不能为空');
		is_valid = false;
	} else {
		$('#staff_id_message').text('');
	}
	
	var team_name = $('#team_name').val();
	if(team_name == "" || $.trim(team_name) == ""){
		$('#team_name_message').text('项目组名不能为空');
		is_valid = false;
	} else {
		$('#team_name_message').text('');
	}
	
	var sub_team_name = $('#sub_team_name').val();
	var from_year = $('#from_year').val();
	var from_month = $('#from_month').val();
	var from_day = $('#from_day').val();
	var to_year = $('#to_year').val();
	var to_month = $('#to_month').val();
	var to_day = $('#to_day').val();

	var from_date_message_error_type = 0;
	var to_date_message_error_type = 0;

	var int_from_date = 0;
	var int_to_date = 0;

	var today_date = new Date();
	var int_today_date = today_date.getFullYear() * 10000 + (today_date.getMonth() + 1) * 100 + today_date.getDate();
	
	if(from_year == 0 || from_month == 0 || from_day == 0){
		if(from_date_message_error_type != 1){
			$('#from_date_message').replaceWith('');
			$('#from_date').after('<span id="from_date_message" class="error_message">开始日期不能为空</span>');
			from_date_message_error_type = 1;
		}
		is_valid = false;
	} else {
		int_from_date = parseInt(from_year) * 10000 + parseInt(from_month) * 100 + parseInt(from_day);
		if(parseInt(int_from_date) > parseInt(int_today_date)){
			if(from_date_message_error_type != 2){
				$('#from_date_message').replaceWith('');
				$('#from_date').after('<span id="from_date_message" class="error_message">开始日期不能大于今日</span>');
				from_date_message_error_type = 2;
			}
			is_valid = false;
		} else {
			from_date_message_error_type = 0;
			$('#from_date_message').text('');
		}
	}
	
	if((to_year == 0 || to_month == 0 || to_day == 0) && !is_current_checked){
		if(to_date_message_error_type != 1){
			$('#to_date_message').replaceWith('');
			$('#to_date').after('<span id="to_date_message" class="error_message">结束日期不能为空</span>');
			to_date_message_error_type = 1;
		}
		is_valid = false;
	} else {
		int_from_date = parseInt(from_year) * 10000 + parseInt(from_month) * 100 + parseInt(from_day);
		int_to_date = parseInt(to_year) * 10000 + parseInt(to_month) * 100 + parseInt(to_day);
		if(parseInt(int_to_date) <= parseInt(int_from_date)){
			if(to_date_message_error_type != 2){
				$('#to_date_message').replaceWith('');
				$('#to_date').after('<span id="to_date_message" class="error_message">结束日期不能小于开始日期</span>');
				to_date_message_error_type = 2;
			}
			is_valid = false;
		} else {
			to_date_message_error_type = 0;
			$('#to_date_message').text('');
		}
	}
	
	var bars = "-";
	var from_date = from_year + bars + from_month + bars + from_day;
	var to_date = to_year + bars + to_month + bars + to_day;
	
	var work_nature = $('#work_nature').val();
	var is_current = 0;
	if(is_current_checked){
		is_current = 1;
	}
	
	if(!is_valid){
		return;
	}
	
	$.post('/bx-salary-ms/work/add_action', 
		{'company_id' : company_id, 'staff_id' : staff_id, 'team_name' : team_name, 'sub_team_name' : sub_team_name, 
			'from_date' : from_date, 'to_date' : to_date, 'work_nature' : work_nature, 'is_current' : is_current }, 
		function(result){
			if(result != 1){
				$('#add_work_link').after('<span id="add_work_message" class="error_message">添加失败</span>');
			} else {
				$('#company_name_message').text('');
				$('#is_current').attr("checked", false)
				$('#company_id').val(1);
				$('#staff_id').val('');
				$('#work_nature').val(1);
				$('#team_name').val('');
				$('#sub_team_name').val('');
				$('#from_date').date(null, null, null, 'from_year', 'from_month', 'from_day');
				$('#to_date').date(null, null, null, 'to_year', 'to_month', 'to_day');
				$('#add_work_link').after('<span id="add_work_message" class="message">添加成功</span>');
			}
		}
	);
}

function delete_company(){
	
}

function amend_company() {
	
	$('#amend_company_message').replaceWith('');
	
	var id = $('#company_id').val();
	var action = $('#action').val();
	var company_name = $('#company_name').val();
	if(company_name == "" || $.trim(company_name) == ""){
		$('#company_name_message').text('公司名称不能为空');
		return;
	}
	
	var abbr_name = $('#abbr_name').val();
	var company_type = $('#company_type').val();
	
	$.post('/bx-salary-ms/company/amend_action',
			{'action' : action, 'id': id, 'company_name':company_name, 'abbr_name':abbr_name, 'company_type':company_type},
			function(result){
				if(result != 1) {
					$('#amend_company_link').after('<span id="amend_company_message" class="error_message">操作失败</span>');
				} else {
					$('#company_name_message').text('');
					$('#amend_company_link').after('<span id="amend_company_message" class="message">操作成功</span>');
				}
			}
	);
}
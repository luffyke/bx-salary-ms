function delete_company(id) {
	if (confirm("确定要删除吗?")) {
		window.location.href = "/bx-salary-ms/company/delete/" + id;
		/*
		$.post('/bx-salary-ms/company/delete', {'id' : id}, 
			function (result) {
				if (result) {
					$('#delete_message').text('删除成功');
				} else {
					$('#delete_message').text('删除失败');
				}
			}
		);
		*/
		return true;
	}
	return false;
}

function amend_company() {
	
	$('#amend_company_message').replaceWith('');
	
	var id = $('#company_id').val();
	var action = $('#action').val();
	var company_name = $('#company_name').val();
	if (company_name == "" || $.trim(company_name) == "") {
		$('#company_name_message').text('公司名称不能为空');
		return;
	}
	
	var abbr_name = $('#abbr_name').val();
	var company_type = $('#company_type').val();
	
	$.post('/bx-salary-ms/company/amend_action',
			{'action' : action, 'id': id, 'company_name':company_name, 'abbr_name':abbr_name, 'company_type':company_type},
		function (result) {
			if (result != 1) {
				$('#amend_company_link').after('<span id="amend_company_message" class="error_message">操作失败</span>');
			} else {
				$('#company_name_message').text('');
				$('#amend_company_link').after('<span id="amend_company_message" class="message">操作成功</span>');
				window.location.href = "/bx-salary-ms/company";
			}
		}
	);
}
	$('.table_info tr:first').css("background","#EAEAEA");
	$('.table_info tr').not(':first').hover(
		function () {
			$(this).css("background","#CCC");
		}, 
		function () {
			$(this).css("background","");
		}
	);

	$('.history_table_info tr:first').css("background","#EAEAEA");
	$('.history_table_info tr').not(':first').hover(
		function () {
			$(this).css("background","#CCC");
		}, 
		function () {
			$(this).css("background","");
		}
	);
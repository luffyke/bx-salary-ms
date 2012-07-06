$(function(){
    var link_url = $("#link_url").val();
	var max = 5;
	var page = $("#page").val();
	var page_count = $("#page_count").val();
	if(page_count < max){
		max = page_count;
	}
	var need_and = false;
	if(link_url.indexOf("?") != -1){
		need_and = true;
	}
	for(var i = 1; i <= max; i++){
		var page_link = null;
		if(need_and){
			page_link = "<span><a id='page" + i + "' href='" + link_url + "&p=" + i + "'>" + i +"</a></span>";
		} else{
			page_link = "<span><a id='page" + i + "' href='" + link_url + i + "'>" + i +"</a></span>";
		}
		$("#page_number_list").append(page_link);
	}
	if(page_count > max){
		if(page + 2 > max){
			$("#page_number_list").empty();
			var start = parseInt(page) - 2;
			var end = parseInt(page) + 2;
			if(start < 1){
				start = 1;
				end = start + 4;
			}
			if(end > page_count){
				end = page_count;
				start = end - 4;
			}
			for(var i = start; i <= end; i++){
				var page_link = null;
				if(need_and){
					page_link = "<span><a id='page" + i + "' href='" + link_url + "&p=" + i + "'>" + i +"</a></span>";
				} else{
					page_link = "<span><a id='page" + i + "' href='" + link_url + i + "'>" + i +"</a></span>";
				}
				$("#page_number_list").append(page_link);
			}
		}
	}
	
	var current_page_id = "#page" + page;
	$(current_page_id).addClass("selected");
});
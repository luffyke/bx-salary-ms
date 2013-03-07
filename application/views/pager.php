<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/pager.css'; ?>" />
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/pager.js'; ?>"></script>
<?php if ($page != 0) { ?>
<div id="pager">
	<input type="hidden" id="page" value="<?php echo $page; ?>">
	<input type="hidden" id="page_count" value="<?php echo $page_count; ?>">
	<input type="hidden" id="link_url" value="<?php echo $link_url_with_page; ?>">
<?php if ($page == 1) { ?>
	<span>首页</span>
	<span>上一页</span>
<?php } else { ?>
	<span><a id="fisrt" href='<?php echo $link_url; ?>'>首页</a></span>
	<span><a id="previous" href='<?php echo $link_url_with_page.($page-1); ?>'>上一页</a></span>
<?php } ?>
	
<div id="page_number_list"></div>
	
<?php if ($page == $page_count) { ?>
	<span>下一页</span>
	<span>尾页</span>
<?php } else { ?>
	<span><a id="next" href='<?php echo $link_url_with_page.($page+1); ?>'>下一页</a></span>
	<span><a id="last" href='<?php echo $link_url_with_page.$page_count; ?>'>末页</a></span>
<?php } ?>
<span><?php echo $page . " / " . $page_count ?></span>
</div>
<?php } ?>
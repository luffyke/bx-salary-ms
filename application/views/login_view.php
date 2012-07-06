<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>bx-salary-ms</title>
<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/login.css'; ?>">
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery-1.7.2.js'; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#username").val($("#hidden_username").val());
	$("#password").val($("#hidden_password").val());
});
</script>
</head>
<body>
<input type="hidden" id="hidden_username" name="hidden_username" 
		value="<?php if(isset($username)) :
						echo $username;
					else :
						$username = $this->input->cookie('username');
						if($username != '') :
							echo $username;
						else :
							echo '';
						endif;
					endif ?>" />
<input type="hidden" id="hidden_password" name="hidden_password" 
		value="<?php $password = $this->input->cookie('password');
					if($password != '') :
						echo $this->input->cookie('password');
					else :
						echo '';
					endif ?>" />
	<div class="wrapper">
		<form action="<?php echo PROJECT_ROOT_URL.'/user/login_action'; ?>" method="post">
			<div class="login_box">
				<div class="login_box_center">
					<p>
						<label for="username">用户名：</label>
						<a href="<?php echo PROJECT_ROOT_URL.'/user/register'; ?>">添加新用户</a>
					</p>
					<p>
						<input id="username" name="username" class="login_input"
							autofocus="autofocus" required="required" autocomplete="off"
							placeholder="请输入用户名" value="" />
					</p>
					<p>
						<label for="echo $username;password">密码：</label>
						<a href="<?php echo PROJECT_ROOT_URL.'/user/forget_password'; ?>">忘记密码?</a>
					</p>
					<p>
						<input type="password" id="password" name="password"
							class="login_input" required="required" placeholder="请输入密码" value="" />
					</p>
					<p>
						<span class="error_message"><?php  if(isset($message)) : echo $message; endif ?></span>
					</p>
				</div>
				<div class="login_box_buttons">
					<input id="keep_login" type="checkbox" name="keep_login" 
					<?php 
					if($this->input->cookie('keep_login')) :
						echo "checked='true'";
					endif
					?>/>
					<label for="keep_login">记住用户名密码</label>
					<button class="login_button">登录</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>bx-salary-ms</title>
<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/login.css'; ?>">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
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
							autofocus required="required" autocomplete="off" placeholder="请输入用户名" value="" />
					</p>
					<p>
						<label for="password">密码：</label>
						<a href="<?php echo PROJECT_ROOT_URL.'/user/forget_password'; ?>">忘记密码?</a>
					</p>
					<p>
						<input type="password" id="password" name="password"
							class="login_input" required="required" placeholder="请输入密码" value="" />
					</p>
					<p>
						<span class="error_message"><?php if(isset($message)) : echo $message; endif ?></span>
					</p>
				</div>
				<div class="login_box_buttons">
					<input id="remember_me" type="checkbox" name="remember_me" 
					<?php 
						if ($this->input->cookie('remember_me')) :
							echo "checked='true'";
						endif
					?>/>
					<label for="remember_me">记住我</label>
					<button class="login_button">登录</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
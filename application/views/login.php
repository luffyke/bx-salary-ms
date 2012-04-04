<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>bx-salary-ms</title>
<link rel="stylesheet" type="text/css" href="css/cssreset.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="wrapper">
		<form action="" method="post">
			<div class="login_box">
				<div class="login_box_center">
					<p>
						<label for="username">用户名：</label>
					</p>
					<p>
						<input id="username" name="username" class="login_input"
							autofocus="autofocus" required="required" autocomplete="off"
							placeholder="请输入用户名" value="" />
					</p>
					<p>
						<label for="password">密码：</label>
						<a class="forget_password" href="#">忘记密码?</a>
					</p>
					<p>
						<input type="password" id="password" name="password"
							class="login_input" required="required" placeholder="请输入密码" value="" />
					</p>
				</div>
				<div class="login_box_buttons">
					<input id="remember" type="checkbox" name="remember" /> <label for="remember">记住登录状态</label>
					<input id="auto_login" type="checkbox" name="auto_login" /> <label for="auto_login">自动登录</label>
					<button class="login_button">登录</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
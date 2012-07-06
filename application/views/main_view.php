<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/main.css'; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo PROJECT_ROOT_URL.'/css/button.css'; ?>">
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/jquery-1.7.2.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PROJECT_ROOT_URL.'/js/bx-salary-ms.js'; ?>"></script>
<title>bx-salary-ms</title>
</head>
<body>
	<div class="main_box">
		<div class="top_bottom_area_box">
			<div class="top_area_logo"><a href="main" >返回首页</a></div>
			<div class="top_area_title">Welcome to bx-salary-ms [beyondx-享受编程的乐趣]</div>
			<div class="top_area_logout">
				<?php
					$user_id = $this->session->userdata('user_id');
					if($user_id != '') : 
				?>
				管理员:
				<?php echo $this->session->userdata('username'); ?> [ <a href="<?php echo PROJECT_ROOT_URL.'/user/logout'; ?>">退出</a> ]
				<?php else : ?>
				[ <a href="<?php echo PROJECT_ROOT_URL.'/user/login'; ?>">登录</a> ] [ <a href="<?php echo PROJECT_ROOT_URL.'/user/register'; ?>">注册</a> ]
				<?php endif?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="content_box">
			<div class="left_menu_box">
				<div class="left_menu">
					<ul>
						<li class="caption">
							<strong>个人信息管理</strong>
							<ol>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/profile'?>">个人资料</a></li>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/user/change_password'; ?>">修改密码</a></li>
							</ol>
						</li>
					</ul>
					<ul>
						<li class="caption">
							<strong>工资信息管理</strong>
							<ol>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/salary'; ?>">工资记录</a></li>
							</ol>
						</li>
					</ul>
					<ul>
						<li class="caption">
							<strong>工作经历管理</strong>
							<ol>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/work'; ?>">工作经历</a></li>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/company'; ?>">公司信息</a></li>
							</ol>
						</li>
					</ul>
					<ul>
						<li class="caption">
							<strong>公积金保险管理</strong>
							<ol>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/insurance/housing_foud'; ?>">公积金管理</a></li>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/insurance'; ?>">保险管理</a></li>
							</ol>
						</li>
					</ul>
					<ul>
						<li class="caption">
							<strong>管理员功能</strong>
							<ol>
								<li><a href="<?php echo PROJECT_ROOT_URL.'/user_log'; ?>">用户日志</a></li>
							</ol>
						</li>
					</ul>
				</div>
			</div>
			<div class="content">
				<?php 
					switch ($action) {
						case 'profile':
							$this->load->view('profile_view');
							break;
						case 'insurance':
							$this->load->view('insurance_view');
							break;
						case 'salary':
							$this->load->view('salary_view');
							break;
						case 'work':
							$data['has_work'] = $has_work;
							if($has_work) :
								$data['history_work_result'] = $history_work_result;
								$data['current_work_result'] = $current_work_result;
							endif;
							$this->load->view('work_view');
							break;
						case 'company':
							$data['history_company_result'] = $history_company_result;
							$data['current_company_result'] = $current_company_result;
							$this->load->view('company_view');
							break;
						case 'user_log':
							$this->load->view('user_log_view');
							break;
						case 'change_password':
							$this->load->view('change_password_view');
							break;
						case 'add_work':
							if($has_company) :
								$data['company_result'] = $company_result;
							endif;
							$this->load->view('add_work_view');
							break;
						case 'add_company':
							$data['has_company'] = $has_company;
							$this->load->view('add_company_view', $data);
							break;
						default:
							#main
							break;
					}
				?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="top_bottom_area_box">
			<div class="copyright">© bx-salary-ms 2012 by kxt(luffyke@gmail.com)</div>
		</div>
	</div>
</body>
</html>

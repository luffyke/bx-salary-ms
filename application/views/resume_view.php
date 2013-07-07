<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body {
	font-family: 'Consolas', 'Verdana', 'sans-serif', '微软雅黑';
}

.resume {
	border : 1px solid #D9D9D9;
	margin : 0 auto;
	width : 800px;
}
.header {
	font-size : 18px;
	font-weight: bold;
	text-align: center;
	letter-spacing: 5px;
	height: 40px;
	line-height: 40px;
}
.basics {
	font-size: 15px;
}
.row {
	width : 85%;
	height: 30px;
	line-height: 30px;
}
.title {
	display : inline-block;
	border-right : 1px solid #D9D9D9;
	border-bottom : 1px solid #D9D9D9;
	width : 150px;
	text-align: center;
	font-weight: bold;
	letter-spacing: 1px;
}
.content {
	display : inline-block;
	border-right : 1px solid #D9D9D9;
	border-bottom : 1px solid #D9D9D9;
	width : 480px;
}

.details {
	font-size: 13px;
}

.details_title {
	text-align : center;
	font-weight : bold;
	letter-spacing : 2px;
}

.details_content {
	padding-left: 50px;
}

.td_width {
	width: 6%;
}

.experiences {
  	padding-top: 5px;
  	padding-bottom: 5px;
}
.projects {
	padding-top: 5px;
  	padding-bottom: 5px;
}
.skills {
	padding-top: 5px;
  	padding-bottom: 5px;
}

.thin_split_line {
	border-bottom : 1px solid #D9D9D9;
	font-size : 0px;
}
.thick_split_line {
	border-bottom : 5px solid #D9D9D9;
	font-size : 0px;
}
.link {}
</style>
</head>
<body>
	<div class="resume">
		<div class="header">个人简历</div>
		<div class="thin_split_line"></div>
		<div class="basics">
			<div class="row">
				<span class="title">姓名</span>
				<span class="content">柯锡汤</span>
			</div>
			<div class="row">
				<span class="title">学校专业</span>
				<span class="content">华南农业大学 - 2010届软件工程</span>
			</div>
			<div class="row">
				<span class="title">邮箱</span>
				<span class="content">luffyke@gmail.com</span>
			</div>
			<div class="row">
				<span class="title">电话</span>
				<span class="content">13760672114</span>
			</div>
			<div class="row">
				<span class="title">Github</span>
				<span class="content">https://github.com/luffyke</span>
			</div>
		</div>
		<div class="thick_split_line"></div>
		<div class="details">
			<div class="experiences">
				<div class="details_title">工作经验</div>
				<div class="details_content">
					<table>
						<tr><td class="td_width">时间 : </td><td>2009.11 - 2010.05</td></tr>
						<tr><td>单位 : </td><td>深圳爱瑞思软件有限公司</td></tr>
						<tr><td>职位 : </td><td>Java软件工程师实习生</td></tr>
						<tr><td>职责 : </td><td>负责ScholarMate(科研之友)系统的代码编写以及系统分析</td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>时间 : </td><td>2010.05 至今</td></tr>
						<tr><td>单位 : </td><td>汇丰软件开发(广东)有限公司</td></tr>
						<tr><td>职位 : </td><td>高级Java软件工程师</td></tr>
						<tr><td>职责 : </td><td>主要负责汇丰银行HUB(HSBC Universal Banking)借贷系统HLS(HUB Lending System)/SLS(Software house Lending System)的项目开发和技术支持</td></tr>
					</table>
				</div>
			</div>
			<div class="thin_split_line"></div>
			<div class="projects">
				<div class="details_title">项目经验</div>
				<div class="details_content">
					<table>
						<tr><td>1. ScholarMate(科研之友)系统</td></tr>
						<tr><td>主要负责系统用户管理的代码编程和部分存储过程的编写</td></tr>
						<tr><td>开发框架 ：Struct2 + Spring + Hibernate</td></tr>
						<tr><td></td></tr>
						<tr><td>2. SLS Amanah Enhancement</td></tr>
						<tr>
						<td>这个项目是汇丰银行沙特分行2010-2011主要项目，是HUB Core SLS的主要开发项目，其中包含3个功能点 ：</td>
						</tr>
						<tr><td>1 - 借贷派生</td></tr>
						<tr><td>2 - 添加非规则还款</td></tr>
						<tr><td>3 - 汇丰银行网银功能</td></tr>
						<tr><td>主要负责上面所有功能点的开发，修改和重构大量系统底层代码，以及系统测试技术支持，用户测试技术支持和缺陷的修改，还有负责沙特汇丰银行项目生产机发布技术支持</td></tr>
						<tr><td></td></tr>
						<tr><td>3. HSBC Global Staff Project</td></tr>
						<tr><td>这个项目是将汇丰银行前台系统HFE(HUB Front End)的消息结构进行修改，揽括了SLS所有功能点的消息数据格式操作，主要负责整个项目的架构，代码编写和项目测试技术支持</td></tr>
						<tr><td>v1.0 - 基于R2ds4j(汇丰基于Spring的框架)对整个框架进行设计和基础代码的编写</td></tr>
						<tr><td>v1.1 - 添加CallCenter 的Loan Repayment/Drawdown功能操作</td></tr>
						<tr><td>v1.2 - 添加前台分离功能以及非汇丰借贷外部账户支持功能</td></tr>
						<tr><td>开发框架 ：Spring</td></tr>
						<tr><td></td></tr>
						<tr><td>4. SLS Production Support</td></tr>
						<tr><td>职务 ：Fire Fighter</td></tr>
						<tr><td></td></tr>
						<tr><td>5. MUFC曼联网</td></tr>
						<tr>
						<td>这是一个关于足球俱乐部曼联详细信息的Web系统，包括球员列表，球员数据，赛程，荣誉室，积分榜等功能</td>
						</tr>
						<tr><td>开发框架 ：Spring mvc + Mybitas</td></tr>
						<tr><td></td></tr>
						<tr><td>6. MUFC Android APP</td></tr>
						<tr><td>这是MUFC曼联网的Android App，功能同曼联网是一样的</td></tr>
					</table>
				</div>
			</div>
			<div class="thin_split_line"></div>
			<div class="skills">
				<div class="details_title">专业技能</div>
				<div class="details_content">
					<table>
						<tr><td>熟悉Java和Android开发</td></tr>
						<tr><td>熟悉Spring和Mybatis框架</td></tr>
						<tr><td>熟悉Mysql数据库</td></tr>
						<tr><td>熟悉Linux和Mac OS系统，熟悉Eclipse和Sublime text开发工具</td></tr>
						<tr><td>了解PHP和ROR开发，研究过Erlang和IOS开发</td></tr>
					</table>
				</div>
			</div>
			<div class="thin_split_line"></div>
			<div>
				<div class="row">
					<span class="title">英语水平</span>
					<span class="content">英文良好，擅于阅读英文文档，经常主动上stackoverflow寻找问题答案</span>
				</div>
			</div>
			<div class="thin_split_line"></div>
			<div>
				<div class="row">
					<span class="title">兴趣爱好</span>
					<span class="content">吉他，足球，游泳</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
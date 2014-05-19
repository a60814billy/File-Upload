<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>File Upload</title>

        <link href="<?=WEB_ROOT?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=WEB_ROOT?>/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?=WEB_ROOT?>/css/app.css" rel="stylesheet">
	</head>
	<body>
		<header class="nav navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=WEB_ROOT?>/">File Upload</a>
				</div>
				<nav class="navbar-default" role="navigation">
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=WEB_ROOT?>/">上傳</a></li>
                        <li><a href="<?=WEB_ROOT?>/fileupload/delete">刪除</a></li>
                        <li class="active dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=WEB_ROOT?>/fileupload/runsql">Run SQL Statments</a></li>
                                <li><a href="<?=WEB_ROOT?>/fileupload/createtable" >Create Table</a></li>
                                <li><a href="<?=WEB_ROOT?>/fileupload/changepassword">Change Password</a></li>
                                <li><a href="<?=WEB_ROOT?>/fileupload/logout">Logout</a></li>
                            </ul>
                        </li>
					</ul>
				</nav>
			</div>
		</header>
		<article>
			<div class="container">
				<ol class="breadcrumb">
					<li>Admin</li>
					<li class="active"><a href="#">Password Change</a></li>
				</ol>
				<div class="panel panel-default panel-primary loginForm">
					<div class="panel-heading" id="title">Password Change</div>
					<div class="panel-body">
						<form class="form-group" action="" method="POST">
							<input class="form-control form-group" type="password" name="password" placeholder="新密碼" />
							<input class="btn btn-default btn-primary" type="submit" value="更改">
						</form>
					</div>
				</div>
			</div>
		</article>
		<footer class="footer nav navbar-fixed-bottom bg-info" style="padding:15px 0;">
			<div class="container">Raccoon &copy 2014</div>
		</footer>
		<script src="<?=WEB_ROOT?>/js/jquery-2.1.1.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap.min.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap-fileinput.js"></script>
	</body>
</html>
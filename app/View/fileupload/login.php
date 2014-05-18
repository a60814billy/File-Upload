<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>File Upload</title>

		<link href="<?=WEB_ROOT?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=WEB_ROOT?>/css/bootstrap-theme.min.css" rel="stylesheet">
		<style type="text/css">
		body{
			width:80%;
			margin:0 auto;
			padding-top: 20px;
		}
		#title{
			font-size:18pt;
			font-weight:bold;
		}
		.loginForm{
			max-width:350px;
			margin:0 auto;
		}
		</style>
	</head>
	<body>
		<header class="nav navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=WEB_ROOT?>/">File Upload</a>
				</div>
				<nav class="navbar-default" role="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li ><a href="<?=WEB_ROOT?>/">上傳</a></li>
						<li class="active"><a href="<?=WEB_ROOT?>/fileupload/admin">Admin</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<article>
			<div class="container">
				<ol class="breadcrumb">
					<li>Home</li>
					<li class="active"><a href="#">Login</a></li>
				</ol>
				<div class="panel panel-default panel-primary loginForm">
					<div class="panel-heading" id="title">Admin Login</div>
					<div class="panel-body">
						<form class="form-inline" action="<?=WEB_ROOT?>/fileupload/login" method="POST">
							<input class="form-control" type="password" name="password" placeholder="Password" />
							<input class="btn btn-default btn-primary" type="submit" value="login">
						</form>
					</div>
				</div>
			</div>
		</article>
		<footer class="footer nav navbar-fixed-bottom bg-info" style="padding:15px 0;">
			<div class="container">
				Developer:Raccoon last update:2014/05/18
				</div>
		</footer>
		<script src="<?=WEB_ROOT?>/js/jquery-2.1.1.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap.min.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap-fileinput.js"></script>
		<script>
			$('input[type=file]').bootstrapFileInput();
		</script>
	</body>
</html>
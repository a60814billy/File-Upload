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
		.upload{
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
						<li class="active"><a href="<?=WEB_ROOT?>/">上傳</a></li>
						<!--<li><a href="<?=WEB_ROOT?>/fileupload/delete">刪除</a></li>-->
						<li><a href="<?=WEB_ROOT?>/fileupload/admin">Admin</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<article>
			<div class="container">
				<ol class="breadcrumb">
					<li>Home</li>
					<li class="active"><a href="#">Upload</a></li>
				</ol>
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default panel-primary ">
						<div class="panel-heading" id="title">專題檔案上傳</div>
						<div class="panel-body">
							<?php if($_GET['message']==1){ ?>
							<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> 上傳成功！</div>
							<?php } ?>
							<form class="form-horizontal" action="<?=WEB_ROOT?>/fileupload/upload" method="POST" enctype="multipart/form-data" role="form">
								<div class="form-group">
									<label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" for="no">編號</label>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >
										<input name="no" class="form-control" type="text" placeholder="103-CSIE-S001-MID" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" for="no">刪除密碼</label>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >
										<input name="deletepassword" required class="form-control" type="password" placeholder="傳錯檔案時刪除的密碼" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label" for="paper">專題報告檔案</label>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
										<input type="file" class="" title="選取檔案" required name="paper" data-filename-placement=inside/>
									</div>
								</div>
								<div class="form-groud">
									<div class="col-md-offset-2 col-md-7">
										<button class="btn btn-default btn-primary" type="submit">
											<span class="glyphicon glyphicon-cloud-upload"></span> 上傳
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</article>
		<footer class="footer nav navbar-fixed-bottom bg-info" style="padding:15px 0;">
			<div class="container">
				Raccoon &copy 2014
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
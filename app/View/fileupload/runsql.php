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
			<div class="container navbar-default">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=WEB_ROOT?>/">File Upload</a>
				</div>
				<nav class="" role="navigation">
					<ul class="nav navbar-nav navbar-right ">
						<li ><a href="<?=WEB_ROOT?>/">上傳</a></li>
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
					<li>Home</li>
					<li class="active"><a href="#">Admin</a></li>
				</ol>
				<div class="alert alert-warning"><span class="glyphicon glyphicon-info-sign" ></span> 請注意，這會直接對DB做修改。</div>
				<?php

				if(!empty($_REQUEST['message'])){
					if($_GET['message'] == 1){
				?>
				<div class="alert alert-success"><span class="glyphicon glyphicon-info-sign" >Success.</div>
				<?php
					}else if($_GET['message']){
				?>
				<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign" >Fail.</div>
				<?php
					}
				}
				?>
				<div class="panel panel-default panel-primary">
					<div class="panel-heading" id="title">Run SQL Statments</div>
					<div class="panel-body">
						<form class="" method="POST">
							<div class="form-group">
								<textarea name="sqlcmd" class="form-control" rows="3" placeholder="SQL Commands"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Run</button>
							</div>
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
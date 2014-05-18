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
						<li class="active"><a href="<?=WEB_ROOT?>/fileupload/delete">刪除</a></li>
						<li><a href="<?=WEB_ROOT?>/fileupload/admin">Admin</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<article>
			<div class="container">
				<ol class="breadcrumb">
					<li>Home</li>
					<li class="active"><a href="#">Delete</a></li>
				</ol>
				<?php if($data['viewmode'] == 0): ?>
				<div class="panel panel-default panel-primary loginForm">
					
					<div class="panel-heading" id="title">Enter Delete Password</div>
					<div class="panel-body">
						<form class="form-inline" action="<?=WEB_ROOT?>/fileupload/delete" method="POST">
							<input class="form-control" type="text" name="password" placeholder="Password" />
							<input class="btn btn-default btn-primary" type="submit" value="login">
						</form>
					</div>
				</div>
				<?php endif; ?>
				<?php if($data['viewmode'] == 1): ?>
				<div class="panel panel-default panel-primary">
					<div class="panel-heading" id="title">Select File</div>
					<div class="panel-body">
						<table id="selectItem" class="table table-bordered table-hover">
							<tr>
								<th><input type="checkbox" click="selall();" /></th>
								<th>組別</th>
								<th>檔名</th>
								<th>上傳時間</th>
							</tr>
							<tbody>
							<?php foreach($data['data'] as $r){ ?> 
							<tr>
								<td><input name="file[]" type="checkbox" value="<?php $r['id']?>" /></td>
								<td><?php echo $r['groupNo']; ?></td>
								<td><?php echo $r['originfilename']; ?></td>
								<td><?php echo date("Y-m-d H:i:s" , $r['uploadtime']); ?></td>
							</tr>
							<?php } ?> 
							</tbody>
						</table>
					</div>
				</div>
				<?php endif; ?>
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
			$('#selectItem tbody tr').each(function(){
				$(this).click(function(){
					$obj = $(this).find("input[name='file[]']");
					$checked = $obj.prop("checked");
					$obj.prop("checked" , !$checked);
					//alert($(this).index());
				})
			})
			$("input[name='file[]']").each(function(){
				$(this).click(function(e){
					e.preventDefault();
				});
			});
		</script>
	</body>
</html>
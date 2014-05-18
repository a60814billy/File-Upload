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
			<div class="container navbar-default">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=WEB_ROOT?>/">File Upload</a>
				</div>
				<nav class="" role="navigation">
					<ul class="nav navbar-nav navbar-right ">
						<li ><a href="<?=WEB_ROOT?>/">上傳</a></li>
						<li class="active dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="<?=WEB_ROOT?>/fileupload/runsql">Run SQL Statments</a></li>
								<li><a href="<?=WEB_ROOT?>/fileupload/createtable" >Create Table</a></li>
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
				<?php if(!empty($data['message'])){ ?>
				<div class="alert alert-info"><?=$data['message']?></div>
				<?php } ?>
				<div class="panel panel-default panel-primary">
					<div class="panel-heading" id="title">Upload List</div>
					<div class="panel-body">
						<table class="table table-bordered table-hover">
							<tr>
								<th> </th>
								<th>編號</th>
								<th>原始檔名</th>
								<th>上傳時間</th>
							</tr>
							<?php foreach($data['list'] as $r){ ?>
							<tr>
								<td>
								<button class="btn btn-default" onclick="download('<?php echo $r['serverfilename']?>')" >
									<span class="glyphicon glyphicon-cloud-download"></span>
								</button>
								</td>
								<td><?php echo $r['groupNo'] ?></td>
								<td><?php echo $r['originfilename'] ?></td>
								<td><?php echo date("Y-m-d H:i:s" , $r['uploadtime']); ?></td>
							</tr>
							<?php } ?>
						</table>
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
			function download($file){
				var $ifram = $("<iframe style='display:none;' />");
				$ifram.attr("src" , "<?=WEB_ROOT?>/upload/" + $file);
				$ifram.appendTo('body');
				$ifram.load(function(){
				});
			}
		</script>
	</body>
</html>
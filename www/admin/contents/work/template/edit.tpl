<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>管理画面</title>
		<link href="/admin/common/css/import.css" rel="stylesheet" />
		<link href="/admin/common/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet" />
		{include file=$template_javascript}
		<script type="text/javascript" src="/admin/common/js/input.js"></script>
		<script src="/admin/common/js/plugins/datapicker/bootstrap-datepicker-import.js"></script>
		<script type="text/javascript" src="/admin/common/js/ckeditor/ckeditor.js"></script>
		<link rel="stylesheet" href="/admin/common/js/chosen/chosen.css" />
		<script type="text/javascript" src="/admin/common/js/chosen/chosen.jquery.min.js"></script>
	</head>
	<body class="fixed-sidebar no-skin-config">
		<div id="wrapper">
			{include file=$template_secondary action=public manage=$_CONTENTS_DIR}
			<div id="page-wrapper" class="gray-bg">
				{include file=$template_header}
				<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
						<h2>{$_CONTENTS_NAME}</h2>
						<ol class="breadcrumb">
							<li><a href="/">Home</a></li>
							<li><a href="./">{$_CONTENTS_NAME}</a></li>
							<li class="active"><strong>編集</strong></li>
						</ol>
					</div>
					<div class="col-lg-2"></div>
				</div>
				<div class="wrapper wrapper-content animated fadeInRight">
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>{$_CONTENTS_NAME}管理　確認 </h5>
								</div>
								{include file="./form.tpl" mode="edit"}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
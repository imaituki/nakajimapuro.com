<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>管理画面</title>
	<link href="{$_ADMIN.home}/common/css/import.css" rel="stylesheet" />
	{include file=$template_javascript}
	<script src="{$_ADMIN.home}/common/js/lightbox/import.js"></script>
	<script src="{$_ADMIN.home}/common/js/plugins/datepicker/bootstrap-datepicker-import.js"></script>
	<script src="{$_ADMIN.home}/common/js/list.js"></script>
<script src="/admin/contents/loan/js/table.fix.js"></script>
{literal}<script>
$(function(){
	// サイズ設定
	var tot = $('#formList').offset().top; var tol = $('#formList').offset().left;
	var wh = $(window).height(); var ww = $(window).width();
	var mw1 = 0, mw2 = 0;

	$('.fix_cell.v1').each(function(){
		if( mw1 < $(this).innerWidth() ){ mw1 = $(this).innerWidth() - 2; }
	});
	$('.fix_cell.v2').each(function(){
		if( mw2 < $(this).innerWidth() ){ mw2 = $(this).innerWidth() - 2; }
	});
	$('.fix_cell.v1').css('width', (mw1 - 17));
	$('.fix_cell.v2').css('width', (mw2 - 17));

	// 固定
	$('.loan_tbl_calendar').tablefix({
		width :(ww - tol - 50),
		height :(wh - tot - 50),
		fixRows: 2,
		fixCols: 2
	});
});
</script>
<style>
div.list-color { font-weight: bold; text-align: left; }
.table-overflow-wrap { position:relative; }
#formList table { width:auto !important; }
</style>{/literal}
</head>
<body class="fixed-sidebar no-skin-config">
<div id="wrapper">
	{include file=$template_secondary action="public" manage="loan"}
	<div id="page-wrapper" class="gray-bg">
		{include file=$template_header}
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>{$_CONTENTS_NAME}</h2>
				<ol class="breadcrumb">
					<li><a href="/admin/">Home</a></li>
					<li class="active"><strong>{$_CONTENTS_NAME}</strong></li>
				</ol>
			</div>
		</div>
		<div class="wrapper wrapper-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<div id="searchList">
								{include file="./list.tpl"}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

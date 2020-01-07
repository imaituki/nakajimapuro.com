<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 09:19:39
         compiled from "../template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8526099645e13cde8649b21-42944942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c39e247f385d95767962e1dac86ee8434c9a9c2' => 
    array (
      0 => '../template/index.tpl',
      1 => 1578356360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8526099645e13cde8649b21-42944942',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e13cde867a752_33056519',
  'variables' => 
  array (
    '_ADMIN' => 0,
    'template_javascript' => 0,
    'template_secondary' => 0,
    'template_header' => 0,
    '_CONTENTS_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e13cde867a752_33056519')) {function content_5e13cde867a752_33056519($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>管理画面</title>
	<link href="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/common/css/import.css" rel="stylesheet" />
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_javascript']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<script src="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/common/js/lightbox/import.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/common/js/plugins/datepicker/bootstrap-datepicker-import.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_ADMIN']->value['home'];?>
/common/js/list.js"></script>
<script src="/admin/contents/loan/js/table.fix.js"></script>
<script>
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
</style>
</head>
<body class="fixed-sidebar no-skin-config">
<div id="wrapper">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_secondary']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('action'=>"public",'manage'=>"loan"), 0);?>

	<div id="page-wrapper" class="gray-bg">
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
</h2>
				<ol class="breadcrumb">
					<li><a href="/admin/">Home</a></li>
					<li class="active"><strong><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
</strong></li>
				</ol>
			</div>
		</div>
		<div class="wrapper wrapper-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox">
						<div class="ibox-content">
							<div id="searchList">
								<?php echo $_smarty_tpl->getSubTemplate ("./list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<?php }} ?>

<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 09:07:32
         compiled from "../template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13248151115e130e65d84505-12062133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c39e247f385d95767962e1dac86ee8434c9a9c2' => 
    array (
      0 => '../template/index.tpl',
      1 => 1578355648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13248151115e130e65d84505-12062133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e130e65dbd3e6_79833170',
  'variables' => 
  array (
    '_ADMIN' => 0,
    'template_javascript' => 0,
    'template_secondary' => 0,
    'template_header' => 0,
    '_CONTENTS_NAME' => 0,
    'mst_calendar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e130e65dbd3e6_79833170')) {function content_5e130e65dbd3e6_79833170($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/nakajimapuro/cgi-data/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
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
</head>
<body class="fixed-sidebar no-skin-config">
<div id="wrapper">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_secondary']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('action'=>"public",'manage'=>"schedule"), 0);?>

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
			<div class="col-lg-2 m-b-xs pos_ar mt30">
				<a href="./export.php?y=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['display_date'],"%Y");?>
&m=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['display_date'],"%m");?>
" class="btn btn-primary btn-s">CSV出力</a>
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

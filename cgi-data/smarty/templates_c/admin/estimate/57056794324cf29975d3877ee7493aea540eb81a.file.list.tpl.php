<?php /* Smarty version Smarty-3.1.18, created on 2019-12-16 12:46:24
         compiled from "/home/nakajimapuro/www/admin/contents/estimate/template/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5893589805df6fe10676bf0-46582611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57056794324cf29975d3877ee7493aea540eb81a' => 
    array (
      0 => '/home/nakajimapuro/www/admin/contents/estimate/template/list.tpl',
      1 => 1576467188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5893589805df6fe10676bf0-46582611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_pagenavi' => 0,
    't_estimate' => 0,
    'estimate' => 0,
    '_CONTENTS_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5df6fe1069dbf0_44144216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5df6fe1069dbf0_44144216')) {function content_5df6fe1069dbf0_44144216($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/nakajimapuro/cgi-data/smarty/libs/plugins/modifier.date_format.php';
?>			<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15">
				<thead>
					<tr>
						<th width="100">見積り日</th>
						<th>会社名・学校名/名前(担当者)</th>
						<th width="255">印刷</th>
						<th width="70" class="delete">削除</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars["estimate"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["estimate"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t_estimate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["estimate"]->key => $_smarty_tpl->tpl_vars["estimate"]->value) {
$_smarty_tpl->tpl_vars["estimate"]->_loop = true;
?>
					<tr>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['estimate']->value['estimate_date'],"%Y/%m/%d");?>
</td>
						<td><a href="./edit.php?id=<?php echo $_smarty_tpl->tpl_vars['estimate']->value['id_estimate'];?>
"><?php if ($_smarty_tpl->tpl_vars['estimate']->value['company']) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['estimate']->value['company'])===null||$tmp==='' ? '' : $tmp);?>
<br /><?php }?><?php if ($_smarty_tpl->tpl_vars['estimate']->value['name']) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['estimate']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
様<?php }?></a></td>
						<td class="pos_ac">
							<a href="./export.php?id=<?php echo $_smarty_tpl->tpl_vars['estimate']->value['id_estimate'];?>
" target="_blank" class="btn btn-info">見積書</a>
							<a href="./export2.php?id=<?php echo $_smarty_tpl->tpl_vars['estimate']->value['id_estimate'];?>
" target="_blank" class="btn btn-info">納品書</a>
							<a href="./export3.php?id=<?php echo $_smarty_tpl->tpl_vars['estimate']->value['id_estimate'];?>
" target="_blank" class="btn btn-info">請求書</a>
						</td>
						<td class="pos_ac">
							<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['estimate']->value['id_estimate'];?>
">削除</a>
						</td>
					</tr>
					<?php }
if (!$_smarty_tpl->tpl_vars["estimate"]->_loop) {
?>
					<tr>
						<td colspan="6"><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
は見つかりません。</td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="10"><ul class="pagination pull-right">
							</ul></td>
					</tr>
				</tfoot>
			</table>
			<div id="blueimp-gallery" class="blueimp-gallery">
				<div class="slides"></div>
				<h3 class="title"></h3>
				<a class="prev">‹</a>
				<a class="next">›</a>
				<a class="close">×</a>
				<a class="play-pause"></a>
				<ol class="indicator"></ol>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

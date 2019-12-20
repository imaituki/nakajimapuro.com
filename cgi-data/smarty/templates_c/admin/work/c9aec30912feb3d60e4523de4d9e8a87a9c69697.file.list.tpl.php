<?php /* Smarty version Smarty-3.1.18, created on 2019-12-16 12:46:26
         compiled from "/home/nakajimapuro/www/admin/contents/work/template/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4669944965df6fe12ac4296-38562053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9aec30912feb3d60e4523de4d9e8a87a9c69697' => 
    array (
      0 => '/home/nakajimapuro/www/admin/contents/work/template/list.tpl',
      1 => 1576467191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4669944965df6fe12ac4296-38562053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_pagenavi' => 0,
    't_work' => 0,
    'work' => 0,
    '_CONTENTS_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5df6fe12afed98_43069007',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5df6fe12afed98_43069007')) {function content_5df6fe12afed98_43069007($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/nakajimapuro/cgi-data/smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_html_select_ken')) include '/home/nakajimapuro/cgi-data/smarty/libs/plugins/function.html_select_ken.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15">
	<thead>
		<tr>
			<th width="200">お問い合わせ日時</th>
			<th width="300">名前</th>
			<th width="200">メールアドレス</th>
			<th width="200">住所</th>
			<th width="150">電話番号</th>
			<th class="showhide" width="60">確認</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="150">お問い合わせ日時</th>
			<th>名前</th>
			<th width="150">メールアドレス</th>
			<th width="200">住所</th>
			<th width="150">電話番号</th>
			<th class="showhide" width="60">確認</th>
			<th class="delete">削除</th>
		</tr>
	</tfoot>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['work'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['work']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t_work']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['work']->key => $_smarty_tpl->tpl_vars['work']->value) {
$_smarty_tpl->tpl_vars['work']->_loop = true;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['work']->value['check_flg']==1) {?>style="background-color: #dadada;"<?php }?>>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['work']->value['entry_date'],"%Y/%m/%d %H:%M:%S");?>
</td>
			<td><a href="./edit.php?id=<?php echo $_smarty_tpl->tpl_vars['work']->value['id_work'];?>
"><?php echo $_smarty_tpl->tpl_vars['work']->value['name'];?>
<br>(<?php echo $_smarty_tpl->tpl_vars['work']->value['ruby'];?>
)</a></td>
			<td><?php echo $_smarty_tpl->tpl_vars['work']->value['mail'];?>
</td>
			<td>〒<?php echo $_smarty_tpl->tpl_vars['work']->value['zip'];?>
<br><?php echo smarty_function_html_select_ken(array('selected'=>(($tmp = @$_smarty_tpl->tpl_vars['work']->value['prefecture'])===null||$tmp==='' ? '' : $tmp),'pre'=>1),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['work']->value['address'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['work']->value['tel'];?>
</td>
			<td class="pos_ac">
			<?php if ($_smarty_tpl->tpl_vars['work']->value['check_flg']!=1) {?>
				<a href="javascript:void(0)" class="btn btn-info btn_check" data-id="<?php echo $_smarty_tpl->tpl_vars['work']->value['id_work'];?>
">確認</a>
			<?php } else { ?>
				確認済
			<?php }?>
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['work']->value['id_work'];?>
">削除</a>
			</td>
		</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['work']->_loop) {
?>
		<tr>
			<td colspan="6"><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
は見つかりません。</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

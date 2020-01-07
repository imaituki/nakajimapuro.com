<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 12:47:19
         compiled from "/home/nakajimapuro/www/admin/contents/rental/template/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2837807725df6fdfddddfc0-45614460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cc2cac0d6e9151eb9dc5c122793c600bba057ad' => 
    array (
      0 => '/home/nakajimapuro/www/admin/contents/rental/template/list.tpl',
      1 => 1578355647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2837807725df6fdfddddfc0-45614460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5df6fdfde3afa1_66277084',
  'variables' => 
  array (
    'template_pagenavi' => 0,
    't_rental' => 0,
    'rental' => 0,
    'arr_post' => 0,
    '_CONTENTS_ID' => 0,
    'OptionRentalCategory' => 0,
    '_CONTENTS_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5df6fdfde3afa1_66277084')) {function content_5df6fdfde3afa1_66277084($_smarty_tpl) {?>
<script type="text/javascript">
sortableInit();
</script>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<table class="footable table table-stripped toggle-arrow-tiny tbl_1" data-page-size="15" id="sortable-table">
	<thead>
		<tr>
			<th></th>
			<th>商品名・名前</th>
			<th>カテゴリ</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th></th>
			<th>商品名・名前</th>
			<th>カテゴリ</th>
			<th class="showhide">表示</th>
			<th class="delete">削除</th>
		</tr>
	</tfoot>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['rental'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rental']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t_rental']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rental']->key => $_smarty_tpl->tpl_vars['rental']->value) {
$_smarty_tpl->tpl_vars['rental']->_loop = true;
?>
		<tr id="<?php echo $_smarty_tpl->tpl_vars['rental']->value['id_rental'];?>
">
			<td class="move_i"><?php if ((($tmp = @$_smarty_tpl->tpl_vars['arr_post']->value['mode'])===null||$tmp==='' ? '' : $tmp)=="search") {?><?php } else { ?><i class="fa fa-sort"><span></span></i><?php }?></td>
			<td><a href="./edit.php?id=<?php echo $_smarty_tpl->tpl_vars['rental']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['rental']->value['name'];?>
</a></td>
			<td>
				<?php echo $_smarty_tpl->tpl_vars['OptionRentalCategory']->value[$_smarty_tpl->tpl_vars['rental']->value['id_rental_category']];?>

			</td>
			<td class="pos_ac">
				<div class="switch">
					<div class="onoffswitch">
						<input type="checkbox" value="1" class="onoffswitch-checkbox btn_display" id="display<?php echo $_smarty_tpl->tpl_vars['rental']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['rental']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
"<?php if ($_smarty_tpl->tpl_vars['rental']->value['display_flg']==1) {?> checked<?php }?>>
						<label class="onoffswitch-label" for="display<?php echo $_smarty_tpl->tpl_vars['rental']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
			</td>
			<td class="pos_ac">
				<a href="javascript:void(0)" class="btn btn-danger btn_delete" data-id="<?php echo $_smarty_tpl->tpl_vars['rental']->value[$_smarty_tpl->tpl_vars['_CONTENTS_ID']->value];?>
">削除</a>
			</td>
		</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars['rental']->_loop) {
?>
		<tr>
			<td colspan="6" class="pos_ac"><?php echo $_smarty_tpl->tpl_vars['_CONTENTS_NAME']->value;?>
は見つかりません。</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_pagenavi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

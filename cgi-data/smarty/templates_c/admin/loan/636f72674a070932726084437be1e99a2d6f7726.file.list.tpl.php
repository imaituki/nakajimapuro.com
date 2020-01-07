<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 09:22:16
         compiled from "/home/nakajimapuro/www/admin/contents/loan/template/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17801267345e13cde871ec86-77378177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '636f72674a070932726084437be1e99a2d6f7726' => 
    array (
      0 => '/home/nakajimapuro/www/admin/contents/loan/template/list.tpl',
      1 => 1578356535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17801267345e13cde871ec86-77378177',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e13cde87a4052_10578096',
  'variables' => 
  array (
    'mst_calendar' => 0,
    'week' => 0,
    'OptionWeek' => 0,
    'key' => 0,
    'calendar' => 0,
    'OptionEquipment' => 0,
    'OptionStoreEquipment' => 0,
    'ListEquipment' => 0,
    'OptionStorage' => 0,
    'key3' => 0,
    'key2' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e13cde87a4052_10578096')) {function content_5e13cde87a4052_10578096($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/nakajimapuro/cgi-data/smarty/libs/plugins/modifier.date_format.php';
?><p class="calendar_date_select pos_ac large f-bold"><span><a href="./index.php?y=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['back_date'],"%Y");?>
&m=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['back_date'],"%m");?>
">&lt;&lt;</a> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['display_date'],"%Y年%m月");?>
</span> <a href="./index.php?y=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['next_date'],"%Y");?>
&m=<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['next_date'],"%m");?>
">&gt;&gt;</a></span></p>
				<form action="" method="post" id="formList">
					<div class="table-overflow-wrap" align="center">
					<table class="tbl_2 mb10 tbl_calendar loan_tbl_calendar">
						<thead>
							<tr>
								<th class="fix_cell v1">&nbsp;</th>
								<th class="fix_cell v2">&nbsp;</th>
<?php  $_smarty_tpl->tpl_vars["week"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["week"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mst_calendar']->value['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["week"]->key => $_smarty_tpl->tpl_vars["week"]->value) {
$_smarty_tpl->tpl_vars["week"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["week"]->key;
?>
								<th><?php echo $_smarty_tpl->tpl_vars['OptionWeek']->value[$_smarty_tpl->tpl_vars['week']->value];?>
</th>
<?php } ?>
							</tr>
							<tr>
								<th class="fix_cell v1">&nbsp;</th>
								<th class="fix_cell v2">&nbsp;</th>
<?php  $_smarty_tpl->tpl_vars["calendar"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["calendar"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mst_calendar']->value['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["calendar"]->key => $_smarty_tpl->tpl_vars["calendar"]->value) {
$_smarty_tpl->tpl_vars["calendar"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["calendar"]->key;
?>
								<th><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</th>
<?php } ?>
							</tr>
						</thead>
						<tbody>
<?php  $_smarty_tpl->tpl_vars["calendar"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["calendar"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mst_calendar']->value['calendar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["calendar"]->key => $_smarty_tpl->tpl_vars["calendar"]->value) {
$_smarty_tpl->tpl_vars["calendar"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["calendar"]->key;
?>
							<tr>
								<th class="fix_cell v1"><?php echo $_smarty_tpl->tpl_vars['OptionEquipment']->value[$_smarty_tpl->tpl_vars['calendar']->value['_equipment_arr']];?>
</th>
								<th class="fix_cell v2">
	<?php  $_smarty_tpl->tpl_vars["ListEquipment"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ListEquipment"]->_loop = false;
 $_smarty_tpl->tpl_vars["key3"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OptionStoreEquipment']->value[$_smarty_tpl->tpl_vars['calendar']->value['_equipment_arr']]['id_storage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ListEquipment"]->key => $_smarty_tpl->tpl_vars["ListEquipment"]->value) {
$_smarty_tpl->tpl_vars["ListEquipment"]->_loop = true;
 $_smarty_tpl->tpl_vars["key3"]->value = $_smarty_tpl->tpl_vars["ListEquipment"]->key;
?>
									<?php echo $_smarty_tpl->tpl_vars['OptionStorage']->value[$_smarty_tpl->tpl_vars['ListEquipment']->value];?>
&nbsp;→&nbsp;<?php echo number_format($_smarty_tpl->tpl_vars['OptionStoreEquipment']->value[$_smarty_tpl->tpl_vars['calendar']->value['_equipment_arr']]['storage_number'][$_smarty_tpl->tpl_vars['key3']->value]);?>
&nbsp;&nbsp;
	<?php } ?>
								</th>
	<?php  $_smarty_tpl->tpl_vars["week"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["week"]->_loop = false;
 $_smarty_tpl->tpl_vars["key2"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['mst_calendar']->value['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["week"]->key => $_smarty_tpl->tpl_vars["week"]->value) {
$_smarty_tpl->tpl_vars["week"]->_loop = true;
 $_smarty_tpl->tpl_vars["key2"]->value = $_smarty_tpl->tpl_vars["week"]->key;
?>
		<?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['calendar']->value['date_start'],"%-d")<=$_smarty_tpl->tpl_vars['key2']->value&&smarty_modifier_date_format($_smarty_tpl->tpl_vars['calendar']->value['date_end'],"%-d")>=$_smarty_tpl->tpl_vars['key2']->value) {?>
			<?php if ($_smarty_tpl->tpl_vars['count']->value==0) {?>
								<td colspan="<?php echo $_smarty_tpl->tpl_vars['calendar']->value['date_diff'];?>
">
									<div class="list-color color-bar<?php echo $_smarty_tpl->tpl_vars['calendar']->value['colorbar'];?>
">
										<a href="../../request<?php if ($_smarty_tpl->tpl_vars['calendar']->value['class']==2) {?>2<?php }?>/php/edit.php?id=<?php echo $_smarty_tpl->tpl_vars['calendar']->value['id_request'];?>
"><?php echo $_smarty_tpl->tpl_vars['calendar']->value['name'];?>
&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['calendar']->value['_equipment_shop']!=null) {?><?php echo $_smarty_tpl->tpl_vars['OptionStorage']->value[$_smarty_tpl->tpl_vars['calendar']->value['_equipment_shop']];?>
<?php }?><?php echo number_format($_smarty_tpl->tpl_vars['calendar']->value['_equipment_num']);?>
個</a>
									</div>
								</td>
			<?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(1, null, 0);?>
		<?php }?>
		<?php } else { ?>
								<td></td>
		<?php }?>
		<?php if (smarty_modifier_date_format($_smarty_tpl->tpl_vars['calendar']->value['date_end'],"%-d")==$_smarty_tpl->tpl_vars['key2']->value) {?><?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable(0, null, 0);?><?php }?>
	<?php } ?>
							</tr>
<?php } ?>
						</tbody>
					</table>
				</div>
				<input type="hidden" id="y" name="y" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['display_date'],"%Y");?>
" />
				<input type="hidden" id="m" name="m" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mst_calendar']->value['display_date'],"%m");?>
" />
				</form>
<?php }} ?>

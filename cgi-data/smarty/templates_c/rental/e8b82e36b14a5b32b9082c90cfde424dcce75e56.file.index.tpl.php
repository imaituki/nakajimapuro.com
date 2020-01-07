<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 21:59:38
         compiled from "./index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9618262315e13d4d10c4a19-61793765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8b82e36b14a5b32b9082c90cfde424dcce75e56' => 
    array (
      0 => './index.tpl',
      1 => 1578401975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9618262315e13d4d10c4a19-61793765',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e13d4d120e909_71879080',
  'variables' => 
  array (
    'template_meta' => 0,
    'template_javascript' => 0,
    'template_header' => 0,
    'OptionRentalCategory' => 0,
    'key' => 0,
    'arr_get' => 0,
    'rental_category' => 0,
    'mst_rental' => 0,
    'data' => 0,
    'page_navi' => 0,
    'template_footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e13d4d120e909_71879080')) {function content_5e13d4d120e909_71879080($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_meta']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="/common/css/import.css">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_javascript']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script type="text/javascript" src="/common/js/lightbox/import.js"></script>
</head>
<body id="rental">
<div id="base">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<main>
<div id="pankuzu">
	<ul class="center">
		<li><a href="/">HOME</a></li>
		<li>レンタル品・料金一覧</li>
	</ul>
</div>
<div id="body">
	<section>
		<div class="wrapper-b center">
			<div id="body_wrap" class="clearfix">
				<div id="side_list">
					<h3><i class="fa fa-search"></i>カテゴリから探す</h3>
					<ul>
<?php  $_smarty_tpl->tpl_vars["rental_category"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rental_category"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OptionRentalCategory']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["rental_category"]->key => $_smarty_tpl->tpl_vars["rental_category"]->value) {
$_smarty_tpl->tpl_vars["rental_category"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["rental_category"]->key;
?>
						<li><a href="/rental/<?php if ($_smarty_tpl->tpl_vars['key']->value!=0) {?>?sid=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['arr_get']->value['date']!=null) {?>&date=<?php echo $_smarty_tpl->tpl_vars['arr_get']->value['date'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['rental_category']->value;?>
</a></li>
<?php } ?>
					</ul>
				</div>
				<div id="body_content">
					<div class="attention mb20">
						<div class="row">
							<div class="col-xs-9"><p>※弊社で搬入・設営・搬出・撤去を行う場合は別途￥40,000+消費税（岡山県内）必要となります。</p></div>
							<div class="col-xs-3"><a href="/guide/" class="btn_attend"><i class="fa fa-info-circle"></i> ご利用について</a></div>
						</div>
					</div>
					<table class="tbl_list mb30">
						<thead>
							<tr>
								<th>品名</th>
								<th>仕様</th>
								<th>単価</th>
								<th>個数</th>
							</tr>
						</thead>
						<tbody>
<?php  $_smarty_tpl->tpl_vars["data"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["data"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mst_rental']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["data"]->key => $_smarty_tpl->tpl_vars["data"]->value) {
$_smarty_tpl->tpl_vars["data"]->_loop = true;
?>
							<tr>
								<td><a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a></td>
								<td><?php echo $_smarty_tpl->tpl_vars['data']->value['parts']['comment'];?>
</td>
								<td class="pos_ar"><?php echo $_smarty_tpl->tpl_vars['data']->value['parts']['price'];?>
</td>
								<td class="number"><input type="text" name="item[<?php echo $_smarty_tpl->tpl_vars['data']->value['parts']['id_rental_parts'];?>
]"><?php echo $_smarty_tpl->tpl_vars['data']->value['unit'];?>
</td>
							</tr>
<?php } ?>
						</tbody>
					</table>
					<?php if ($_smarty_tpl->tpl_vars['page_navi']->value['LinkPage']) {?>
					<div class="list_pager">
						<ul>
							<?php echo $_smarty_tpl->tpl_vars['page_navi']->value['LinkPage'];?>

						</ul>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>


</div>
</main>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html>
<?php }} ?>

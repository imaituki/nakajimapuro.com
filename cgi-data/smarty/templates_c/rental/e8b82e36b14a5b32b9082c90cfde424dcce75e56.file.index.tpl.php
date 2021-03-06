<?php /* Smarty version Smarty-3.1.18, created on 2020-01-08 16:20:11
         compiled from "./index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9618262315e13d4d10c4a19-61793765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8b82e36b14a5b32b9082c90cfde424dcce75e56' => 
    array (
      0 => './index.tpl',
      1 => 1578468007,
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
    'rental_category' => 0,
    'mst_rental' => 0,
    'data' => 0,
    'parts' => 0,
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
								<th colspan="2">品名</th>
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
								<td class="image">
<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1']) {?>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][1]) {?>
		<a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
"><div class="img_rect"><img src="/common/photo/rental/image1/s_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1'];?>
"></div></a>
	<?php } else { ?>
		<a href="/common/photo/rental/image1/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_rect"><img src="/common/photo/rental/image1/s_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image2']) {?><a href="/common/photo/rental/image2/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image2'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
" class="sub"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image3']) {?><a href="/common/photo/rental/image3/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image3'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
" class="sub"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image4']) {?><a href="/common/photo/rental/image4/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image4'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
" class="sub"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image5']) {?><a href="/common/photo/rental/image5/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image5'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
" class="sub"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</a><?php }?>
	 <?php }?>
<?php }?>
								</td>
								<td class="title"><?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][1]) {?><a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
"><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['data']->value['name'],"a","UTF-8");?>
</a><?php } else { ?><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['data']->value['name'],"a","UTF-8");?>
<?php }?></td>
								<td class="comment"><?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['type']) {?><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['data']->value['parts'][0]['type'],"a","UTF-8");?>
／<?php }?><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['data']->value['parts'][0]['comment'],"a","UTF-8");?>
</td>
								<td class="price"><?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['price']=="0") {?>要ご相談<?php } else { ?><?php echo number_format($_smarty_tpl->tpl_vars['data']->value['parts'][0]['price']);?>
<?php }?></td>
								<td class="number">
									<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][1]) {?><a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
" class="btn_list"><i class="fa fa-caret-right"></i>タイプを選ぶ</a>
									<?php } else { ?><input type="text" name="item[<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['id_rental_parts'];?>
]"><?php echo $_smarty_tpl->tpl_vars['data']->value['unit'];?>

									<?php }?>
								</td>
							</tr>
<?php } ?>
						</tbody>
					</table>
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

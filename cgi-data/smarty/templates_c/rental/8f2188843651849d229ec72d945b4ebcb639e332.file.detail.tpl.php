<?php /* Smarty version Smarty-3.1.18, created on 2020-01-08 16:23:16
         compiled from "./detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20543277075e14038210e760-93043012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f2188843651849d229ec72d945b4ebcb639e332' => 
    array (
      0 => './detail.tpl',
      1 => 1578468161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20543277075e14038210e760-93043012',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e140382202109_68138609',
  'variables' => 
  array (
    'template_meta' => 0,
    'template_javascript' => 0,
    'template_header' => 0,
    'data' => 0,
    'OptionRentalCategory' => 0,
    'key' => 0,
    'rental_category' => 0,
    'parts' => 0,
    'template_footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e140382202109_68138609')) {function content_5e140382202109_68138609($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_meta']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="/common/css/import.css">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_javascript']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script type="text/javascript" src="/common/js/lightbox/import.js"></script>
<link href="/common/js/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="/common/js/slick/slick.css" rel="stylesheet" type="text/css">
<script src="/common/js/slick/slick.min.js"></script>
<script>
/*$(function() {
	$('.thumbnail').slick({
      infinite: true,
      arrows: false,
      fade: true,
      draggable: false
    });
    $('.thumbnail-thumb').slick({
      infinite: true,
      slidesToShow: 8,
      focusOnSelect: true,
      asNavFor: '.thumbnail',
    });
});*/
</script>
</head>
<body id="rental">
<div id="base">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<main>
<div id="pankuzu">
	<ul class="center">
		<li><a href="/">HOME</a></li>
		<li><a href="./">レンタル品・料金一覧</a></li>
		<li><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</li>
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
					<div class="row">
						<div class="col-xs-5">
							<?php if ($_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1']) {?>
							<div class="rental_main">
								<a href="/common/photo/rental/image1/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1'];?>
" target="_blank" rel="lightbox"><div class="img_sq"><img src="/common/photo/rental/image1/l_<?php echo $_smarty_tpl->tpl_vars['data']->value['parts'][0]['image1'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a>
							</div>
							<div class="rental_sub">
								<div class="row _mini">
<?php  $_smarty_tpl->tpl_vars["parts"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["parts"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['parts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["parts"]->key => $_smarty_tpl->tpl_vars["parts"]->value) {
$_smarty_tpl->tpl_vars["parts"]->_loop = true;
?>
	<?php if ($_smarty_tpl->tpl_vars['parts']->value['image1']) {?><div class="col-xs-3 col-3"><a href="/common/photo/rental/image1/l_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image1'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_sq"><img src="/common/photo/rental/image1/s_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image1'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a></div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['parts']->value['image2']) {?><div class="col-xs-3 col-3"><a href="/common/photo/rental/image2/l_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image2'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_sq"><img src="/common/photo/rental/image2/s_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image2'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a></div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['parts']->value['image3']) {?><div class="col-xs-3 col-3"><a href="/common/photo/rental/image3/l_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image3'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_sq"><img src="/common/photo/rental/image3/s_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image3'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a></div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['parts']->value['image4']) {?><div class="col-xs-3 col-3"><a href="/common/photo/rental/image4/l_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image4'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_sq"><img src="/common/photo/rental/image4/s_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image4'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a></div><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['parts']->value['image5']) {?><div class="col-xs-3 col-3"><a href="/common/photo/rental/image5/l_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image5'];?>
" target="_blank" rel="lightbox[<?php echo $_smarty_tpl->tpl_vars['data']->value['id_rental'];?>
]" title="<?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],'a','UTF-8');?>
"><div class="img_sq"><img src="/common/photo/rental/image5/s_<?php echo $_smarty_tpl->tpl_vars['parts']->value['image5'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"></div></a></div><?php }?>
<?php } ?>
								</div>
							</div>
							<?php }?>
						</div>
						<div class="col-xs-7">
							<h2 class="rental_name"><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
</h2>
							<?php if ($_smarty_tpl->tpl_vars['data']->value['comment']) {?><div class="comment mb30"><?php echo $_smarty_tpl->tpl_vars['data']->value['comment'];?>
</div><?php }?>
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
<?php  $_smarty_tpl->tpl_vars["parts"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["parts"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['parts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["parts"]->key => $_smarty_tpl->tpl_vars["parts"]->value) {
$_smarty_tpl->tpl_vars["parts"]->_loop = true;
?>
									<tr>
										<td class="title2"><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['type'],"a","UTF-8");?>
</td>
										<td class="comment"><?php echo mb_convert_kana($_smarty_tpl->tpl_vars['parts']->value['comment'],"a","UTF-8");?>
</td>
										<td class="price"><?php echo number_format($_smarty_tpl->tpl_vars['parts']->value['price']);?>
</td>
										<td class="number">
											<input type="text" name="item[<?php echo $_smarty_tpl->tpl_vars['parts']->value['id_rental_parts'];?>
]"><?php echo $_smarty_tpl->tpl_vars['data']->value['unit'];?>

										</td>
									</tr>
<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
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

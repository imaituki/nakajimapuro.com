<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 16:48:56
         compiled from "./detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20543277075e14038210e760-93043012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f2188843651849d229ec72d945b4ebcb639e332' => 
    array (
      0 => './detail.tpl',
      1 => 1578383335,
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
    'template_header' => 0,
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
<link href="/common/js/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="/common/js/slick/slick.css" rel="stylesheet" type="text/css">
</head>
<body id="rental">
<div id="base">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<main>
<div id="body" class="bg_dot">
	<div class="page_title">
		<div class="img_back"><img src="/common/image/contents/top/top_back.jpg" alt="商品名"></div>
		<div class="page_title_wrap">
			<div class="center">
				<h2>商品名</h2>
			</div>
		</div>
	</div>
	<div id="pankuzu" >
		<div class="center">
			<ul>
				<li><a href="/">HOME</a></li>
				<li>商品名</li>
			</ul>
		</div>
	</div>
	<section>
		<div class="wrapper center">
			<div class="row">
				<div class="col-xs-5">
					<div class="thumbnail">
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/1.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/2.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/3.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/4.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/5.jpg" alt=""></div>
					</div>
					<div class="thumbnail-thumb">
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/1.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/2.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/3.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/4.jpg" alt=""></div>
						<div><img src="https://www.jungleocean.com/demo/jquery-slick/images/5.jpg" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</main>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/common/js/slick/slick.min.js"></script>
<script>　

$(function() {
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
});

</script>
</div>
</body>
</html>
<?php }} ?>

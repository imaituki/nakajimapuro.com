<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 16:05:24
         compiled from "./index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17880369975e142c38606d60-12111993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8b82e36b14a5b32b9082c90cfde424dcce75e56' => 
    array (
      0 => './index.tpl',
      1 => 1578380723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17880369975e142c38606d60-12111993',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e142c3862d004_75962158',
  'variables' => 
  array (
    'template_meta' => 0,
    'template_javascript' => 0,
    'template_header' => 0,
    'template_footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e142c3862d004_75962158')) {function content_5e142c3862d004_75962158($_smarty_tpl) {?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_meta']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="/common/css/import.css">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_javascript']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body id="cancel">
<div id="base">
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<main>
<div id="body" class="bg_dot">
	<div class="page_title">
		<div class="img_back"><img src="/common/image/contents/top/top_back.jpg" alt="商品名"></div>
		<div class="page_title_wrap">
			<div class="center">
				<h2>キャンセル料</h2>
			</div>
		</div>
	</div>
	<div id="pankuzu" >
		<div class="center">
			<ul>
				<li><a href="/">HOME</a></li>
				<li>キャンセル料</li>
			</ul>
		</div>
	</div>
	<section>
		<div class="wrapper center">
			<p>ご予約が確定後のキャンセルにつきましては、下記条件にてキャンセル料を請求いたします。</p>
			<table border="1" width="100%">
				<tr>
					<th class="fw_bold">イベント当日</th>
					<th class="fw_bold">イベント前日<br>１８：００迄</th>
					<th class="fw_bold">イベント２日前<br>１８：００迄</th>
					<th class="fw_bold">イベント３日前<br>１８：００迄</th>
					<th class="fw_bold">イベント４日前<br>１８：００迄</th>
					<th class="fw_bold">イベント５日前<br>１８：００迄</th>
				</tr>
				<tr>
					<td>100%</td>
					<td>80％</td>
					<td>60％</td>
					<td>40％</td>
					<td>20％</td>
					<td>0％</td>
				</tr>
			</table>
		</div>
	</section>
</div>
</main>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html>
<?php }} ?>

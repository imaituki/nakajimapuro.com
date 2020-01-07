<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 20:54:32
         compiled from "/home/nakajimapuro/www//common/include/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8683471325e13d4d12c9111-92900620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9108fa03d447bacdb482eac5c80bb670a03e3f5e' => 
    array (
      0 => '/home/nakajimapuro/www//common/include/header.tpl',
      1 => 1578398070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8683471325e13d4d12c9111-92900620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e13d4d12ca401_36063487',
  'variables' => 
  array (
    'arr_get' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e13d4d12ca401_36063487')) {function content_5e13d4d12ca401_36063487($_smarty_tpl) {?><header>
<div id="head">
	<h1 class="main"><img src="/common/image/head/main.jpg" alt="イベント用品のレンタル 有限会社中島プロダクション"></h1>
	<div id="btn_open"><a href="javascript:void(0);"><i class="fa fa-bars"></i></a></div>
	<nav>
	<div id="head_navi">
		<div class="navi_wrap center">
			<div class="main">
				<ul>
					<li class="navi1"><a href="/rental/">レンタル品・料金</a></li>
					<li class="navi2"><a href="/guide/#flow">レンタルの流れ</a></li>
					<li class="navi3"><a href="/guide/#pay">お支払い方法</a></li>
					<li class="navi4"><a href="/guide/#cancel">キャンセル料について</a></li>
					<li class="navi5"><a href="/company/">会社概要</a></li>
					<li class="navi6"><a href="/recruit/">アルバイト募集</a></li>
					
					<li class="visible-only"><a href="/privacy/">個人情報の取り扱いについて</a></li>
				</ul>
			</div>
			<div id="head_search">
				<form method="get" action="/rental/">
					<span><i class="fa fa-search"></i></span>
					<span><input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['arr_get']->value['keyword'];?>
" placeholder="何をお探しですか？"></span>
					<span><button type="button" class="btn_search">このキーワードで検索</button></span>
				</form>
			</div>
		</div>
	</div>
	</nav>
</div>
</header>
<?php }} ?>

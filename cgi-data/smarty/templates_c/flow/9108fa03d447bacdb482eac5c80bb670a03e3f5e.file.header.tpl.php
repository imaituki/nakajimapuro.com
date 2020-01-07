<?php /* Smarty version Smarty-3.1.18, created on 2020-01-07 16:19:40
         compiled from "/home/nakajimapuro/www//common/include/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4354138095e14310ce90f18-59819432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9108fa03d447bacdb482eac5c80bb670a03e3f5e' => 
    array (
      0 => '/home/nakajimapuro/www//common/include/header.tpl',
      1 => 1578381390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4354138095e14310ce90f18-59819432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arr_post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5e14310ce95d48_09986868',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e14310ce95d48_09986868')) {function content_5e14310ce95d48_09986868($_smarty_tpl) {?><div class="center page_title">
	<div class="row">
		<div class="col-xs-9 height-1">
			<div><img src="/common/image/contents/top/top.jpg" alt="レンタル商品"></div>
		</div>
		<div class="col-xs-3 height-1">
			<div class="disp_td">
				<div class="search-group bg_lblue">
					<p class="pos_ac">何をお探しですか？</p>
					<input type="text" id="search_keyword" name="search_keyword" value="" placeholder="キーワード" class="form-control mb10">
					<span class="search-group-btn">
						<label class="control-label" for="search_keyword">&nbsp;</label>
						<button type="button" class="btn_search"><i class="fa fa-search" aria-hidden="true"></i>検索</button>
						<input type="hidden" name="search_area" value="<?php echo $_smarty_tpl->tpl_vars['arr_post']->value['search_area'];?>
">
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<header>
<div id="head">
	<div class="head_wrap">
		<div id="head_navi">
			<nav>
				<div class="main bg_lblue center">
					<ul class="center2 nav">
						
						<li><a href="/flow/">レンタルの流れ</a></li>
						<li><a href="/cancel/">キャンセル料</a></li>
						<li class="navi_l"><a href="/company/">会社概要</a></li>
						<li class="navi_l"><a href="/work/">アルバイト登録</a></li>
						<li class="sp"><a href="/privacy/">個人情報の取り扱いについて</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="btn_open"><a href="javascript:void(0);"><i class="fa fa-bars"></i></a></div>
	</div>
</div>
</header>
<?php }} ?>

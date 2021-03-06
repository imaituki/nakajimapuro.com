<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
{include file=$template_meta}
<link rel="stylesheet" href="/common/css/import.css">
{include file=$template_javascript}
<script type="text/javascript" src="/common/js/lightbox/import.js"></script>
</head>
<body id="rental">
<div id="base">
{include file=$template_header}
<main>
<div id="body">
<!--パターン１-->
{*	<section>
		<div class="wrapper">
			<div class="center">
				<div class="row">
					<div class="col-xs-3">
						{foreach from=$OptionRentalCategory item="rental_category" key="key" name="LoopSeminnar"}
						<ul>
							<li class="cat"><a href="./{if $key != 0}?sid={$key}{/if}{if $arr_get.date != NULL}&date={$arr_get.date}{/if}">{$rental_category}</a></li>
						</ul>
						{/foreach}
					</div>
					<div class="col-xs-9">
						<p>※弊社で搬入・設営・搬出・撤去を行う場合は別途￥４０，０００+消費税（岡山県内）必要となります。</p>
						<table border="1" width="100%">
							<tr>
								<th>内容</th>
								<th>数量</th>
								<th>単位</th>
								<th>単価</th>
								<th>消費税</th>
								<th>単価合計</th>
								<th>金額</th>
							</tr>
							<tr>
								<td><a href="###"  rel="lightbox">会議室</a></td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">卓</td>
								<td class="pos_ar">700</td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">0</td>
							</tr>
							<tr>
								<td><a href="###"  rel="lightbox">会議室</a></td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">卓</td>
								<td class="pos_ar">700</td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">0</td>
								<td class="pos_ar">0</td>
							</tr>
						</table>
					</div>
				</div>
				{if $page_navi.LinkPage}
				<div class="list_pager">
					<ul>
						{$page_navi.LinkPage}
					</ul>
				</div>
				{/if}
			</div>
		</div>
	</section>*}
<!--パターン2-->
	<section>
		<div class="wrapper">
			<div class="center">
				<div class="row">
					<div class="col-xs-3">
						{foreach from=$OptionRentalCategory item="rental_category" key="key" name="LoopSeminnar"}
						<ul>
							<li class="cat"><a href="./{if $key != 0}?sid={$key}{/if}{if $arr_get.date != NULL}&date={$arr_get.date}{/if}">{$rental_category}</a></li>
						</ul>
						{/foreach}
					</div>
					<div class="col-xs-9">
						<p>※弊社で搬入・設営・搬出・撤去を行う場合は別途￥４０，０００+消費税（岡山県内）必要となります。</p>
						<table border="1" width="100%">
							<tr>
								<th>内容</th>
								<th>単価</th>
							</tr>
							<tr>
								<td><a href="###">会議室</a></td>
								<td class="pos_ar">700</td>
							</tr>
							<tr>
								<td><a href="###">会議室</a></td>
								<td class="pos_ar">700</td>
							</tr>
						</table>
					</div>
				</div>
				{if $page_navi.LinkPage}
				<div class="list_pager">
					<ul>
						{$page_navi.LinkPage}
					</ul>
				</div>
				{/if}
			</div>
		</div>
	</section>
</div>
</main>
{include file=$template_footer}
</div>
</body>
</html>

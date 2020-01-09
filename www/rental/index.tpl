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
{foreach from=$OptionRentalCategory item="rental_category" key="key" name="LoopSeminnar"}
						<li><a href="/rental/{if $key != 0}?sid={$key}{/if}">{$rental_category}</a></li>
{/foreach}
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
{foreach from=$mst_rental item="data"}
							<tr>
								<td class="image">
{if $data.parts.0.image1}
	{if $data.parts.1}
		<a href="detail.php?id={$data.id_rental}"><div class="img_rect"><img src="/common/photo/rental/image1/s_{$data.parts.0.image1}"></div></a>
	{else}
		<a href="/common/photo/rental/image1/l_{$data.parts.0.image1}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_rect"><img src="/common/photo/rental/image1/s_{$data.parts.0.image1}" alt="{$data.name}"></div></a>
		{if $data.parts.0.image2}<a href="/common/photo/rental/image2/l_{$data.parts.0.image2}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}" class="sub">{$data.name}</a>{/if}
		{if $data.parts.0.image3}<a href="/common/photo/rental/image3/l_{$data.parts.0.image3}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}" class="sub">{$data.name}</a>{/if}
		{if $data.parts.0.image4}<a href="/common/photo/rental/image4/l_{$data.parts.0.image4}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}" class="sub">{$data.name}</a>{/if}
		{if $data.parts.0.image5}<a href="/common/photo/rental/image5/l_{$data.parts.0.image5}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}" class="sub">{$data.name}</a>{/if}
	 {/if}
{/if}
								</td>
								<td class="title">{if $data.parts.1}<a href="detail.php?id={$data.id_rental}">{$data.name|mb_convert_kana:"a":"UTF-8"}</a>{else}{$data.name|mb_convert_kana:"a":"UTF-8"}{/if}</td>
								<td class="comment">{if $data.parts.0.type}{$data.parts.0.type|mb_convert_kana:"a":"UTF-8"}／{/if}{$data.parts.0.comment|mb_convert_kana:"a":"UTF-8"}</td>
								<td class="price">{if $data.parts.0.price == "0"}要ご相談{else}{$data.parts.0.price|number_format}{/if}</td>
								<td class="number">
									{if $data.parts.1}<a href="detail.php?id={$data.id_rental}" class="btn_list"><i class="fa fa-caret-right"></i>タイプを選ぶ</a>
									{else}<input type="text" name="item[{$data.parts.0.id_rental_parts}]">{$data.unit}
									{/if}
								</td>
							</tr>
{/foreach}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
</main>
{include file=$template_footer}
</div>
</body>
</html>

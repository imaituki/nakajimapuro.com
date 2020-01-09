<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
{include file=$template_meta}
<link rel="stylesheet" href="/common/css/import.css">
{include file=$template_javascript}
<script type="text/javascript" src="/common/js/lightbox/import.js"></script>
<link href="/common/js/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="/common/js/slick/slick.css" rel="stylesheet" type="text/css">
<script src="/common/js/slick/slick.min.js"></script>
<script>{literal}
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
{/literal}</script>
</head>
<body id="rental">
<div id="base">
{include file=$template_header}
<main>
<div id="pankuzu">
	<ul class="center">
		<li><a href="/">HOME</a></li>
		<li><a href="./">レンタル品・料金一覧</a></li>
		<li>{$data.name}</li>
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
					<div class="row">
						<div class="col-xs-5">
							{if $data.parts.0.image1}
							<div class="rental_main">
								<a href="/common/photo/rental/image1/l_{$data.parts.0.image1}" target="_blank" rel="lightbox"><div class="img_sq"><img src="/common/photo/rental/image1/l_{$data.parts.0.image1}" alt="{$data.name}"></div></a>
							</div>
							<div class="rental_sub">
								<div class="row _mini">
{foreach from=$data.parts item="parts"}
	{if $parts.image1}<div class="col-xs-3 col-3"><a href="/common/photo/rental/image1/l_{$parts.image1}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_sq"><img src="/common/photo/rental/image1/s_{$parts.image1}" alt="{$data.name}"></div></a></div>{/if}
	{if $parts.image2}<div class="col-xs-3 col-3"><a href="/common/photo/rental/image2/l_{$parts.image2}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_sq"><img src="/common/photo/rental/image2/s_{$parts.image2}" alt="{$data.name}"></div></a></div>{/if}
	{if $parts.image3}<div class="col-xs-3 col-3"><a href="/common/photo/rental/image3/l_{$parts.image3}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_sq"><img src="/common/photo/rental/image3/s_{$parts.image3}" alt="{$data.name}"></div></a></div>{/if}
	{if $parts.image4}<div class="col-xs-3 col-3"><a href="/common/photo/rental/image4/l_{$parts.image4}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_sq"><img src="/common/photo/rental/image4/s_{$parts.image4}" alt="{$data.name}"></div></a></div>{/if}
	{if $parts.image5}<div class="col-xs-3 col-3"><a href="/common/photo/rental/image5/l_{$parts.image5}" target="_blank" rel="lightbox[{$data.id_rental}]" title="{$parts.type|mb_convert_kana:'a':'UTF-8'}"><div class="img_sq"><img src="/common/photo/rental/image5/s_{$parts.image5}" alt="{$data.name}"></div></a></div>{/if}
{/foreach}
								</div>
							</div>
							{/if}
						</div>
						<div class="col-xs-7">
							<h2 class="rental_name">{$data.name}</h2>
							{if $data.comment}<div class="comment mb30">{$data.comment}</div>{/if}
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
{foreach from=$data.parts item="parts"}
									<tr>
										<td class="title2">{$parts.type|mb_convert_kana:"a":"UTF-8"}</td>
										<td class="comment">{$parts.comment|mb_convert_kana:"a":"UTF-8"}</td>
										<td class="price">{$parts.price|number_format}</td>
										<td class="number">
											<input type="text" name="item[{$parts.id_rental_parts}]">{$data.unit}
										</td>
									</tr>
{/foreach}
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
{include file=$template_footer}
</div>
</body>
</html>

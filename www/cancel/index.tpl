<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
{include file=$template_meta}
<link rel="stylesheet" href="/common/css/import.css">
{include file=$template_javascript}
</head>
<body id="cancel">
<div id="base">
{include file=$template_header}
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
{include file=$template_footer}
</div>
</body>
</html>

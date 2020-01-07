<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
{include file=$template_meta}
<link rel="stylesheet" href="/common/css/import.css">
<link href="/common/js/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="/common/js/slick/slick.css" rel="stylesheet" type="text/css">
</head>
<body id="rental">
<div id="base">
{include file=$template_header}
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
{include file=$template_footer}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/common/js/slick/slick.min.js"></script>
<script>　
{literal}
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
{/literal}
</script>
</div>
</body>
</html>

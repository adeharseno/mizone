<a href="" class="btn-mobile"></a>
<a href="" class="backhome">backhome</a>
<header>
	<div class="container">
  		<div class="placeholder"></div>
  		<a href="home" class="logo float-left">logo</a>
  		<a href="" class="btn float-right"></a>
	</div>
	<nav>
		<div class="container">		
			<ul>
				<li><a href="home" data-slug="home" class="text-uppercase">Home</a></li>
				<li><a href="product" class="text-uppercase">Product</a></li>
				<!-- <li><a href="" class="text-uppercase">ARTICLES</a></li> -->
				<!-- <li><a href="" class="text-uppercase">PRIVACY POLICY</a></li> -->
				<!-- <li><a href="" class="text-uppercase">Contact US</a></li> -->
			</ul>
			<div class="bottom text-right">
				<div class="stay-connected text-uppercase text-main-color">Stay Connected with Mizone</div>
				<div class="socmed-area">
				<?php foreach ($sosmed as $key => $value){ ?>
					<?php if ($value["flag"] != 99) { 

						// $before=[" ", "’"];
						// $after=["-", ""];

						// $titlelink = strtolower(str_replace($before,$after,$value['title']));
						?>
					<a href="<?php echo $value['link']; ?>" class="<?php echo $value['class']; ?>" target="_blank"><?php echo $value['title']; ?></a>
					<!-- <a href="https://www.instagram.com/mizoneid/" class="ig" target="_blank">ig</a>
					<a href="https://twitter.com/mizoneid" class="tw" target="_blank">tw</a>
					<a href="https://www.youtube.com/channel/UCeETu2cChDyiJCSxJ5GN79Q/" class="yt" target="_blank">yt</a> -->
				 	<?php } ?>	
				<?php } ?> 
				</div>
				<div class="copyright text-main-color">All rights reserved. &copy; PT. Tirta Aqua Investama</div>
			</div>
		</div>
	</nav> 
</header>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/lib/hash.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/lib/zoom.min.js"></script>
<style>
#zoom-button {
	margin-top: 15px;
	position: absolute;
	top: 0px;
	display: none;
}

#zoom-horizontal-slider {
	width: 600px;
	margin-top: 15px;
	margin-left: 30%;
}

#zoom-vertical-slider {
	position: absolute;
	top: 0px;
	left: 1050px;
	display: none;
	height: 520px;
	margin-top: 100px;
}
</style>

<?php

$images = field_get_items('node', $node, 'field_pagina_periodico');
$portada = field_get_items('node', $node, 'field_portada');
$imagen_portada = field_view_value('node', $node, 'field_portada', $portada[0], array(
	'type' => 'image',
	'settings' => array(
		'image_style' => 'pagina_periodico'
	),
));
?>
<div id="canvas">
	<div id="book-zoom">
		<div class="sj-book">
			<div class="hard">
				<?php 
				$out = render ($imagen_portada);
				$out = preg_replace("!src=\"(.*)\"!","width='500' height='625' src='" . image_style_url("pagina_periodico_zoomx2", $imagen_portada["#item"]["uri"]) . "'", $out);
				echo $out;
				?>
			</div>
<?php foreach ($images as $key=>$value) {
	$output = field_view_value('node', $node, 'field_pagina_periodico', $images[$key], array(
		'type' => 'image',
		'settings' => array(
		'image_style' => 'pagina_periodico'
		),
	));
?>
<div>
	<?php 
	$out = render ($imagen_portada);
	$out = preg_replace("!src=\"(.*)\"!","width='500' height='625' src='" . image_style_url("pagina_periodico_zoomx2", $output["#item"]["uri"]) . "'", $out);
	echo $out;
	?>
</div>
<?php } ?>
		</div>
	</div>
</div>
<div style="text-align: center">
	<div id="zoom-horizontal-slider"></div>
</div>
<div id="zoom-button">
	<img src="/themes/bartik/images/zoom-periodico.png" />
</div>
<div id="zoom-vertical-slider"></div>

<script type="text/javascript">
function loadApp() {
	var flipbook = $('.sj-book');
	// Check if the CSS was already loaded
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}

	// Arrows
	$(document).keydown(function(e){
		var previous = 37, next = 39;

		switch (e.keyCode) {
			case previous:
				$('.sj-book').turn('previous');
			break;
			case next:
				$('.sj-book').turn('next');
			break;
		}
	});

	// Flipbook;
	$("#zoom-button").bind(($.isTouch) ? 'touchend' : 'click', function(e) {
		zoomHandle(e);
	});

	flipbook.turn({
		elevation: 50,
		width: 1010,
		height: 655,
		acceleration: !isChrome(),
		autoCenter: true,
		gradients: true,
		duration: 1000,
		when: {
			turning: function(e, page, view) {
				var book = $(this),
					currentPage = book.turn('page'),
					pages = book.turn('pages');
			},
			turned: function(e, page, view) {
				var book = $(this);
				if (page==2 || page==3) {
					book.turn('peel', 'br');
				}
				book.turn("center");
			},
			missing: function (e, pages) {
				for (var i = 0; i < pages.length; i++)
					addPage(pages[i], $(this));
			}
		}
	});
	flipbook.addClass('animated');
	// Show canvas
	$('#canvas').css({visibility: ''});
	var zoomPosition = $("#overlay-content").width();
	if (zoomPosition > 960) {
		zoomPosition = zoomPosition - 50;
	} else {
		zoomPosition += 70
	}
	$("#zoom-button").css({
		left: zoomPosition 
	}).show();
}

// Hide canvas
$('#canvas').css({visibility: 'hidden'});

// Load turn.js
yepnope({
	test : Modernizr.csstransforms,
	yep: ['/themes/bartik/js/turnjs4/lib/turn.js'],
	nope: [
		'/themes/bartik/js/turnjs4/lib/turn.html4.js',
		'/themes/bartik/js/turnjs4/periodico/jquery.ui.html4.css', 
		'/themes/bartik/js/turnjs4/periodico/periodico-html4.css'
	],
	both: [
		'/themes/bartik/js/turnjs4/periodico/periodico.js',
		'/themes/bartik/js/turnjs4/periodico/jquery.ui.css',
		'/themes/bartik/js/turnjs4/periodico/periodico.css'],
	complete: loadApp
});
</script>


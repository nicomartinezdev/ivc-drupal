<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="/themes/bartik/js/turnjs4/extras/modernizr.2.5.3.min.js"></script>

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
<div id="zoom-button">
	<img src="/themes/bartik/images/zoom-periodico.png" />
</div>

<script type="text/javascript">
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
function loadApp() {
	var flipbook = $('.sj-book');
	// Check if the CSS was already loaded
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}
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
				var bookData = $(".sj-book").data(); 
				if (bookData.page > 1 && bookData.page < bookData.totalPages) {
					if (bookData.page % 2 !== 0) {
						$(".sj-book").data().page = $(".sj-book").data().page - 1;
					}					
				}
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
	var bookData = $(".sj-book").data();
	bookData.zoomIn = false;
	$("#zoom-button").bind("click", function(e) {
		if (!bookData.zoomIn) {
			var translate = {
				top: 300,
				left: 0
			};
			if (bookData.page > 1 && bookData.page < bookData.totalPages) {
				translate.left = 500;
				$("#canvas").css({
					"overflow": "scroll",
					"overflow-y": "scroll"
				});
			} else {
				$("#canvas").css({
					"overflow-y": "scroll"
				});
			}
			if ($.browser.msie && parseInt($.browser.version, 10) <= 8) {
				var secondarySelector = null;
				if (bookData.page > 1 && bookData.page < bookData.totalPages) {
					secondarySelector = ".sj-book .p"+ (parseInt(bookData.page) + 1) + " img";
				}
				var mainSelector = ".sj-book .p"+bookData.page+" img";
				$(".sj-book").turn('zoom', 2, 500);
				$("#canvas").css({
					"width": "1000px"
				});
				$(mainSelector).attr("width", 1000);
				$(mainSelector).attr("height", 1250);
				$(mainSelector).parent().parent().parent().css({
					"margin-top": translate.top + "px",
					"margin-left": translate.left + "px"
				});				
				if (secondarySelector !== null) {
					$(secondarySelector).attr("width", 1000);
					$(secondarySelector).attr("height", 1250);
					$(secondarySelector).parent().parent().parent().css({
						"margin-top": translate.top + "px",
						"margin-right": (-translate.left+20) + "px"
					});	
				}
			} else {
				$('#book-zoom').transform(
					'translate('+translate.left+'px, '+translate.top+'px)' +
					'scale(2, 2)'
				);
			}
			bookData.zoomIn = true;
		} else {
			$("#canvas").scrollTop(0);
			$("#canvas").scrollLeft(0);
			$("#canvas").css({
				"overflow": "hidden",
				"overflow-y": "hidden"
			});
			if ($.browser.msie && parseInt($.browser.version, 10) <= 8) {
				var mainSelector = ".sj-book .p"+bookData.page+" img";
				var secondarySelector = null;
				if (bookData.page > 1 && bookData.page < bookData.totalPages) {
					secondarySelector = ".sj-book .p"+parseInt(bookData.page+1) +" img";;	
				}
				$(".sj-book").turn('zoom', 1, 500);
				$(mainSelector).attr("width", 500);
				$(mainSelector).attr("height", 625);
				$(mainSelector).parent().parent().parent().css({
					"margin-top": "0px",
					"margin-left": "0px"
				});
				if (secondarySelector !== null) {
					$(secondarySelector).attr("width", 500);
					$(secondarySelector).attr("height", 625);
					$(secondarySelector).parent().parent().parent().css({
						"margin-top": "0px",
						"margin-right": "0px"
					});	
				}
			} else {
				$('#book-zoom').transform(
					'scale(1, 1)'
				);
			}
			bookData.zoomIn = false;
		}
	});
}

// Hide canvas
$('#canvas').css({visibility: 'hidden'});

// Load turn.js
yepnope({
	test : Modernizr.csstransforms,
	yep: ['/themes/bartik/js/turnjs4/lib/turn.js',
		  '/themes/bartik/js/turnjs4/periodico/jquery.ui.css',
		  '/themes/bartik/js/turnjs4/periodico/periodico.css'],
	nope: [
		'/themes/bartik/js/turnjs4/lib/turn.html4.js',
		'/themes/bartik/js/turnjs4/periodico/jquery.ui.html4.css', 
		'/themes/bartik/js/turnjs4/periodico/periodico-html4.css'
	],
	complete: loadApp
});

function isChrome() {
	// Chrome's unsolved bug
	// http://code.google.com/p/chromium/issues/detail?id=128488
	return navigator.userAgent.indexOf('Chrome')!=-1;
}
</script>
<style>
#error404 .gcba-maincontent-section {
	width: 100%;
}

#error404 .gcba-item-list {
	width: 723px;
	margin: auto;
}

#error404 .gcba-item-list .gcba-item {

}

#error404-title {
	background: url("/themes/bartik/images/404_titulo.png") no-repeat top center;
}

#error404-logo {
	text-align: center;
}

#error404-logo img {
	line-height: 1em;
	margin-top: 70px;
}

#error404-subtitulo {
	text-align: center;
	font-size: 2.2em;
	text-transform: uppercase;
	margin-top: -15px;
	font-weight: bold;
}

#error404-descripcion {
	margin-left: 165px;;
	width: 400px;
	padding-bottom: 100px;
}
</style>

<div id="error404">
	<div class="gcba-maincontent-section">
		<div class="gcba-title" id="error404-title"></div>
		<div class="gcba-item-list">
			<div id="error404-container">
				<div id="error404-logo">
					<?php print render($content["field_imagen_404"]) ?>
				</div>
				<div id="error404-subtitulo">
					<?php echo $title ?>
				</div>
				<div id="error404-descripcion">
					<?php echo $field_descripcion_404[0]['safe_value'] ?>
				</div>
			</div>
			<?php include("puntos.php") ?>
			<?php include("puntos.php") ?>
		</div>
	</div>
</div>
<style>
#noticias_section {
	width: 723px;
}

#noticias_section_title {
	text-transform: uppercase;
	background: url("/themes/bartik/images/novedades_titulo_seccion.png") no-repeat;
}

#noticias_section_nodes {
	background-color: #f6f6f6;
	padding-top: 3px;
}

.noticias_section_node {
	margin-top: 1px;
	float: left;
	padding-top: 5px;
	margin-left: 13px;
	width: 95%;
}

.noticias_section_node_news_title {
	text-transform: uppercase;
	font-weight: bold;
	font-size: 1em;
	color: #00458F;
}

.noticias_section_node_news_subtitle {
	color: #767676;
	font-size: 0.8em;
	text-transform: none;
	font-weight: bold;
	margin-top: 5px;
}

.noticias_section_node_body_content {
	font-size: 0.8em;
	color: #767676;
	margin-top: 10px;
}

.noticias_section_node_body_image {
	float: left;
	margin-right: 10px;
	margin-top: 10px;
	margin-bottom: 7px;
}

#noticias_section_ultimas_noticias {
	margin-left: 10px;
	margin-top: 5px;
	margin-bottom: 10px;
	width: 697px;
}

#noticias_section_imagenes {
	margin-left: 15px;
	margin-top: 15px;
	margin-bottom: 15px;
}

#noticias_section_imagenes .field-items .field-item {
	padding: 5px;
	background-color: #FFFFFF;
	width: 100px;
	height: 100px;
}

#noticias_section_imagenes .field-items .field-item img {
	margin: 0px;
}

.imagen-listado-sociales {
	border: solid 1px #E0E0E0;
	background-color: #FFFFFF;
	padding: 1px;
	height: 180px;
}

.imagen-listado-sociales img {
	margin: 0px;
	-khtml-border-radius: 5%;
	-moz-border-radius: 5%;
	-webkit-border-radius: 5%;
	border-radius: 5%;
}

.imagen-listado-galeria-sociales {
	background-color: #FFFFFF;
	border: solid 1px #E0E0E0;
	padding: 1px;
	height: 100px;	
	margin-right: 20px;
}

.imagen-listado-galeria-sociales img {
	margin: 0px;
	-khtml-border-radius: 5%;
	-moz-border-radius: 5%;
	-webkit-border-radius: 5%;
	border-radius: 5%;	
}
</style>

<?php
$images = field_get_items('node', $node, 'field_imagen_articulo_sociales');
$firstImage = field_view_value('node', $node, 'field_imagen_articulo_sociales', $images[0], array(
	'type' => 'image',
	'settings' => array(
		'image_style' => 'large'
	)
));
$output = "";
for ($i = 0; $i < count($images); $i++) {
	$imageForSlider = field_view_value('node', $node, 'field_imagen_articulo_sociales', $images[$i], array(
		'type' => 'image',
		'settings' => array(
			'image_style' => 'galleryformatter_slide', 
			'image_link' => 'file'
		)
	));
	$output .= '<div class="imagen-listado imagen-listado-galeria-sociales rounded-corners" style="float: left"><div class="span-izquierdo-galeria-sociales"></div><div class="span-derecho-galeria-sociales"></div>' . render($imageForSlider) . "</div>";
}

?>

<link rel="stylesheet" type="text/css" href="/themes/bartik/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript" src="/themes/bartik/js/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#noticias_section_imagenes a").lightBox();
});	
</script>
<?php 
	$date = date_parse($content['field_fecha_evento']['#items']['0']['value']);	
?>
<div id="noticias_section">
	<div id="noticias_section_title" class="gcba-title">
		<a href="/sociales">
			<div class="back-link back-link-text">Volver</div>
			<div class="back-link back-link-image">
				<img src="/themes/bartik/images/flecha-volver.png" />
			</div>	
		</a>
	</div>
	<div id="noticias_section_nodes">
		<div id="noticias_section_noticia">
			<div class="noticias_section_node">
				<div>
					<div style="float: left">
						<div class="principal_block_node_day"><?php echo $date['day'] ?></div>
			  			<div class="principal_block_node_monthyear">
			  				<span class="principal_block_node_month"><?php echo $date['month'] ?></span>
			  				<span><?php echo $date['year'] ?></span>
			  			</div>
		  			</div>
		  			<div style="float: left; margin-left: 10px; margin-bottom: 10px;">
		  				<div class="noticias_section_node_news_title"><?php print $title ?></div>
		  				<div class="noticias_section_node_news_subtitle subtitle"><?php print $field_resumen_articulo_sociales[0]["safe_value"] ?></div>	
		  			</div>
		  			<div style="clear: both"></div>
  					<?php include("puntos.php") ?>
	  			</div>	
			</div>			
			<div class="noticias_section_node noticias_section_node_body">
				<div class="noticias_section_node_body_image">
					<div class="imagen-listado imagen-listado-sociales rounded-corners">
						<div class="span-izquierdo-large"></div>
						<div class="span-derecho-large"></div>
						<?php print render($firstImage) ?>
					</div>					
				</div>
				<div class="noticias_section_node_body_content subtitle">
				<?php print $node->body["und"][0]["safe_value"] ?>
				</div>
			</div>
		</div>
		<div style="clear: both"></div>
		<div class="dotted-bottom dotted-top" style="height: 1px; margin-left: 10px; width: 96.5%"></div>
		<div id="noticias_section_imagenes">
			<?php echo $output ?>
			<div style="clear: both"></div>
		</div>
		<div id="noticias_section_ultimas_noticias">
			<?php 
				print views_embed_view("calendario_eventos", "sociales_ultimas_novedades"); 
			?>
		</div>
		<?php include("puntos.php") ?>
		<?php include("puntos.php") ?>
	</div>
</div>
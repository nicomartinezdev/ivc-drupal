<?php
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>

<style>
#formularios-maincontent-section-title {
	background: url("/themes/bartik/images/formularios_titulo.png") no-repeat;
}

.formularios_principal_block_node {
	float: left;
	width: 700px;
	margin-right: 3px;
	height: 47px;
	overflow: hidden;
	border: solid 1px #d3d3d3;
	background: url("/themes/bartik/images/formularios_fondo.png");
}

.formularios_principal_block_node_image {
	float: left;
	width: 35px;
	height: 45px;
	margin-right: 1px;
    background: url("/themes/bartik/images/formularios_bullet.png") no-repeat;
}


.formularios_principal_block_node_place_title {
	font-size: 0.8em;
	font-weight: bold;
	color: #00458f;
	float: left;
	width: 580px;
	height: 45px;
	margin-top: 15px;
}

.formularios_principal_block_node_place_title a{
	color: #00458f;
	font-weight: bold;
}

.formularios_principal_block_node_image_file {
	float: right;
	width: 60px;
	height: 45px;
	margin-right: 10px;
	margin-top: 10px;
	cursor: pointer;
}

.rrhh-submenu {
	float: right;
	background-color: #FFFFFF;
	height: 29px;
}

.rrhh-submenu .first {
	margin-right: -2px;
	padding-left: 2px;
}
</style>

<div class="gcba-maincontent-section">
	<div id="formularios-maincontent-section-title" class="gcba-title">
		<div class="rrhh-submenu">
			<a href="/tramites"><img src="/themes/bartik/images/rrhh-boton-tramites.png" class="first" alt="Tr&aacute;mites" title="Tr&aacute;mites" /></a>
			<a href="/busquedas"><img src="/themes/bartik/images/rrhh-boton-busquedas.png" alt="B&uacute;squedas" title="B&uacute;squedas" /></a>
		</div>
	</div>
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 40px; padding-top: 20px">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php 
			if (preg_match('/href="(.*)" type=(.*)/', $row_fields["field_adjunto_formulario"], $matches)) {
				$nodeUrl = $matches[1];	
			}
		?>
		
		<?php if ($i > 0): ?>
		<div style="clear: both"></div>
		<div class="dotted-top dotted-bottom" style="margin-top: 15px; height: 1px; margin-bottom: 15px; width: 97.5%"></div>
		<div style="clear: both"></div>	
		<?php endif ?>
		 
		<div class="formularios_principal_block_node">
			<div class="formularios_principal_block_node_image"></div>
			<div class="formularios_principal_block_node_place_title">
				<a style="cursor: pointer;" href = '<?php echo $nodeUrl ?>' alt="Descargar" title="Descargar">
					<?php echo $row_fields["title"] ?>
				</a>
			</div>
			<div class="formularios_principal_block_node_image_file">
				<a href="<?php echo $nodeUrl ?>">
					<img src="/themes/bartik/images/formularios_pdf.png" alt="Descargar" title="Descargar">
				</a>
			</div>
		</div>		
	<?php $i++ ?>
    <?php endforeach; ?>
    <div style="clear: both"></div>    
  	</div>
  	<?php include("puntos.php") ?>
  	<?php include("puntos.php") ?>
</div>
<?php
    
?>

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
#tramites-maincontent-section-title {
	background: url("/themes/bartik/images/tramites_titulo.png") no-repeat;
}

.tramites_principal_block_node {
	float: left;
	width: 300px;
	background-color:#eeeeee;
	margin-right: 3px;
	border: solid 1px #dcdcdc;
	background: url("/themes/bartik/images/beneficios_section_item_fondo.png") repeat;
	margin-top: 30px;
	margin-bottom: 30px;
}

.tramites_principal_block_node_image {
	float: left;
	margin-left: 1px;
	margin-top: 5px;
	width: 70px;
}


.tramites_principal_block_node_place_title {
	text-transform: uppercase;
	font-size: 0.9em;
	line-height: 1.125em;
	font-weight: bold;
	float: left;
	width: 210px;
	height: 50px;
	margin-top: 25px;
	margin-left: 5px;
}

.tramites_principal_block_node_place_title a {
	color: #545455; 
}

.tramites_principal_block_node_place_title a:hover {
	color: #00458F;
	text-decoration: none;
}

.tramites_principal_block_viewmore {
	float: right;
	cursor: pointer;
	margin-right: 8px;
	margin-top: -20px;
}

.rounded-corners {
	-khtml-border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}

.firstInRow {
	margin-right: 50px;
}

.listado-tramites {
	padding-top: 30px;
	padding-left: 25px;
	padding-bottom: 5px;
}

.span-izquierdo-rrhh {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-izquierdo-rrhh.png") no-repeat;
	top: -7px;
	left: -10px;
	width: 9px;
	height: 82px;
}

.span-top-rrhh {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-top-rrhh.png") no-repeat;
	top: -10px;
	left: -7px;
	width: 194px;
	height: 9px;
}

.span-derecho-rrhh {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-derecho-rrhh.png") no-repeat;
	top: 0px;
	left: 311px;
	width: 9px;
	height: 82px;
}

.span-bottom-rrhh {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-bottom-rrhh.png") no-repeat;
	top: 80px;
	left: 122px;
	width: 194px;
	height: 9px;
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
	<div id="tramites-maincontent-section-title" class="gcba-title">
		<div class="rrhh-submenu">
			<a href="/formularios"><img src="/themes/bartik/images/rrhh-boton-formularios.png" class="first" alt="Formularios" title="Formularios" /></a>
			<a href="/busquedas"><img src="/themes/bartik/images/rrhh-boton-busquedas.png" alt="B&uacute;squedas" title="B&uacute;squedas" /></a>
		</div>
	</div>
	<div class="gcba-item-list listado-tramites">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php 
			if (preg_match('/href="(.*)"/', $row_fields["title"], $matches)) {
				$nodeUrl = $matches[1];	
			} 
		?>
		<?php if ($i > 0 && $i % 2 === 0): ?>
		<div style="clear: both"></div>
		<div class="dotted-top dotted-bottom" style="width: 97%; height: 1px;"></div>
		<div style="clear: both"></div>
		<?php endif ?>
		<div class="gcba-item tramites_principal_block_node rounded-corners <?php if ($i % 2 === 0): ?>firstInRow<?php endif ?>" style="position: relative">
				<div class="span-izquierdo-rrhh"></div>
				<div class="span-top-rrhh"></div>
				<div class="span-derecho-rrhh"></div>
				<div class="span-bottom-rrhh"></div>
				<div class="tramites_principal_block_node_image">
					<?php echo $row_fields["field_imagen_catergoria_tramites"] ?>
				</div>
				<div class="tramites_principal_block_node_place_title"><?php echo $row_fields["title"] ?></div>
				<div style="clear: both"></div>
				<div class="tramites_principal_block_viewmore">
					<a href="<?php echo $nodeUrl ?>">
						<img src="/themes/bartik/images/noticias_vermas_seccion.png"  alt="Ver M&aacute;s" title="Ver M&aacute;s">
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
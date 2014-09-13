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
#beneficios-maincontent-home-title {
	background: url("/themes/bartik/images/beneficios_titulo.png") no-repeat;
	margin-bottom: 1px;
}

.beneficios_principal_block_node_percentage {
	float: left;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-left: 6px;
	padding-right: 6px;
	margin-left: 10px;
	color: #00458F;
	font-weight: bold;
	font-size: 1.7em;
	margin-top: 12px;
	background-color: #f0f0f0;
	border: solid 1px #d3d3d3;
	-webkit-border-radius: 10%;
	-moz-border-radius: 10%;
	border-radius: 10%;
	font-family: "gotham_mediumregular";
}

.beneficios_principal_block_node_place_fullwidth {
	margin-left: 10px;
	color: #00458F;
	font-weight: bold;
	font-size: 0.8em;
	float: left;
	margin-top: 15px;
	width: 225px;
}

.beneficios_principal_block_node_place {
	float: left;
	margin-left: 5px;
	color: #00458F;
	font-weight: bold;
	width: 160px;
	margin-top: 15px;
	font-size: 0.8em;
}

.beneficios_principal_block_node_description {
	padding-left: 10px;
	padding-right: 10px;
	font-size: 0.75em;
	margin-top: 5px;
	float: left;
	color: #7C7C7C;
	margin-bottom: 5px;
}

.beneficios_principal_block_node_image_fullwidth {
	margin-left: 10px;
	float: left; 
	width:84px; 
	height: 56px;
	padding: 2px;
	margin-top: 5px;
	background-color: #FFFFFF;
	border: solid 2px #DEDEDE;
	-webkit-border-radius: 5%;
	-moz-border-radius: 5%;
	border-radius: 5%;
}

.beneficios_principal_block_node_image {
	float: left; 
	width:84px; 
	height: 56px;
	padding: 2px;
	margin-top: 5px;
	margin-left: 1px;
	background-color: #FFFFFF;
	border: solid 2px #DEDEDE;
	-webkit-border-radius: 5%;
	-moz-border-radius: 5%;
	border-radius: 5%;
}

.beneficios_principal_block_node_place_title {
	text-transform: uppercase;
}

.beneficios_principal_block_node_place_phone {
	font-weight: normal;
	font-size: 0.75em;
	
}

.beneficios_principal_block_node_place_title a {
	color: #0000FF;
}

.imagen-listado .span-izquierdo-beneficios {
	height: 64px;
	top: -4px;
	left: -9px;
}

.imagen-listado .span-derecho-beneficios {
	height: 64px;
	top: -4px;
	left: 89px;
}

.beneficios_principal_block_node_percentage .percentage-background-top,
.beneficios_principal_block_node_percentage .percentage-background-left {
	display: none;
}

.beneficios_principal_block_node_percentage {
	position: relative;
	overflow: hidden;
}

.beneficios_principal_block_node_percentage .percentage-background-top {
	display:none;
}

.beneficios_principal_block_node_percentage .percentage-background-left {
	display:none;
}

.beneficios-block-size {
	padding-top: 1px;
}
</style>

<!--[if IE 8]>
<style>
.beneficios_principal_block_node_percentage {
	position: relative;
	overflow: hidden;
}

.beneficios_principal_block_node_percentage .percentage-background-top {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-beneficios-top.png") repeat-x left top;
	top: 0;
	left: 0;
	display: block;
	width: 100%;
	height: 3px;
	z-index: 1;
}

.beneficios_principal_block_node_percentage .percentage-background-left {
	position: absolute;
	background: url("/themes/bartik/images/sombreado-beneficios-left.png") repeat-y left top;
	top: 0;
	left: 0;
	display: block;
	height: 100%;
	width: 3px;
	z-index: 0;
}
	
	
</style><![endif]-->

<!--[if IE 9]>
<style>

.beneficios_principal_block_node_description {
	font-size: 8pt;
}	
	
</style><![endif]-->

<div class="gcba-maincontent-home beneficios-block-size">
  <div id="beneficios-maincontent-home-title" class="gcba-title">
	<div class="seeall-link"><a href="/beneficios">Ver todos</a></div>
  </div>
  <div class="gcba-item-list">
    <?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<div class="gcba-item" style="height: 118px">
			<?php if (empty($row_fields["field_porcentaje_descuento"])): ?>
			<?php $className = "_fullwidth"; ?>
			<?php else: ?>
			<div class="beneficios_principal_block_node_percentage shadow_boxed">
				<div class="percentage-background-top"></div>
				<div class="percentage-background-left"></div>
				<?php echo $row_fields["field_porcentaje_descuento"] ?>
			</div>
			<?php $className = ""; ?>
			<?php endif ?>
			<div class="beneficios_principal_block_node_place<?php echo $className ?>">
				<span class="beneficios_principal_block_node_place_title"><?php echo $row_fields["title"] ?></span>
				<div><?php echo $row_fields["field_direccion"] ?></div>
				<div class="beneficios_principal_block_node_place_phone"><?php echo $row_fields["field_telefono"] ?></div>
			</div>
			<div class="beneficios_principal_block_node_image<?php echo $className ?>">
			    <div class="imagen-listado">
  					<div class="span-izquierdo span-izquierdo-beneficios"></div>
  					<div class="span-derecho span-derecho-beneficios"></div>
					<?php echo $row_fields["field_imagen"] ?>
				</div>
			</div>
			<div class="beneficios_principal_block_node_description"><?php echo $row_fields["field_descripcion"] ?></div>
		</div>
		<div style="clear:both"></div>
		<?php include("puntos.php") ?>		
    <?php endforeach; ?>
    <?php include("puntos.php") ?>
  </div>
</div>

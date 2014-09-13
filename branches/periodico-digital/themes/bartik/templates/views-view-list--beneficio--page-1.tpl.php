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
#beneficios-maincontent-section-title {
	background: url("/themes/bartik/images/beneficios_titulo_seccion.png") no-repeat;
}

.beneficios_principal_block_node {
	float: left;
	width: 220px;
	background-color:#eeeeee;
	margin-right: 3px;
	height: 298px;
	overflow: hidden;
	border: solid 1px #d3d3d3;
	background: url("/themes/bartik/images/beneficios_section_item_fondo.png");
	-khtml-border-radius: 2%;
	-moz-border-radius: 2%;
	-webkit-border-radius: 2%;
	border-radius: 2%;
}
	
.beneficios_principal_block_node_percentage {
	-webkit-border-radius: 10%;
	-moz-border-radius: 10%;
	border-radius: 10%;
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
	font-family: "gotham_mediumregular";
	border: solid 1px #bab7b7;
	background-color: #e6e6e6;
}

.beneficios_principal_block_node_place {
	float: left;
	margin-left: 5px;
	color: #00458F;
	font-weight: bold;
	width: 150px;
	margin-top: 10px;
}

.beneficios_principal_block_node_place_fullwidth {
	float: left;
	margin-left: 10px;
	color: #00458F;
	font-weight: bold;
	width: 150px;
	margin-top: 10px;
	min-height: 50px;
}

.beneficios_principal_block_node_inline {
	float: left;
	width: 241px;
}

.beneficios_principal_block_node_description {
	padding-left: 10px;
	padding-right: 10px;
	font-size: 0.8em;
	margin-top: 5px;
	float: left;
	color: #7C7C7C;
}

.beneficios_principal_block_node_image {
	float: left;
	width: 180px;
	height: 120px;
	margin-left: 20px;
	margin-top: 15px;
}

.beneficios_principal_block_node_image img {
	-khtml-border-radius: 5%;
	-moz-border-radius: 5%;
	-webkit-border-radius: 5%;
	border-radius: 5%;
	border: solid 1px #EAEAEA;
}

.beneficios_principal_block_node_place_address {
	font-size: 0.85em;
	font-weight: bold;
}

.beneficios_principal_block_node_place_title {
	text-transform: uppercase;
	font-size: 0.85em;
	font-weight: bold;
}

.beneficios_principal_block_node_place_phone {
	font-weight: normal;
	font-size: 0.85em;
}

.beneficios_principal_block_node_place_title a {
	color: #0000FF;
}

.imagen-listado .span-izquierdo-medium {
	left: -6px;
}

.imagen-listado .span-derecho-medium {
	left: 178px;
}

.beneficios_principal_block_node .shadow-top {
	display: none;
} 

.beneficios_principal_block_node .shadow-left {
	display: none;
} 
</style>

<!--[if IE 8]>
<style>	
.beneficios_principal_block_node {
	position: relative;overflow: hidden;
}

</style>
<![endif]-->

<div class="gcba-maincontent-section">
	<div id="beneficios-maincontent-section-title" class="gcba-title"></div>
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 5px;">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php if ($i > 0 && $i % 3 === 0): ?>
		<div style="clear: both"></div>
		<div class="dotted-top dotted-bottom" style="margin-top: 5px; padding: 1px; margin-bottom: 5px; width: 97.5%"></div>
		<div style="clear: both"></div>	
		<?php endif ?>
		<div class="gcba-item beneficios_principal_block_node">
			<div class="shadow-left"></div>
			<div class="shadow-top"></div>
			<div class="beneficios_principal_block_node_image rounded-corners imagen-listado">
				<div class="span-izquierdo-medium"></div>
				<div class="span-derecho-medium"></div>				
				<?php echo $row_fields["field_imagen"] ?>
			</div>
			<div class="beneficios_principal_block_node_inline">
				<?php if (!empty($row_fields["field_porcentaje_descuento"])): ?>
				<div class="beneficios_principal_block_node_percentage rounded-corners"><?php echo $row_fields["field_porcentaje_descuento"] ?></div>
				<?php $className = "beneficios_principal_block_node_place" ?>
				<?php else: ?>
				<?php $className = "beneficios_principal_block_node_place_fullwidth" ?>	
				<?php endif ?>
				<div class="<?php echo $className ?>">
					<span class="beneficios_principal_block_node_place_title"><?php echo $row_fields["title"] ?></span>
					<div class="beneficios_principal_block_node_place_address"><?php echo $row_fields["field_direccion"] ?></div>
					<div class="beneficios_principal_block_node_place_phone"><?php echo $row_fields["field_telefono"] ?></div>
				</div>
			</div>
			<div class="beneficios_principal_block_node_description"><?php echo $row_fields["field_descripcion"] ?></div>
		</div>		
	<?php $i++ ?>
    <?php endforeach; ?>
    <div style="clear: both"></div>    
  	</div>
  	<?php include("puntos.php") ?>
  	<?php include("puntos.php") ?>
</div>
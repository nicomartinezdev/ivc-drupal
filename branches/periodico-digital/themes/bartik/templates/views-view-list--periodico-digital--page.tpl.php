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
#periodico-maincontent-section-title {
	background: url("/themes/bartik/images/periodico_titulo_seccion.png") no-repeat;
}

.periodico_principal_block_node {
	width: 155px;
	background-color:#eeeeee;
	margin-right: 3px;
	height: 240px;
	overflow: hidden;
	border: solid 1px #d3d3d3;
	background: url("/themes/bartik/images/beneficios_section_item_fondo.png");
	padding-top: 8px;
	padding-bottom: 8px;
	padding-left: 24px;
	padding-right: 8px;
	-khtml-border-radius: 2%;
	-moz-border-radius: 2%;
	-webkit-border-radius: 2%;
	border-radius: 2%;
}

.periodico_principal_block_node_description {
	padding-left: 10px;
	padding-right: 10px;
	font-size: 0.8em;
	margin-top: 5px;
	float: left;
	color: #7C7C7C;
}

.periodico_principal_block_node_image {
	width: 140px;
	height: 175px;
}

.periodico_principal_block_node_image img {
	-khtml-border-radius: 5%;
	-moz-border-radius: 5%;
	-webkit-border-radius: 5%;
	border-radius: 5%;
	border: solid 1px #EAEAEA;
}

.imagen-listado .span-izquierdo-medium {
	left: -6px;
}

.imagen-listado .span-derecho-medium {
	left: 178px;
}

.periodico_block_node_edicion {
	color:#00458f;
	font-size: 1.2em;
	font-weight: bold;
	height: 18px;
	border-right: solid 1px #A3A3A3;
	padding-right: 4px;
	margin-right: 4px;
	float: left;
	font-family: Tahoma;
	
}

.periodico_sidebar_block_node_mes {
	margin-top: 12px;
	font-weight: bold;
	font-family: Tahoma;
}

.periodico_maincontent_block_node_viewmore {
	margin-top: 12px;
	float: right;
	margin-right: 10px;
}

.periodico_maincontent_mes {
	padding-top: 2px;
	float: left;
}

.imagen-listado .sombreado-maincontent-periodico {
	left: 142px;
	height: 173px;
}
</style>

<!--[if IE 8]>
<style>	
.periodico_principal_block_node {
	position: relative;overflow: hidden;
}

</style>
<![endif]-->

<div class="gcba-maincontent-section">
	<div id="periodico-maincontent-section-title" class="gcba-title"></div>
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 5px;">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php
		if (preg_match('/href="(.*)"/', $row_fields["title"], $matches)) {
			$nodeUrl = $matches[1];
		} else {
			$nodeUrl = null;
		}
		?>
		<?php if ($i > 0 && $i % 4 === 0): ?>
		<div style="clear: both"></div>
		<div class="dotted-top dotted-bottom" style="margin-top: 5px; padding: 1px; margin-bottom: 5px; width: 97.5%"></div>
		<div style="clear: both"></div>	
		<?php endif ?>
		<div class="gcba-item periodico_principal_block_node">
			<div class="periodico_principal_block_node_image rounded-corners imagen-listado">
				<div class="span-izquierdo-large"></div>
				<div class="span-derecho-large sombreado-maincontent-periodico"></div>				
				<?php echo $row_fields["field_portada"]; ?>
			</div>
			<div class="periodico_sidebar_block_node_mes">
				<span class="periodico_block_node_edicion">EDICION</span>
				<span class="periodico_maincontent_mes"><?php echo $row_fields["field_mes_periodico_digital"] ?></span>
			</div>
			<div style="clear: both"></div>
				<div class="periodico_maincontent_block_node_viewmore">
					<a href="<?php echo $nodeUrl;?>">
						<img src="/themes/bartik/images/periodico_ver_mas_listado.png" alt="Ver M&aacute;s" title="Ver M&aacute;s">
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


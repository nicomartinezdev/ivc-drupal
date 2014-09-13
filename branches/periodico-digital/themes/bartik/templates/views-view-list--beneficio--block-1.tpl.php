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

#beneficios_sidebar_block_title {
	background-image: url("/themes/bartik/images/beneficios_sidebar_title.png");
	height: 30px;
}

.beneficios_sidebar_block_node_content {
	height: 75px;
}

.beneficios_sidebar_block_node_percentage {
	float: left;
	padding-top: 6px;
	padding-bottom: 6px;
	padding-left: 9px;
	padding-right: 9px;
	color: #FBBD00;
	font-weight: bold;
	font-size: 2em;
	margin-top: 4px;
	margin-bottom: 4px;
	font-family: "gotham_mediumregular";
	text-align: center;
	height: 50px;
	border: solid 1px #d3d3d3;
	background-color: #f0f0f0;
}

.beneficios_sidebar_texto_descuento {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 0.4em;
	color: #000000;
	font-weight: normal;
}

.beneficios_sidebar_block_node_place {
	float: left;
	margin-left: 10px;
	font-weight: bold;
	width: 115px;
	margin-top: 30px;
}

.beneficios_sidebar_block_node_place_title {
	text-transform: uppercase;
}

.benficios_sidebar_block_node_viewmore {
	text-align: right;
	margin-right: -10px;
	margin-top: -20px;
}
</style>

<!--[if IE 8]><style>.benficios_sidebar_block_node_viewmore {margin-right: -7px; margin-top: -25px}</style><![endif]-->
<!--[if IE 9]><style>.benficios_sidebar_block_node_viewmore {margin-right: 0px; margin-top: -20px}</style><![endif]-->

<div class="gcba-sidebar-block">
  <div id="beneficios_sidebar_block_title"></div>
  <div class="gcba-item-list">
    <?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php if ($i > 0): ?>
		<?php include("puntos.php") ?>	
		<?php endif ?>
		<div class="gcba-item beneficios_sidebar_block_node_content">
			<div style="float:left;">
				<div class="beneficios_sidebar_block_node_percentage rounded-corners">
					<?php echo $row_fields["field_porcentaje_descuento"] ?>
					<div class="beneficios_sidebar_texto_descuento">DESCUENTO</div>
				</div>
				<div class="beneficios_sidebar_block_node_place">
					<span class="beneficios_sidebar_block_node_place_title"><?php echo $row_fields["title"] ?></span>
				</div>
				<div style="clear:both"></div>
				<div class="benficios_sidebar_block_node_viewmore"><a href="/beneficios"><img src="/themes/bartik/images/ver_mas_amarillo.png" /></a></div>
			</div>
		</div>
		<div style="clear:both"></div>
		<?php $i++ ?>
    <?php endforeach; ?>
    <?php include("puntos.php") ?>
    <?php include("puntos.php") ?>
  </div>
</div>

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
	#rrhh-sidebar-title {
		background: url("/themes/bartik/images/rrhh_sidebar_title.png") no-repeat;
	}

.rrhh-principal-node-text {
	float: left;
	height: 25px;
	margin-top: 10px;
	padding-right: 5px;
	padding-top: 10px;
	width: 105px;
	border-right: dotted thin #7C7C7C;
}

.rrhh-principal-node-text-title a {
	text-decoration: none;
	font-weight: bold;
	color: #000000;
	font-size: 0.9em;
}

.rrhh-principal-node-image {
	float: left;
	margin-right: 5px;
	height: 60px;
}

.rrhh-principal-node-text-body {
	font-size: 0.75em;
	color: #7C7C7C;
}

.rrhh-principal-node-text-viewmore {
	float: left;
	padding-top: 18px;
	margin-left: 5px;	
}

.rrhh-principal-node-text-viewmore a {
	font-size: 0.75em;
	text-decoration: none;
	color: #000000;
}

</style>

<div class="gcba-block-sidebar">
	<div id="rrhh-sidebar-title" class="gcba-title">
	</div>
	<div class="gcba-item-list">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php
		if (preg_match('/href="(.*)"/', $row_fields["field_link"], $matches)) {
			$nodeUrl = $matches[1];
		}
		?>
		<div class="gcba-item">
			<div class="rrhh-principal-node-image">
				<?php echo $row_fields["field_imagen_rrhh"] ?>
			</div>
			<div class="rrhh-principal-node-text">
				<div class="rrhh-principal-node-text-title"><?php echo $row_fields["field_link"] ?></div>
			</div> 
			<div class="rrhh-principal-node-text-viewmore">
				<a href="<?php echo $nodeUrl ?>"><img src="/themes/bartik/images/ver_mas_amarillo.png" alt="Ver M&aacute;s" title="Ver M&aacute;s"></a>
			</div>
		</div>
		<div style="clear:both"></div>
		<?php include("puntos.php") ?>
		<?php $i++ ?>
	<?php endforeach ?>
  	</div>
	<?php include("puntos.php") ?>
</div>


<?php

?>
<style>
#rrhh-block-principal-title {
	background: url("themes/bartik/images/rrhh_principal_titulo.png") no-repeat;
}

.rrhh-principal-node-text {
	float: left;
	width: 290px;
}

.rrhh-principal-node-text-title a {
	text-decoration: none;
	font-weight: bold;
	color: #000000;
	font-size: 0.8em;
}

.rrhh-principal-node-image {
	float: left;
	margin-right: 5px;
}

.rrhh-principal-node-text-body {
	font-size: 0.75em;
	color: #7C7C7C;
	vertical-align: middle;
}

.rrhh-principal-node-text-viewmore {
	float: right;
	margin-top: -4px;
	margin-right: 5px;
}

.rrhh-principal-node-text-viewmore a {
	font-size: 0.75em;
	text-decoration: none;
	color: #000000;
}

.gcba-maincontent-home .rrhh-item {
	padding-bottom: 0px;
	padding-top: 0px;
}

.gcba-maincontent-home .first {
	padding-top: 2px;
}
</style>
<!--[if IE 8]><style>.rrhh-principal-node-text-viewmore {margin-top: 2.7px;} .rrhh-principal-node-text-body {line-height: normal; font-size: 0.7em}</style><![endif]-->
<!--[if gte IE 9]><style>.rrhh-principal-node-text-title a {font-size: 0.75em} .rrhh-principal-node-text-body {line-height: 1.4}</style><![endif]-->

<div class="gcba-maincontent-home">
	<div id="rrhh-block-principal-title" class="gcba-title">&nbsp;</div>
	<div class="gcba-item-list">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php 
			if (preg_match('/href="(.*)"/', $row_fields["field_link"], $matches)) {
				$nodeUrl = $matches[1];
			} 
		?>
		<div class="gcba-item rrhh-item <?php if ($i === 0): ?>first<?php endif ?>">
			<div class="rrhh-principal-node-image">
				<?php echo $row_fields["field_imagen_rrhh"] ?>
			</div>
			<div class="rrhh-principal-node-text">
				<div class="rrhh-principal-node-text-title"><?php echo $row_fields["field_link"] ?></div>
				<div class="rrhh-principal-node-text-body"><?php echo $row_fields["body"] ?></div>
				<div class="rrhh-principal-node-text-viewmore"><a href="<?php echo $nodeUrl ?>"><img src="/themes/bartik/images/ver_mas_amarillo.png" alt="Ver M&aacute;s" title="Ver M&aacute;s"></a></div>
			</div> 
		</div>
		<div style="clear:both"></div>
		<?php include("puntos.php") ?>
		<?php $i++ ?>
	<?php endforeach ?>
	<?php include("puntos.php") ?>	
	</div>
</div>
<div style="clear:both"></div>
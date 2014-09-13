<style>
	#busquedas-maincontent-section-title {
		background: url("/themes/bartik/images/busquedas_titulo.png") no-repeat;
	}

	.busquedas_filters {
		width: 698px;
		background-color: #eeeeee;
		margin-right: 11px;
		margin-top: 8px;
		margin-bottom: 8px;
		height: 88px;
		border: solid 1px #d3d3d3;
		background: url("/themes/bartik/images/busquedas_fondo.png");
		-khtml-border-radius: 2%;
		-moz-border-radius: 2%;
		-webkit-border-radius: 2%;
		border-radius: 2%;
	}

	.busquedas_filters .busquedas_filters_place div {
		display: inline;
	}

	.busquedas_filters .views-submit-button, .busquedas_filters .views-reset-button {
		float: right;
		margin-top: -10px;
		padding: 0;
	}

	#edit-gerencia-wrapper {
		margin-top: 5px;
	}

	#edit-subgerencia-wrapper {
		margin-top: 10px;
	}
	
	#edit-puesto-wrapper {
		float: right;
		margin-top: 5px;
		margin-right: 15px;
	}

	#edit-gerencia {
		margin-left: 31px;
		text-transform: uppercase;
	}
	
	#edit-subgerencia {
		text-transform: uppercase;
	}
	
	#edit-puesto {
		text-transform: uppercase;
	}

	#edit-reset {
		background: url("/themes/bartik/images/fondo_boton_azul.png");
		color: #FFFFFF;
		-khtml-border-radius: 10%;
		-moz-border-radius: 10%;
		-webkit-border-radius: 10%;
		border-radius: 10%;
		margin-top: 1.8em;
	}

	#edit-submit-busquedas-internas {
		background: url("/themes/bartik/images/fondo_boton_azul.png");
		color: #FFFFFF;
		-khtml-border-radius: 10%;
		-moz-border-radius: 10%;
		-webkit-border-radius: 10%;
		border-radius: 10%;
		margin-top: 1.8em;
		margin-right: 26px;
	}

	.busquedas_labels {
		color: #00458F;
		font-weight: bold;
		font-size: 0.8em;
		text-transform: uppercase;
		margin-left: 10px;
	}

	.busquedas_filters_place {
		width: 320px;
		display: inline;
		margin-left: 5px;
	}

	.form-select {
		width: 220px;
		font-size: 0.8em;
		margin-left: 10px;
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

<!--[if IE 9]>
<style>

#edit-submit-busquedas-internas {
	height: 19pt;
}

#edit-reset {
	height: 19pt;
}	
</style><![endif]-->

<?php if (!empty($q)):
?>
<?php
// This ensures that, if clean URLs are off, the 'q' is added first so that
// it shows up first in the URL.
print $q;
?>
<?php endif; ?>
<div class="gcba-maincontent-section">
	<div id="busquedas-maincontent-section-title" class="gcba-title">
		<div class="rrhh-submenu">
			<a href="/tramites"><img src="/themes/bartik/images/rrhh-boton-tramites.png" class="first" alt="Tr&aacute;mites" title="Tr&aacute;mites" /></a>
			<a href="/formularios"><img src="/themes/bartik/images/rrhh-boton-formularios.png" alt="Formularios" title="Formularios" /></a>
		</div>
	</div>
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 5px;">
		<div class="views-exposed-form  busquedas_filters">
			<div class="views-exposed-widgets clearfix">
				<?php foreach ($widgets as $id => $widget):
				?>
				<div id="<?php print $widget -> id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?> busquedas_labels">
					<div class="views-widget busquedas_filters_place">
						<?php if (!empty($widget->label)):
						?>
						<span> <?php print $widget -> label; ?></span>
						<?php endif; ?>
						<?php print $widget -> widget; ?>
					</div>
				</div>
				<?php endforeach; ?>
				<?php if (!empty($items_per_page)):
				?>
				<div class="views-exposed-widget views-widget-per-page">
					<?php print $items_per_page; ?>
				</div>
				<?php endif; ?>
				<?php if (!empty($offset)):
				?>
				<div class="views-exposed-widget views-widget-offset">
					<?php print $offset; ?>
				</div>
				<?php endif; ?>
				<div class="views-exposed-widget views-submit-button">
					<?php print $button; ?>
				</div>
				<?php if (!empty($reset_button)):
				?>
				<div class="views-exposed-widget views-reset-button">
					<?php print $reset_button; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
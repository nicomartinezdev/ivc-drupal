<style>
	#busquedas-maincontent-section-title {
		background: url("/themes/bartik/images/busquedas_titulo.png") no-repeat;
	}

	.busquedas_principal_block_node {
		float: left;
		width: 214px;
		background-color: #eeeeee;
		margin-right: 11px;
		margin-top: 8px;
		margin-bottom: 8px;
		height: 122px;
		overflow: hidden;
		border: solid 1px #d3d3d3;
		background: url("/themes/bartik/images/busquedas_fondo.png");
		-khtml-border-radius: 2%;
		-moz-border-radius: 2%;
		-webkit-border-radius: 2%;
		border-radius: 2%;
	}

	.busquedas_principal_block_node_inline {
		float: left;
		width: 210px;
	}

	.busquedas_principal_block_node_description {
		padding-right: 10px;
		font-size: 0.8em;
		margin-top: 5px;
		float: left;
		color: #00458f;
	}

	.busquedas_principal_block_node_image_file {
		float: right;
		width: 39px;
		height: 28px;
		margin-right: 5px;
		margin-bottom: 20px;
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

	.view-id-busquedas_internas .pager {
		margin: 0px;
		padding: 0px;
	}

</style>

<!--[if IE 8]>
<style>	
.busquedas_principal_block_node {
	position: relative;overflow: hidden;
}

</style>
<![endif]-->

<div class="gcba-maincontent-section">
	<div id="busquedas-maincontent-section-title" class="gcba-title">
		<div class="rrhh-submenu">
			<a href="/tramites"><img src="/themes/bartik/images/rrhh-boton-tramites.png" class="first" alt="Tr&aacute;mites" title="Tr&aacute;mites" /></a>
			<a href="/formularios"><img src="/themes/bartik/images/rrhh-boton-formularios.png" alt="Formularios" title="Formularios" /></a>
		</div>
	</div>
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 5px;">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php 
			if (preg_match('/href="(.*)" type=(.*)/', $row_fields["field_archivo_adjunto"], $matches)) {
				$nodeUrl = $matches[1];	
			}
		if ($i > 0 && $i % 3 === 0): ?>
		<div style="clear: both"></div>
		<div class="dotted-top dotted-bottom" style="margin-top: 5px; padding: 1px; margin-bottom: 5px; width: 97.5%"></div>
		<div style="clear: both"></div>	
		<?php endif ?>
		<div class="gcba-item busquedas_principal_block_node">
			<div class="busquedas_principal_block_node_inline">
				<span class="busquedas_principal_block_node_place_title"><?php echo $row_fields["field_lista_de_puestos"] ?></span>
				<span class="busquedas_principal_block_node_description"><?php echo $row_fields["field_gerencia"] ?></span>
				<span class="busquedas_principal_block_node_description"><?php echo $row_fields["field_subgerencia"] ?></span>
				<span class="busquedas_principal_block_node_description">Cantidad de Puestos: <?php echo $row_fields["field_cantidad_de_puestos"] ?></span>
			</div>
			<div class="busquedas_principal_block_node_image_file">
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
</div>
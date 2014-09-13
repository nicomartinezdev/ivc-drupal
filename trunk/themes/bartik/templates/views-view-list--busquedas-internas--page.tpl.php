<style>
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
		margin-top: 5px;
		margin-bottom: 10px;
	}

	.busquedas_principal_block_node_image_file {
		float: right;
		width: 39px;
		height: 28px;
		margin-right: 5px;
		cursor: pointer;
	}

	.busquedas_title {
		color: #00458F;
		font-weight: bold;
		font-size: 0.85em;
		text-transform: uppercase;
	}

	.busquedas_gerencia {
		padding-right: 10px;
		font-size: 0.8em;
		margin-top: 5px;
		float: left;
	}

	.busquedas_subgerencia {
		color: #00458F;
		font-size: 0.8em;
		float: left;
	}

	.busquedas_cantidad_de_puestos {
		color: #636363;
		font-size: 0.8em;
		float: left;
	}

	#busquedas-viewer-no-results-text {
		font-size: 0.85em;
		padding: 3px;
	}
	
	.view-busquedas-internas {
		margin-top: -10px;
	}
	
</style>

<!--[if IE 8]>
<style>	
.busquedas_principal_block_node {
	position: relative;overflow: hidden;
}

</style>
<![endif]-->

<!--[if IE 9]>
<style>

.busquedas_gerencia {
	font-size: 7.6pt;
}	

.busquedas_subgerencia {
	font-size: 7.6pt;
}	
	
</style><![endif]-->

<div class="gcba-maincontent-section">
	<div class="gcba-item-list" style="padding-left: 10px; padding-bottom: 5px;">
	<?php if (!$view->result): ?>
		<div id="busquedas-viewer-no-results-text">
			No se encontraron B&uacute;squedas Internas activas para los filtros especificados. Por favor, reintente utilizando diferentes opciones.
		</div>
	<?php else: ?>
		<?php $i = 0 ?>
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
			<?php 
				if (preg_match('/href="(.*)" type=(.*)/', $row_fields["field_archivo_adjunto"], $matches)) {
					$nodeUrl = $matches[1];	
				}
			if ($i % 3 === 0): ?>
				<div style="clear: both"></div>
				<div class="dotted-top dotted-bottom" style="margin-top: 5px; padding: 1px; margin-bottom: 5px; width: 97.5%"></div>
				<div style="clear: both"></div>	
			<?php endif ?>
	
			<div class="gcba-item busquedas_principal_block_node">
				<div class="busquedas_principal_block_node_inline">
					<span class="busquedas_title"><?php echo $row_fields["field_lista_de_puestos"] ?></span>
					<span class="busquedas_gerencia"><?php echo $row_fields["field_gerencia"] ?></span>
					<span class="busquedas_subgerencia"><?php echo $row_fields["field_subgerencia"] ?></span>
					<span class="busquedas_cantidad_de_puestos">Cantidad de Puestos: <font color= "#00458F"><?php echo $row_fields["field_cantidad_de_puestos"] ?></font></span>
				</div>
				<div class="busquedas_principal_block_node_image_file">
					<a href="<?php echo $nodeUrl ?>">
						<img src="/themes/bartik/images/formularios_pdf.png" alt="Descargar" title="Descargar">
					</a>
				</div>
			</div>	
	
		<?php $i++ ?>
	    <?php endforeach; ?>
    <?php endif; ?>	
    <div style="clear: both"></div>    
  	</div>
  	<?php include("puntos.php") ?>
</div>
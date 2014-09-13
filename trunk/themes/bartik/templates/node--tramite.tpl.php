<style>
	#tramites_section {
		width: 723px;
	}

	#tramites_section_title {
		text-transform: uppercase;
		background: url("/themes/bartik/images/tramites_titulo_detalle.png") no-repeat;
	}

	#tramites_section_nodes {
		background-color: #f6f6f6;
		padding-top: 3px;
	}

	.tramites_section_node {
		margin-top: 1px;
		float: left;
		padding-top: 5px;
		margin-left: 13px;
		width: 95%;
	}

	.tramites_section_node_news_title {
		text-transform: uppercase;
		font-weight: bold;
		font-size: 1em;
		color: #00458F;
		width: 650px;
		margin-top: 30px;
	}

	.tramites_section_node_news_subtitle {
		font-size: 0.8em;
		text-transform: none;
		font-weight: bold;
		margin-top: 5px;
	}

	.tramites_section_node_news_subtitle ul {
		padding-left: 1em;
	}

	.tramites_section_node_news_subtitle li {
		list-style-image: url("/themes/bartik/images/rrhh-bullet.png");
		font-weight: normal;
	}

	.tramites_section_node_news_subtitle .field-name-field-subtitulo-tramites {
		color: #00458F;
	}

	.tramites_section_node_body {
		font-size: 0.8em;
	}

	.tramites_section_node_body_content {
		font-size: 1em;
		color: #767676;
		margin-top: 10px;
		margin-bottom: 5px;
	}

	.tramites_section_node_body_image {
		float: left;
		margin-right: 10px;
		margin-top: 10px;
		margin-bottom: 7px;
		background-color: #FFFFFF;
		line-height: 1em;
		padding: 1px;
	}

	.tramites_section_node_body_image img {
		margin: 0;
	}

	#tramites_section_ultimas_tramites {
		margin-left: 10px;
		margin-top: 5px;
		margin-bottom: 10px;
		width: 697px;
	}

	.tramites_principal_bullet {
		float: left;
		width: 12px;
		height: 40px;
		margin-top: 9px;
		background: url("/themes/bartik/images/rrhh-bullet.png") no-repeat;
	}

	.tramites_principal_file {
		font-size: 1.1em;
		font-weight: bold;
		color: #00458f;
		float: left;
		width: 250px;
		height: 40px;
		margin-top: 4px;
	}
	
	.tramites_principal_file a {
		color: #767676;
	}
	
	.tramites_principal_image_file {
		float: left;
		width: 60px;
		height: 40px;
		margin-right: 10px;
		cursor: pointer;
	}
</style>

<div id="tramites_section">
	<div id="tramites_section_title" class="gcba-title">
		<a href="/tramites">
			<div class="back-link back-link-text">Volver</div>
			<div class="back-link back-link-image">
				<img src="/themes/bartik/images/flecha-volver.png" />
			</div>
		</a>
	</div>
	<div id="tramites_section_nodes">
		<div id="tramites_section_noticia">
			<div class="tramites_section_node">
				<div>
					<div style="float: left; margin-left: 10px;">
						<div class="tramites_section_node_body_image rounded-corners"><?php print render($content["field_imagen_catergoria_tramites"]) ?></div>
		  				<div class="tramites_section_node_news_title"><?php print $title ?></div>
		  				<div style="clear: both"></div>
		  				<div class="tramites_section_node_news_subtitle"><?php print render($content["field_subtitulo_tramites"]) ?></div>
		  				<div class="tramites_section_node_news_subtitle"><?php print render($content["field_contenido_tramites"]) ?></div>
		  			</div>
		  			<div style="clear: both"></div>
  					<?php include("puntos.php") ?>
	  			</div>	
			</div>			
			<div class="tramites_section_node tramites_section_node_body">
				<?php print render($content["body"]) ?>
				<div class="tramites_section_node_body_content">
					<?php $files = field_get_items('node', $node, 'field_archivo_tramites');
						for ($i = 0; $i < count($files); $i++) {
							$aFile = field_view_value('node', $node, 'field_archivo_tramites', $files[$i]); 

							forEach($aFile as $key => $value) {
							    if (is_object($value)){
									$objetoFile = $value;
							    }
							} 
							global $base_url;
							  if (isset($base_url)) {
							  	$nuevaBase = $base_url."/sites/ivc.localhost/files/";
							    $objetoFile -> uri = str_replace( 'public://', $nuevaBase, $objetoFile -> uri);
							  }
							
							?>
							<div class="tramites_principal_bullet"></div>
					<div class="tramites_principal_file"> <a style="cursor: pointer;" href = '<?php echo $objetoFile -> uri; ?>' alt="Descargar" title="Descargar">
						<?php echo $objetoFile -> filename; ?></a>				
					</div>
					<div class="tramites_principal_image_file">
						<a href="<?php echo $objetoFile -> uri; ?>">
							<img src="/themes/bartik/images/formularios_pdf.png" alt="Descargar" title="Descargar">
						</a>
					</div>
					<div style="clear: both"> </div>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div style="clear: both"></div>
		<div class="dotted-bottom dotted-top" style="height: 1px; margin-left: 10px; width: 96.5%"></div>
		<div id="tramites_section_ultimas_tramites">
			<?php
			print views_embed_view("tramites", "block");
			?>
		</div>
		<?php include("puntos.php") ?>
		<?php include("puntos.php") ?>
	</div>
</div>

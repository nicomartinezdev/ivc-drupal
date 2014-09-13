<style>
#noticias_section {
	width: 723px;
}

#noticias_section_title {
	text-transform: uppercase;
	background: url("/themes/bartik/images/noticias_titulo_seccion.png") no-repeat;
}

#noticias_section_nodes {
	background-color: #f6f6f6;
	padding-top: 3px;
}

.noticias_section_node {
	margin-top: 1px;
	float: left;
	padding-top: 5px;
	margin-left: 13px;
	width: 95%;
}

.noticias_section_node_news_title {
	text-transform: uppercase;
	font-weight: bold;
	font-size: 1em;
	color: #00458F;
}

.noticias_section_node_news_subtitle {
	color: #767676;
	font-size: 0.8em;
	text-transform: none;
	font-weight: bold;
	margin-top: 5px;
}

.noticias_section_node_body_content {
	font-size: 0.8em;
	color: #767676;
	margin-top: 10px;
}

.noticias_section_node_body_image {
	float: left;
	margin-top: 10px;
	margin-bottom: 7px;
	margin-right: 15px;
	margin-left: 5px;
}

#noticias_section_ultimas_noticias {
	margin-left: 10px;
	margin-top: 5px;
	margin-bottom: 5px;
	width: 697px;
}

.imagen-listado-noticias {
	border: solid 1px #E0E0E0;
	background-color: #FFFFFF;
	padding: 1px;
	height: 180px;
}

.imagen-listado-noticias img {
	margin: 0px;
	-khtml-border-radius: 5%;
	-moz-border-radius: 5%;
	-webkit-border-radius: 5%;
	border-radius: 5%;
}
</style>

<?php $parsedDate = array(date("d", $node->created), date('m', $node->created), date('Y', $node->created)); ?>
<div id="noticias_section">
	<div id="noticias_section_title" class="gcba-title">
		<a href="/noticias">
			<div class="back-link back-link-text">Volver</div>
			<div class="back-link back-link-image">
				<img src="/themes/bartik/images/flecha-volver.png"/>
			</div>
		</a>
	</div>
	<div id="noticias_section_nodes">
		<div id="noticias_section_noticia">
			<div class="noticias_section_node">
				<div>
					<div style="float: left">
						<div class="principal_block_node_day"><?php echo htmlspecialchars($parsedDate[0]) ?></div>
			  			<div class="principal_block_node_monthyear">
			  				<span class="principal_block_node_month"><?php echo htmlspecialchars($parsedDate[1]) ?></span>
			  				<span><?php echo htmlspecialchars($parsedDate[2]) ?></span>
			  			</div>
		  			</div>
		  			<div style="float: left; margin-left: 20px; margin-bottom: 10px;">
		  				<div class="noticias_section_node_news_title"><?php print $title ?></div>
		  				<div class="noticias_section_node_news_subtitle subtitle"><?php print $field_subtitle[0]["safe_value"] ?></div>	
		  			</div>
		  			<div style="clear: both"></div>
  					<?php include("puntos.php") ?>
	  			</div>	
			</div>			
			<div class="noticias_section_node noticias_section_node_body">
				<div class="noticias_section_node_body_image rounded-corners">
					<div class="imagen-listado imagen-listado-noticias rounded-corners">
						<div class="span-izquierdo-large"></div>
						<div class="span-derecho-large"></div>
						<?php print render($content["field_image"]) ?>
					</div>
				</div>
				<div class="noticias_section_node_body_content subtitle">
				<?php print $node->body["und"][0]["safe_value"] ?>
				</div>
			</div>
		</div>
		<div style="clear: both"></div>
		<div class="dotted-bottom dotted-top" style="height: 1px; margin-left: 10px; width: 96.5%"></div>
		<div id="noticias_section_ultimas_noticias">
			<?php 
				print views_embed_view("noticias", "ultimas_noticias"); 
			?>
		</div>
		<?php include("puntos.php") ?>
		<?php include("puntos.php") ?>
	</div>
	
</div>
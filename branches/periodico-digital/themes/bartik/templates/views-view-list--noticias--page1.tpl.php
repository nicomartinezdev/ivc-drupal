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
#noticias-maincontent-section-title {
	background: url("/themes/bartik/images/noticias_titulo_seccion.png") no-repeat;
}

.noticias_principal_block_node_image {
	float: left; 
	margin-left: 2px;
	margin-top: 2px;
	padding: 1px;
	background-color: #FFFFFF;
	border: solid 1px #E0E0E0;
	height: 117px;
	margin-bottom: 2px;
}

.noticias_principal_block_node_news {
	float: left;
	width: 470px;
	margin-top: 2px;
	margin-left: 10px;
}

.noticias_principal_block_node_news_title {
	text-transform: uppercase;
	font-weight: bold;
	font-size: 0.8em;
}

.noticias_principal_block_node_news_title a {
	color: #00458F;
}

.noticias_principal_block_node_news_body {
	font-size: 0.7em;
	color: #767676;
	margin-top: 10px;
	width: 460px;
	float: left;
}

.noticias_principal_block_node_news_viewmore {
	cursor: pointer;
	font-size: 0.7em;
	margin-right: 5px;
	text-align: right;
	margin-top: -15px;
	margin-bottom: 2px;
}

.noticias_principal_block_node_news_viewmore a {
	color: #767676;
	text-decoration: none;
}

.noticias_principal_block_node_news_subtitle {
	color: #767676;
	font-size: 0.8em;
	text-transform: none;
}

.imagen-listado-noticias {
	padding: 1px;
}

.imagen-listado-noticias img {
	-khtml-border-radius: 1%;
	-moz-border-radius: 1%;
	-webkit-border-radius: 1%;
	border-radius: 1%;
}

.noticias-principal-page-text {
	float: left;
	margin-left: 5px;
	margin-bottom: 5px;
}

.articulo-listado {
	width: 710px;
}

.view-id-noticias .pager {
	margin: 0px;
	padding: 0px;
}
</style>

<!--[if gte IE 8]>
<style>
	.noticias_principal_block_node_news_subtitle {
		font-size: 0.9em;
		font-weight: bold;
	}
	
	.noticias_principal_block_node_news_body {
		font-size: 0.8em;
	}
</style>
<![endif]-->

<div class="gcba-maincontent-section">
	<div id="noticias-maincontent-section-title" class="gcba-title"></div>
	<div class="gcba-item-list">
		<?php $i = 0 ?>
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php $parsedDate = explode("-", $row_fields["created"]) ?>
		<?php 
			if (preg_match('/href="(.*)"/', $row_fields["title"], $matches)) {
				$nodeUrl = $matches[1];	
			} 
		?>
  		<div class="gcba-item articulo-listado">
  			<div class="noticias_principal_block_node_image">
  				<div class="imagen-listado imagen-listado-noticias">
  					<div class="span-izquierdo-medium"></div>
  					<div class="span-derecho-medium"></div>
  					<?php echo $row_fields["field_image_1"] ?>
  				</div>
  			</div>
  			<div class="noticias-principal-page-text">
	  			<div class="principal_block_node_day"><?php echo htmlspecialchars($parsedDate[0]) ?></div>
	  			<div class="principal_block_node_monthyear">
	  				<span class="principal_block_node_month"><?php echo htmlspecialchars($parsedDate[1]) ?></span>
	  				<span><?php echo htmlspecialchars($parsedDate[2]) ?></span>
	  			</div>
	  			<div style="clear: both"></div>
	  			<div class="noticias_principal_block_node_news">
	  				<div class="noticias_principal_block_node_news_title">
	  					<?php echo $row_fields["title"] ?><br />
	  					<span class="noticias_principal_block_node_news_subtitle subtitle"><?php echo $row_fields["field_subtitle"] ?></span>
	  				</div>
	  				<div class="noticias_principal_block_node_news_body"><?php echo strip_tags($row_fields["body_1"]) ?></div>
	  			</div>
  			</div>
  			<div style="clear: both"></div>
  			<div class="noticias_principal_block_node_news_viewmore"><a href="<?php echo $nodeUrl ?>"><img src="/themes/bartik/images/ver_mas_azul.png" alt="Ver M&aacute;s" title="Ver M&aacute;s"></a></div>
  			<div style="clear: both"></div>
  		</div>
  		<div style="clear: both"></div>
  		<?php include("puntos.php") ?>
  		<?php endforeach ?>
  	</div>
</div>
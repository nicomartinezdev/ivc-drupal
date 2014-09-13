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
#noticias-maincontent-home-title {
	background: url("/themes/bartik/images/noticias.png") no-repeat;
}

.noticias_principal_block_node_image {
	float: left; 
	margin-left: 2px;
	margin-top: 2px;
	padding: 1px;
	background-color: #FFFFFF;
}

.noticias_principal_block_node_image .imagen-listado {
	width: 83px;
	height: 54px;
}

.noticias_principal_block_node_news {
	float: left;
	width: 190px;
	height: 77px;
	margin-left: 10px;
}

.noticias_principal_block_node_news_title {
	text-transform: uppercase;
	font-weight: bold;
	font-size: 0.8em;
}

.noticias_principal_block_node_news_title a {
	color: #97A811;
}

.noticias_principal_block_node_news_body {
	font-size: 0.75em;
	font-weight: normal;
	color: #7C7C7C;
}

.noticias_principal_block_node_news_viewmore {
	float: right;
	margin-right: 15px;
	margin-top: -22px;
	cursor: pointer;
}

.imagen-listado-noticias {
	border: solid 1px #E0E0E0;
	background-color: #FFFFFF;
	padding: 1px;
}

.principal_block_node_day {
	color: #97A811;
	font-size: 0.8em;
}

.noticias-item {
	padding-top: 0px;
}

.noticias-item .principal_block_node_monthyear {
	padding-top: 2px;
	font-size: 0.7em;
}

.gcba-maincontent-home .listado-noticias {
	padding-top: 5px;
}
</style>

<!--[if IE 8]><style>.gcba-maincontent-home .listado-noticias {padding-top: 3px;}</style><![endif]-->
<!--[if gte IE 9]><style>.gcba-maincontent-home .listado-noticias {padding-top: 4px;}</style><![endif]-->

<div class="gcba-maincontent-home">
	<div id="noticias-maincontent-home-title" class="gcba-title">
		<div class="seeall-link"><a href="/noticias">Ver todas</a></div>
	</div>
	<div class="gcba-item-list listado-noticias">
		<?php $i = 0 ?>
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php $parsedDate = explode("-", $row_fields["created"]) ?>
		<?php 
			if (preg_match('/href="(.*)"/', $row_fields["title"], $matches)) {
				$nodeUrl = $matches[1];	
			} 
		?>
  		<div class="gcba-item noticias-item">
  			<div class="noticias_principal_block_node_image">
  				<div class="imagen-listado imagen-listado-noticias">
  					<div class="span-izquierdo enlarged-left-shadow"></div>
  					<div class="span-derecho enlarged-right-shadow"></div>
  					<?php echo $row_fields["field_image"] ?>
  				</div>
  			</div>
  			<div class="principal_block_node_day"><?php echo htmlspecialchars($parsedDate[0]) ?></div>
  			<div class="principal_block_node_monthyear">
  				<span class="principal_block_node_month"><?php echo htmlspecialchars($parsedDate[1]) ?></span>
  				<span><?php echo htmlspecialchars($parsedDate[2]) ?></span>
  			</div>
  			<div class="noticias_principal_block_node_news">
  				<div class="noticias_principal_block_node_news_title"><?php echo $row_fields["title"] ?></div>
  				<div class="noticias_principal_block_node_news_body"><?php echo $row_fields["body"] ?></div>  				
  			</div>
  			<div class="noticias_principal_block_node_news_viewmore">
				<a href="<?php echo $nodeUrl ?>">
					<img src="/themes/bartik/images/noticias_vermas.png" alt="Ver M&aacute;s" title="Ver M&aacute;s">
				</a>
			</div>
  		</div>
  		<div style="clear: both"></div>
  		<?php include("puntos.php") ?>
  		<?php endforeach ?>
  		<?php include("puntos.php") ?>
  	</div>  	
</div>
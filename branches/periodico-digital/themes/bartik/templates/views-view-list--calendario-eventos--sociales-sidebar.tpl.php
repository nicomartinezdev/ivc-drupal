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
	#sociales-sidebar-title {
		background: url("/themes/bartik/images/sociales.png") no-repeat;
	}

	.sociales_sidebar_block_node_image {
		float:left;
		width: 84px;
		height: 54px;
		margin-left: 7px;
		margin-top: 2px;
		padding: 2px;
		background-color: #FFFFFF;
	}

	.sociales_sidebar_block_node_news {
		float: left;
		margin-top: 5px;
		margin-left: 10px;
	}

	.sociales_sidebar_block_node_news_title {
		font-weight: bold;
		font-size: 0.85em;
	}

	.sociales_sidebar_block_node_news_title a {
		color: #000000;
	}

	.sociales_sidebar_block_node_news_body {
		font-size: 0.75em;
		color: #7C7C7C;
		height: 18px;
	}

	.sociales_sidebar_block_node_news_viewmore {
		font-size: 0.75em;
		text-decoration: none;
		color: #000000;
		float: right;
		margin-right: 10px;
		padding-left: 180px;
	}
	
	.sociales_sidebar_block_node_news_viewmore a {
		text-decoration: none;
		color: #000000;	
	}
	
	.sidebar_block_node_day, .sidebar_block_node_monthyear {
		margin-top: 0;
	}
	
	.gcba-sidebar-block .item-list-sociales {
		padding-top: 4px;
	}
</style>
<!--[if gte IE 8]><style>.sociales_sidebar_block_node_news_viewmore {margin-bottom: 2px;}</style><![endif]-->
<!--[if gte IE 9]><style>.view-display-id-sociales_sidebar {padding-top: 2px;}</style><![endif]-->

<div class="gcba-sidebar-block">
	<div id="sociales-sidebar-title" class="gcba-title"></div>
	<div class="gcba-item-list item-list-sociales">
		<?php $i = 0 ?>
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php $date = date_parse($row_fields["field_fecha_evento"]); ?>
		<?php
			if (preg_match('/href="(.*)"/', $row_fields["title"], $matches)) {
				$nodeUrl = $matches[1];
			} else {
				$nodeUrl = null;
			}
		?>
  		<div class="gcba-item" style="padding-left: 0px; padding-top: 2px;">
  			<div style="float:left; width:125px">
  				<div class="sidebar_block_node_day"><?php echo $date['day'] ?></div>
	  			<div class="sidebar_block_node_monthyear">
	  				<span class="sidebar_block_node_month"><?php echo $date['month'] ?></span>
	  				<span><?php echo $date['year'] ?></span>
	  			</div>
	  			<div class="sociales_sidebar_block_node_news">
	  				<div class="sociales_sidebar_block_node_news_title"><?php echo $row_fields["title"] ?></div>	  				
	  			</div>
  			</div>
  			<div class="sociales_sidebar_block_node_image">
  				<div class="imagen-listado">
  					<span class="span-izquierdo enlarged-left-shadow"></span>
  					<span class="span-derecho enlarged-right-shadow"></span>
  					<?php echo $row_fields["field_imagen_articulo_sociales"] ?></div>
  				</div>
  			<div style="clear: both"></div>
  			<div class="sociales_sidebar_block_node_news">
  				<div class="sociales_sidebar_block_node_news_body"><?php echo $row_fields["body"] ?></div>
  			</div>
  			<div class="sociales_sidebar_block_node_news_viewmore"><a href="<?php echo $nodeUrl ?>"><img src="/themes/bartik/images/ver_mas_amarillo.png" alt="Ver M&aacute;s" title="Ver M&aacute;s"></a></div>
  		</div>
  		<div style="clear: both"></div>
  		<?php include("puntos.php") ?>
  		<?php endforeach ?>
  	</div>
  	<?php include("puntos.php") ?>
</div>
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
	#periodico-sidebar-title {
		background: url("/themes/bartik/images/periodico_sidebar_title.png") no-repeat;
	}

	.periodico_sidebar_block_node_image {
		float: left;
		width: 59px;
		height: 64px;
		margin-left: 2px;
		margin-right: 5px;
		background-color: #FFFFFF;
		background: url("/themes/bartik/images/periodico_sidebar_thumbnail.png") no-repeat;
	}

	.periodico_sidebar_block_node_edicion{
		color:#fbbd00;
		font-size: 1.2em;
		font-weight: bold;
	}

	.periodico_sidebar_block_node_mes {
		text-transform:uppercase;
		font-weight: bold;
		font-size: 0.75em;
	}

	.periodico_sidebar_block_node_body {
		font-size: 0.75em;
		color: #7C7C7C;
	}

	.periodico_sidebar_block_node_viewmore {
		font-size: 0.75em;
		color: #000000;
		float: right;
		margin-right: 10px;
		margin-top: -6px;
		cursor: pointer;
	}
	
	.periodico_sidebar_block_node_viewmore a {
		text-decoration: none;
		color: #000000;
	}

</style>
<!--[if IE 8]><style>.periodico_sidebar_block_node_viewmore {margin-top: -4px;}</style><![endif]-->

<div class="gcba-sidebar-block">
	<div id="periodico-sidebar-title" class="gcba-title">
	</div>
	<div class="gcba-item-list">
		<?php $i = 0 ?>
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php
			$nodeUrl = "periodico#overlay=periodico/".$row_fields["title"];
			$nodeUrl = str_replace(' ', '-', $nodeUrl);
		?>
  		<div class="gcba-item">
			<div class="periodico_sidebar_block_node_image"></div>
			<div class="periodico_sidebar_block_node_mes">
				<span class="periodico_sidebar_block_node_edicion">EDICION</span> | <?php echo $row_fields["field_mes_periodico_digital"] ?></div>
			<div class="periodico_sidebar_block_node_body"><?php echo $row_fields["body"] ?></div>
			<div class="periodico_sidebar_block_node_viewmore">
				<a href="<?php print $nodeUrl ?>">
					<img src="/themes/bartik/images/periodico_ver_mas.png" alt="Ver M&aacute;s" title="Ver M&aacute;s">
				</a>
			</div>
  		</div>
  		<div style="clear: both"></div>  		
  		<?php endforeach ?>
  		<?php include("puntos.php") ?>
  		<?php include("puntos.php") ?>
  	</div>
</div>


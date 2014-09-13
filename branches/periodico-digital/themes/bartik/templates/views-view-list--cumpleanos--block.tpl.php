<style>
	#cumpleanos-sidebar-title {
		background: url("/themes/bartik/images/cumpleanos_sidebar_title.png") no-repeat;
	}

	.cumpleanos_sidebar_block_node_news_title {
		font-weight: bold;
		font-size: 0.85em;
		float: left;
		margin-top: 10px;
		margin-left: 10px;
	}
	
	.gcba-sidebar-block {
		margin: 0px;	
	}

</style>

<div class="gcba-sidebar-block">
	<div id="cumpleanos-sidebar-title" class="gcba-title"></div>
	<div class="gcba-item-list">
		<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php $date = date_parse($row_fields["field_fecha_de_nacimiento"]); ?>
  		<div class="gcba-item" style="padding-left: 0px; padding-bottom: 5px; padding-top: 5px;">
			<div class="sidebar_block_node_day"><?php echo $date['day'] ?></div>
  			<div class="sidebar_block_node_monthyear">
  				<span class="sidebar_block_node_month"><?php echo $date['month'] ?></span>
  				<span><?php echo date('Y') ?></span>
  			</div>
  			<div class="cumpleanos_sidebar_block_node_news_title"><?php echo $row_fields["field_nombre"]?> <?php echo $row_fields["field_apellido"] ?></div>
  		</div>
  		<div style="clear: both"></div>
  		<?php include("puntos.php") ?>
  		<?php endforeach ?>
  	</div>
  	<?php include("puntos.php") ?>
</div>


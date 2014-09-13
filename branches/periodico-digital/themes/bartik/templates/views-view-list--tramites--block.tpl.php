<style>
#ultimas-noticias-title {
	background: url("/themes/bartik/images/tramites_titulo_block.png") no-repeat;
	width: 697px;
}

.tramites_principal_block_node {
	float: left;
	width: 210px;
	background-color:#eeeeee;
	margin-right: 3px;
	height: 80px;
	overflow: hidden;
}

.tramites_principal_block_node_image {
	float: left;
	margin-left: 1px;
	margin-top: 5px;
	border-right: dotted 1px #b8b8b8;
	line-height: 1em;
	padding-right: 3px;
}

.tramites_principal_block_node_place_title {
	text-transform: uppercase;
	font-size: 0.75em;
	font-weight: bold;
	float: left;
	width: 139px;
	height: 40px;
	margin-top: 5px;
	margin-left: 3px;
	margin-right: 3px;
	margin-bottom: 5px;
	border: solid 1px #FFFFFF;
	padding-top: 25px;
	padding-left: 10px;
	padding-right: 5px;
	background: url("/themes/bartik/images/fondo-tramites-block.png") repeat-x left bottom;
	text-align: left;
}

.tramites_principal_block_node_place_title a {
	text-decoration: none;
	color: #767676;
}

.tramites_principal_block_node_place_title a:hover {
	color: #00458F;
}

.multiline-title {
	padding-top: 18px;
	height: 47px;
} 
</style>

<div id="ultimas-noticias-title" class="gcba-title">	
</div>
<div class="gcba-item-list">
	<?php $i = 0; ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
		<?php if ($i > 0 && $i % 3 === 0): ?>
		<div style="clear: both;"></div>
		<?php include("puntos.php") ?>
		<?php endif ?>
		<div class="tramites_principal_block_node_image"><?php echo $row_fields["field_imagen_catergoria_tramites"] ?></div>
		<div class="tramites_principal_block_node_place_title rounded-corners <?php if (strlen(strip_tags($row_fields["title"])) > 20): ?>multiline-title<?php endif ?>"><?php echo $row_fields["title"] ?></div>		
	<?php $i++ ?>
    <?php endforeach; ?>
    <div style="clear: both"></div>
</div>
<style>
#ultimas-noticias-title {
	background: url("/themes/bartik/images/ultimas_novedades_titulo.png") no-repeat;
	width: 697px;
}

.noticias_ultimas_noticias_content {
	float: left;
	padding-top: 8px;
	padding-left: 20px;
}

.block-principal-nodes {
	margin-right: 25px;
}

.ultimas_noticias_node {
	margin-top: 1px;
	float: left;
	padding-bottom: 10px;
}

.noticias_ultimas_noticias_content_title {
	text-transform: uppercase;
	font-weight: bold;
	font-size: 0.8em;
	color: #00458F;
}
</style>

<div id="ultimas-noticias-title" class="gcba-title">
	<a href="/sociales">
		<div class="viewall-link"><a href="/sociales">Ver Todas</div>
		<div class="viewall-link viewall-link-image">		
			<img src="/themes/bartik/images/flecha-ver-todos.png" />
		</div>	
	</a>
</div>
<div class="gcba-item-list">
	<?php $i = 0 ?>
	<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
	<?php if ($i > 0 && $i < count($view->style_plugin->rendered_fields)): ?>
		<?php include("puntos.php") ?>
	<?php endif ?>
	<?php $date = date_parse($row_fields["field_fecha_evento"]); ?>
	<div class="gcba-item">
		<div class="principal_block_node_day"><?php echo $date['day'] ?></div>
		<div class="principal_block_node_monthyear">
			<span class="principal_block_node_month"><?php echo $date['month'] ?></span>
			<span><?php echo $date['year'] ?></span>
		</div>
		<div class="noticias_ultimas_noticias_content">
			<span class="noticias_ultimas_noticias_content_title"><?php echo $row_fields["title"] ?></span><br />
			<span class="noticias_section_node_news_subtitle subtitle"><?php echo $row_fields["field_resumen_articulo_sociales"] ?></span>
		</div>
	</div>
	<div style="clear: both"></div>
	<?php $i++ ?>
	<?php endforeach ?>
</div>
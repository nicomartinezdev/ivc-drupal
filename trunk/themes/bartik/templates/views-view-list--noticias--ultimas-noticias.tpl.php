<style>
#ultimas-noticias-title {
	background: url("/themes/bartik/images/ultimas_noticias_titulo.png") no-repeat;
	width: 697px;
}

.noticias_ultimas_noticias_content {
	float: left;
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
}

.noticias_ultimas_noticias_content_title a {
	text-decoration: none;
	color: #00458F;
}
</style>

<div id="ultimas-noticias-title" class="gcba-title">	
	<a href="/noticias">
	<div class="viewall-link">Ver Todas</div>
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
	<?php $parsedDate = explode("-", $row_fields["created"]) ?>
	<div class="gcba-item">
		<div class="principal_block_node_day"><?php echo htmlspecialchars($parsedDate[0]) ?></div>
		<div class="principal_block_node_monthyear">
			<span class="principal_block_node_month"><?php echo htmlspecialchars($parsedDate[1]) ?></span>
			<span><?php echo htmlspecialchars($parsedDate[2]) ?></span>
		</div>
		<div class="noticias_ultimas_noticias_content">
			<span class="noticias_ultimas_noticias_content_title"><?php echo $row_fields["title"] ?></span><br />
			<span class="noticias_section_node_news_subtitle subtitle"><?php echo $row_fields["field_subtitle"] ?></span>
		</div>
	</div>
	<div style="clear: both"></div>
	<?php $i++ ?>
	<?php endforeach ?>
</div>

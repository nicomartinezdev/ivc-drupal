<style>
	.bienvenida {
		color: #000000;
		text-transform: uppercase;
		float: right;
	}
	
</style>
<div class="bienvenida">
    <?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
      BIENVENIDO, <b><?php print $row_fields["field_nombre"].' '.$row_fields["field_apellido"]; ?></b>
    <?php endforeach; ?>
</div>
<?php foreach ($view->style_plugin->rendered_fields as $row_fields): ?>
	<div>
  		<a href="<?php echo $row_fields["field_link_publicidad_home"] ?>">
  			<?php echo $row_fields["field_imagen_pub"] ?>
  		</a>
  	</div>
<?php endforeach ?>
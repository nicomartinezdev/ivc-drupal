<?php

/**
 * @file jcarousel-view.tpl.php
 * View template to display a list as a carousel.
 */
?>
<style>
.jcarousel-container {
	width: 748px;
	overflow: hidden;
	margin: 0;
	border: solid 1px #CCCCCC;
	height: 266px;
}

.jcarousel-clip-horizontal {
	padding: 3px;
	width: 750px;
}

.destacadas_principal_boton {
	height: 260px;
	width: 30px;
	position: absolute;
	z-index: 1;
	text-align: center;
}

.destacadas_principal_boton img {
	margin-top: 120px;
}

.jcarousel-next {
	margin-left: 716px;
	margin-top: -264px;
	margin-bottom: 0px;
}	
	

.destacadas_principal_noticia {
	color: #FFFFFF;
	height: 250px;
	width: 300px;
	position: absolute;
	z-index: 1;
	margin-top: -275px;
	margin-left: 385px;
	display: none;
	padding: 10px;
}

.destacadas_principal_noticia_title {
	margin-top: 60px;
	text-transform: uppercase;
	padding-bottom: 10px;
	border-bottom: solid thin #FFFFFF;
	font-size: 1.2em;
}

.destacadas_principal_noticia_title a {
	color: #FFFFFF;	
}

.destacadas_principal_noticia_body {
	margin-top: 20px;
}

.reduced-opacity {
	background-color:rgba(127,128,133,0.7);
}

.full-opacity {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}

.jcarousel-clip-horizontal {
	width: 750px;
}

.boton_prev {
	margin-top: 4px;
	margin-left: 5px;
}
</style>

<!--[if IE 8]><style>.reduced-opacity {background-color: rgb(127,128,133); -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)}</style><![endif]-->

<div class="boton_prev destacadas_principal_boton reduced-opacity jcarousel-prev"><img src="/themes/bartik/images/jcarousel-previous.png" /></div>
<ul class="<?php print $jcarousel_classes; ?>" id="destacadas_principal_listado">  
  <?php foreach ($view->style_plugin->rendered_fields as $id => $row_fields): ?>
    <li class="<?php print $row_classes[$id]; ?>" id="destacada_principal_imagen_<?php echo $id ?>">    	
    	<?php print $row_fields["field_imagen_destacada"]; ?>
    	<div class="destacadas_principal_noticia reduced-opacity" id="destacada_principal_noticia_<?php echo $id ?>">
			<div class="full-opacity destacadas_principal_noticia_title"><?php print $row_fields["title"] ?></div>
			<div class="full-opacity destacadas_principal_noticia_body"><?php print $row_fields["body"] ?></div>	
		</div>
	</li>
  <?php endforeach; ?>
</ul>
<div class="destacadas_principal_boton reduced-opacity jcarousel-next"><img src="/themes/bartik/images/jcarousel-next.png" /></div>
<div style="clear: both"></div>
<script type="text/javascript">
jQuery("#destacadas_principal_listado > li").hover(
	function() {
		jQuery(this).children(".destacadas_principal_noticia").show();
	},
	function() {
		jQuery(this).children(".destacadas_principal_noticia").hide();
	}
)

</script>
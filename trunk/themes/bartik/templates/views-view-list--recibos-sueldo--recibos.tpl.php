<style>
#recibos-title {
	background: url("/themes/bartik/images/recibos_sueldo_titulo.png") no-repeat;
}
	
#recibos-subtitle {
	color: #00458F;
	text-transform: uppercase;
	font-weight: bold;
}

#recibos-container {
	padding-left: 15px;
	padding-top: 20px;
}

#recibos-filter-container {
	float: left;
	width: 195px;
}

#recibos-viewer-container {
	float: left;
	width: 502px;
	margin-left: 10px;
}

#recibos-filter-title {
	background: url("/themes/bartik/images/recibos_anteriores_titulo.png") no-repeat;
}

#recibos-viewer-title {
	padding-top: 5px;
	color: #767676;
	text-transform: uppercase;
	font-weight: bold;
	margin-bottom: 8px;
}

.gcba-item-list .separator {
	width: 98%;
	height: 1px;
	margin-top: 20px;
	margin-bottom: 20px;
}

.recibos-month-filter-line-item {
	background-color: #E1E1E1;
	float: right;
	padding: 5px;
	margin-top: 5px;
	margin-bottom: 5px;
	margin-right: 5px;
	width: 77px;
	text-align: center;
	border: solid thin #FFFFFF;
	text-transform: uppercase;
	font-size: 0.8em;
	cursor: pointer;
	font-family: "gotham_mediumregular";
	color: #555555;
}

.recibos-month-filter-line-item:hover, .recibos-month-filter-line .active {
	background: url("/themes/bartik/images/fondo_boton_menu.png") repeat-x;
	color: #FFFFFF;
	overflow: hidden;
}

.recibos-month-filter-line {
	width: 195px;
}

.recibos-month-filter-line .first {
	float: left;
	margin-left: 5px;
}

#recibos-year-filter-value {
	float: right;
}

#recibos-year-filter {
	width: 195px;
	font-size: 0.95em;
	font-weight: bold;
	margin-top: 15px;
	margin-bottom: 10px;
}

#recibos-year-filter select {
	color: #00458F;
	font-weight: bold;
	margin-right: 2px;
	margin-top: -1px;
}

#recibos-filter-form-container {
	background-color: #F1F1F1;
	width: 195px;
	margin-top: 5px;
	margin-bottom: 10px;
}

#recibos-viewer-container .recibo-sueldo {
	width: 95%;
	height: 429px;
}

#recibos-viewer-actions .action-item {
	float: right;
	font-size: 0.8em;
	text-transform: uppercase;
	color: #00458F;
	font-weight: bold;
	margin-top: 17px;
	margin-left: 15px;
}

#recibos-viewer-actions .action-item a {
	text-decoration: none;
	color: #00458F;
	cursor: pointer;
}

#recibos-viewer-actions {
	margin-right: 25px;
}

#recibos-viewer-actions .action-logo {
	border-left: solid 1px #9E9E9E;
	padding-left: 8px;
	height: 20px; 	
	margin-bottom: 10px;
	margin-top: 10px;
	margin-left: 3px;
}

#recibos-viewer-actions .action-logo img {
	margin-top: -7px;
}

#recibos-viewer-no-results-text {
	font-size: 0.85em;
	padding: 3px;
}
</style>

<script type="text/javascript">
var baseUrl = "/recibos/";
jQuery(document).ready(function() {
	jQuery(".recibos-month-filter-line-item").bind("click", function(i) {
		window.location.href = baseUrl + jQuery("#recibos-year-filter-value").val() + "-" + jQuery(this).attr("id"); 
	});
});
</script>

<div class="gcba-maincontent-section">
	<div id="recibos-title" class="gcba-title"></div>
	<div class="gcba-item-list" id="recibos-container">
		<div id="recibos-subtitle">Visualiz&aacute; tu recibo y descargalo para su impresi&oacute;n</div>
		<div class="dotted-bottom dotted-top separator"></div>
		<div id="recibos-filter-container">
			<div id="recibos-filter-title" class="gcba-title"></div>
			<div id="recibos-year-filter">
				<img src="/themes/bartik/images/rrhh-bullet.png" /> Seleccionar a&ntilde;o: <select name="recibos-year-filter-value" id="recibos-year-filter-value">
				<?php for($i = $view->yearMinBoundary; $i <= $view->yearMaxBoundary; $i++): ?>
					<option value="<?php echo $i?>"><?php echo $i?></option>
				<?php endfor ?>
				</select>
				<div style="clear:both"></div>
			</div>
			<div id="recibos-filter-form-container">
				<div id="recibos-month-filter">
					<?php for($i = 1; $i <= 12; $i+=2): ?>
					<div class="recibos-month-filter-line">
						<div class="rounded-corners recibos-month-filter-line-item first<?php if ($view->selectedMonth === $i): ?> active<?php endif ?>" id="<?php echo ($i < 10 ? "0" . $i : $i) ?>">
							<?php echo t(gcba_recibos_sueldo_get_month($i)) ?>
						</div>
						<div class="rounded-corners recibos-month-filter-line-item<?php if ($view->selectedMonth === ($i + 1)): ?> active<?php endif ?>" id="<?php echo ($i + 1 < 10 ? "0" . ($i + 1) : ($i + 1)) ?>">
							<?php echo t(gcba_recibos_sueldo_get_month($i + 1)) ?>
						</div>	
					</div>
					<div style="clear:both"></div>
					<div class="dotted-bottom dotted-top" style="height: 1px; width: 100%"></div>
					<?php endfor ?>
				</div>
			</div>
		</div>
		<?php if (!$view->result || $view->result[0]->fileUrl === ""): ?>
		<div id="recibos-viewer-container">
			<div id="recibos-viewer-title">
				<img src="/themes/bartik/images/rrhh-bullet.png" /> Recibo no encontrado
			</div>
			<div id="recibos-viewer-no-results-text">
				No se encontr&oacute; Recibo de Sueldo para el mes y año especificado. Por favor, reintente con otros utilizando los filtros a su izquierda.
			</div>
		</div>
		<?php else: ?>
		<div id="recibos-viewer-container">		
			<div id="recibos-viewer-title">
				<img src="/themes/bartik/images/rrhh-bullet.png" /> Recibo de sueldo de <?php echo $view->result[0]->month ?>
			</div>
			<div id="pdf" class="recibo-sueldo">
  				<a href="<?php echo $view->result[0]->fileUrl ?>" target="_blank">
					<img src="/themes/bartik/images/recibo-sample.png" title="Descargar" alt="Descargar recibo de sueldo"/>
				</a>
			</div>
			<div id="recibos-viewer-actions">
				<div>
					<div class="action-item action-logo">
						<a href="<?php echo $view->result[0]->fileUrl ?>" target="_blank">
							<img src="/themes/bartik/images/formularios_pdf.png" title="Descargar" alt="Descargar recibo de sueldo"/>
						</a>
					</div>
					<div class="action-item">
						<a href="<?php echo $view->result[0]->fileUrl ?>" target="_blank">Descargar</a>
					</div>
				</div>
			</div>
			
		</div>
		<?php endif ?>
		<div style="clear:both"></div>
	</div>
</div>

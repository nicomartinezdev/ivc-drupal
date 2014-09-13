<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 */
?>
<style>
	#content .section .content {
		background: #F6F6F6 url("/themes/bartik/images/resultado_busqueda_titulo.png") no-repeat;
		padding-top: 30px;
		width: 723px;
	}

	#edit-basic {
		background: url("/themes/bartik/images/beneficios_section_item_fondo.png");
		text-align: center;
		border: solid 1px #d3d3d3;
		-khtml-border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
		padding-top: 15px;
		margin-bottom: 10px;
	}

	#search-form input#edit-keys {
		float: none;
	}

	#search-form .form-type-textfield label {
		text-transform: uppercase;
		color: #00458F;
		font-weight: bold;
		font-size: 0.8em;
		display: inline;
	}

	#search-form input#edit-keys {
		width: 20em;
	}

	#search-form > div:first-child {
		padding-right: 15px;
		padding-left: 15px;
		padding-top: 10px;
	}

	.search-results {
		margin: 0px;
		padding: 10px;
	}
	
	.search-no-results {
		margin: 0px;
		padding: 10px;
		font-size: 0.8em;
		font-weight: bold;
		color: #00458f;
	}
	
	.search-no-results h2 {
		padding-left: 12px;
	}

	.search-form {
		margin: 0px;
	}

	#search-form fieldset.collapsed {
		height: 0em;
	}

	#search-form input.form-submit {
		cursor: pointer;
		border-radius: 5px;
		background: #100F10 url("/themes/bartik/images/buscar.png") no-repeat center center;
	}
	
</style>

<!--[if IE 8]>
<style>
.search-results li {
	border-bottom: none;
}
</style><![endif]-->

<?php if ($search_results): ?>
  <div class="dotted-bottom dotted-top" style="width: 98%; margin-left: 5px; height: 1px"></div>
  <div class="search-results">
  <ol class="search-results <?php print $module; ?>-results">
    <?php print $search_results; ?>
  </ol>
  </div>
  <?php print $pager; ?>
  <?php include("puntos.php") ?>
  <?php include("puntos.php") ?>
<?php else : ?>
<div class="search-no-results">  
	<h2><?php print t('Your search yielded no results'); ?></h2>
  <?php print search_help('search#noresults', drupal_help_arg()); ?>
  </div>
<?php endif; ?>

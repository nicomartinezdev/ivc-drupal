<?php

/**
 * @file
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type (or item type string supplied by module).
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 *
 * Other variables:
 * - $classes_array: Array of HTML class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $title_attributes_array: Array of HTML attributes for the title. It is
 *   flattened into a string within the variable $title_attributes.
 * - $content_attributes_array: Array of HTML attributes for the content. It is
 *   flattened into a string within the variable $content_attributes.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for its existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 * @code
 *   <?php if (isset($info_split['comment'])): ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 * @endcode
 *
 * To check for all available data within $info_split, use the code below.
 * @code
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 * @endcode
 *
 * @see template_preprocess()
 * @see template_preprocess_search_result()
 * @see template_process()
 */
?>
<style>
.gcba-node-date .node_day {
	float: left;
	color: #00458F;
	margin-left: 10px;
	padding-right: 5px;
	font-weight: bold;
	font-size: 0.8em;
}

.gcba-node-date .node_monthyear {
	float: left;
	border-left: solid 1px #CCCCCC;
	padding-left: 5px;
	font-size: 0.7em;
}

.gcba-node-date .node_month {
	font-weight: bold;
}

.resultado_busqueda_titulo {
	margin-top: 10px;
	margin-left: 10px;
}

.resultado_busqueda_titulo a {

	font-size: 0.8em;
	font-weight: bold;
	text-decoration: none;
	text-transform: uppercase;
	color: #00458F;
}

.search-snippet { 
	margin-left: 10px;
	font-size: 0.8em;
	width: 90%;
}

.gcba_node_viewmore {
	float: right;
	margin-top: -20px;
	margin-right: 10px;
	cursor: pointer;
}
</style>

<?php $parsedDate = date_parse_from_format("d/m/Y - H:i", $info_split["date"]); ?>
<li class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="gcba-node-date">
    <div class="node_day"><?php echo htmlspecialchars($parsedDate["day"]) ?></div>
    <div class="node_monthyear">
	  <span class="node_month"><?php echo htmlspecialchars($parsedDate["month"]) ?></span><br />
	  <span class="node_year"><?php echo htmlspecialchars($parsedDate["year"]) ?></span>
    </div>
    <div style="clear: both"></div>
  </div>  
  <div class="resultado_busqueda_titulo">
  	<a href="<?php print $url; ?>"><?php print $title; ?></a>
  </div>
  <?php print render($title_suffix); ?>
  <div class="search-snippet-info">
    <?php if ($snippet): ?>
      <p class="search-snippet"<?php print $content_attributes; ?>><?php print $snippet; ?></p>
    <?php endif; ?>
  </div>
  <div class="gcba_node_viewmore"><a href="<?php echo $url ?>"><img src="/themes/bartik/images/noticias_vermas_seccion.png" alt="Ver M&aacute;s" title="Ver M&aacute;s"></a></div>
  <div style="clear: both"></div>
  <div class="dotted-bottom dotted-top" style="width: 98%; margin-left: 5px; height: 1px"></div>
</li>

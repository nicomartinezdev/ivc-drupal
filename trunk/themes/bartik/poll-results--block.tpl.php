<?php
/**
 * @file
 * Default theme implementation to display the poll results in a block.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $results: The results of the poll.
 * - $votes: The total results in the poll.
 * - $links: Links in the poll.
 * - $nid: The nid of the poll
 * - $cancel_form: A form to cancel the user's vote, if allowed.
 * - $raw_links: The raw array of links. Should be run through theme('links')
 *   if used.
 * - $vote: The choice number of the current user's vote.
 *
 * @see template_preprocess_poll_results()
 */
?>
<style>
#encuesta-result-title {
	background: url("/themes/bartik/images/encuesta_principal_titulo.png") no-repeat;	
}

#encuesta-principal-block-results {
	padding-left: 15px;
	padding-right: 15px;
}

#encuesta-result-total {
	padding-right: 15px;
}
</style>

<div class="gcba-block-sidebar block-poll-size">
	<div id="encuesta-result-title" class="gcba-title">&nbsp;</div>
	<div class="gcba-item-list">
		<div class="poll">
		  <div class="gcba-sidebar-item-list-title"><?php print $title ?></div>
		  <div id="encuesta-principal-block-results">
		  <?php print $results ?>
		  </div>
		</div>
	</div>
	<?php include("templates/puntos.php") ?>
	<?php include("templates/puntos.php") ?>
</div>
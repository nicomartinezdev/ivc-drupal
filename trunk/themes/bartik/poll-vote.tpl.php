<?php

/**
 * @file
 * Default theme implementation to display voting form for a poll.
 *
 * - $choice: The radio buttons for the choices in the poll.
 * - $title: The title of the poll.
 * - $block: True if this is being displayed as a block.
 * - $vote: The vote button
 * - $rest: Anything else in the form that may have been added via
 *   form_alter hooks.
 *
 * @see template_preprocess_poll_vote()
 */
?>

<style>
.gcba-item-list .poll {
	height: 180px;
}


#encuesta-sidebar-title {
	background: url("/themes/bartik/images/encuesta_principal_titulo.png") no-repeat;	
}

.block-poll-blocks .form-item-choice {
	padding-left: 5px;
}

.block-poll-blocks .form-item-choice .option {
	font-size: 0.85em;
	color: #7C7C7C;
}

.block-poll-blocks .form-submit {
	border-radius: 5px;
	background: #F8BF00;
	color: #FFFFFF;
	font-weight: bold;
	margin-left: 10px;
	float: left;
	padding: 5px;
}

#encuesta-principal-block-viewresults {
	float: left;
	margin-top: 10px;
	margin-left: 10px;
}

#encuesta-principal-block-viewresults img {
	cursor: pointer;
}

#encuesta-principal-block-viewresults a {
	text-transform: uppercase;
	color: #000000;
	font-size: 0.85em;
}

.block-poll-blocks .links {
	display: none;
}

.poll .result-link {
	text-decoration: none;
}
</style>

<div class="gcba-sidebar-block block-poll-size">
	<div id="encuesta-sidebar-title" class="gcba-title">&nbsp;</div>
	<div class="gcba-item-list">
		<div class="poll">
		  <div class="vote-form">
		    <div class="choices">
		      <?php if ($block): ?>
		        <div class="gcba-sidebar-item-list-title"><?php print $title; ?></div>
		      <?php endif; ?>
		      <?php print $choice; ?>
		    </div>
		    <?php print $vote; ?>
		    <div id="encuesta-principal-block-viewresults">
		    	<a href="<?php print $viewResultsLink[0]["href"] ?>" class="result-link">
		    		<img src="/themes/bartik/images/encuesta_principal_vermas.png"> 
		    		Ver Resultados
		    	</a>
		    </div>
		    <div style="clear: both"></div>
		  </div>
		  <?php // This is the 'rest' of the form, in case items have been added. ?>
		  <?php print $rest ?>		  
		</div>
		<?php include("templates/puntos.php") ?>
		<?php include("templates/puntos.php") ?>
	</div>
	
</div>
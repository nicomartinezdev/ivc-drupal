<?php
 /* split the username and password from the submit button 
   so we can put in links above */

    $form['name']["#description"] = "";
	$form["name"]["#title"] = "CUIL";
	$form["name"]["#size"] = "50";
	$form["pass"]["#description"] = "";
	$form["pass"]["#title"] = "CLAVE";
	$form["pass"]["#size"] = "50";
?>

<style>
#login .gcba-maincontent-section {
	width: 100%;
}

#login .gcba-item-list {
	width: 492px;
	margin: auto;
}

#login-title {
	background: url("/themes/bartik/images/login_titulo.png") no-repeat top center;
}

#login-container {
	margin-top: 40px;
	margin-bottom: 30px;
}

#login-container #login-name, #login-container #login-pass {
	margin-left: 25px;
}

#login-container #login-name .bullet, #login-container #login-pass .bullet {
	margin-left: 10px;
	float: left;
	margin-right: 10px;
	margin-top: 6px;
}

#login-container #login-name label, #login-container #login-pass label {
	float: left;
	width: 60px;
	margin-top: 6px;
}

#login-container #login-name input, #login-container #login-pass input {
	-khtml-border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}

#login-container #edit-actions #edit-submit {
	color: #FFFFFF;
	-khtml-border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background: none;
	background-color: #00458F;
	font-family: "gotham_mediumregular";
	text-transform: uppercase;
	font-size: 0.8em;
}

#login-container #edit-actions {
	text-align: center;
}
</style>

<!--[if IE 8]><style>#login-container #login-name, #login-container #login-pass { margin-left: 30px; }</style><![endif]-->

<div id="login">
	<div class="gcba-maincontent-section">
		<div class="gcba-title" id="login-title"></div>
		<div class="gcba-item-list">
			<div id="login-container">
			    <div id="login-name">
			    	<div class="bullet" style="">
			    		<img src="/themes/bartik/images/flecha-login.png" />
			    	</div>
			    	<?php print drupal_render($form['name']); ?>
			    </div>
			    <div style="clear: both"></div>
			    <div id="login-pass">
			    	<div class="bullet">
			    		<img src="/themes/bartik/images/flecha-login.png" />
			    	</div>
			    	<?php print drupal_render($form['pass']); ?>
			    </div>
			    <?php
			    	
					
				    print drupal_render($form['form_build_id']);
				    print drupal_render($form['form_id']);
				    print drupal_render($form['actions']);
				?>
			</div>
			<?php include("puntos.php") ?>
			<?php include("puntos.php") ?>
		</div>
	</div>
</div>


<?

/*
 * Para que corra correctamente hay que setear la siguiente linea en el metodo ip_address() de bootstrap.inc:
 * 
 * $ip_address = "127.0.0.1";
 * 
 * En la linea 2800
 * 
 */

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$fp = fopen(DRUPAL_ROOT . "/Usuarios.csv", "r");
$i = 0;
while (($data = fgetcsv($fp, 0, ";")) !== FALSE) {
	 print_r("Procesando: " . $i++ . "\n");
	 $cuil = trim($data[2]);
	 $nroCuenta = trim($data[12]);
	 $email = trim($data[3]);	 
	 if (!empty($nroCuenta)) {
		 $user = array(
	        'name' => $cuil,
	        'pass' => substr($nroCuenta, strlen($nroCuenta) - 6, 6),
	        'mail' => !empty($email) && valid_email_address($email) ? $email : null,
	        'language' => "es",
	        'roles' => array( 2 => 2 ),
	        'status' => 1,
	     );
		 $userObj = user_save(null, $user);
		 if (!empty($data[11]) || !empty($data[1])) {
			 if (!empty($data[11])) {
			 	$parsedDate = date_parse_from_format("d/m/Y", trim($data[11]));
			 	$userObj->field_fecha_de_nacimiento["und"][0]['value'] = date(
			 		"Y-m-d",
			 		mktime(0,0,0,$parsedDate["month"], $parsedDate["day"], $parsedDate["year"], false
				));
			 }
			 if (!empty($data[1])) {
			 	$matches = array();
				if (preg_match("/([A-ZÑ'\\s]+) (.*)/", trim(utf8_encode($data[1])), $matches)) {
				 	$userObj->field_nombre["und"][0]['value'] =  ucwords(trim($matches[2]));
				 	$userObj->field_apellido["und"][0]['value'] = ucwords(strtolower(trim($matches[1])));
		 		}
			 }
			 user_save($userObj);
		 } 
	 }
}
fclose($fp);
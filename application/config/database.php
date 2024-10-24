<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group = 'default';
$active_record = TRUE;

// get department
$db['project'] = array(
	'hostname' => 'localhost',
	'username' => 'admin',
	'password' => 'nimdaintranet1220',
	'database' => 'subscription',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'autoinit' => TRUE,
	'stricton' => FALSE
);

$db['vendor'] = array(
	'hostname' => 'localhost',
	'username' => 'admin',
	'password' => 'nimdaintranet1220',
	'database' => 'premium_bi',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'autoinit' => TRUE,
	'stricton' => FALSE
);



/* End of file database.php */
/* Location: ./application/config/database.php */
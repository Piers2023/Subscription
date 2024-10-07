<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group = 'default';
$active_record = TRUE;

// get department
$db['project'] = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'password',
	'database' => 'project',
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
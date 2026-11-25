
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'        => '',
    'hostname'   => '103.56.206.71',
    'port'       => 5432,
    'username'   => 'postgres',
    'password'   => 'admin99',
    'database'   => 'postgres',
    'dbdriver'   => 'postgre',
    'dbprefix'   => '',
    'pconnect'   => FALSE,
    'db_debug'   => (ENVIRONMENT !== 'production'),
    'cache_on'   => FALSE,
    'cachedir'   => '',
    'char_set'   => 'utf8',
    'dbcollat'   => '',
    'swap_pre'   => '',
    'encrypt'    => FALSE,
    'compress'   => FALSE,
    'stricton'   => FALSE,
    'failover'   => array(),
    'save_queries' => TRUE
);

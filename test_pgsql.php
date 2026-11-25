<?php

echo 'PHP Version: ' . PHP_VERSION . '<br>';

echo 'PHP INI: ' . php_ini_loaded_file() . '<br>';

echo 'PostgreSQL Extension: ';

var_dump(extension_loaded('pgsql'));

echo '<br>';

echo 'pg_connect Function: ';

var_dump(function_exists('pg_connect'));
<?php

/**
 * Конфигурация необходимая для ядра
 *
 * Подключение к базе данных, определение констант
 */

$db_type = 'mysql';
$db_server = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_connection_charset = 'utf8';
$dbase = 'slepCMS';
$table_prefix = 'slep_';
$db_dsn = 'mysql:host=' . $db_server . ';dbname=' . $dbase . ';charset=' . $db_connection_charset;

!defined('SLEP_CONTROLLER_PATH') && define('SLEP_CONTROLLER_PATH', SLEP_CORE_PATH . '/Controller/');
!defined('SLEP_MODEL_PATH') && define('SLEP_MODEL_PATH', SLEP_CORE_PATH . '/Model/');

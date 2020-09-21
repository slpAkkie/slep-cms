<?php

/**
 * Первичная проверка, анализ запроса и инициализация объекта приложения
 *
 * Запускаем Bootstrap.php для анализа запроса и его разбивки
 * Запускаем Route.php с данными из Bootrsrap.php
 *
 * @author slpAkkie
 */

include_once('./config.php');
include_once(SLEP_CONFIG_CORE_PATH . 'config.core.php');
include_once(SLEP_CORE_PATH . 'Bootstrap.php');
include_once(SLEP_CORE_PATH . 'Route.php');

/** Отправляем на разброку запрос */
$bootstrap_response = Bootstrap::dissassemble($_GET);
/** Отправляем на поиск запрошенной страницы */
$route_response = Route::find($bootstrap_response);

/** Устанавливаем имя контроллера страниц */
$controller_name = 'Web';

/** Проверяем была ли страница найдена */
if (!$route_response)
  /** Если страницы нет, измяняем имя контроллера на контроллер страниц ошибок */
  $controller_name = 'Error';

/** Пытаемся подключить контроллер */
if (!@include_once(SLEP_CONTROLLER_PATH . $controller_name . '_Controller.php'))
  /** Если не получается умираем */
  die('В конфигурации произошла не предвиденная ошибка, пожалуйста обратитесь к администратору');

/** Загружаем базовый контроллер */

/** Создаем контроллер */
$controller = new ErrorController($_GET);
/** Запускаем его на исполнение */
$controller->start();

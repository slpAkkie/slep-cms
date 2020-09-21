<?php

require_once(SLEP_CONTROLLER_PATH . 'Controller.php');

/**
 * Контреллер на случай, когда на запрос была найдена страница
 *
 * Подключает свою Web_Model.php
 * Запрашивает страницу из БД
 * Загружает необходимые для нее данные
 * Включает теги и блоки
 * Собирает шаблон
 * Возвращает ответ клиенту в виде страницы
 */

class WebController extends Controller {

  /**
   * Реализует абстрактный метод класса Controller
   */
  public function __construct($options = array()) {
    return;
  }

  /**
   * Реализует абстрактный метод класса Controller
   */
  public function start() {
    return;
  }
}

<?php

/**
 * Базовый класс Controller для расширения дочерними классами
 */

abstract class Controller {

  /**
   * Создание объекта контроллера
   * @param array $options параметры, если они необходимы контроллеру для инициализации
   */
  abstract public function __construct($options = array());

  /**
   * Запускает работу контроллера
   */
  abstract public function start();

}

<?php

/**
 * Класс Bootstrap служит для анализа и разбивки запроса пользователя
 *
 * Разбивает строку запроса на массив содержащий массив пути и ассоциативный массив параметров
 *
 * @author slpAkkie
 */

class Bootstrap {

  /**
   * Разбивает строку запроса на составляющие
   * @param array $request $_GET массив
   *
   * @return array Ассоциативный массив. содержащий
   * array    $containers     массив контейнеров в цепочке запроса
   * string   $page           запрашиваемая страница
   * array    $params         ассоциативный массив $_GET параметров
   */
  static public function dissassemble($request) {
    return;
  }

}

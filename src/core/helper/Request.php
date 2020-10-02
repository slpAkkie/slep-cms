<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Helper;





/**
 * Класс Request
 *
 * Содержит информацию о запросе
 */
class Request
{



  /**
   * Исходная строка запросы
   *
   * @var string
   */
  private $initial;



  /**
   * Геттер для строки запроса
   *
   * @return string
   */
  public function getRequest() {
    return $this->initial;
  }



  /**
   * Каким методом был отправлен запрос
   *
   * @var string
   */
  private $method;



  /**
   * Геттер для метода
   *
   * @return string
   */
  public function getMethod() {
    return $this->method;
  }



  /**
   * Путь запроса
   *
   * @var string
   */
  public $path;



  /**
   * Аргументы запроса
   *
   * @var array
   */
  public $args;



  /**
   * Какой контроллер был запрошен
   *
   * @var string
   */
  public $controller;



  /**
   * Инициализация DI и метода запроса
   *
   * @param DI $di Объект класса DI
   * @param string $method Метод которым был отправлен запрос
   */
  public function __construct( $path, $method )
  {
    $this->initial = $path;
    $this->method = $method;
  }



  /**
   * Нормализует запрос, избавляется от ведущего и конечного '/'
   *
   * @param string $path Запрос
   *
   * @return string
   */
  public function normilizePath( $path ) {
    return preg_replace( '/^(\/(.*)\/|\/(.*))$/', '$2$3', $path );
  }



}

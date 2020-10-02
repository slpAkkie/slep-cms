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
   * Метод запроса
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
   * @var array
   */
  private $path;



  /**
   * Геттер для пути
   *
   * @return string
   */
  public function getPath() {
    return $this->path;
  }



  /**
   * Аргументы запроса
   *
   * @var array
   */
  private $args;



  /**
   * Геттер для аргументов
   *
   * @return string
   */
  public function getArgs() {
    return $this->args;
  }



  /**
   * Запрошенный контроллер
   *
   * @var string
   */
  private $controller;



  /**
   * Геттер для контроллера
   *
   * @return string
   */
  public function getController() {
    return $this->controller;
  }



  /**
   * Инициализация DI и метода запроса
   *
   * @param DI $di Объект класса DI
   * @param string $method Метод которым был отправлен запрос
   */
  public function __construct( string $method, array $path, array $args, string $controller )
  {
    $this->method = $method;
    $this->path = $path;
    $this->args = $args;
    $this->controller = $controller;
  }



  /**
   * Нормализует запрос, избавляется от ведущего и конечного '/'
   *
   * @param string $path Запрос
   *
   * @return string
   */
  public static function normilizePath( string $path ) {
    return preg_replace( '/^(\/(.*)\/|\/(.*))$/', '$2$3', $path );
  }



}

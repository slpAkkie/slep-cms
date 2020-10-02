<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Helper;





/**
 * Класс URL
 *
 * Предоставляет методы для обработки url
 */
class URL
{



  /**
   * Исходная строка URL
   *
   * @var string
   */
  private $initial;



  /**
   * Геттер для строки URL
   *
   * @return string
   */
  public function getUrl()
  {
    return $this->initial;
  }



  /**
   * Инициализация строки URL
   *
   * @param string url Строка URL
   */
  public function __construct( $url )
  {
    $this->initial = $url;
  }



  /**
   * Определяет валидность URL
   *
   * @return bool
   */
  public function validate()
  {
    return preg_match( '/^(https?:\/\/|http?:\/\/)?([\d\w\.-]+)\.([a-z0-9]{2,6}\.?)(\/[\w\.]+)*\/?(\?[\w\d=&]*){0,1}$/', $this->initial );
  }



}

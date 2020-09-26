<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Core;





/**
 * Абстрактный класс BaseController
 *
 * Описывает обязательные методы и поля для контроллеров
 */
abstract class BaseController {



  /**
   * Экземпляр класса DI
   *
   * @var DI
   */
  private $di;



  /**
   * Инициализация DI
   *
   * @param DI $di Объект класса DI
   */
  public function __construct( $di ) {
    $this->di = $di;
  }



}

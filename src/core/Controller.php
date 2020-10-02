<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Core;





/**
 * Абстрактный класс Controller
 *
 * Описывает обязательные методы и поля для контроллеров
 */
abstract class Controller
{



  /**
   * Экземпляр класса DI
   *
   * @var DI
   */
  protected $di;



  /**
   * Инициализация DI
   *
   * @param DI $di Объект класса DI
   */
  public function __construct( \Helper\DI $di )
  {
    $this->di = $di;
  }

  /**
   * Запускает контроллер на выполнение
   */
  abstract public function run();



}

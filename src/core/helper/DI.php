<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.2
 */

namespace Helper;





/**
 * Класс Dependencies Injection
 *
 * Хранит и дает доступ к зависимостям необходимые для работы приложения
 */
class DI
{



  /**
   * Ассоциативный массив всех зависимостей
   */
  private $container = array();



  /**
   * Получить зависимость по ключу
   *
   * @param string $key Имя запрашиваемой зависимости
   *
   * @return any - Возвращает зависимость любого типа или null если такой зависимости нет
   */
  public function get( $key )
  {
    return  $this->isset( $key )
            ? $this->$container[$key]
            : null;
  }



  /**
   * Установить зависимость по ключу
   *
   * @param string $key Имя зависимости
   * @param any $value Значение зависимости
   *
   * @return Возвращает экземляр класса DI
   */
  public function set( $key, $value )
  {
    $this->container[$key] = $value;

    return $this;
  }



  /**
   * Проверяет есть ли такая зависимость
   *
   * @param string $key Имя зависимости
   *
   * @return bool
   */
  private function isset( $key )
  {
    return  $this->$container[$key]
            ? true
            : false;
  }



}

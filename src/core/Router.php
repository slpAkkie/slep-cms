<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Core;

use Helper\DI;
use Helper\URL;
use Helper\Request;





/**
 * Класс Router
 *
 * Разбирает запрос и определяет запрашиваемый контекст и страницу
 */
class Router
{



  /**
   * Экземпляр класса DI
   *
   * @var DI
   */
  private $di;


  /**
   * Объект url
   *
   * @var URL
   */
  private $URL;


  /**
   * Запрос
   *
   * @var array
   */
  private $request;



  /**
   * Инициализация DI, URL и request
   *
   * @param DI $di Объект класса DI
   */
  public function __construct( $di )
  {
    $this->di = $di;

    $this->URL = new URL( $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
  }



  /**
   * Разбирает запрос
   *
   * @return array Запрошенный путь [path] и переданные аргументы [args]
   */
  public function dissasemble()
  {
    if ( !$this->URL->validate() ) die( 'Был передан не правильный запрос' );

    /**
     * Разобьем на две части: Запрос и аргументы
     */
    $requestArray = explode( '?', $_SERVER['REQUEST_URI'] );

    /**
     * Запишем какой путь был запрошен
     */
    $this->request['path'] = explode( '/', Request::normilizePath( $requestArray[0] ) );

    /**
     * Определим переданные аргументы
     */
    $requestArray[1] = explode( '&', $requestArray[1] );
    foreach ( $requestArray[1] as $i => $arg )
    {
      [$key, $value] = explode( '=', $arg );
      $this->request['args'][$key] = $value;
    }

    /**
     * Определим запрошенный контроллер
     */
    $this->identController();

    /**
     * Сохраним в зависимости запрос и url
     */
    $this->di->set('url', $this->URL);
    $this->di->set('request', new Request(
                                          $_SERVER['REQUEST_METHOD'],
                                          $this->request['path'],
                                          $this->request['args'],
                                          $this->request['controller']
                                          ) );
  }



  /**
   * Определяет контроллер
   * По умолчанию устанавливается контроллер Web, если был найден запрошенный контроллер, то устанавливается он
   */
  private function identController()
  {
    $this->request['controller'] = 'Web';

    if ( !$this->request['path'][0] ) return;

    if ( !file_exists( __DIR__ . '\\Controllers\\' . ucfirst( $this->request['path'][0] ) . '_Controller.php' ) ) return;
    else $this->request['controller'] = ucfirst( $this->request['path'][0] );
  }



}

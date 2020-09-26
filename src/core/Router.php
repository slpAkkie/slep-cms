<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Core;

use Helper\DI;





/**
 * Класс Router
 *
 * Разбирает запрос и определяет запрашиваемый контекст и страницу
 */
class Router {


  /**
   * Экземпляр класса DI
   *
   * @var DI
   */
  private $di;


  /**
   * Полный URL, по которому был произведен запрос
   *
   * @var string
   */
  private $URL;


  /**
   * Запрос
   *
   * @var string
   */
  private $request;


  /**
   * Разобранный запрос
   *
   * @var array
   */
  private $dRequest;



  /**
   * Инициализация DI, URL и request
   *
   * @param DI $di Объект класса DI
   */
  public function __construct( $di ) {
    $this->di = $di;

    $this->URL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $this->request = $_SERVER['REQUEST_URI'];
  }



  /**
   * Разбирает запрос
   *
   * @return array Запрошенный путь [path] и переданные аргументы [args]
   */
  public function dissasemble() {
    if ( !$this->checkURL() ) die( 'Был передан не правильный запрос' );

    /**
     * Разобьем на две части: Запрос и аргументы
     */
    $requestArray = explode( '?', $this->request );

    /**
     * Запишем какой путь был запрошен
     */
    $this->dRequest['path'] = explode( '/', $this->normilizeRequest( $requestArray[0] ) );

    /**
     * Определим переданные аргументы
     */
    $requestArray[1] = explode( '&', $requestArray[1] );
    foreach ( $requestArray[1] as $i => $arg ) {
      [$key, $value] = explode( '=', $arg );
      $this->dRequest['args'][$key] = $value;
    }

    /**
     * Определим запрошенный контроллер
     */
    $this->identController();

    /**
     * Сохраним в зависимости разобранный запрос
     */
    $this->di->set('requestData', $this->dRequest);
  }



  /**
   * Определяет контроллер
   * По умолчанию устанавливается контроллер Web, если был найден запрошенный контроллер, то устанавливается он
   */
  private function identController() {
    $this->dRequest['controller'] = 'Web';

    if ( !$this->dRequest['path'][0] ) return;

    if ( !file_exists( __DIR__ . 'Controllers/' . ucfirst( $this->dRequest['path'][0] ) . '_Controller.php' ) ) return;
    else $this->dRequest['controller'] = ucfirst( $this->dRequest['path'][0] );
  }



  /**
   * Определяет валидность запрошенного URL
   *
   * @return bool
   */
  private function checkURL() {
    return preg_match( '/^(https?:\/\/|http?:\/\/)?([\d\w\.-]+)\.([a-z0-9]{2,6}\.?)(\/[\w\.]+)*\/?(\?[\w\d=&]*){0,1}$/', $this->URL );
  }



  /**
   * Нормализует запрос, избавляется от ведущего и конечного '/'
   *
   * @param string $path Запрос
   *
   * @return string
   */
  private function normilizeRequest( $path ) {
    return preg_replace( '/^(\/(.*)\/|\/(.*))$/', '$2$3', $path );
  }


}

<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace App\Core;

use App\Helper\DI;

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
   * Полный URL, по которому был произведен запрос
   *
   * @var string
   */
  private $URL;

  /**
   * Запрос
   *
   * @var string|array
   */
  private $request;


  /**
   * Инициализация DI, URL и request
   *
   * @param DI $di Объект класса DI
   */
  public function __construct($di) {
    $this->di = $di;

    $this->URL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $this->request = $_SERVER['REQUEST_URI'];
  }


  /**
   * Work in progress
   */
  public function dissasemble() {
    if (!$this->checkURL()) die('Был передан не правильный запрос');

    $this->request = explode('?', $this->request);

    if (count($this->request) > 2) die('Был передан не правильный запрос');

    $this->request[0] = $this->normilizeRequest($this->request[0]);

    print_r($this->request);
  }


  /**
   * Определяет валидность запрошенного URL
   *
   * @return bool
   */
  private function checkURL() {
    return preg_match('/^(https?:\/\/|http?:\/\/)?([\d\w\.-]+)\.([a-z0-9]{2,6}\.?)(\/[\w\.]+)*\/?(\?[\w\d=]*){0,1}$/', $this->URL);
  }


  /**
   * Нормализует запрос, избавляется от ведущего и конечного '/'
   *
   * @param string $path Запрос
   *
   * @return string
   */
  private function normilizeRequest($path) {
    return preg_replace('/^(\/(.*)\/|\/(.*))$/', '$2$3', $path);
  }


}

<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

use Core\Controller;





/**
 * Контроллер Web контекста
 */
class WebController extends Controller {



  public function run() {
    print_r($this->di->get('request')->getArgs()['action']);
  }



}

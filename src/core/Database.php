<?php

/**
 * Класс для работы с базой данных
 * Наследут PDO
 *
 * @author slpAkkie
 */

class Database extends PDO {

  public function __construct($dsn, $user, $password) {
    parent::__construct($dsn, $user, $password);
  }

}

<?php

/**
 * Этот файл является компонентном slepCMS.
 *
 * @author Shamanin Alexander
 * @version 0.0.1
 */

namespace Core;

use \PDO;





/**
 * Класс Database
 *
 * Запросы к базе данных на базе PDO
 */
class Database
{



  /**
   * Объект соединения с базой данных
   *
   * @var PDO
   */
  private $connection;



  /**
   * Установить соединение с БД
   */
  public function __construct()
  {
    $this->connect();
  }



  /**
   * Устанавливает соединение с БД по средствам PDO
   */
  private function connect()
  {
    /**
     * TODO: Пренести в отдельный config файл
     */
    $config = array(
      'host'      => 'localhost',
      'dbname'    => 'slepcms',
      'charset'   => 'utf8',
      'username'  => 'root',
      'password'  => 'root'
    );

    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'] . '';

    /**
     * TODO: Сделать обработку ошибок при подключении к БД
     */
    $this->connection = new PDO( $dsn,  $config['username'], $config['password'] );
  }



  /**
   * Выполнить sql команду (Создание, Удаление, Добавление, Модификация)
   *
   * @param string @sql SQL команда
   *
   * @return PDOStatement Возвращает объект запроса
   */
  public function execute( $sql )
  {
    $request = $this->connection->prepare( $sql );

    return $request->execute() ? $request : null;
  }



  /**
   * Выполнить sql команду (Выборка)
   *
   * @param $sql SQL команда
   *
   * @return array Массив строк выборки
   */
  public function query( $sql )
  {
    $request = $this->execute( $sql );

    if ( $request === null ) die( 'Запрос к базе данных привел к ошибке' );

    $result = $request->fetchAll( PDO::FETCH_ASSOC );

    return !$result ? array() : $result;
  }



}

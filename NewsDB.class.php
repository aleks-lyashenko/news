<?php
require "INewsDB.class.php";
class NewsDB implements INewsDB
{
  const DB_NAME = 'news.db';
  const ERR_PROPERTY = "Wrong property name";
  private $_db;
  function __construct()
  {
    $this->_db = new PDO('sqlite:' . self::DB_NAME);
    // Проверка пустой ли файл
    if (!filesize(self::DB_NAME)) {
      try {
        $sql = "CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER)";

        if (!$this->_db->exec($sql)) {
          throw new Exception("Create msgs Error");
        }

        $sql = "CREATE TABLE category(
                id INTEGER,
                name TEXT)";

        if (!$this->_db->exec($sql)) {
          throw new Exception("Create category Error");
        }

        $sql = "INSERT INTO category(id, name)
      SELECT 1 as id, 'Работа' as name UNION SELECT 2 as id, 'Культура' as name UNION SELECT 3 as id, 'Спорт' as name";
        if (!$this->_db->exec($sql)) {
          throw new Exception("Category Error");
        }
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
  }
  function __destruct()
  {
    unset($this->_db);
  }
  function __get($name)
  {
    if ($name == "db") {
      return $this->_db;
    }
    throw new Exception(self::ERR_PROPERTY);
  }

  function __set($name, $value)
  {
    throw new Exception(self::ERR_PROPERTY);
  }

  function saveNews($title, $category, $description, $source)
  {
    $dt = time();
    $sql = "INSERT INTO msgs(title, category, description, source, datetime) VALUES($title, $category, $description, $source, $dt)";
    return $this->_db->exec($sql);
  }

  //промежуточный метод
  function db2Arr($data)
  {
    $arr = [];
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
      $arr[] = $row;
    }
    return $arr;
  }

  function getNews()
  {
    $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime FROM msgs, category WHERE category.id = msgs.category ORDER BY msgs.id DESC";
    $items = $this->_db->query($sql);
    if (!$items) {
      return false;
    }
    return $this->db2Arr($items);
  }

  function deleteNews($id)
  {
    $sql = "DELETE FROM msgs WHERE id = $id";
    return $this->_db->exec($sql);
  }
  function escape($data)
  {
    return $this->_db->quote(trim(strip_tags($data)));
  }
}

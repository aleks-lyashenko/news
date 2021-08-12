<?php
$items = $news->getNews();
if ($items === false) {
  $errMsg = "Произошла ошибка при выводе новостей";
} elseif (!count($items)) {
  $errMsg = "Новостей пока нет";
} else {
  foreach ($items as $item) {
    $dt = date("d-m-Y H:i:s", $item["datetime"]);
    $desc = nl2br($item["description"]);
    echo <<<ITEM
    <h3>{$item['title']}</h3>
    <p>
      $desc<br>
      {$item['category']}<br>
      @ $dt
    </p>
    <p align="right">
      <a href='news.php?del={$item['id']}'>Удалить</a>
    </p>
ITEM;
  }
}

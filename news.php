<?php
require "NewsDB.class.php";
$news = new NewsDB();
$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "save_news.inc.php";
}

if (isset($_GET['del'])) {
  require "delete_news.inc.php";
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Новостная лента</title>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="py-3 text-center">Последние новости</h1>
        <?php
        if ($errMsg) {
          echo "<h3>$errMsg</h3>";
        }
        require "get_news.inc.php";
        ?>

        <hr>

        <h3>Добавьте новую статью</h3>

        <form class="pb-5" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
          Заголовок новости:<br />
          <input type="text" name="title" /><br />
          Выберите категорию:<br />
          <select name="category">
            <option value="1">Политика</option>
            <option value="2">Культура</option>
            <option value="3">Спорт</option>
          </select>
          <br />
          Текст новости:<br />
          <textarea name="description" cols="50" rows="5"></textarea><br />
          Источник:<br />
          <input type="text" name="source" /><br />
          <br />
          <input type="submit" value="Добавить!" />
        </form>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
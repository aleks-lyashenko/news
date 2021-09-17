<?php
require "NewsDB.class.php";
$news = new NewsDB();
$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "inc\save_news.inc.php";
}

if (isset($_GET['del'])) {
  require "inc\delete_news.inc.php";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Новостная лента</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    require_once 'inc\header.inc.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="py-3 text-center">Последние записи</h1>
            <?php
            if ($errMsg) {
                echo "<h3>$errMsg</h3>";
            }
            require "inc\get_news.inc.php";
            ?>

            <hr>
            <br>

    <div class="addNewTask">
        <button class="btn btn-danger mb-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">Добавить новую задачу</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Окно для добавления</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                    require_once 'inc\add_news.inc.php';
                ?>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
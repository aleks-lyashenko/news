<h3 class="h3">Добавьте новую статью</h3>
<br>
<form class="pb-5" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="title">Заголовок новости:</label> <br />
    <input class="form-control" type="text" name="title" id="title" /><br />
    <label for="cat_select">Выберите категорию:</label> <br />
    <select class="form-select" name="category" id="cat_select">
        <option value="1">Работа</option>
        <option value="2">Культура</option>
        <option value="3">Спорт</option>
    </select>
    <br />
    <label for="textarea1">Текст новости:</label> <br />
    <textarea class="form-control" id="textarea1" name="description" cols="50" rows="5"></textarea><br />
    <label for="source">Источник:</label> <br />
    <input class="form-control" type="text" name="source" id="source" /><br />
    <br />
    <input class="btn btn-danger" type="submit" value="Добавить!" />
</form>
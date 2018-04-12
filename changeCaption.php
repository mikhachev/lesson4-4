<!doctype html>
<html lang="ru">
<head>
    <title>Работа с БД</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Работа с БД</h1><br>


<div>
<form action = "" method="GET">
 <input type="text" name="edit_cap" value="новое название поля">
 <input type="submit" value="Изменить название поля">
 </form>
</div>
 

</body>
</html>
<?php
$table = $_GET['table'];
echo $table." </br>" ;
echo $_GET['cap'];
?>

<!doctype html>
<html lang="ru">
<head>
    <title>Работа с БД</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Работа с БД</h1><br>


<div>
<form action="newtable.php" method="POST">
 <input type="text" name="cr_table" value="Название таблицы">
 <input type="submit" value="Создать">
 </form>
</div>
 



</body>
</html>

<?php


include("config2.php");


if (empty($_GET['oper']))
{
    $oper = null;
} else
{
    $oper = (string)$_GET['oper'];
}


$sql = "SHOW TABLES";
$stm = $pdo->prepare($sql);
$stm->execute();

$tables = [];
$listTables = $stm->fetchAll();
foreach ($listTables as $item) {
    $tables[] = $item[0];
}

$table = null;
if (!empty($_GET['table'])) {
    $sql = "DESCRIBE " . $_GET['table'];
    $stm = $pdo->prepare($sql);
    $stm->execute();
    
    $table = $stm->fetchAll();
}

?>

<style>
    table { 
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
</style>

<h4>Структура таблицы</h4>
<div style="margin-bottom: 20px;">
    <form method="GET">
        <label for="table">Выберите таблицу:</label>
        <select name="table">
            <?php foreach ($tables as $key => $item): ?>
                <option value="<?php echo $item?>"><?php echo $item?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Показать таблицу" />
        
    </form>
</div>
<div style="clear: both"></div>
<table>
    <tr>
        <th>Поле</th>
        <th>Тип</th>
        <th>Изменить поле</th>
        <th>Изменить тип</th>
    </tr>
<?php




if (!empty($table)) {
    foreach ($table as $row) 
{
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "  <td> <a href= changeCaption.php" . "?table=" . $_GET['table'] . "&cap=" . $row['Field'] . ">Изменить заголовок</a>&nbsp;</td>";
        
        
         echo "</tr>";
    }
}
?>
</table>



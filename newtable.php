<?php
include("config2.php");
if (isset($_POST['cr_table']))
//if (array_key_exists('createDB', $_POST))
{
	//mysql_select_db('TestBD');
	$name = (string)$_POST['cr_table'];
	try
	{
   
        $sql = "CREATE TABLE $name (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
textfield VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";
        $pdo->exec($sql);
        echo "Tabled is created successfully <br>";
        header("/emikhachev/lesson4-4/index.php", true, 302);
	}
	catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}else {
	echo "Database is not created<br> ";	
	
	}
	


?>

<?php
include("function.php");

if (isset($_POST['cr_table'])) {
	//mysql_select_db('TestBD');
	$name = (string)$_POST['cr_table'];
	try {
   
        $sql = "CREATE TABLE $name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, textfield VARCHAR(30) NOT NULL,reg_date TIMESTAMP)";
        $pdo->exec($sql);
        echo "Tabled is created successfully <br>";
        
	}
	catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
}else {
	echo "table is not created<br> ";	
}
	
backHome();
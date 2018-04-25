<?php
include("config2.php");

$url_dir = dirname($_SERVER['PHP_SELF']);

$types = array();
$types[0] = 'int(10)';
$types[1] = 'varchar(50)';
$types[2] = 'datetime';
 
function backHome()
{
	header("Location: $url_dir./index.php");
}



function newCaption()
{
    $chars = 'abdefhiknrstyz123456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < 8; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
$newCap = newCaption();

function newType($types)
{
	if ($types == 'int(10)'){
		$ntype = 'varchar(50)';
	} elseif ($types == 'varchar(50)') {
		$ntype = 'datetime';
	} else {
		$ntype = 'int(10)';
	}
	return $ntype;
}



    if (isset($_GET['oper'])) {
	    $oper = (string)$_GET['oper'];
	    if ($oper == 'delete') {  
            
	        try {   
               
                $sql = "ALTER TABLE $_GET[table] DROP COLUMN $_GET[field]";
                $pdo->exec($sql);
                header("/emikhachev/lesson4-4/index.php", true, 302);
                echo ' column is deleted successfully ';
	        }
	        catch(PDOException $e) {
             echo $sql . "<br>" . $e->getMessage();
            }
        } elseif ($oper == 'edit') {	                
	        try {   
                $typ = (string)$_GET['types'];
                $sql = "ALTER TABLE $_GET[table] CHANGE $_GET[field] $newCap  $typ";
                $pdo->exec($sql);
                backHome();
                echo ' column is renamed successfully ';
	        }
	        catch(PDOException $e) {
             echo $sql . "<br>" . $e->getMessage();
            }
        }elseif ($oper == 'edittype') {	                
	        try {   
	            $typ = (string)newType($_GET['types']);
                $sql = "ALTER TABLE $_GET[table] MODIFY $_GET[field] $typ"; 
                $pdo->exec($sql);
                backHome();
                echo ' column is changed in type successfully ';
	        }
	        catch(PDOException $e) {
             echo $sql . "<br>" . $e->getMessage();
            }
        }
	
	    
   
}

?>
<?php

try {
	$pdo = new PDO("mysql:dbname=teste2;host=localhost", "root", "");	
} catch(PDOException $e){
	echo "ERROR: ".$e->getMessage();
}


<?php
require 'config.php';

$sql = $pdo->query("SELECT * FROM pessoas");

$sql2 = $pdo->query("SELECT * FROM salas ORDER BY lotacao ASC");

$pessoa = $sql->fetchAll();
$lotacao = $sql2->fetchAll();

$salas = count($lotacao);
$pessoaQt = count($pessoa);




for($i=0;$i<$salas;$i++){	
    $y = 0;   
	foreach($pessoa as $p){ 
		if($y < $lotacao[$i]['lotacao']){
			$sql = $pdo->prepare("INSERT INTO pessoa_sala SET pessoa_id = :pessoa_id, sala_id = :sala_id");
			$sql->bindValue(':pessoa_id', $p['id']);
			$sql->bindValue(':sala_id', $lotacao[$i]['id']);
			$sql->execute();

			$y++;
			
	    } else {
	        $pessoa = array_slice($pessoa, ($p['id']-2));
	    	break;
	    }
	}
}




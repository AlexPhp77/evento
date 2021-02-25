<?php
require 'config.php';

$pdo->query("DELETE FROM pessoa_espaco_cafe");

$sql = $pdo->query("SELECT * FROM pessoas");

$sql2 = $pdo->query("SELECT * FROM espaco_cafe ORDER BY lotacao_cafe DESC");

if($sql->rowCount() <= 0 OR $sql2->rowCount() <= 0){	
	exit;
}

$pessoa = $sql->fetchAll();
$lotacao = $sql2->fetchAll();

$salas = count($lotacao);
$pessoaQt = count($pessoa);

for($i=0;$i<$salas;$i++){	
    $y = 0;   
	foreach($pessoa as $p){ 		
		if($y < $lotacao[$i]['lotacao_cafe']){

			$sql = $pdo->prepare("SELECT pessoa_id FROM pessoa_espaco_cafe WHERE pessoa_id = :pessoa_id");
			$sql->bindValue(':pessoa_id', $p['id']);
			$sql->execute();

			if($sql->rowCount() > 0){
				break;
			}

			$sql = $pdo->prepare("INSERT INTO pessoa_espaco_cafe SET pessoa_id = :pessoa_id, espaco_id = :espaco_id");
			$sql->bindValue(':pessoa_id', $p['id']);
			$sql->bindValue(':espaco_id', $lotacao[$i]['id']);
			$sql->execute();

			$y++;			
	    } else {
	        $pessoa = array_slice($pessoa, $y);
	    	break;
	    }
	}
}


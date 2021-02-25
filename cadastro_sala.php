<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nomeSala');
$lotacao = filter_input(INPUT_POST, 'lotacao_sala');

if($nome && $lotacao){
	$sql = $pdo->prepare("INSERT INTO salas SET nome_sala = :nome_sala, lotacao = :lotacao");
	$sql->bindValue(':nome_sala', $nome);
	$sql->bindValue(':lotacao', $lotacao);	
	$sql->execute();

	$_SESSION['flash'] = 'Sala inserida com sucesso!';
}

header('Location: index.php');
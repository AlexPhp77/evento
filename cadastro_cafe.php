<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'espacoCafeNome');
$lotacao = filter_input(INPUT_POST, 'lotacao_cafe');

if($nome && $lotacao){
	$sql = $pdo->prepare("INSERT INTO espaco_cafe SET nome = :nome, lotacao_cafe = :lotacao_cafe");
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':lotacao_cafe', $lotacao);	
	$sql->execute();

	$_SESSION['flash'] = 'Espaço para lanche inserido com sucesso!';
}

header('Location: index.php');
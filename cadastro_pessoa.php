<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');

if($nome && $sobrenome){
	$sql = $pdo->prepare("INSERT INTO pessoas SET nome = :nome, sobrenome = :sobrenome");
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':sobrenome', $sobrenome);	
	$sql->execute();

	$_SESSION['flash'] = 'Pessoa cadastrada sucesso!';
}

header('Location: index.php');
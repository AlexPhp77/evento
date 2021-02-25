<style type="text/css">

tr:nth-child(odd) {
background-color:#ffffff;
}
tr:nth-child(even) {
background-color:#cccccc;
}

</style>

<?php
require 'config.php';

$participante = filter_input(INPUT_GET, 'participante');
$salas = filter_input(INPUT_GET, 'salas');

$where = array('1=1');

if($participante){
	$where[] = 'pessoas.nome LIKE :participante'; 
}
if($salas){
	$where[] = 'salas.nome_sala = :salas'; 
}

$sql = $pdo->prepare("SELECT pessoa_sala.*, pessoas.*, salas.* FROM pessoa_sala INNER JOIN pessoas ON pessoas.id = pessoa_sala.pessoa_id LEFT JOIN salas ON salas.id = pessoa_sala.sala_id WHERE ".implode(' AND ', $where)." ORDER BY pessoas.nome ASC");

if($participante){
	$sql->bindValue(':participante', '%'.trim($participante));
}
if($salas){
	$sql->bindValue(':salas', $salas);
}

$sql->execute();

if($sql->rowCount() > 0){
	$dados = $sql->fetchAll();
	
	?>

	<table border="0" width="100%">
		<tr>
		    <th>Nome</th>
		    <th>Sala</th>
		</tr>
		<?php foreach($dados as $d): ?>
		<tr>
			<td><?=$d['nome']?></td>
			<td><?=$d['nome_sala']?></td>
		</tr>
		<?php endforeach; ?>    
	</table>

	<?php

} else {
	echo "Nenhum resultado!";
}
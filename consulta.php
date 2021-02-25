<style type="text/css">

tr:nth-child(odd) {
background-color:#ffffff;
}
tr:nth-child(even) {
background-color:#cccccc;
}
.aviso-obs{
	padding: 5px;
	background-color: #ccc;
	color: red;
	font-size: 20px;
}
</style>

<?php
require 'config.php';

$participante = filter_input(INPUT_GET, 'participante');
$salas = filter_input(INPUT_GET, 'salas');
$espaco = filter_input(INPUT_GET, 'espaco');

$where = array('1=1');

if($participante){
	$where[] = 'pessoas.nome LIKE :participante'; 
}
if($salas){
	$where[] = 'salas.nome_sala = :salas'; 
}
if($espaco){
	$where[] = 'espaco_cafe.nome = :espaco'; 
}

$sql = $pdo->prepare("SELECT pessoa_sala.*, pessoas.*, salas.*, pessoa_espaco_cafe.*, espaco_cafe.nome as espaco_nome FROM pessoa_sala INNER JOIN pessoas ON pessoas.id = pessoa_sala.pessoa_id INNER JOIN salas ON salas.id = pessoa_sala.sala_id INNER JOIN pessoa_espaco_cafe ON pessoas.id = pessoa_espaco_cafe.pessoa_id INNER JOIN espaco_cafe ON espaco_cafe.id = pessoa_espaco_cafe.espaco_id WHERE ".implode(' AND ', $where)." ORDER BY pessoas.nome ASC");

if($participante){
	$sql->bindValue(':participante', '%'.trim($participante));
}
if($salas){
	$sql->bindValue(':salas', $salas);
}
if($espaco){	
	$sql->bindValue(':espaco', $espaco);
}

$sql->execute();

if($sql->rowCount() > 0){

	$dados = $sql->fetchAll();
	
	?>

	<table border="0" width="100%">
		<tr>
		    <th>Nome</th>
		    <th>Sala</th>
		    <th>Espaço Lanche</th>
		</tr>
		<?php foreach($dados as $d): ?>
		<tr>
			<td><?=$d['nome']?></td>
			<td><?=$d['nome_sala']?></td>
			<td><?=$d['espaco_nome'];?></td>
		</tr>
		<?php endforeach; ?>    
	</table>

	<?php

} else {
	echo "<div class='aviso-obs'>	
		Não há resultados!
		Verifique se digitou corretamente, caso esteja correto siga a etapa abaixo.<br/>
		Para pesquisar insira no mínimo uma sala e um local de lanche, logo após clique em organizar/reorganizar para que o sistema insira os participantes em seus respectivos locais.
	</div>";
}

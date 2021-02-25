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

$sql = $pdo->prepare("SELECT pessoa_sala.*, pessoas.*, salas.*, pessoa_espaco_cafe.*, espaco_cafe.nome as espaco_nome FROM pessoa_sala INNER JOIN pessoas ON pessoas.id = pessoa_sala.pessoa_id LEFT JOIN salas ON salas.id = pessoa_sala.sala_id INNER JOIN pessoa_espaco_cafe ON pessoas.id = pessoa_espaco_cafe.pessoa_id INNER JOIN espaco_cafe ON espaco_cafe.id = pessoa_espaco_cafe.espaco_id WHERE ".implode(' OR ', $where)." ORDER BY pessoas.nome ASC");

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

	$sql = $pdo->query("SELECT * FROM (select * from salas) as sala, espaco_cafe");	  

	if($sql->rowCount() > 0){
		$dados = $sql->fetchAll();
		
		?>

		<table border="0" width="100%">
			<tr>			   
			    <th>Espaços para Lanche</th>	
			    <th>Lotação</th>		  
			</tr>
			<?php foreach($dados as $d): ?>
			<tr>				
			    <td><?=$d['nome'];?></td>	
			    <td><?=$d['lotacao_cafe'];?></td>		
			</tr>
			<tr>			   
			    <th>Salas</th>	
			    <th>Lotação</th>		  
			</tr>
			<tr>				
			    <td><?=$d['nome_sala'];?></td>	
			    <td><?=$d['lotacao'];?></td>		
			</tr>
			<?php endforeach; ?>    
		</table>

		<?php

	} else {

		$sql = $pdo->query("SELECT * FROM salas");	  

	    if($sql->rowCount() > 0){
		$dados = $sql->fetchAll();
		
		?>

		<table border="0" width="100%">
			<tr>			   
			    <th>Sala</th>	
			    <th>Lotação</th>			  
			</tr>
			<?php foreach($dados as $d): ?>
			<tr>				
			    <td><?=$d['nome_sala'];?></td>				
			    <td><?=$d['lotacao'];?></td>				
			</tr>
			<?php endforeach; ?>    
		</table>

		<?php } else {

			$sql = $pdo->query("SELECT * FROM espaco_cafe");	  

		    if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
			
			?>

			<table border="0" width="100%">
				<tr>			   
				    <th>Espaços para Lanche</th>	
				    <th>Lotação</th>			  
				</tr>
				<?php foreach($dados as $d): ?>
				<tr>				
				    <td><?=$d['nome'];?></td>				
				    <td><?=$d['lotacao_cafe'];?></td>				
				</tr>
				<?php endforeach; ?>    
			</table>

		<?php }

		}
	}
}
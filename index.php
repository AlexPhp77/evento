<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Evento </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>	
	<h1 class="titulo-pagina">Evento</h1>
    
	<div class="modal-area efeitoModal0">		
		<div class="modal">
			<h2>Adicionar Pessoa</h2>
			<span class="fecharModal" onclick="fecharModal()">x</span>
			<form method="POST" action="cadastro_pessoa.php">
				<label>
					Nome:<br/>
				    <input type="text" name="nome">	
				</label>			
				<label>
					Sobrenome:<br/>
				    <input type="text" name="sobrenome">	
				</label>
				<label>					
				    <input type="submit" value="Cadastrar">	
				</label>
			</form>
		</div>
	</div>

	<div class="modal-area efeitoModal1">
		<div class="modal">
			<h2>Espaço Refeição</h2>
			<span class="fecharModal" onclick="fecharModal()">x</span>
			<form method="POST" action="cadastro_cafe.php">
				<label>
					Nome:<br/>
				    <input type="text" name="espacoCafeNome">	
				</label>			
				<label>
					Lotacao (número máximo de participantes):<br/>
				    <input type="text" name="lotacao_cafe">	
				</label>
				<label>					
				    <input type="submit" value="Inserir">	
				</label>
			</form>
		</div>
	</div>

	<div class="modal-area efeitoModal2">
		<div class="modal">
			<h2>Sala</h2>
			<span class="fecharModal" onclick="fecharModal()">x</span>
			<form method="POST" action="cadastro_sala.php">
				<label>
					Nome:<br/>
				    <input type="text" name="nomeSala">	
				</label>			
				<label>
					Lotacao (número máximo de participantes):<br/>
				    <input type="text" name="lotacao_sala">	
				</label>
				<label>					
				    <input type="submit" value="Inserir">	
				</label>
			</form>
		</div>
	</div>
	

	<div class="area-home">

		<div class="mensagem-flash">			
			<?=(!empty($_SESSION['flash']))?$_SESSION['flash']:'';
               $_SESSION['flash'] = '';
			?>
		</div>

		<div class="formulario">
			<form method="GET" onsubmit="return openPopup(this)">
				<label>
					Participante:<br/>
					<input type="text" name="participante">
				</label>
				<label>
					Salas:<br/>
					<input type="text" name="salas">					
				</label>
				<label>
					Espaço:<br/>
					<input type="text" name="espaco">					
				</label>				
				<label>
					<br/>
					<input type="submit" value="Consultar">
				</label>
			</form>
		</div>

		<div class="menu">
			<h1>Cadastrar Pessoas</h1>	
			<img src="assets/images/pessoa.svg">		
		</div>		
		<div class="menu">
			<h1>Cadastrar Espaço Café</h1>
			<img src="assets/images/cafe.svg">
		</div>
		<div class="menu">
			<h1>Cadastrar Salas</h1>
			<img src="assets/images/caneta.svg">
		</div>

		<div class="botao">
			<button>Organizar/Reorganizar<br/> Pessoas - Sala</button>
		</div>
		
	</div>	    
    
	<script src="assets/js/script.js"></script>
	<script src="assets/js/consulta_script.js"></script>
</body>
</html>
<?php
	require_once("../infra/valida_sessao.php");
?>
<html>
	<head>
		<title>Login</title>
	</head>	

	<body>
		<h4>Ola <i><?php echo $_SESSION["login"];?> </i> eu sou a tela principal - Login com Sucesso!!</h4>
		<ul>
			<li>Usuario</li>
			<ul>
				<li><a href="usuario/cadastro_usuario.php">Cadastrar</a></li>
				<li><a href="../controller/usuario_controller.php?acao=listar">Listar</li>
			</ul>
		</ul>
		
		<a href="../controller/usuario_controller.php?acao=logout">Sair</a>
</body>
</html>

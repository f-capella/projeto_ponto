<html>
	<head>
		<title>Login</title>
		<script src="../../static/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
					nome: $("#nome").val(),
					sobrenome: $("#sobrenome").val(),
					email: $("#email").val(),
					login: $("#login").val(),
					senha: $("#senha").val(),
					confirmar_senha: $("#confirmar_senha").val(),
    			};

				$.ajax({
					type: "POST",
					url: "../../controller/usuario_controller.php?acao=cadastrar",
					data: formDados,
					dataType: "json",
					}).done(function (dataRetorno) {
						if(dataRetorno.erro == 0){
							alert(dataRetorno.msg)
							window.location.href = dataRetorno.url;
						}
						else{
							alert(dataRetorno.msg)
						}
						
				});
				
			}
		</script>
	</head>	
	<body>
        <h2>Cadastro de Usuário</h2>
		<form action="#" method="POST">
			Nome: <input type="text" id="nome" name="nome"/> <br>
			Sobrenome: <input type="text" id="sobrenome" name="sobrenome"/> <br>
			Email: <input type="text" id="email" name="email"/> <br>
			Login: <input type="text" id="login" name="login"/> <br>
			Senha: <input type="password" id="senha" name="senha"/> <br>
			Confirmar Senha: <input type="password" id="confirmar_senha" name="confirmar_senha"/><br>
			<input type="button" value="Cadastrar" onclick="processa_cadastro()"/> <br>
	    </form>

		<br>
		<a href="../principal.php">Principal</a>

</body>
</html>
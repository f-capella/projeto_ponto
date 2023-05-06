<html>
	<head>
		<title>Login</title>
		<script src="../static/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			});

			function processa_login(){
				var formDados = {
     			 	login: $("#login").val(),
      			 	senha: $("#senha").val(),
    			};
				
				$.ajax({
					type: "POST",
					url: "../controller/usuario_controller.php?acao=logar",
					data: formDados,
					dataType: "json",
					}).done(function (dataRetorno) {
						if(dataRetorno.erro == 0){
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
        <h2>Sistema Ponto Eletronico</h2>
		<form>
			Usuario <input type="text" id="login" name="login"/> <br>
			Senha <input type="password" id="senha"name="senha"/> <br>
			<input type="button" value="Logar" onclick="processa_login()"/> <br>
	    </form>
</body>
</html>

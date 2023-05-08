<?php
    require_once "../model/Usuario.php";

    class UsuarioController{
        
        public function execute($post, $get){
            $acao = $get['acao'];
            if ($acao == "cadastrar"){
                $usuario = new Usuario();

                $nome = $post["nome"];
                $usuario->__set("nome", $nome);

                $sobrenome = $post["sobrenome"];
                $usuario->__set("sobrenome", $sobrenome);

                $email = $post["email"];
                $usuario->__set("email", $email);

                $login = $post["login"];
                $usuario->__set("login", $login);

                $senha = $post["senha"];
                $confirmar_senha = $post["confirmar_senha"];
                
                if ($senha == $confirmar_senha){
                    $senha_hash = hash("sha3-256", $senha);
                    $usuario->__set("senha", $senha_hash);
                   
                    if($usuario->salvar() == true){
                        $retorno = ["msg" =>"Usuário cadastrado com sucesso!", "erro"=>"0", "url" => "../principal.php"];
                        echo json_encode($retorno);
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar o usuário!!", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
                }
                else{
                    //enviar msg de erro
                }
            }
            else if($acao == "listar"){
               $this->listarUsuarios();
            }
            else if($acao == "editar"){
                $id = $get["id"];
                $usuario = new Usuario();
                $dados = $usuario->buscarPorId($id);
                
                require_once("../view/usuario/editar_usuario.php");
            }  
            
            else if($acao == "logar"){
                $login = $post["login"];
                $senha = $post["senha"];

                $usuario = new Usuario();
                $valida = $usuario->autenticar($login, $senha);

                if ($valida == true){
                    session_start();
	                $_SESSION["logado"] = true;
                    $_SESSION["login"] = $login;

                    $retorno = ["msg" =>"", "erro"=>"0", "url" => "principal.php"];
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Senha Invalida!!", "erro"=>"1"];
                    echo json_encode($retorno);
                    json_decode($dados);
                }
            }   
            else if($acao == "logout"){
                session_start();
                unset($_SESSION);
                session_destroy();
            
                header("location:../view/login.php");
            }
            else if($acao == "deletar"){
                $id = $get["id"];
                $usuario = new Usuario();
                $dados = $usuario->deletar($id);
                
                $this->listarUsuarios();
            }  
        }

        private function listarUsuarios(){
            $usuario = new Usuario();
            $dados = $usuario->listarTodos();

            require_once("../view/usuario/listar_usuario.php");
        }
    }
    
  
  $controller = new UsuarioController();
  $controller->execute($_POST, $_GET); 
  
  
<?php



class UsuarioController {

    public function verificarUsuario() {
      
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario == "admin" && $senha == "admin") {
            echo "Usuario correto";
            header("location:../index.php");
        } else {
            echo "usuario e senha invalido";
            
            
        }
    }

}

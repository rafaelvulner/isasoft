<!DOCTYPE html>

<html>
    <title>Login</title>
    <?php include './resources/utils/masterPage/head.html'; ?>

    <body>
        <div class="container">

            <div class="central col-md-6">
                <img src="resources/img/icone-principal.png" class="img-responsive">
            </div>
            <form action="controller/dispacher.php?classe=UsuarioController&&metodo=verificarUsuario" method="POST">
                <div class="col-md-offset-2 col-md-2 central" style="padding: 20px">
                    <div class="input-group form-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="text" class="form-control" name="usuario" placeholder="Usuario">                                        
                    </div>

                    <div class="input-group form-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="senha" value="" placeholder="Senha">                                        
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>




        </div>
    </body>
</html>

<!DOCTYPE html>

<html>
    <title>Extrato</title>
    <?php include './resources/utils/masterPage/head.html'; ?>
    <script src="resources/js/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <body>
        <div class="container">

            <div class="col-md-12 col-xs-12 table-responsive">
                <div class="col-md-6 col-xs-12 central margemTop">
                    <table class="table table-striped table-hover table-bordered" id="tabela">
                        <thead>
                            <tr>
                                <th>Mesa</th>
                                <th>Comanda</th>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                                <th>Pessoas</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>

                    <div class="alert alert-success col-md-6 col-xs-6 central text-center" id="total">

                    </div>

                    <div class="margemTop">
                        <button class="btn btn-primary" onclick="cancelar()">Fechar conta</button>
                        <a href="mesaPedido.php?numMesa=<?php echo $_GET['numMesa'] ?>&&idComanda=<?php echo $_GET['idComanda']?>"><button class="btn btn-primary">Voltar</button></a>
                        <a href="index.php"><button class="btn btn-primary">Mesas</button></a>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $_GET['numMesa'] ?>" id="numMesa">

                <div id="dialog-confirm" title="Fechar a conta" class="hidden">
                    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Tem certeza que deseja fechar a conta?</p>
                </div>
            </div>

        </div>
    </body>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "controller/dispacher.php?classe=MesaController&&metodo=extratoComanda",
                data: {numMesa: $('#numMesa').val()},
                dataType: "json",
                type: 'post',
                success: function (data) {

                    $.each(data, function (idx, obj) {

                        $('#tabela > tbody').append('<tr><td>' + obj.num_mesa + '</td><td>' + obj.id_comanda + '</td><td>' + obj.nome_prod + '</td><td>' + obj.preco_prod + '</td><td>' + obj.nome_categoria + '</td><td>' + obj.qtd_produto + '</td><td>' + obj.qtd_pessoas + '</td><td>' + obj.valor + '</td></tr>');
                        $('#total').html('R$ ' + obj.total)
                    });
                }
            });
        });
    </script>  

    <script>

        function cancelar() {
            $("#dialog-confirm").removeClass('hidden');
            $("#dialog-confirm").dialog({

                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Fechar conta": function () {

                        $.ajax({
                            url: "controller/dispacher.php?classe=MesaController&&metodo=liberarMesa",
                            data: {numMesa: $('#numMesa').val()},
                            type: 'post',
                            success: function () {

                                window.location = 'index.php';
                            }
                        });


                    },
                    Cancelar: function () {
                        $(this).dialog("close");
                    }
                }
            });
        }

    </script>
</html>

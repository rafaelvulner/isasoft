<!DOCTYPE html>

<html>
    <title>Pedido</title>
    <?php include './resources/utils/masterPage/head.html'; ?>
    <script src="resources/js/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <body>

        <div class="container">

            <div class="col-md-8 central">
                <div class="col-md-12 col-xs-12">

                    <div class="row alert alert-info margemTop">

                        <div class="col-md-8 col-xs-12 central">

                            <div class="col-md-4 col-xs-12 form-group">
                                <a href="extrato.php?numMesa=<?php echo $_GET['numMesa'] ?>&&idComanda=<?php echo $_GET['idComanda']?>"><input type="button" value="Extrato" class="btn btn-primary form-control"></a>
                            </div>

                            <div class="col-md-4 col-xs-12 form-group">
                                <input type="button" value="Transferencia" class="btn btn-primary form-control" onclick="transferir()">
                            </div>

                            <div class="col-md-4 col-xs-12 form-group">
                                <input type="button" value="Cancelamento" class="btn btn-primary form-control" onclick="cancelar()">
                            </div>

                        </div>

                    </div>

                    <div class="row margemTop  alert alert-success">

                        <div class="col-md-8 col-xs-12 central">

                            <div class="col-md-4"> Quantidade de pessoas </div>
                            <div class="col-md-8"><input type="number" class="form-control" id="qtdPessoas"></div>

                        </div>               
                    </div>

                    <div class="row margemTop alert alert-success">

                        <div class="col-md-10 col-xs-12 central">
                            <div class="form-group col-md-6">
                                <div class="col-md-3"> Tipo:</div>
                                <div class="col-md-9"><select class="form-control" id="tipo" onchange="carregaProduto(this.value)"></select></div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="col-md-3"> Produto: </div>
                                <div class="col-md-9"><select class="form-control" id="produto"></select></div>
                            </div>                 

                        </div>      


                    </div>

                    <div class="row margemTop alert alert-success">

                        <div class="col-md-6 col-xs-12 central">                         
                            <div class="col-md-4"> Quantidade</div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" id="qtd">
                                <input type="hidden" value="<?php echo $_GET['numMesa'] ?>" id="numMesa">
                                 <input type="hidden" value="<?php echo $_GET['idComanda'] ?>" id="idComanda">
                            </div>                        
                        </div>               
                    </div>



                </div>

                <div class="col-md-2 col-xs-2"><button class="btn btn-success" onclick="cadastrarPedido()"> Confirmar</button></div>
                <div class="col-md-3 col-xs-3"><a href="index.php"><button class="btn btn-danger"> Voltar</button></a></div>
            </div>



        </div>

        <div id="aviso" class="col-md-6 central margemTop"></div>   
       
       

        <div id="dialog-confirm" title="Cancelar comanda" class="hidden">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Tem certeza que deseja fechar a conta?</p>
        </div>
        
        <div id="transferencia" title="Transferir comanda comanda" class="hidden">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Qual mesa:</p>
            <select id="mesas" class="form-control" onchange="transferir(this.value)"></select>
        </div>

    </body>

    <script>
        $(document).ready(function () {

            carregarCombos();
            qtdMesas();

        });

        function carregarCombos() {

            $.ajax({
                url: "controller/dispacher.php?classe=Mesacontroller&&metodo=carregaCategoria",
                dataType: 'json',
                type: 'post',
                success: function (data) {
                    $.each(data, function (idx, obj) {


                        $('#tipo').append('<option value=' + obj.id + '>' + obj.nomeCategoria + '</option>');

                    })

                    var x = document.getElementById("tipo").value;


                    carregaProduto(x);
                }
            });

        }

        function carregaProduto(x) {

            $.ajax({
                url: "controller/dispacher.php?classe=Mesacontroller&&metodo=carregaProduto&&parametro=" + x,

                dataType: 'json',
                type: 'post',
                success: function (data) {
                    $.each(data, function (idx, obj) {


                        $('#produto').html('<option value=' + obj.id + '>' + obj.nomeProduto + '</option>');
                    })
                }
            });
        }

        function cadastrarPedido() {



            $.ajax({
                url: "controller/dispacher.php?classe=Mesacontroller&&metodo=adicionarProduto",
                data: {numMesa: $('#numMesa').val(), idProduto: $('#produto').val(), qtdProduto: $('#qtd').val(), qtdPessoa: $('#qtdPessoas').val()},

                type: 'post',
                success: function (data) {
                    $('#aviso').html('<div class="alert alert-success">Cadastrado com sucesso!</div>');
                }
            });

        }

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
        
        function transferir(){
            console.log($('#mesas').val());
            $("#transferencia").removeClass('hidden');
             
                
            $("#transferencia").dialog({
               
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Transferir": function () {

                        $.ajax({
                            url: "controller/dispacher.php?classe=MesaController&&metodo=transferirMesa",
                            data: {numMesa: $('#numMesa').val(), idComanda: $('#idComanda').val(), numMesaTransfer: $('#mesas').val()},
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
        
        function qtdMesas() {

            $.ajax({
                url: "controller/dispacher.php?classe=mesaController&metodo=qtdMesas",
                dataType: 'json',
                type: 'get',
                success: function (data) {
                    
                   
                    console.log(data);
                    $.each(data, function(idx, obj){         
                      
                       
                           $('#mesas').append('<option value='+obj.numMesa+'>'+obj.numMesa+'</option>')
                           
                    
//}
                        
                    });          
                }
            });
        }
    </script>
</html>

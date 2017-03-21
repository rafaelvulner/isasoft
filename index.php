<html>
    <title>Login</title>
    <?php include './resources/utils/masterPage/head.html'; ?>



    <body>
        <div class="container">


            <!--            PAINEL PRIMARIO-->
            <div class="col-md-12">
                <div class="row alert alert-info margemTop">
                    <div class="col-md-9 central">
                        <div class="col-md-3 col-xs-6 letra">      
                            LIVRE <img src="resources/img/btn_mesaVaga.png">                          
                        </div>

                        <div class="col-md-3 col-xs-6 letra">            
                            OCUPADA <img src="resources/img/btn_mesaOcupada.png">                             
                        </div>

                        <div class="col-md-3 col-xs-6 letra">      
                            FECHAMENTO <img src="resources/img/btn_mesaFechamento.png">                          
                        </div>

                        <div class="col-md-3 col-xs-6 letra">            
                            RECEBIMENTO <img src="resources/img/btn_mesaRecebimento.png">                             
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-6 col-xs-12 central margemTop" id="mesas">                

                </div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready(function () {
            qtdMesas();
        });

        function qtdMesas() {

            $.ajax({
                url: "controller/dispacher.php?classe=mesaController&metodo=qtdMesas",
                dataType: 'json',
                type: 'get',
                success: function (data) {
                    
                   
                    
                    $.each(data, function(idx, obj){
                       console.log(obj); 
                       
                       if (obj.id_comanda === null){
                           $('#mesas').append('<div class="col-md-3 col-xs-6">Mesa '+obj.numMesa+'<a href="mesaPedido?id='+obj.numMesa+'"><img src="resources/img/btn_mesaVaga.png"></a></div>');
                           
                       } else{
                           $('#mesas').append('<div class="col-md-3 col-xs-6">Mesa '+obj.numMesa+'<a href="mesaPedido?id='+obj.numMesa+'"><img src="resources/img/btn_mesaOcupada.png"></a></div>');
                       }   
//}
                        
                    });          
                }
            });
        }
    </script>
</html>
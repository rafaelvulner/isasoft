<!DOCTYPE html>

<html>
    <title>Pedido</title>
    <?php include './resources/utils/masterPage/head.html'; ?>

    <body>

        <div class="container">
            
            <div class="col-md-8 central">
                <div class="col-md-12 col-xs-12">

                <div class="row alert alert-info margemTop">

                    <div class="col-md-8 col-xs-12 central">

                        <div class="col-md-4 col-xs-12 form-group">
                            <input type="button" value="Extrato" class="btn btn-primary form-control">
                        </div>

                        <div class="col-md-4 col-xs-12 form-group">
                            <input type="button" value="Transferencia" class="btn btn-primary form-control">
                        </div>

                        <div class="col-md-4 col-xs-12 form-group">
                            <input type="button" value="Cancelamento" class="btn btn-primary form-control">
                        </div>

                    </div>

                </div>

                <div class="row margemTop  alert alert-success">

                    <div class="col-md-8 col-xs-12 central">
                        
                            <div class="col-md-4"> Quantidade de pessoas </div>
                            <div class="col-md-8"><input type="number" class="form-control"></div>
                        
                    </div>               
                </div>

                <div class="row margemTop alert alert-success">

                    <div class="col-md-10 col-xs-12 central">
                        <div class="form-group col-md-6">
                            <div class="col-md-3"> Tipo:</div>
                            <div class="col-md-9"><select class="form-control"><option>Bebidas</option></select></div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="col-md-3"> Produto: </div>
                            <div class="col-md-9"><select class="form-control"><option>Refrigente lata</option></select></div>
                        </div>                 
                        
                    </div>      
                    
                        
                </div>
                
                <div class="row margemTop alert alert-success">
                    
                    <div class="col-md-6 col-xs-12 central">                         
                            <div class="col-md-4"> Quantidade</div>
                            <div class="col-md-8"><input type="number" class="form-control"></div>                        
                    </div>               
                </div>



            </div>
            </div>
            
        </div>

    </body>
</html>

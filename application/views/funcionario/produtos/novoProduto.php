<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Novo Produto</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('funcionarioController/InsereProduto');?>" method="POST">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Código Produto:</label>
                        <input type="text" id="codProduto" name="cod_produto" class="form-control input-md" autofocus/>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Produto:</label>
                        <input type="text" name="nomeProduto" class="form-control"/>
                    </div>
                </div><!-- Fim da Row -->
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Data de Validade: </label>
                        <div class="input-group date">
                            <input type="text" class="form-control" name="validade" id="data">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Quantidade: </label>
                        <input type="text" name="quantidade" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Descrição: </label>
                        <input type="text" name="descricao" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <a href="<?=base_url('funcionarioController/produtos');?>" onclick="return confirm('Deseja Voltar?');" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
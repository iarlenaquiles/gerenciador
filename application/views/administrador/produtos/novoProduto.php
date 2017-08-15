<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Novo Produto</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('administradorController/InsereProduto');?>" method="POST" id="form">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Código Produto:</label>
                        <div class="has-error" id="div_codigo">
                            <input type="text" id="codProduto" name="cod_produto" class="form-control" autofocus/>
                            <span class="help-block">Informe o Código do Produto</span>
                        </div>
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="">Produto:</label>
                        <div class="has-error" id="div_nomeproduto">
                            <input type="text" name="nomeProduto" id="nomeProduto" class="form-control"/>
                            <span class="help-block">Informe o Nome do Produto</span>
                        </div>
                    </div>
                </div><!-- Fim da Row -->
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Data de Validade: </label>
                        <div class="has-error" id="div_data">
                            <input type="text" class="form-control" name="validade" id="data"/>
                            <span class="help-block">Informe uma Data de Validade!</span>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Quantidade: </label>
                        <div class="has-error" id="div_quantidade">
                            <input type="text" name="quantidade" id="txtquantidade" class="form-control"/>
                            <span class="help-block">Informe a quantidade do produto</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Descrição: </label>
                        <div class="has-error" id="div_desc">
                            <input type="text" name="descricao" id="txtdesc" class="form-control"/>
                            <span class="help-block">Informe uma breve descrição</span>
                        </div>
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
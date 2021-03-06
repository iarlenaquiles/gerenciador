<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!-- Topo -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Nova Categoria</h2>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('administradorController/InsereCategoria');?>" method="POST">
                <div class="row">
                    <!-- Categoria -->
                    <div class="col-md-4 form-group">
                        <label for="">Categoria:</label>
                        <div class="has-error" id="div_categoria">
                            <input type="text" name="nomeCategoria" id="txtcategoria" class="form-control" autofocus required=""/>
                            <span class="help-block">Informe uma categoria</span>
                        </div>
                    </div>
                    <!-- Descrição -->
                    <div class="col-md-4 form-group">
                        <label for="">Descrição:</label>
                        <div class="has-error" id="div_descricao">
                            <input type="text" name="descricao" id="txtdescricao" class="form-control" required="">
                            <span class="help-block">Informe uma Descrição</span>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="col-md-4 form-group">
                        <label for="">Ativo: </label>
                        <div class="has-error" id="div_ativo">
                            <select name="ativo" id="txtativo" class="form-control">
                                <option value disabled="true" selected="true">Selecione o status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            <span class="help-block">Informe o status da categoria</span>
                        </div>
                    </div>
                </div>
                <!-- Botão de Cadastro -->
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
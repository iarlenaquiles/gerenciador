<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Nova Venda</h2>
        </div>
    </div><!-- Fim da Row -->
    <div class="row">
        <div class="col-md-12">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#cliente" aria-controls="cliente" role="tab" data-toggle="tab">Buscar Cliente</a></li>
                    <li role="presentation"><a href="#produto" aria-controls="profile" role="tab" data-toggle="tab">Buscar Produto</a></li>
                    <li role="presentation"><a href="#venda" aria-controls="messages" role="tab" data-toggle="tab">Finalizar Venda</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="cliente">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?=base_url('administradorController/novaVenda');?>" method="POST">
                                   <fieldset>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <legend>Busque pelo Cliente:</legend>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 form-group">
                                                <input list="busca" class="form-control" nome="busca"> 
                                                <datalist  id="busca">
                                                    <?php 
                                                        foreach($searchCliente as $search){
                                                            $nome = $search->nomeCliente;
                                                            $cpf = $search->CpfCnpj;
                                                    ?>
                                                    <option value="<?=$nome==$nome?$nome:$cpf;?>">
                                                    <?php }?>
                                                </datalist>
                                            </div>
                                        </div>
                                   </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="produto">
                        <p>Produtos</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="venda">
                        <p>Finalizar Vendas</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
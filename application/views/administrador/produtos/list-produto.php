<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Produtos
                <a href="<?=base_url('administradorController/novoProduto');?>" class="btn btn-primary pull-right">Novo Produto</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="produtos" class="table table-striped table-cordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>produto</th>
                        <th>Validade</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                    <?php
                        foreach($produtos as $produto){
                    ?>
                <tbody>
                    <tr>
                        <td><?=$produto->cod_produto;?></td>
                        <td><?=$produto->nomeProduto;?></td>
                        <td><?=date('d/m/Y',strtotime($produto->validade));?></td>
                        <td><?=$produto->quantidade;?></td>
                        <td><?=$produto->descricao;?></td>
                        <td>
                            <a href="<?=base_url('');?>" class="btn btn-success btn-sm">Editar</a>
                            <a href="<?=base_url('funcionarioController/delProduto/'. $produto->idProduto);?>" class="btn btn-warning btn-sm">Exluir</a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>Codigo</th>
                        <th>produto</th>
                        <th>Validade</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
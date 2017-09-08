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
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                    <?php
                        foreach($produtos as $produto){
                            $codigo = $produto->cod_produto;
                            $nome = $produto->nomeProduto;
                            $validade = $produto->validade;
                            $quantidade = $produto->quantidade;
                            $descricao = $produto->descricao;
                            $id_categoria = $produto->id_categoria;
                            $idcategoria = $produto->idcategoria;
                            $categoria = $produto->nomeCategoria;
                    ?>
                <tbody>
                    <tr>
                        <td><?=$codigo;?></td>
                        <td><?=$nome;?></td>
                        <td><?=date('d/m/Y',strtotime($validade));?></td>
                        <td><?=$quantidade;?></td>
                        <td><?=$descricao;?></td>
                        <td><?=$id_categoria==$idcategoria?$categoria:$categoria;?></td>
                        <td>
                            <a href="<?=base_url('');?>" class="btn btn-primary btn-sm btn-group" onclick="return confirm('Deseja realmente atualizar o produto!');">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('funcionarioController/delProduto/'. $produto->idProduto);?>" class="btn btn-warning btn-sm btn-group">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
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
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
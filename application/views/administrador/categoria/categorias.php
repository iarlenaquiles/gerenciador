<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!-- Categorias topo -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Categorias
                <a href="<?=base_url('administradorController/novaCategoria');?>" class="btn btn-primary pull-right">Nova Categoria</a>
            </h2>
        </div>
    </div> 

    <!-- Tabela -->
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-cordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach($categorias as $categoria){
                    $id = $categoria->idcategoria;
                    $nome = $categoria->nomeCategoria;
                    $desc = $categoria->descricao; 
            ?>
            <tbody>
                <tr>
                    <td><?=$nome;?></td>
                    <td><?=$desc;?></td>
                    <td>
                        <a href="<?=base_url('admnistradorController/atualizaCategoria/' . $id)?>" class="btn btn-primary btn-sm btn-group">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        <a href="<?=base_url('admnistradorController/atualizaCategoria/' . $id)?>" class="btn btn-warning btn-sm btn-group">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php }?>
            <tfoot>
                <tr>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>
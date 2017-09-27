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
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('administradorController/categorias');?>" method="POST">
                <div class="row">
                    <div class="col-md-10 form-group">
                        <input type="text" name="busca" class="form-control" placeholder="Pesquisa Categorias?"/>
                    </div>
                    <div class="col-md-2 form-group">
                        <button type="button" class="btn btn-primary btn-block" title="Pesquisar">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </form>
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
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach($categorias as $categoria){
                        $id       = $categoria->idcategoria;
                        $nome     = $categoria->nomeCategoria;
                        $desc     = $categoria->descricao; 
                        $ativo    = $categoria->ativo;
                ?>
                <tbody>
                    <tr>
                        <td><?=$nome;?></td>
                        <td><?=$desc;?></td>
                        <td><?=$ativo=='1'?'Ativo':'Inativo';?></td>
                        <td>
                            <a href="<?=base_url('administradorController/atualizaCategoria/' . $id)?>" class="btn btn-primary btn-sm btn-group" title="Atualizar" onclick="return confirm('Deseja realmente atualizar a categoria?');">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/inativaCategoria/' . $id);?>" class="btn btn-warning btn-sm btn-group" title="Inativar" onclick="return confirm('Deseja realmente inativar a categoria?');">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/ativarCategoria/' . $id);?>" class="btn btn-success btn-sm btn-group" title="Ativar" onclick="return confirm('Deseja realmente ativar a categoria?');">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
                <tfoot>
                    <tr>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
            <?=$pagination;?>
        </div>
    </div>
</div>
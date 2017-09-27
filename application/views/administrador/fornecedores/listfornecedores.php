<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Fornecedores
                <a href="<?=base_url('administradorController/novoFornecedor');?>" class="btn btn-primary pull-right">Novo Fornecedor</a>
            </h2>
        </div>
    </div><!-- FIM da ROW -->
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('administradorController/fornecedores');?>" method="POST">
                <div class="row">
                    <div class="col-md-10 form-group">
                        <input type="text" name="busca" class="form-control" placeholder="Pesquisa Fornecedor?"/>
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
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-cordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nome Fantasia</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Criação</th>
                        <th>E-Mail</th>
                        <th>Telefone</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach($fornecedor as $forn){
                        $id             = $forn->idfornecedor;
                        $nomeFantasia   = $forn->nomeFantasia;
                        $razao          = $forn->razaoSocial;
                        $cnpj           = $forn->cnpj;
                        $data           = $forn->dataCriacao;
                        $email          = $forn->email;
                        $telefone       = $forn->telefone;
                        $uf             = $forn->uf;
                        $cidade         = $forn->cidade;
                        $ativo          = $forn->ativo;
                ?>
                <tbody>
                    <tr>
                        <td><?=$nomeFantasia;?></td>
                        <td><?=$razao;?></td>
                        <td><?=$cnpj;?></td>
                        <td><?=date('d/m/Y',strtotime($data));?></td>
                        <td><?=$email;?></td>
                        <td><?=$telefone;?></td>
                        <td><?=$uf;?></td>
                        <td><?=$cidade;?></td>
                        <td><?=$ativo==1?'Ativo':'Inativo'?></td>
                        <td>
                            <a href="<?=base_url('administradorController/atualizaForn/' . $id);?>" class="btn btn-primary btn-sm btn-group" onclick="return confirm('Deseja realmente atualizar o fornecedor?');">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/inatForn/' . $id);?>" class="btn btn-warning btn-sm btn-group" title="Inativar" onclick="return confirm('Deseja realmente inativar o fornecedor?');">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/atForne/' . $id);?>" class="btn btn-success btn-sm btn-group" title="Ativar" onclick="return confirm('Deseja realmente ativar o fornecedor?');">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>Nome Fantasia</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Criação</th>
                        <th>E-Mail</th>
                        <th>Telefone</th>
                        <th>UF</th>
                        <th>Cidade</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
            <?=$pagination;?>
        </div>
    </div><!-- Fim da Row -->
</div>
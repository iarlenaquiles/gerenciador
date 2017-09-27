<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Clientes
                <a href="<?=base_url('administradorController/novoCliente');?>" class="btn btn-primary pull-right">Novo Cliente</a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?=base_url('administradorController/clientes');?>" method="POST">
                <div class="row">
                    <div class="col-md-10 form-group">
                        <input type="text" name="busca" class="form-control" placeholder="Pesquisa Clientes?"/>
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
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>E-Mail</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>UF</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach($cliente as $clientes){
                        $id             = $clientes->idcliente;
                        $nome           = $clientes->nomeCliente;
                        $rg             = $clientes->rg;
                        $cpfcnpj        = $clientes->CpfCnpj;
                        $nascimento     = $clientes->nascimentoCliente;
                        $email          = $clientes->email;
                        $telefone       = $clientes->telefone;
                        $sexo           = $clientes->sexo;
                        $uf             = $clientes->uf;
                        $ativo          = $clientes->ativo;
                ?>
                <tbody>
                    <tr>
                        <td><?=$nome;?></td>
                        <td><?=$rg;?></td>
                        <td><?=$cpfcnpj;?></td>
                        <td><?=date('d/m/Y',strtotime($nascimento));?></td>
                        <td><?=$email;?></td>
                        <td><?=$telefone;?></td>
                        <td><?=$sexo==$sexo?$sexo:$sexo;?></td>
                        <td><?=$uf==$uf?$uf:$uf;?></td>
                        <td><?=$ativo==1?'Ativo':'Inativo';?></td>
                        <td>
                            <a href="<?=base_url('administradorController/atualizaCliente/' . $id);?>" class="btn btn-primary btn-sm btn-group" title="Atualizar" onclick="return confirm('Deseja atualizar o cliente?');">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/inativaCliente/' . $id);?>" class="btn btn-warning btn-sm btn-group" title="Inativar" onclick="return confirm('Deseja Inativar o cliente?');">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/atiCliente/' . $id);?>" class="btn btn-success btn-sm btn-group" title="Ativar" onclick="return confirm('Deseja realmente ativar o cliente?');">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Nascimento</th>
                        <th>E-Mail</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>UF</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
            <?=$pagination;?>
        </div>
    </div><!-- Fim da Row -->
</div>
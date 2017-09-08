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
                        <th>Cidade</th>
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
                        $cidade         = $clientes->cidade;
                ?>
                <tbody>
                    <tr>
                        <td><?=$nome;?></td>
                        <?php if($rg != " "):?>
                            <td>Não tem</td>    
                        <?php else:?>
                            <td><?=$rg;?></td>
                        <?php endif;?>
                        <td><?=$cpfcnpj;?></td>
                        <td><?=date('d/m/Y',strtotime($nascimento));?></td>
                        <td><?=$email;?></td>
                        <td><?=$telefone;?></td>
                        <td><?=$sexo==$sexo?$sexo:$sexo;?></td>
                        <td><?=$uf==$uf?$uf:$uf;?></td>
                        <td><?=$cidade;?></td>
                        <td>
                            <a href="<?=base_url('administradorController/atualizaCliente/' . $id);?>" class="btn btn-primary btn-sm btn-group" onclick="return confirm('Deseja atualizar o cliente?');">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/inativaCliente/' . $id);?>" class="btn btn-warning btn-sm btn-group" onclick="return confirm('Deseja Inativar o cliente?');">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div><!-- Fim da Row -->
    <!--
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="disabled">
                    <a href="#"  aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    -->
</div>
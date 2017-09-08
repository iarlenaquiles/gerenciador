<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">
                Usuários
                <a href="<?=base_url('administradorController/novoUsuario');?>" class="btn btn-primary pull-right">Novo Usuário</a>
            </h2>
        </div>
    </div>

    <div class="row">
         <div class="col-md-12">
            <table class="table table-striped table-cordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-Mail</th>
                        <th>Nível</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach($usuario as $usuarios){
                        $id = $usuarios->idUsuario;
                        $nome = $usuarios->nomeUsuario;
                        $cpf = $usuarios->cpfUsuario;
                        $email = $usuarios->email;
                        $nivel = $usuarios->id_nivel;
                        $ativo = $usuarios->ativo;
                ?>
                <tbody>
                    <tr>
                        <td><?=$nome;?></td>
                        <td><?=$cpf;?></td>
                        <td><?=$email;?></td>
                        <!-- Verificando o nivel de acesso do Usuário -->
                        <?php if($nivel=='1'): ?>
                                <td>Administrador</td>
                        <?php elseif($nivel=='2'): ?>
                                <td>Gestor</td>
                        <?php else:?>
                                <td>Funcionário</td>
                        <?php endif;?>
                        <td><?=$ativo=='1'?'Ativo':'Inativo';?></td>
                        <td>
                            <a href="<?=base_url('administradorController/inatUsuario/' . $id);?>" class="btn btn-warning btn-sm btn-group" title="Inativar" onclick="return confirm('Deseja realmente inativar o usuario?');">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                            <a href="<?=base_url('administradorController/atiUsuario/' . $id);?>" class="btn btn-success btn-sm btn-group" title="Ativar" onclick="return confirm('Deseja realmente ativar o usuario?');">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        </a>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-Mail</th>
                        <th>Nível</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
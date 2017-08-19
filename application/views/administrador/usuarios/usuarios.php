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
                    </tr>
                </thead>
                <?php
                    foreach($usuario as $usuarios){
                ?>
                <tbody>
                    <tr>
                        <td><?=$usuarios->nomeUsuario;?></td>
                        <td><?=$usuarios->cpfUsuario;?></td>
                        <td><?=$usuarios->email;?></td>
                        <td><?=$usuarios->nivelAcesso=='A'?'Administrador':'Gestor';?></td>
                        <td><?=$usuarios->ativo=='1'?'Ativo':'Inativo';?></td>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-9">
            <h2 class="page-header">Atualizar Usuário</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
        <form action="<?=base_url('administradorController/AtualizarDados');?>" method="POST">
            <div class="row">
                <div class="col-md-12 form-group">
                    <input type="text" name="idUsuario" id="idUsuario" value="<?=$atualiza[0]->idUsuario;?>"/>
                    <label>Nome: </label>
                    <div class="has-error" id="div_nome">
                        <input type="text" name="nomeUsuario" id="txtnome"  class="form-control" value="<?=$atualiza[0]->nomeUsuario;?>" autofocus required=""/>
                        <span class="help-block">Informe o Nome</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- RG -->
                <div class="col-md-6 form-group">
                    <label for="">RG: </label>
                    <div class="" id="div_rg">
                        <input type="text" name="rg" id="txtrg" data-mask="0.000.000" maxlength="9" class="form-control">
                        <span class="help-block">Informe o RG</span>
                    </div>
                </div>
                <!-- CPF/Login -->
                <div class="col-md-6 form-group">
                    <label for="">CPF:</label>
                    <div class="has-error" id="div_cpf">
                        <input type="text" name="cpfUsuario" id="txtcpf" data-mask="000.000.000-00" maxlength="14" class="form-control">
                        <span class="help-block">Informe um CPF Válido</span>
                    </div>
                </div>
            </div> <!-- Fim da ROW -->

            <div class="row">
                <!-- E-Mail -->
                <div class="col-md-12 form-group">
                    <label for="">Email: </label>
                    <div class="has-error" id="div_email">
                        <input type="txt" name="email" id="txtemail" class="form-control"/>
                        <span class="help-block">Informe um e-mail válido</span>
                    </div>
                </div>
            </div><!-- Fim da ROW -->

            <div class="row">
                <!-- Nível de Acesso -->
                <div class="col-md-6 form-group">
                    <label for="">Nivel de Acesso: </label>
                    <div class="has-error" id="div_nivel">
                        <select name="id_nivel" id="txtnivel" class="form-control">
                            <option value disabled="true" selected="true">---------</option>
                            <?php foreach($nivelAcesso as $nivel): ?>
                            <option value="<?=$nivel->idnivel?>"><?=$nivel->descricao;?></option>
                            <?php endforeach;?>
                        </select>
                        <span class="help-block">Selecione um Nível de Acesso</span>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Ativo: </label>
                    <div class="has-error" id="div_ativo">
                        <select name="ativo" id="txtativo" class="form-control">
                            <option value disabled="true" selected="true">---------</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                        <span class="help-block">Selecione um Status</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
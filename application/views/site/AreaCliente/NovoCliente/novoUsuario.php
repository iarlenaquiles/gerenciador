<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<div class="row">
    <div class="col-md-10 novo">
        <h2>Novo Cliente</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <form action="<?=base_url('siteController/salvaCliente');?>" method="POST" id="form">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="">Nome: </label>
                    <div class="has-error" id="div_nome">
                        <input type="text" name="nomeCliente" id="txtnome" class="form-control" autofocus/>
                        <span class="help-block">Informe o nome</span>
                    </div>
                </div>
            </div><!-- FIM da ROW -->

            <div class="row">
                <!-- RG -->
                <div class="col-md-6 form-group">
                    <label for="">RG: </label>
                    <div class="" id="div_rg">
                        <input type="text" name="rg" class="form-control" maxlength="9" id="txtrg"/>
                        <span class="help-block">Informe um RG Válido</span>
                    </div>
                </div>
                <!-- CPF -->
                <div class="col-md-6 form-group">
                    <label for="">CPF/CNPJ: </label>
                    <div class="has-error" id="div_cpf">
                        <input type="text" class="form-control" name="CpfCnpj" id="txtcpf" maxlength="18" data-mask=["000.000.000-00","00.000.000/0000-00"] autocomplete="off">
                        <span class="help-block">Informe o número do CPF</span>
                    </div>
                </div>
            </div><!-- FIM da ROW -->

            <div class="row">
                <!-- Data de Nascimento -->
                <div class="col-md-6 form-group">
                    <label for="">Data Nascimento</label>
                    <div class="has-error" id="div_data">
                        <input type="text" name="nascimentoCliente" id="data" class="form-control"/>
                        <span class="help-block">Informe a data de nascimento</span>
                    </div>
                </div>
                <!-- E-Mail -->
                <div class="col-md-6 form-group">
                    <label for="">E-Mail: </label>
                    <div class="has-error" id="div_email">
                        <input type="text" name="email" id="txtemail" class="form-control">
                        <span class="help-block">Informe um E-Mail</span>
                    </div>
                </div>
            </div><!-- Fim da Row -->

            <div class="row">
                <!-- Senha -->
                <div class="col-md-12 form-group">
                    <label for="Senha">Senha: </label>
                    <div id="div_senha" class="has-error">
                        <input type="password" id="txtsenha" name="senha" class="form-control" required=""/>
                        <span class="help-block">Informe uma Senha!</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Telefone -->
                <div class="col-md-6 form-group">
                    <label for="">Telefone: </label>
                    <div class="has-error" id="div_fone">
                        <input type="text" name="telefone" maxlength="14" class="form-control" id="txtfone"/>
                        <span class="help-block">Informe um Telefone</span>
                    </div>
                </div>
                <!-- Sexo -->
                <div class="col-md-6 form-group">
                    <label for="">Sexo: </label>
                    <div class="has-error" id="div_sexo">
                        <select name="sexo" id="txtsexo" class="form-control">
                            <option value disabled="true" selected="true">Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                </div>
            </div><!-- FIM da ROW -->

            <div class="row">
                <!-- Endereço -->
                <div class="col-md-12 form-group">
                    <label for="">Endereço: </label>
                    <div class="has-error" id="div_endereco">
                        <input type="text" name="endereco" class="form-control" id="txtendereco"/>
                        <span class="help-block">Informe o endereço</span>
                    </div>
                </div>                
            </div><!-- FIM da ROW -->

            <div class="row">
                <!-- Número -->
                <div class="col-md-2 form-group">
                    <label for="">N°: </label>
                    <div class="has-error" id="div_numero">
                        <input type="text" name="numero" class="form-control" id="txtnumero"/>
                        <span class="help-block">Número</span>
                    </div>
                </div>
                <!-- Complemento -->
                <div class="col-md-7 form-group">
                    <label for="">Complemento: </label>
                    <input type="text" name="complemento" class="form-control">
                    <span class="help-block">Informe o Complemento do Endereço</span>
                </div>
                <!-- Cep -->
                <div class="col-md-3 form-group">
                    <label for="">CEP: </label>
                    <div class="has-error" id="div_cep">
                        <input type="text" name="cep" maxlength="10" class="form-control" id="txtcep"/>
                        <span class="help-block">Informe o CEP</span>
                    </div>
                </div>   
            </div>             
            <div class="row">
                <!-- UF -->
                <div class="col-md-4 form-group">
                    <label for="">UF: </label>
                    <div class="has-error" id="div_uf">
                        <select name="uf" id="txtuf" class="form-control">
                            <option value disabled="true" selected="true">Selecione a UF</option>
                            <option value="AL">AL</option>
                            <option value="AM">AM</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="RS">RS</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                        <span class="help-block">Informe a UF</span>
                    </div>
                </div>
                <!-- Cidade -->
                <div class="col-md-4 form-group">
                    <label for="">Cidade: </label>
                    <div class="has-error" id="div_cidade">
                        <input type="text" name="cidade" class="form-control" id="txtcidade"/>
                        <span class="help-block">Informe a cidade</span>
                    </div>
                </div>
                <!-- Bairro -->
                <div class="col-md-4 form-group">
                    <label for="">Bairro: </label>
                    <div class="has-error" id="div_bairro">
                        <input type="text" name="bairro" class="form-control" id="txtbairro"/>
                        <span class="help-block">Informe o Bairro</span>
                    </div>
                </div>
            </div><!-- FIM da ROW -->

            <div class="row">
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="<?=base_url('siteController/Cliente');?>" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
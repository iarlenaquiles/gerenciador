<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Novo Cliente</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST" id="cliente">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Nome: <span style="color:red;"> *</span></label>
                        <input type="text" name="" id="nome" class="form-control" autofocus/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">CPF/CPNJ: </label>
                        <input type="text" name="cpf" data-mask="000.000.000-00" maxlength="18"  class="form-control txtcpf"/><!-- onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' data-mask="000.000.000-00" -->
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Data Nascimento</label>
                        <input type="text" name="nascimento" id="data" class="form-control"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">E-mail: </label>
                        <input type="text" name="email" id="txtemail" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary" id="valid">Cadastrar</button>
                        <a href="<?=base_url('funcionarioController/clientes');?>" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
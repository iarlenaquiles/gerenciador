<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- NOME DO SITE -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand inicial" href="<?=base_url();?>">Seu negócio Sob Controle</a>
            </div>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url();?>">Início</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Áreas Restritas<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url('siteController/Area');?>">Área do Cliente</a></li>
                            <li><a href="<?=base_url('siteController/AreaFuncionario');?>">Área do Funcionário</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
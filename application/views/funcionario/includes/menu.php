<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url(); ?>">Gerenciador de Clientes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Configurações</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?=base_url(); ?>" title="Gerenciador">Inicio</a></li>
            <li><a href="<?=base_url('funcionarioController/clientes')?>" title="Clientes">Clientes</a></li>
            <li><a href="<?=base_url('funcionarioController/fornecedores')?>" title="Fornecedores">Fornecedores</a></li>
            <li><a href="<?=base_url('funcionarioController/produtos'); ?>" title="Produtos">Produtos</a></li>
            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Relatórios<span class="caret"></span>
              </a>
              <ul class="dropdown-menu menu_lado">
                <li><a href="<?= base_url();?>relatorio_clientes" title="Relatório"> Relatório de Clientes </a></li>
                <li><a href=""> Relatório de Vendas </a></li>
                <li><a href=""> Relatório de Produtos </a></li>
                <li><a href=""> Relatório de Estoque </a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
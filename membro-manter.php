<?php
use src\RepositorioUsuario;

include 'inc.cabecalho.php';
require_once 'src/repositorios/RepositorioUsuario.php';

$repoUsuario = new RepositorioUsuario();

$ListaUsuarios = $repoUsuario->listarUsuario();
$quantidade = count($ListaUsuarios);
$i = 0;
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Membros</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-book"></i> Tabela Membros	
	</div>
	<div class="card-body">
	
    	<!-- inicio formulario -->
        <form action="membro-manter-cadastrar-action.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="rg" name="rg" placeholder="Rg">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Cpf">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="uf" name="uf" placeholder="Uf">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
            
            <div class="form-group col-md-6">
              <input type="text"  id="login" name="login" class="form-control" placeholder="Login">
            </div>
            
          
          
            <div class="form-group col-md-6">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
            </div>
            
            <div class="form-group col-md-6">
              <input type="password" id="senhaConfirma" name="senhaConfirma" class="form-control" placeholder="Confirmar Senha">
            </div>
          </div>
          
          </div>
          

          
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>	
        
    </div>
	
</div>


<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Membros	
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Login</th>
						<th>Acoes</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $ListaUsuarios[$i]->getNome(); ?></td>
						<td><?php echo $ListaUsuarios[$i]->getEmail(); ?></td>
						<td><?php echo $ListaUsuarios[$i]->getLogin(); ?></td>
						<td>
							<a href="membro-manter-editar.php?id=<?php echo $ListaUsuarios[$i]->getId(); ?>"><i class="fa fa-edit"></i></a> | 
							<a href="usuario-manter-deletar-action.php?id=<?php echo $ListaUsuarios[$i]->getId(); ?>"><i class="fa fa-trash"></i> 
						</td>
					</tr>
				<?php $i++; } ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php

include 'inc.rodape.php';
?>
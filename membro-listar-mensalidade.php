<?php
use src\repositorios\RepositorioReceita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';

$repoReceitas = new RepositorioReceita();

$ListarMensalidade = $repoReceitas->listarMensalidade();
$quantidade = count($ListarMensalidade);
$i = 0;


?>


<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Lista de Mensalidades
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Categoria</th>
						
						<th>Data de Pagamento</th>
						<th>Detalhes</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $ListarMensalidade[$i]->getDescricao(); ?></td>
						<td><?php echo $ListarMensalidade[$i]->getDataPagamento(); ?></td>
						<td><a
							href="membro-listar-mensalidade-consultar.php?id=<?php echo $ListarMensalidade[$i]->getId(); ?>"><i
								class="far fa-eye"></i></a></td>
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
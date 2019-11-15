<?php
use src\RepositorioTreinamento;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioTreinamento.php';

// recupera o id do usuario
$idTreinamento = $_GET['id'];

$repositorioTreinamento = new RepositorioTreinamento();

$treinamento = $repositorioTreinamento->consultarTreinamentoPorId($idTreinamento);

// var_dump($treinamento);
// die("Fim");

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Treino</li>
</ol>
<!--  CARD DADOS TREINO -->
<div class="row">
  <div class="col-md-12">
	<div class="card mb-3">
    		<div class="card-header">
    		<i class="far fa-clipboard"></i>
    						Treino</div>
    		<div class="card-body">
    			<form
    				action="usuario-manter-editar-action.php?id=<?php echo $idTreinamento; ?>"
    				method="post">
    				<input type="hidden" value="<?php echo $treinamento->getId();?>"
    					name="id">
    				<!-- CATEGORIA E DATA -->
    				<div class="form-group">
    					<div class="form-row">
    						<div class="col-md-6">
    							<label>Categoria:</label>
    							<div class="form-label-group">
    								<input type="text" name="categoria" id="categoria"
    									value="<?php echo $treinamento->getCategoria();?>"
    									class="form-control" required="required" autofocus="autofocus"
    									readonly>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<label>Data</label>
    							<div class="form-label-group">
    								<input type="date" name="data" id="data"
    									value="<?php echo $treinamento->getData();?>"
    									class="form-control" placeholder="Last name"
    									required="required" readonly>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!--FIM CATEGORIA E DATA -->
    				<!--INÍCIO DESCRICAO -->
    				<div class="form-group">
    					<div class="form-row">
        					<div class="col-md-12">
        						<label>Descricao:</label>
            					<div class="form-label-group">
            					
            						<input type="text" name="descricao" id="descricao"
            							value="<?php echo $treinamento->getDescricao();?>"
            							class="form-control" placeholder="Descricao"
            							required="required" readonly>
        						</div>
        					</div>
    					</div>
    				</div>
    				<!--FIM DESCRICAO -->
    				<!--COMECO SITUACAO -->				
    				<div class="form-group">
    					<div class="form-row">
    						<div class="col-md-6">
    							<label>Situacao</label>
    							<div class="form-label-group">
    								<input type="text" name="situacao" id="situacao"
    									value="<?php echo $treinamento->getSituacao();?>"
    									class="form-control" placeholder="Password" required="required"
    									readonly>
    							</div>
    						</div>
    				
    				<!--COMECO SITUACAO -->	
    				<!--COMEÇO ID USUARIO -->
        		
            				<div class="col-md-6">
            					<label>Id Usuario</label>
            					<div class="form-label-group">
            						<input type="text" id="idusuario"
            							value="<?php echo $treinamento->getIdUsuario();?>"
            							class="form-control" placeholder="Confirm password"
            							required="required" readonly>
            					</div>
            				</div>
            			</div>	
        			</div>	<!--FIM ID USUARIO -->
    			</form>
			</div><!-- fim do card body -->
	</div>	<!-- fim do card -->
  </div>
</div>
<?php if ($treinamento->getCategoria() == "Indoor") {?>

<!-- FORMULÁRIO DE PONTUAÇÃO DA CATEGORIA INDOOR -->
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-bullseye"></i> Pontuacao
	</div>
	<div class="card-body">
		<form action="pontuacao-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="form-group col-md-3">
					<select name="round" id="round"
						class="form-control">
					<!--	<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Round</label> -->
						<option selected>Round</option>
						<option>Primeiro Round</option>
						<option>Segundo Round</option>
					</select>
				</div>
			
			
			
			<div class="form-group col-md-3">
					<select name="End" id="End"
						class="form-control">
				<!-- 	<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">End</label> -->
						<option selected>End</option>
						<option>Primeiro End</option>
						<option>Segundo End</option>
						<option>Terceiro End</option>
						<option>Quarto End</option>
						<option>Quinto End</option>
						<option>Sexto End</option>
						<option>Setimo End</option>
						<option>Oitavo End</option>
						<option>Nono End</option>
						<option>Decimo End</option>
					</select>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="form-group col-md-3">
					<select name="Pontuacao1" id="Pontuacao1"
						class="form-control">
				<!-- 	<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Primeiro Tiro</label> -->
						<option selected>Primeiro Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
			
		
				<div class="form-group col-md-3">
					<select name="Pontuacao2" id="Pontuacao2"
						class="form-control">
				<!--    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Segundo Tiro</label> -->
						<option selected>Segundo Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
		

				<div class="form-group col-md-3">
					<select name="Pontuacao3" id="Pontuacao3"
						class="form-control">
		<!--			<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Terceiro Tiro</label>  -->
						<option selected>Terceiro Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
			</div>
			
			<div class="form-group form-row">
				<div class="col-md-2">
					<input type="text" name="Total" class="form-control"
						placeholder="Total" readonly>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
		</form>
	</div>
</div>
</div>
</div>
<!-- INÍCIO TABELA INDOOR PRIMEIRO ROUND-->
<div class="row">
<div class="col-md-6">
<div class="card mb-3">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "4" class="table-active">Primeiro Round</th>
      <th scope="col" class="table-active" >Total </th>
      <th scope="col" class="table-active" >Acoes </th>
      
      <!--  
      <a
							href="#"><i
								class="fa fa-edit"></i></a> |<a
							href="#">
								<i class="fa fa-trash"></i>
		</a> -->
	  
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1o End</th>
      <td>10</td>
      <td>6</td>
      <td>10</td>
      <td>26</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>

    </tr>
    <tr>
      <th scope="row">2o End</th>
      <td>X</td>
      <td>X</td>
      <td>2</td>
      <td>22</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">3o End</th>
      <td> 9</td>
      <td>10</td>
      <td>10</td>
      <td>29</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
     <tr>
      <th scope="row">4o End</th>
      <td>9</td>
      <td>7</td>
      <td>10</td>
      <td>26</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">5o End</th>
      <td> 9</td>
      <td>10</td>
      <td>10</td>
      <td>29</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">6o End</th>
      <td>X</td>
      <td>10</td>
      <td>10</td>
      <td>30</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">7o End</th>
      <td> 9</td>
      <td>10</td>
      <td>1</td>
      <td>20</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">8o End</th>
      <td>10</td>
      <td>10</td>
      <td>10</td>
      <td>30</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">9o End</th>
      <td>8</td>
      <td>10</td>
      <td>10</td>
      <td>28</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">10o End</th>
      <td>8</td>
      <td>10</td>
      <td>7</td>
      <td>25</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row" colspan="5" class="table-secondary">Total: </th>
      <td class="table-secondary">265</td>
    </tr>
   </tbody>
 </table>  
</div>
</div>
 <!-- FIM TABELA INDOOR PRIMEIRO ROUND--> 
    <!-- INÍCIO TABELA INDOOR SEGUNDO ROUND-->
<div class="col-md-6">    
<div class="card mb-3">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "4" class="table-active">Segundo Round</th>
      <th scope="col" class="table-active">Total</th>
      <th scope="col" class="table-active">Acoes</th>
 <!--    <a
							href="#"><i
								class="fa fa-edit"></i></a> |<a
							href="#">
								<i class="fa fa-trash"></i>
		</a> -->  
 		
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1o End</th>
      <td>10</td>
      <td>6</td>
      <td>10</td>
      <td>26</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>

    </tr>
    <tr>
      <th scope="row">2o End</th>
      <td>X</td>
      <td>X</td>
      <td>2</td>
      <td>22</td><td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">3o End</th>
      <td> 9</td>
      <td>10</td>
      <td>10</td>
      <td>29</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
     <tr>
      <th scope="row">4o End</th>
      <td>9</td>
      <td>7</td>
      <td>10</td>
      <td>26</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">5o End</th>
      <td> 9</td>
      <td>10</td>
      <td>10</td>
      <td>29</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">6o End</th>
      <td>X</td>
      <td>10</td>
      <td>10</td>
      <td>30</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">7o End</th>
      <td> 9</td>
      <td>10</td>
      <td>1</td>
      <td>20</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">8o End</th>
      <td>10</td>
      <td>10</td>
      <td>10</td>
      <td>30</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">9o End</th>
      <td>8</td>
      <td>10</td>
      <td>10</td>
      <td>28</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">10o End</th>
      <td>10</td>
      <td>10</td>
      <td>10</td>
      <td>30</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row" colspan="5" class="table-secondary">Total: </th>
      <td class="table-secondary">270</td>
    </tr>
   </tbody>
 </table> 
 </div>
</div>
</div>
 <!-- FIM TABELA INDOOR SEGUNDO ROUND-->
 <!--  PONTUACAO TOTAL -->
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "4" class="table-success"> <i class="fas fa-crosshairs"></i> PONTUACAO TOTAL: </th>
      <th scope="col" class="table-success">535</th>
    </tr>
  </thead>
 </table> 

 <!--  FIM PONTUACAO TOTAL -->
<?php }else { ?>
<!-- FORMULÁRIO DE PONTUAÇÃO DA CATEGORIA OUTDOOR -->
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-bullseye"></i> Pontuacao
	</div>
	<div class="card-body">
		<form action="pontuacao-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="form-group col-md-3">
					<select name="round" id="round"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Round</label>
						<option selected>Round</option>
						<option>Primeiro Round</option>
						<option>Segundo Round</option>
					</select>
				</div>
			
				<div class="form-group col-md-3">
					<select name="End" id="End"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">End</label>
						<option selected>End</option>
						<option>Primeiro End</option>
						<option>Segundo End</option>
						<option>Terceiro End</option>
						<option>Quarto End</option>
						<option>Quinto End</option>
						<option>Sexto End</option>
					</select>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="form-group col-md-4">
					<select name="Pontuacao1" id="Pontuacao1"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Primeiro Tiro</label>
						<option selected>Primeiro Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<select name="Pontuacao2" id="Pontuacao2"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Segundo Tiro</label>
						<option selected>Segundo Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
		

				<div class="form-group col-md-4">
					<select name="Pontuacao3" id="Pontuacao3"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Terceiro Tiro</label>
						<option selected>Terceiro Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="form-group col-md-4">
					<select name="Pontuacao4" id="Pontuacao4"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Quarto Tiro</label>
						<option selected>Quarto Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<select name="Pontuacao5" id="Pontuacao5"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Quinto Tiro</label>
						<option selected>Quinto Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<select name="Pontuacao6" id="Pontuacao6"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Sexto Tiro</label>
						<option selected>Sexto Disparo</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>X</option>
					</select>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-2">
					<input type="text" name="Total" class="form-control"
						placeholder="Total" readonly>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
		</form>
	</div>
</div>
</div>
</div>
 
 
 <!-- TABELA OUTDOOR PRIMEIRO ROUND-->
<div class="row"> 
<div class="col-md-6"> 
 <div class="card mb-3">
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "7" class="table-active">Primeiro Round</th>
      <th scope="col" class="table-active">Total </th>
      <th scope="col" class="table-active">Acoes </th>  
      <!--  
      <a
							href="#"><i
								class="fa fa-edit"></i></a> |<a
							href="#">
								<i class="fa fa-trash"></i>
		</a>
	-->
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1o End</th>
      <td>10</td>
      <td>8</td>
      <td>10</td>
      <td>7</td>
      <td>8</td>
      <td>X</td>      
      <td>53</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">2o End</th>
      <td>X</td>
      <td>X</td>
      <td>7</td>
      <td>9</td>
      <td>9</td>
      <td>9</td>
      <td>54</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">3o End</th>
      <td>9</td>
      <td>10</td>
      <td>10</td>
      <td>8</td>
      <td>9</td>
      <td>6</td>
      <td>52</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
     <tr>
      <th scope="row">4o End</th>
      <td>9</td>
      <td>7</td>
      <td>10</td>
      <td>9</td>
      <td>10</td>
      <td>9</td>
      <td>54</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">5o End</th>
      <td>9</td>
      <td>10</td>
      <td>10</td>
      <td>9</td>
      <td>10</td>
      <td>7</td>
      <td>55</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">6o End</th>
      <td>X</td>
      <td>10</td>
      <td>7</td>
      <td>9</td>
      <td>8</td>
      <td>8</td>
      <td>52</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row" colspan="8" class="table-secondary">Total: </th>
      <td class="table-secondary">320</td>
    </tr>
   </tbody>
 </table>
 </div>
</div>
 <!-- FIM TABELA OUTDOOR PRIMEIRO ROUND-->
  <!-- TABELA OUTDOOR SEGUNDO ROUND-->
<div class="col-md-6">
<div class="card mb-3">
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "7" class="table-active">Segundo Round</th>
      <th scope="col" class="table-active">Total </th>
      <th scope="col" class="table-active">Acoes </th>
      <!--  <a href="#"><i class="fa fa-edit"></i></a> |<a
							href="#">
								<i class="fa fa-trash"></i>
		</a> -->
	 
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1o End</th>
      <td>10</td>
      <td>8</td>
      <td>10</td>
      <td>7</td>
      <td>8</td>
      <td>X</td>      
      <td>53</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">2o End</th>
      <td>X</td>
      <td>X</td>
      <td>7</td>
      <td>9</td>
      <td>9</td>
      <td>9</td>
      <td>54</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">3o End</th>
      <td>9</td>
      <td>10</td>
      <td>10</td>
      <td>8</td>
      <td>9</td>
      <td>6</td>
      <td>52</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
     <tr>
      <th scope="row">4o End</th>
      <td>9</td>
      <td>7</td>
      <td>10</td>
      <td>9</td>
      <td>10</td>
      <td>9</td>
      <td>54</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">5o End</th>
      <td>9</td>
      <td>10</td>
      <td>10</td>
      <td>9</td>
      <td>10</td>
      <td>7</td>
      <td>55</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row">6o End</th>
      <td>X</td>
      <td>10</td>
      <td>7</td>
      <td>9</td>
      <td>8</td>
      <td>8</td>
      <td>52</td>
      <td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
    </tr>
    <tr>
      <th scope="row" colspan="8" class="table-secondary">Total: </th>
      <td class="table-secondary">320</td>
    </tr>
   </tbody>
 </table>
 </div>
</div>
</div>
  <!-- FIM TABELA OUTDOOR SEGUNDO ROUND-->
  
   <!--  PONTUACAO TOTAL -->
 <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan= "4" class="table-success"><i class="fas fa-crosshairs"></i> PONTUACAO TOTAL: </th>
      <th scope="col" class="table-success">640</th>
    </tr>
  </thead>
 </table> 
 <!--  FIM PONTUACAO TOTAL -->
<?php }?>


<?php

include 'inc.rodape.php';
?>
<?php
use src\RepositorioUsuario;

require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/modelo/Usuario.php';

$repositorio = new RepositorioUsuario();

$idUsuario = $_GET['id'];

//var_dump($idUsuario);
//die();

$repositorioUsuario = new RepositorioUsuario();

$usuario = $repositorioUsuario->consultarUsuarioPorID($idUsuario);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>CENTRO DE TREINAMENTO OSCAR RODRIGUES</title>
<link href="https://fonts.googleapis.com/css?family=Rufina&display=swap"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="src/style.css" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">CENTRO DE TREINAMENTO OSCAR RODRIGUES.</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>

	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide"
			data-ride="carousel" data-interval="3000">
			<ol class="carousel-indicators">
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="src/projeto-ctor.jpg"
						class="d-block w-100 carrossel-img-um" alt="...">
					<div class="carousel-caption d-none d-md-block h-50">
						<h1 class="fonte-titulo display-4"></h1>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!--<h1>Saiba onde e como investir para viver melhor!</h1>
    <h1>Economize e ganhe em saúde!</h1>-->

	<h1 class="text-center fonte-titulo pt-5">Atleta em destaque</h1>
	<p class="text-center text-secondary pb-5"></p>

	<section class="container-fluid">
		<div class="row justify-content-md-center bg-light"> 
			<font size="6">Atleta em destaque</font>
     	</div>
	</section>
	
	<section class="container-fluid">
		<div class="row justify-content-md-start bg-light"> 

      
        <article class="card borda-cor-preto card-largura p-0 m-4 col-4 col-sm-2">
				<img src="src/arco-ctor.jpg"
					class="card-img-top altura-img-cards" alt="...">
				<div class="card-body">
				<h5 class="card-title"><?php echo $usuario[0]->getNome() . "<br/>";?></h5>
					

				</div>
		</article>       
		
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">NOME:</label>
            <h5 class="card-title"><?php echo $usuario[0]->getNome() . "<br/>";?></h5>
          </div>
     
     </div>
	</section>

	<footer class="bg-secondary p-3">
		<p class="text-light m-0 text-center">
			contato: <a class="text-light" href="mailto:www.CTOR.com.br">www.CTOR.com.br</a>
		</p>
	</footer>


	<!-- Modal -->
	<div class="modal fade" id="modalContato" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contato</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="exampleFormControlInput1">Nome</label> <input
								type="text" class="form-control" id="exampleFormControlInput1"
								placeholder="name@example.com">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label> <input
								type="email" class="form-control" id="exampleFormControlInput1"
								placeholder="name@example.com">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Deixe seu comentario</label>
							<textarea class="form-control" id="exampleFormControlTextarea1"
								rows="3"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary">Enviar</button>
				</div>
			</div>
		</div>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script src=""></script>
</body>
</html>


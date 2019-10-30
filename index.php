<?php
use src\RepositorioTreinamento;

require_once 'src/repositorios/RepositorioTreinamento.php';
require_once 'src/modelo/Treinamento.php';

$repositorio = new RepositorioTreinamento();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Educando & Financiando</title>
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
		<a class="navbar-brand" href="#">Educando & Financiando</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end"
			id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="#">Home <span
					class="sr-only">(current)</span></a> <a class="nav-item nav-link"
					href="#">Cursos</a> <a class="nav-item nav-link" href="#">Quem
					Somos</a> <a class="nav-item nav-link" data-toggle="modal"
					data-target="#modalContato" href="#">Contato</a> <a
					class="nav-item nav-link" href="login.php">Area membros</a>
			</div>
		</div>
	</nav>

	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide"
			data-ride="carousel" data-interval="3000">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0"
					class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="src/img/carrossel-img1.webp"
						class="d-block w-100 carrossel-img-um" alt="...">
					<div class="carousel-caption d-none d-md-block h-50">
						<h1 class="fonte-titulo display-4">Curso de Trades</h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="src/img/carrossel-img2.webp"
						class="d-block w-100 carrossel-img-dois" alt="...">
					<div class="carousel-caption d-none d-md-block h-50">
						<h1 class="fonte-titulo display-4">Curso de carteira
							previdenciaria</h1>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions"
				role="button" data-slide="prev"> <span
				class="carousel-control-prev-icon" aria-hidden="true"></span> <span
				class="sr-only">Previous</span>
			</a> <a class="carousel-control-next" href="#carouselExampleCaptions"
				role="button" data-slide="next"> <span
				class="carousel-control-next-icon" aria-hidden="true"></span> <span
				class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<!--<h1>Saiba onde e como investir para viver melhor!</h1>
    <h1>Economize e ganhe em saúde!</h1>-->

	<h1 class="text-center fonte-titulo pt-5">Saiba onde e como investir
		para viver melhor!</h1>
	<p class="text-center text-secondary pb-5">Nossas consultorias ajudam
		você a aproveitar melhor o seu dinheiro, economizar, ganhar tempo e
		praticidade</p>

	<section class="container-fluid">
		<div class="row justify-content-md-center bg-light"> 
    <?php
    $listaTreinamentos = $repositorio->listarTreinamento();
    $i = 0;
    while ($i < count($listaTreinamentos)) {
        ?>
      
        <article
				class="card borda-cor-preto card-largura p-0 m-4 col-12 col-sm-2">
				<img src="src/img/curso-invest1.jpg"
					class="card-img-top altura-img-cards" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $listaTreinamentos[$i]->getNome() . "<br/>";?></h5>
					<p class="card-text"><?php echo $listaTreinamentos[$i]->getDescricao() . "<br/>";?></p>
					<a href="#" class="btn btn-primary">Conheça o curso</a>
				</div>
			</article>      
     
     <?php
        $i ++;
    }
    ?>
     </div>
	</section>

	<section id="quem-somos">
		<div class="py-5 px-2">
			<h2 class="text-center texto-cor-especial fonte-titulo">Quem somos</h2>
			<p class="text-center text-secondary">Conheça a comunidade por trás
				da iniciativa</p>
		</div>
		<ul
			class="list-unstyled list-inline text-center d-lg-flex justify-content-lg-around">
			<li class="list-inline-item">
				<figure class="figure">
					<img src="src/img/eu.png"
						class="img-thumbnail borda-cor-especial thumb-redondo"
						alt="foto do rosto de uma pessoa">
					<figcaption
						class="figure-caption text-center texto-cor-especial mt-3 fonte-titulo">
						<h4>Eu</h4>
					</figcaption>
					<figcaption class="figure-caption text-center">conteúdo</figcaption>
				</figure>
			</li>
		</ul>
	</section>

	<footer class="bg-secondary p-3">
		<p class="text-light m-0 text-center">
			contato: <a class="text-light" href="mailto:email@educfinanc.com.br">email@educfinanc.com.br</a>
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

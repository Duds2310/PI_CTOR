<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>CTOR</title>
	<link href="https://fonts.googleapis.com/css?family=Rufina&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="src/style.css" />
</head>


<body>

	<!-- Inicio Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light text-white">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" id="home" href="#">Home <span class="sr-only">(current)</span></a> <a class="nav-item nav-link" href="#missao-valores">Valores</a> <a class="nav-item nav-link" href="#missao-valores">Missão</a> <a class="nav-item nav-link" href="#mapa">Mapa</a>
				<a class="nav-item nav-link" href="login.php">Área membros</a>


			</div>
		</div>
	</nav>
	<!-- Fim Navbar -->

	<!-- Inicio Modal -->

	<div class="modal fade" id="modalContato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contato</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-contact" tabindex="1" action="envia.php" method="post">
						<div class="form-group">
							<label for="exampleFormControlInput1">Nome</label> <input type="text" class="form-control" name="nome" id="nome" placeholder="nome">
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label> <input type="email" class="form-control" name="email" id="email" placeholder="email">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Deixe seu comentario</label>
							<textarea class="form-control" name="msg" id="comentario" rows="3"></textarea>
						</div>

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Fim Modal -->

	<!-- Inicio Carrosel -->
	<section class="row justify-content-md-center ">
		<img src="src/ctor.jpg">
	</section>
	<!-- Fim Carrosel -->


	<!-- Inicio Titulo -->
	<h1 class="text-center fonte-titulo pt-5">Centro de Treinamento Oscar
		Rodrigues</h1>
	<!-- Fim Titulo -->

	<!-- Inicio Card Atletas -->
	<section id="fotos" class="container-fluid px-md-4 p-3 ">
		<div class="row justify-content-md-center bg-dark rounded p-2 border border-primary ">
			<article class="col-12">
				<img alt="" src="src/img/ctor1.jpeg" width="200" height="200" alt="..." class="rounded-circle">
				<img alt="" src="src/img/ctor2.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor3.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor4.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor7.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor8.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor9.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor13.jpeg" width="200" height="200" class="rounded-circle">
				<img alt="" src="src/img/ctor6.jpeg" width="200" height="200" class="rounded-circle">
		</div>
		</div>
	</section>
	</article>

	<!-- Fim card Atletas -->




	<!--Inicio valores -->
	<section id="missao-valores" class="container-fluid px-md-4 p-3  col-md-12 col-sm-6">
		<div class="row justify-content-md-center">
			<article class="col-sm-6 ">
				<div class="jumbotron border border-secondary">
					<h1 class="display-4 text-center">Valores</h1>
					<p class="lead">* Ensinar e praticar o tiro com arco composto dentro das normas
						legais, com conhecimento, aplicando as regras do esporte vigentes
						em nosso país e na World Archery.<br /> * Manter o devido respeito
						ao esporte, valorizando e sempre buscando divulgar, fazer crescer
						e levar o tiro com arco para todos.<br /> * Procurar sempre que
						possível levar o tiro com arco ao público em geral, buscando
						aplicar a nossa responsabilidade social.<br /> * Mostrar que a
						transparência, a honestidade e a sustentabilidade fazem parte de
						nosso esporte e que procuramos ter a melhor convivência com a
						fauna e a flora, respeitando o nosso planeta e todos que nele
						habitam.<br /> * E, acima de tudo, em prol do tiro com arco,
						queremos mostrar que estamos dispostos a ensinar, mas também a
						aprender, pois como seres humanos estamos sempre buscando
						aprimorar o que somos, temos e fazemos.<br />

				</div>
			</article>
		</div>
	</section>
	<!-- Fim valores -->

	<!-- Inicio valores -->
	<section id="missao-valores" class="container-fluid">
		<div class="row justify-content-md-center">
			<article class="col-md-6 col-sm-6">
				<div class="jumbotron border border-secondary">
					<h1 class="display-4 text-center">Missão</h1>
					<p class="lead">Divulgar e ajudar aqueles que se interessam pela
						prática do tiro com arco composto a ter conhecimento geral e
						específico para poder praticar o esporte com sabedoria,
						responsabilidade, respeito e prazer!</p>

				</div>
			</article>
		</div>
	</section>
	<!-- Fim valores -->


	<section id="mapa">
		<div class="container-fluid col-sm-12">
			<div class="map-responsive">
				<iframe src="https://maps.google.com/maps?q=rua%20coletora%202&t=&z=13&ie=UTF8&iwloc=&output=embed" width="1880" height="450" frameborder="0" style="border: 0" class="rounded border border-secondary col-sm-12" allowfullscreen></iframe>
			</div>
		</div>
	</section>

	<footer id="myFooter">
		<div class="container bg-dark text-white col-sm-12 ">
			<ul></a>
			</ul>
			<p class="footer-copyright" align="center">© 2019 Copyright - Alyelson Silva, Eduardo Santana, Emmanuel Barbosa, Filipe Tavares,
				João Vitor Ferreira, Hermógenes Felisberto e Nilo Rodrigues.</p>

			<a class="nav-item nav-link active text-white" align="right" href="#">Voltar ao topo <span class="sr-only">(current)</span></a>
		</div>
	</footer>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src=""></script>
</body>

</html>
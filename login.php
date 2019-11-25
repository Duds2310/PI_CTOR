<!doctype html>
<?php
$loginError = false;

// verifica se essa pagina recebeu parametro 'login' via url, neste caso usuario n�o existe
if (isset($_GET['login'])) {
    $loginError = true;
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

<title>CTOR - Área Administrativa</title>
<!-- Bootstrap core CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous" />
<!-- Custom styles for this template -->
<link
	href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css"
	rel="stylesheet">
</head>

<body class="text-center">

	<form class="form-signin" action="login-action.php" method="post">
      <?php if($loginError){ //verifica se $loginError � true, se for exibe o seguinte alerta?>
          <p class="alert alert-danger" role="alert">Usuário Não Existe!
		</p>
	  <?php }?>
      <img class="mb-4" src="src/ctor.jpg"
			alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>
		<label for="inputEmail" class="sr-only">Email</label> <input
			type="email" id="email" name="email" class="form-control"
			placeholder="Endereço Email" required autofocus> <label
			for="inputPassword" class="sr-only">Senha</label> <input
			type="password" id="password" name="password" class="form-control"
			placeholder="Senha" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	</form>
</body>
</html>
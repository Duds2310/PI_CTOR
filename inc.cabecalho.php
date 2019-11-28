<?php
// $usuarioLogado = $_GET['usuario'];

session_start();


//verificando se tem valores na sessao
if (!(isset($_SESSION['idUsuario']) && isset($_SESSION['emailUsuario'])
	&& isset($_SESSION['nomeUsuario']) && isset($_SESSION['catUsuario']))) {
	header("Location: login.php");
}


$idUsuarioLogado = $_SESSION['idUsuario'];
$emailUsuarioLogado = $_SESSION['emailUsuario'];
$nomeUsuarioLogado = $_SESSION['nomeUsuario'];
$catUsuarioLogado = $_SESSION['catUsuario'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>CTOR - Admin</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.php">CTOR</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>

		<!-- Navbar Search -->
		<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
			<div class="input-group">
				<!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div> -->
			</div>
		</form>

		<!-- Navbar -->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['nomeUsuario']?> <i class="fas fa-user fa-fw"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<!-- <div class="dropdown-divider"></div> -->
					<!-- <!--  data-toggle="modal" data-target="#logoutModal"  -->
					
					<a data-toggle="modal" data-target="#logoutModal" class="dropdown-item">Logout</a>
				</div>
			</li>
		</ul>
		
	</nav>

	<div id="wrapper">


		<?php if ($catUsuarioLogado == '2') { ?>

			<!-- Sidebar - Menu Lateral -->
			<ul class="sidebar navbar-nav">
				<li class="nav-item"><a class="nav-link" href="dashboard.php"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
				<li class="nav-item"><a class="nav-link" href="usuario-manter.php"> <i class="fas fa-user-circle fa-fw"></i> <span>Manter Usuarios</span></a></li>
				<li class="nav-item"><a class="nav-link" href="membro-manter.php"> <i class="fas fa-user-circle fa-fw"></i> <span>Manter Membro</span></a></li>
				<li class="nav-item"><a class="nav-link" href="receita-manter.php"> <i class="fas fa-coins "></i> <span>Manter Receita</span></a></li>
				<li class="nav-item"><a class="nav-link" href="despesa-manter.php"> <i class="fas fa-coins"></i> <span>Manter Despesa</span></a></li>
				<li class="nav-item"><a class="nav-link" href="provas-manter.php"> <i class="fas fa-user-circle fa-fw"></i> <span>Manter Provas</span></a></li>
				<li class="nav-item"><a class="nav-link" href="treinamento-manter.php"> <i class="fas fa-bullseye"></i> <span>Manter Treino</span></a></li>
			</ul>

			


		<?php } ?>


		<?php if ($catUsuarioLogado == '1') { ?>
			<!-- Sidebar - Menu Lateral -->
			<ul class="sidebar navbar-nav">

				<li class="nav-item"><a class="nav-link" href="treinamento-manter.php"> <i class="fas fa-bullseye"></i> <span>Manter Treino</span></a></li>
				<li class="nav-item"><a class="nav-link" href="membro-listar-mensalidade.php"> <i class="fas fa-dollar-sign"></i> <span>Consultar Mensalidades</span></a></li>
				<li class="nav-item"><a class="nav-link" href="membro-manter-editar.php"> <i class="fas fa-user-circle fa-fw"></i> <span>Editar Perfil</span></a></li>
			</ul>

		<?php } ?>

		<div id="content-wrapper">

			<div class="container-fluid">
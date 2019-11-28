<?php

use src\RepositorioUsuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

//recupera o id do usuario
$idUsuario = $idUsuarioLogado;

$repositorioUsuario = new RepositorioUsuario();

$usuario = $repositorioUsuario->consultarMembroPorID($idUsuario);

//var_dump($usuario);
//die();



?>

<!-- Inicio Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
  <li class="breadcrumb-item active">Editar Membro</li>
</ol>
<!-- Fim Breadcrumbs-->

<div class="container">
  <div class="card mb-3">
    <div class="card-header">Editar Membro</div>
    <div class="card-body">

      <form action="membro-manter-editar-action.php" method="post" name="dados" onsubmit="return enviar();">
        <input type="hidden" value="<?php echo $usuario[0]->getId() ?>" name="id" />

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="firstName">Nome</label>
              <div class="form-label-group">
                <input type="text" id="firstName" name="nome" value="<?php echo $usuario[0]->getNome() ?>" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="rg">RG</label>
              <div class="form-label-group">
                <input type="text" id="rg" name="rg" value="<?php echo $usuario[0]->getRg() ?>" class="form-control" autofocus="autofocus">
              </div>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="cep">CEP</label>
              <div class="form-label-group">
                <input type="text" id="cep" name="cep" value="<?php echo $usuario[0]->getCep() ?>" class="form-control" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="cpf">CPF</label>
              <div class="form-label-group">
                <input type="text" id="cpf" name="cpf" value="<?php echo $usuario[0]->getCpf() ?>" class="form-control" required="required" autofocus="autofocus">
              </div>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="uf">UF</label>
              <div class="form-label-group">
                <input type="text" id="uf" name="uf" value="<?php echo $usuario[0]->getUf() ?>" class="form-control" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="cidade">Cidade</label>
              <div class="form-label-group">
                <input type="text" id="cidade" name="cidade" value="<?php echo $usuario[0]->getCidade() ?>" class="form-control" autofocus="autofocus">
              </div>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="logradouro">Logradouro</label>
              <div class="form-label-group">
                <input type="text" id="logradouro" name="logradouro" value="<?php echo $usuario[0]->getLogradouro() ?>" class="form-control" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="telefone">Telefone</label>
              <div class="form-label-group">
                <input type="text" id="telefone" name="telefone" value="<?php echo $usuario[0]->getTelefone() ?>" class="form-control">
              </div>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="lastName">Login</label>
              <div class="form-label-group">
                <input type="text" id="login" name="login" value="<?php echo $usuario[0]->getLogin() ?>" class="form-control" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputEmail">Email</label>
              <div class="form-label-group">
                <input type="email" id="email" name="email" value="<?php echo $usuario[0]->getEmail() ?>" class="form-control" required="required" autofocus="autofocus">
              </div>
            </div>

          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-6">
              <label for="inputPassword">Password</label>
              <div class="form-label-group">
                <input type="password" id="senha" name="senha" value="<?php echo $usuario[0]->getSenha() ?>" class="form-control" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="col-md-6">
              <label for="confirmPassword">Confirmar password</label>
              <div class="form-label-group">
                <input type="password" id="senhaConfirma" name="senhaConfirma" value="<?php echo $usuario[0]->getSenha() ?>" class="form-control" required="required" autofocus="autofocus">
              </div>
            </div>

          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block"> Salvar</button>
      </form>
    </div>

    <!-- <a class="btn btn-primary btn-block" href="login.html">Alterar</a> -->


  </div>
</div>

<script language="JavaScript">
  function enviar() {

    if (document.dados.cpf.value == "" ||
      document.dados.cpf.value.length != 11) {
      alert("Preencha o campo CPF corretamente!");
      document.dados.cpf.focus();
      return false;
    }

    if (document.dados.cep.value == "" ||
      document.dados.cep.value.length != 8) {
      alert("Preencha o campo CEP corretamente!");
      document.dados.cep.focus();
      return false;
    }

    if (document.dados.rg.value == "" ||
      document.dados.rg.value.length > 13) {
      alert("Preencha o campo RG corretamente!");
      document.dados.rg.focus();
      return false;
    }

    if (document.dados.telefone.value == "" ||
      document.dados.telefone.value.length != 9) {
      alert("Preencha o campo TELEFONE corretamente!");
      document.dados.telefone.focus();
      return false;
    }

    if (document.dados.senhaConfirma.value != document.dados.senha.value) {
      alert("As senhas não coincidem!");
      document.dados.senhaConfirma.focus();
      return false;
    }












  }
</script>



<?php include 'inc.rodape.php'; ?>
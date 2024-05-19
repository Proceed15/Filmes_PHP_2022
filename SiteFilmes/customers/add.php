<?php ob_start(); ?>
<?php 
  require_once('functions.php'); 
  //esse é o add.php
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
  } else {
        $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location: index.php");
  }
  include(HEADER_TEMPLATE); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>


<header>
   <h2>Novo Cliente</h2>
</header>

<form action="add.php" method="post">
  <!-- area de campos do form -->
  <hr>
  <div class="row">
    <div class="form-group col-md-7 align=center">
      <label for="name">Nome / Razão Social</label>
      <input type="text" maxlength="255" class="form-control" name="customer['name']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">CNPJ / CPF</label>
      <input type="text" maxlength="15" class="form-control" name="customer['cpf_cnpj']">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Nascimento</label>
      <input type="date" class="form-control" name="customer['birthdate']">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="adress">Endereço</label>
      <input type="text" maxlength="255" class="form-control" name="customer['address']">
    </div>

    <div class="form-group col-md-3">
      <label for="hood">Bairro</label>
      <input type="text" maxlength="100" class="form-control" name="customer['hood']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="zip_code">CEP</label>
      <input type="text" maxlength="8" class="form-control" name="customer['zip_code']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="created">Data de Cadastro</label>
      <input type="date" class="form-control" name="customer['created']" disabled>
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="city">Município</label>
      <input type="text" maxlength="100" class="form-control" name="customer['city']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="phone">Telefone</label>
      <input type="text" maxlength="13" class="form-control" name="customer['phone']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="mobile">Celular</label>
      <input type="text" maxlength="13" class="form-control" name="customer['mobile']">
    </div>
    
    <div class="form-group col-md-1">
      <label for="state">UF</label>
      <input type="text" maxlength="2" class="form-control" name="customer['state']" maxLength="2">
    </div>
    
    <div class="form-group col-md-2">
      <label for="ie">Inscrição Estadual</label>
      <input type="text" maxlength="15" class="form-control" name="customer['ie']">
    </div>
    
    
  </div>
  
  <div id="actions" class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
          <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
        </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
<?php ob_end_flush(); ?>
<?php ob_start(); ?>
<?php 
  require_once('functions.php'); 
  //esse é o add.php
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
  } else {
        $_SESSION['message'] = "Você precisa estar logado para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location:index.php");
  }
  include(HEADER_TEMPLATE); 
  add();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
        <h2>Novo Filme</h2>
</header>

<form action="add.php"  enctype="multipart/form-data" method="post">
  <hr />
        <div class="row">
                <div class="form-group col-md-5">
                        <label for="titulo">Título</label>
                        <input type="text" maxlength="50" class="form-control" name="filme['titulo']">
                </div>
                
                <div class="form-group col-md-2">
                        <label for="diretor">Diretor</label>
                        <input type="text" maxlength="40" class="form-control" name="filme['diretor']">
                </div>
                
                <div class="form-group col-md-2">
                        <label for="ano">Ano</label>
                        <input type="number" class="form-control" name="filme['ano']">
                </div>
                <div class="form-group col-md-3">
                        <label for="datacad">Data de Cadastro</label>
                        <input type="date" class="form-control" name="filme['datacad']" disabled>
                </div>
        </div>
  
        <div class="row">
                <div class="form-group col-md-4">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group col-md-2">
                        <label for="pre">Pré-visualização:</label>
                        <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="imagens/SemImagem.png" alt="pic">
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



<script>
  $(document).ready(() =>{
  $("#foto").change(function () {
    const file = this.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        $("#imgPreview").attr("src", event.target.result);
      };
      reader.readAsDataURL(file);
  
    }
  });
});
</script>
<?php ob_end_flush(); ?>
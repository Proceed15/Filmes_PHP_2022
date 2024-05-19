<?php ob_start(); ?>
<?php 
  require_once('functions.php'); 
  //esse é o add.php
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['user'])){ // Verifica se tem um usuário logado
if ($_SESSION['user'] != "admin") { // Verifica se o usuário é admin
    $_SESISON['message'] = "Você precisa ser administrador para acessar esse recurso!";
          $_SESSION['type'] = "danger";
          header("Location:" . BASEURL . "index.php");
}
  } else {
     $_SESSION['message'] = "Você precisa estar logado e ser administrador para acessar esse recurso!";
     $_SESSION['type'] = "danger";
     header("Location:" . BASEURL . "index.php");
  }
  add();
  include(HEADER_TEMPLATE);
?>

<?php include(HEADER_TEMPLATE); ?>
      <header>
        <h2>Novo Usuário</h2>
      </header>
      
      <!--<?php if (!empty($_SESSION['message'])) : ?>
        <div class =" alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert"> 
            <?php echo $_SESSION['message']; ?>
            <button type = "button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php clear_messages();?>
      <?php endif; ?>-->
      
      <form action="add.php" method="post" enctype="multipart/form-data">
        <!-- area de campos do form -->
          <hr>
          <div class="row">
              <div class="form-group col-md-8">
                  <label for="name">Nome</label>
                  <input type="text" class="form-control" name="usuario[nome]">
              </div>

              <div class="form-group col-md-4">
                  <label for="campo2">Usuário (Login)</label>
                  <input type="text" class="form-control" name="usuario[user]">
              </div>

              <div class="form-group col-md-4">
                  <label for="campo3">Senha</label>
                  <input type="password" class="form-control" name="usuario[password]">
              </div>
          </div>
          
          <div class="row">
              <div class="form-group col-md-4">
                  <label for="campo1">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto">
              </div>

              <div class="form-group col-md-2">
                  <label for="pre">Pré-vizualização:</label>
                  <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/SemImagem.png" alt="pic">
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
<?php ob_start(); ?>
<?php 
	require_once('functions.php');
        if (!isset($_SESSION)) session_start();
	view($_GET['id']);
        include(HEADER_TEMPLATE);
?>
<link rel="stylesheet" href="style.css">

<header>
        <h2>Filme <?php echo $filme['id']; ?></h2>
</header>

<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Título:</dt>
	<dd><?php echo $filme['titulo']; ?></dd>

	<dt>Diretor:</dt>
	<dd><?php echo $filme['diretor']; ?></dd>

	<dt>Ano:</dt>
	<dd><?php echo $filme['ano']; ?></dd>
</dl>

<dl class="dl-horizontal">
	<dt>Data de Cadastro:</dt>
	<dd><?php echo formataData($filme['datacad'], "d/m/Y H:i:s"); ?></dd>
     <?php 
	if (empty($filme['foto'])){
			$imagem = 'SemImagem.png';
		}else{
			$imagem = $filme['foto'];
		}
	?>
	<dt>Foto:</dt>
	<dd><?php echo "<img src='imagens/$imagem' class=\"shadow p-1 mb-1 bg-body rounded\" width=\"180px\">";  ?></dd>
</dl>
<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $filme['id']; ?>" class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
	  <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>

<?php ob_end_flush(); ?>
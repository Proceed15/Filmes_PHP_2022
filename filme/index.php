<?php ob_start(); ?>
<?php
    require_once('functions.php');
    if (!isset($_SESSION)) session_start();
    index();
	
	include(HEADER_TEMPLATE);
?>
<style>

        td,th{
                color: #FFF;
        }
        #filmes{ 
                border:4px solid #7914C7 ; width: 200px; 
        }
        label{
                align: left
        }
 
</style>


<header style="margin-top:10px;">
	<div class="row">
		<div class="col-sm-6">
			<h2>Filmes</h2>
		</div>
                <div class="col-sm-6 text-end h2" >
                        <a class="btn btn-secondary" href="add.php"  ><i class="fa fa-plus"></i> Novo Filme</a>
                        <a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
                </div>
        
	</div>
</header>
<form name = "filtro" method="post" action="index.php">
			<div class="row">
				<div class = "form-group col-md-4">
					<div class ="input-group mb-3">
						<input type="text" class="form-control" maxlength="80" name="movies" required>
						<button type="submit" class="btn btn-secondary"><i class='fas fa-search'></i> Consultar</button>
					</div>
				</div>
			</div>
		</form>
<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>
<hr>

<table class="table table-hover">
<thead>
	<tr>
           <tr>
              <th width='30px' >Id</th>
              <th width='100px'>Titulo</th>
              <th width='100px'>Diretor</th>
              <th width='50px'>Ano</th>
              <th width='100px'>Data de cadastro</th>
              <th width='50px'>Foto</th>
              <th width='150px'>Opções</th>
           </tr>
	</tr>
</thead>
<tbody>
<?php if ($filmes) : ?>
<?php foreach ($filmes as $filme) : ?>
	<tr>
		<td><?php echo $filme['id']; ?></td>
		<td><?php echo $filme['titulo']; ?></td>
		<td><?php echo $filme['diretor']; ?></td>
		<td><?php echo $filme['ano']; ?></td>
		<td><?php echo FormataData($filme['datacad'], "d/m/Y");?></td>
		<td><?php
		if (!empty($filme['foto'])){
			echo  "<img src=\"imagens/" . $filme['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"150px\">";
		}else{
			echo  "<img src=\"imagens/SemImagem.png\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"150px\">";
		}
		//$id = base64_encode($filme['id']);
		?></td>
			
		
	
		<td class="actions text-start"> 
			<a href="view.php?id=<?php echo $filme['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="edit.php?id=<?php echo $filme['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-filmes-modal" data-filme="<?php echo $filme['id']; ?>" >
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
		
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
<?php ob_end_flush(); ?>
<?php ob_start(); ?>
<?php
    require_once('functions.php');
    if (!isset($_SESSION)) session_start();
    index();
?>

<?php include(HEADER_TEMPLATE); ?>
<style>
        td,th{
                color: #FFF;
        }
        
        #name{ 
                border:4px solid #7914C7 ; width: 200px; 
        }
</style>
<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Clientes</h2>
		</div>
		<div class="col-sm-6 text-end h2">
	    	<a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
	    	<a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>
<form name = "filtro" method="post" action="index.php">
			<div class="row">
				<div class = "form-group col-md-4">
					<div class ="input-group mb-3">
						<input type="text" class="form-control" maxlength="80" name="name" required>
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
		<th>ID</th>
		<th width="26%">Nome</th>
		<th>CPF/CNPJ</th>
		<th>Telefone</th>
		<th>Cadastrado em</th>
		<th>Atualizado em</th>
		<th>Opções</th>
	</tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
	<tr>
                <td><?php echo $customer['id']; ?></td>
                <td><?php echo $customer['name']; ?></td>
                <td><?php echo formataCPF($customer['cpf_cnpj']); ?></td>
                <td><?php echo formataTelefone($customer['phone']); ?></td>
                <td><?php echo formataData($customer['created'], "d/m/Y H:i:s"); ?></td>
                <td><?php echo formataData($customer['modified'], "d/m/Y H:i:s"); ?></td>
                <td class="actions text-start"> 
                        <a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i> Visualizar</a>
                        <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
                        <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
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
<?php include('modalCustomers.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
<?php ob_end_flush(); ?>